  @if(auth()->check())

  @include('components.header')

  <x-task_table :tasks="$tasks" />

  @else
    @include('login')
  @endif

</body>

</html>

