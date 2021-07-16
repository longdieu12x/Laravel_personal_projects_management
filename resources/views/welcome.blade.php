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
        var user = JSON.parse('@json($user)');
        var projects = JSON.parse('@json($projects)');
    </script>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
