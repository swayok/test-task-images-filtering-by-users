<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('page-title', trans('frontend.default_page_title'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @if(app()->environment() !== 'production')
        <meta name="robots" content="noindex, nofollow">
    @endif

    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/data_tables/datatables.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/admin.css" rel="stylesheet" type="text/css"/>

    <script src="/js/jquery.min.js"></script>
    <script src="/data_tables/datatables.min.js"></script>

</head>
<body>
    <div id="app">
        @yield('page-content')
    </div>
    <script src="/js/admin.js"></script>
</body>
</html>
