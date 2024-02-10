<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body class="text-center">
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">sl.lv</h5>
    @if (session('nickname'))
        <h5 class="my-0 mr-md-auto font-weight-normal">User: {{ session('nickname') }}</h5>
    @else
        <h5 class="my-0 mr-md-auto font-weight-normal">User: Anonymous</h5>
    @endif      
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="btn text-dark" href="/">Main page</a>
        @if (session('nickname'))
        <a class="btn text-dark" href="/new_query">Create new query</a>
        @endif
        <a class="btn btn-outline-primary" href="/sign_up">Sign up</a>
    </nav>
    @if (session('nickname'))
        <a class="btn btn-outline-primary" href="{{ route('signout') }}">Sign out</a>
    @else
        <a class="btn btn-outline-primary" href="/sign_in">Sign in</a>
    @endif

</div>
    <br><br><br><br><br>
    <form class="form-signup" style="max-width: 300px; margin: 0 auto;" action="{{ route('signup.store') }}" method="POST">
        <img class="mb-4" src="https://emojis.wiki/thumbs/emojis/pleading-face.webp" alt="" width="180" height="90">
        <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
        <label for="inputNickname" class="sr-only">Nickname</label>
        <input type="text" id="inputNickname" class="form-control" placeholder="Nickname" required="" autofocus="" name="nickname">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="text" id="inputPassword" class="form-control" placeholder="Password" required="" name="password">
        <div class="checkbox mb-3">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
        @csrf

    </form>


</body>


</html>
