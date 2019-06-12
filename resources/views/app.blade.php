<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>React Example Project</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        

    </head>
    <body>
        <div class="container" id="app">
            <!-- Here go your React Render App -->
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>