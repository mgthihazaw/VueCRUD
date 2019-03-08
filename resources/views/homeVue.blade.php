<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
<link href = "https://cdn.jsdelivr.net/npm/animate.css@3.5.1" rel = "stylesheet" type = "text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
        <v-app>
       <app-home></app-home>
   </v-app>
    </div>
    <script src="{{ asset('js/app.js') }}" ></script>
</body>
</html>
