<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登入</title>
</head>
<body>

  @if(auth()->check())
  <div>  
    <div class="d-flex justify-content-between">
      @if (Auth::check())
        <p>Welcome {{ Auth::user()->name }}</p>
        <form method="POST" action="/logout">
          @csrf
          <button type="submit">
              <i>登出</i>
          </button>
        </form>
      @endif
      <a class="btn btn-success" href="/tasks/create">發佈任務</a>
    </div>
  </div>

  @foreach($tasks as $task)
    <x-task_table :task="$task" />
  @endforeach

  @else
    @include('login')
  @endif

</body>

</html>