<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
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
<br><br>
@if (isset($userQueries) && !$userQueries->isEmpty())
    <table class="table" style="max-width: 1500px; margin: 0 auto;">
        <thead>
            <tr>
                <th>Querty title</th>
                <th>Querty description</th>
                <th>nickname</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userQueries as $query)
                <tr class="textintable">
                    <td>{{ $query->q_title }}</td>
                    <td>{{ $query->q_description }}</td>
                    <td>{{ $query->nickname }}</td>
                    @if ($query->nickname_id === session('user_id'))
                    <td>
                        <form action="{{ route('query.destroy', $query->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-primary">Delete</button>
                        </form>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h5 style="max-width: 300px; margin: 0 auto;">Database is empty</h5>
@endif


</body>
</html>
