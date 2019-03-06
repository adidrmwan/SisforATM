<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mandiri</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include('layouts.css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('layouts.nav')
  @include('layouts.sidebar')

  @yield('content')
  <div class="control-sidebar-bg"></div>
</div>

@include('layouts.script')
@yield('chartSingleScript')
@yield('chartCenterScript')
@yield('chartHome')
</body>
</html>
