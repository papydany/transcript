<!DOCTYPE html>
<html lang="en">

<head>
@include('partial.header')
</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
@include('partial.navigation')
@include('partial._message')
@yield('content')
@include('partial.script')
</body>

</html>