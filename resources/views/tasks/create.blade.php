@include('components.header')

@if(auth()->check())
<body className='snippet-body'>
  <div class="container mt-5">
    <form action="/tasks" method="POST">
      @csrf
      <div class="mb-3">
        <label for="task_name">任務名稱</label>
        <input type="text" class="form-control" id="task_name" name="task_name" required>
      </div>
      <div class="mb-3">
        <label for="description">任務內容</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
      </div>
      <input type="hidden" name="creator" value="{{Auth::user()->name}}">
      <div class="mb-3">
        <label for="executor">執行人</label>
          <select class="form-control" id="executor" name="executor">
            @foreach ($users as $user)
              <option value="{{$user->name}}">{{$user->name}}</option>
            @endforeach
          </select>
      </div>
      <div class="mb-3">
        <label for="start_time" class="form-label">任務發布時間</label>
        <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
      </div>
      <div class="mb-3">
        <label for="end_time" class="form-label">任務結束時間</label>
        <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
      </div>
      <button type="submit" class="btn btn-primary">發佈</button>
    </form>
  </div>
</body>

@endif