@include('components.header')

<link href="../assets/dist/css/usertasks.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="event-schedule-area-two bg-color pad100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <div class="title-text">
                        <h2>我發佈的任務</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">任務名稱</th>
                                        <th scope="col">任務內容</th>
                                        <th scope="col">剩餘時間</th>
                                        <th class="text-center" scope="col">當前狀態</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $task)
                                        @if($task->creator == Auth::user()->name)
                                            <tr class="inner-box">
                                                <th scope="row">
                                                    <div class="event-date">
                                                        <p>{{ $task->task_name }}</p>
                                                    </div>
                                                </th>
                                                <td>
                                                    <div class="event-wrap">
                                                        <h3><a>{{ $task->description }}</a></h3>
                                                        <div class="meta">
                                                            <div class="organizers">
                                                                <a href="#">{{ $task->executor }}</a>
                                                            </div>
                                                            <div class="time">
                                                                <span>{{ $task->start_time }} - {{ $task->end_time }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <?php 
                                                    $now_time = date('Y/m/d H:i:s');
                                                    $time_left = (strtotime($task->end_time) - strtotime($now_time)) / 360; 
                                                    if($time_left <= 0){
                                                        $time_left = '已截止';
                                                    }else{
                                                        $time_left = floor($time_left);
                                                    }
                                                ?>
                                                <td>
                                                    <div class="r-no">
                                                    @if(gettype($time_left) == 'double')
                                                        <span>{{ $time_left }}H</span>
                                                    @else
                                                        <span>{{ $time_left }}</span>
                                                    </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="primary-btn">
                                                        <a>{{ $task->task_status }}</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <div class="title-text">
                        <h2>分配給我的任務</h2>
                    </div>
                </div>
            </div>
            <!-- /.col end-->
        </div>
        <!-- row end-->
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">任務名稱</th>
                                        <th scope="col">任務內容</th>
                                        <th scope="col">剩餘時間</th>
                                        <th class="text-center" scope="col">當前狀態</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $task)
                                        @if($task->executor == Auth::user()->name)
                                            <tr class="inner-box">
                                                <th scope="row">
                                                    <div class="event-date">
                                                        <p>{{ $task->task_name }}</p>
                                                    </div>
                                                </th>
                                                <td>
                                                    <div class="event-wrap">
                                                        <h3><a>{{ $task->description }}</a></h3>
                                                        <div class="meta">
                                                            <div class="organizers">
                                                                <a href="#">{{ $task->creator }}</a>
                                                            </div>
                                                            <div class="time">
                                                                <span>{{ $task->start_time }} - {{ $task->end_time }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <?php 
                                                    $now_time = date('Y/m/d H:i:s');
                                                    $time_left = (strtotime($task->end_time) - strtotime($now_time)) / 360; 
                                                    if($time_left <= 0){
                                                        $time_left = '已截止';
                                                    }else{
                                                        $time_left = floor($time_left);
                                                    }
                                                ?>
                                                <td>
                                                    <div class="r-no">
                                                    @if(gettype($time_left) == 'double')
                                                        <span>{{ $time_left }}H</span>
                                                    @else
                                                        <span>{{ $time_left }}</span>
                                                    </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="primary-btn">
                                                        <form action="/tasks/{{$task->id}}" method="POST">
                                                            {{-- @dd($task) --}}
                                                            @csrf
                                                            @method('PUT')
                                                            <div>
                                                                <div>
                                                                    <select class="form-select" id="status" name="status">
                                                                        
                                                                        <option value="">{{$task->task_status}}</option>
                                                                        @foreach ($job_status as $status)
                                                                            @if($status->status != $task->task_status)
                                                                                <option value="{{$status->status}}">{{$status->status}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div>
                                                                    <button type="submit" class="btn btn-success">更新</button>
                                                                </div>
                                                            <div>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>