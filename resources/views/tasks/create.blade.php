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
      <select class="form-control" id="executor" name="executor">
        @foreach ($users as $user)
          <option value="{{$user->name}}">{{$user->name}}</option>
        @endforeach
      </select>
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
<a href="/" class="btn btn-secondary">返回</a>
@endif