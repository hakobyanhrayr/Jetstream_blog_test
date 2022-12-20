<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('/blog.css')}}">
   @include('admin.layouts.head')
</head>
<body class="hold-transition skin-blue sidebar-mini layout-fixed">
<div class="wrapper">
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
  @section('main-content')
    @show
@include('admin.layouts.footer')
</div>

</body>
</html>
