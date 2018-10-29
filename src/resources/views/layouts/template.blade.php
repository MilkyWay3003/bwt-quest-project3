<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel task3</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="task3"/>
    <meta name="author" content="MilkyWay"/>

    <link href="/css/bootstrap.min.css" rel="stylesheet"/>    
    <link href="/css/datepicker.min.css" rel="stylesheet" type="text/css">
    <link href="/css/intlTelInput.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet"/>
</head>
<body>

@yield('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="{{ asset('js/vendor/datepicker.js') }}"></script>
<script src="{{ asset('js/vendor/i18n/datepicker.en.js') }}"></script>
<script src="{{ asset('js/vendor/intlTelInput.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/validate.js/0.12.0/validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
@stack('scripts')

</body>
</html>
