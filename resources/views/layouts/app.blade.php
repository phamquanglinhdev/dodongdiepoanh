<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="description" content="Đồ đồng Điệp oanh">
    @stack("page_meta")
    <title>@yield("title")</title>
    <!-- MDB icon -->
    <link rel="icon" href="" type="image/x-icon"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="{{asset("css/mdb.min.css")}}"/>
    <link rel="stylesheet" href="{{asset("css/app.css")}}"/>
    @stack("page_css")
    {!! setting("google_tag_manager") !!}
</head>
<body>
{!! setting("google_tag_manager_noscript") !!}
<!-- Start your project here-->
@include("sites.inc.navbar")
@yield("content")
<div class="py-3"></div>
<!-- End your project here-->
@include("sites.inc.footer")
@stack("modal")
<!-- MDB -->
<script type="text/javascript" src="{{asset("js/mdb.min.js")}}"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
@stack("page_js")
</body>
</html>
