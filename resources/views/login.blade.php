<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>登入</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../assets/dist/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
    <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">請登入</h1>
    <form action="/users/authenticate" method="POST">
        @csrf
        <div class="form-floating">
            <input type="email" class="form-control" id="email" name="email" placeholder="電子郵件">
            <label for="email">電子郵件</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="密碼">
            <label for="password">密碼</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> 記住我
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">登入</button>
    </form>
    <div>
        <a href="/register">還沒有會員？點擊這裡進行註冊</a>
    </div>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
</main>


    
  </body>
</html>