<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New query</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
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
    <form method="post" action="{{ route('queries.store') }}" style="max-width: 1000px; margin: 0 auto;">
    <br><br><br><br><br>
        <h2>Insert a description of what you want to ask for:</h2>
        <input type="text" id="query" placeholder="Enter query title" class="form-control" autofocus="" name="query"><br>
        <input type="text" name="description" id="description" placeholder="Enter a description" class="form-control"></input><br>
        <button type="submit" class="btn btn-success">Send</button>
        @csrf
    </form>
</body>
</html>