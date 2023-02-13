@if(auth()->check())
<form action="/tasks" method="POST">
    @csrf
    <div class="form-group">
      <label for="task_name">任務名稱</label>
      <input type="text" class="form-control" id="task_name" name="task_name" required>
    </div>
    <div class="form-group">
      <label for="description">任務內容</label>
      <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    {{-- <div class="form-group">
      <label for="creator">分配者</label> --}}
      <input type="hidden" name="creator" value="{{Auth::user()->name}}">
    {{-- </div> --}}
    <div class="form-group">
      <label for="executor">執行人</label>
      <input type="text" class="form-control" id="executor" name="executor" required>
    </div>
    <div class="form-group">
      <label for="start_time">任務發布時間</label>
      <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
    </div>
    <div class="form-group">
      <label for="end_time">任務結束時間</label>
      <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
    </div>
    <button type="submit" class="btn btn-primary">儲存</button>
</form>

<div class="d-flex justify-content-between">
    @if (Auth::check())
      <p>Welcome {{ Auth::user()->name }}</p>
      <form method="POST" action="/logout">
        @csrf
        <button type="submit">
            <i>登出</i>
        </button>
      </form>
    @else
      <a class="btn btn-primary" href="/register">註冊</a>
      <a class="btn btn-primary" href="/login">登入</a>
    @endif
    <a class="btn btn-success" href="/tasks/index">查看任務列表</a>
</div>

@else
<div class="container mt-5 text-center">
    <h1>請先登入</h1>
    <a href="/login" class="btn btn-primary">請先登入</a>
</div>
@endif