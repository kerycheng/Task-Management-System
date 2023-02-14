<div class="container">
    <h1>我的任務</h1>
    <h2>我發佈的任務</h2>
    <table class="table">
        <thead>
            <tr>
                <th>任務名稱</th>
                <th>任務內容</th>
                <th>分配人</th>
                <th>任務發佈時間</th>
                <th>任務結束時間</th>
                <th>任務當前狀態</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                @if($task->creator == Auth::user()->name)
                <tr>
                    <td>{{$task->task_name}}</td>
                    <td>{{$task->description}}</td>
                    <td>{{$task->executor}}</td>
                    <td>{{$task->start_time}}</td>
                    <td>{{$task->end_time}}</td>
                    <td>{{$task->task_status}}</td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <h2>分配給我的任務</h2>
    <table class="table">
        <thead>
            <tr>
            <th>任務名稱</th>
            <th>任務內容</th>
            <th>發佈人</th>
            <th>任務開始時間</th>
            <th>任務結束時間</th>
            <th>任務當前狀態</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            @if($task->executor == Auth::user()->name)
            <tr>
                <td>{{$task->task_name}}</td>
                <td>{{$task->description}}</td>
                <td>{{$task->creator}}</td>
                <td>{{$task->start_time}}</td>
                <td>{{$task->end_time}}</td>
                <td>{{$task->task_status}}</td>
                <form action="/tasks/{{$task->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <td>
                        <select class="form-control" id="status" name="status">
                            @foreach ($job_status as $status)
                              <option value="{{$status->status}}">{{$status->status}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success">更新</button>
                    </td>
                </form>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
<a href="/" class="btn btn-secondary">返回</a>