@props(['task'])

<div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>任務名稱</th>
            <th>任務內容</th>
            <th>分配者</th>
            <th>執行人</th>
            <th>任務發布時間</th>
            <th>任務結束時間</th>
            <th>任務當前狀態</th>
        </tr>
        </thead>
        <tbody>
            <tr>
            <td>{{ $task->task_name }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ $task->creator }}</td>
            <td>{{ $task->executor }}</td>
            <td>{{ $task->start_time }}</td>
            <td>{{ $task->end_time }}</td>
            <td>{{ $task->task_status}}</td>
            </tr>
        </tbody>
    </table>
</div>