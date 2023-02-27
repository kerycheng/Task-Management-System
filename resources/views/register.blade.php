
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>註冊</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/dist/css/register_login.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="../assets/dist/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
    <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">註冊</h1>
    <form action="/users" method="POST">
        @csrf
        <div class="form-floating">        
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="名稱" value="{{ old('name') }}">
            <label for="name">名稱</label>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="電子郵件" value="{{ old('email') }}" required autocomplete="email">
            <label for="email">電子郵件</label>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="密碼" value="{{ old('password') }}">
            <label for="password">密碼</label>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating">
            <select class="form-select @error('job') is-invalid @enderror" name="job" id="job">
                <option value="" selected disabled>職位名稱</option>
                @foreach($jobs as $job)
                    <option value="{{$job->id}}">{{$job->title}}</option>
                @endforeach
            </select>
            @error('job')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">註冊</button>         
    </form>
    <div>
        <a href="/">已經註冊過了? 點我登入</a>
    </div>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
</main>
</body>
</html>