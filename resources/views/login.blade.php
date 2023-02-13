<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登入</title>
</head>
<body>
    <div>
        <h1>登入</h1> 
        <form action="/users/authenticate" method="POST">
            @csrf
            <div>
                <label for="email">電子郵件：</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="password">密碼：</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">登入</button>
        </form>
    </div>
    <div>
        <a href="/register">還沒有會員？點擊這裡進行註冊</a>
    </div>
</body>

</html>
