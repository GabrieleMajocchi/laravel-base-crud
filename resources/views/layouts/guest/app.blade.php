<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield("title", "Beaches")</title>
    </head>
    <body>
        @include("partials.guest-header")

        @yield("main")

        @include("partials.footer")

        @vite("resources/js/app.js")

        @yield("custom-script-tail")
    </body>
</html>
