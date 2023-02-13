<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>註冊</title>
</head>
<body>
    <div>
        <h1>註冊會員</h1>
        <form action="/users" method="POST">
            @csrf
            <p>
                <label for="name">名稱: </label>
                <input type="text" name="name" id="name" required>
            </p>
            <p>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" required>
            </p>
            <p>
                <label for="job">職位名稱：</label>
                <select name="job" id="job">
                    @foreach($jobs as $job)
                        <option value="{{$job->id}}">{{$job->title}}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="password">密碼: </label>
                <input type="password" name="password" id="password" required>
            </p>
            <p>
                <button type="submit">註冊</button>
            </p>
        </form>
    </div>
</body>
</html>