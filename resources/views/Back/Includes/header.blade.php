@section('header')

        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>@yield('title',$title)</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{url('css/admin/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('css/admin/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('css/admin/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('css/admin/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url('css/admin/_all-skins.css')}}">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{URL::to('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    {{--<link rel="stylesheet" href="{{URL::to('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">--}}
<script src="//cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
    <!-- jQuery 3 -->
    <script src="{{URL::to('js/admin/jquery.min.js')}}"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

@endsection