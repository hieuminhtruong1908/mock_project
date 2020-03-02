<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <base href="{{asset('')}}">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="source/style.css">
    <!-- jQuery-2.2.4 js -->
@stack('css')

<!-- Title -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="source/img/core-img/favicon.ico">


</head>

<body>

@yield('content')

@stack('scripts')
<!-- jQuery-2.2.4 js -->
<script src="source/js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="source/js/bootstrap/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="source/js/bootstrap/bootstrap.min.js"></script>
<!-- All Plugins js -->
<script src="source/js/plugins/plugins.js"></script>
<!-- Active js -->
<script src="source/js/active.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<script>
    $.noConflict();
</script>

@include('sweetalert::alert')

</body>
</html>
