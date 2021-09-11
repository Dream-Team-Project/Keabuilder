<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- csrf_token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script> window.Laravel = { csrfToken: '{{ csrf_token() }}'}</script>

        <title>{{ config('app.name') }}</title> 

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <!--Fonts -->
      
        <!-- style -->
        <link href="{{asset('css/main.css')}}" rel="stylesheet">
        <!-- style -->

        <!-- fontfamily -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <!-- fontfamily -->

        

        <!-- fontawsome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
        <!-- fontawsome -->

        <!-- Bootstrap -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

        <!-- Bootstrap -->

        <!-- page load progress bar -->

        <link href="https://unpkg.com/nprogress@0.2.0/nprogress.css" rel="stylesheet" />
        <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>

        <!-- page load progress bar -->
        <!-- Styles -->

    </head>
    <body>
        <div id="app">
            <indexlogin-component id="mainindex"></indexlogin-component>
        </div>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
