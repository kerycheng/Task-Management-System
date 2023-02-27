@props(['tasks'])

<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
<link href="../assets/dist/css/task_table.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

</head>
<body className='snippet-body'>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center activity">
                <div><span class="activity-done">待辦事項({{count($tasks)}})</span></div>
            </div>
            <div class="mt-3">
                <ul class="list list-inline">
                    @foreach($tasks as $task)
                    <?php 
                    $now_time = date('Y/m/d H:i:s');
                    $time_left = (strtotime($task->end_time) - strtotime($now_time)) / 360; 
                    if($time_left <= 0){
                        $time_left = '已截止';
                    }else{
                        $time_left = floor($time_left);
                    }?>
                        <li class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"><i class="fa fa-check-circle checkicon"></i>
                                <div class="ml-2">
                                    <h6 class="mb-0">{{ $task->task_name }}</h6>
                                    <div class="d-flex flex-row mt-1 text-black-50 date-time">
                                        <div><i class="fa fa-calendar-o"></i><span class="ml-2">{{ $task->start_time }}</span></div>
                                        @if(gettype($time_left) == 'double')
                                            <div class="ml-3"><i class="fa fa-clock-o"></i><span class="ml-2">{{ $time_left }}H</span></div>
                                        @else
                                            <div class="ml-3"><i class="fa fa-clock-o"></i><span class="ml-2">{{ $time_left }}</span></div>
                                        @endif
                                        <div class="ml-3"><i class="fa fa-bookmark"></i><span class="ml-2">{{ $task->task_status }}</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <div class="d-flex flex-column mr-2">
                                    <div class="profile-image">
                                        <img class="rounded-circle" src="#" width="30">
                                        {{ $task->executor }}
                                    </div>
                                    <span class="date-time">{{ $task->end_time }}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>