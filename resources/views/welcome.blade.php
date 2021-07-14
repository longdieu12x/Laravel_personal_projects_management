<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{asset('css/app.css')}}" rel="stylesheet" />
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />

    <title>Laravel</title>

</head>

<body class="antialiased">
    <div id="app">
        <app-component></app-component>
    </div>
    <script type="application/javascript">
        var upcomings = JSON.parse('@json($code_posts->upcomings)');
        var todays = JSON.parse('@json($code_posts->todays)');
        var code = JSON.parse('@json($code_posts)');
        var project = JSON.parse('@json($project)');
        var user = JSON.parse('@json($user)');
        var isNeedToCreate = false;
    </script>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
