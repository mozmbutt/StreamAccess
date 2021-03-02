<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Stream Access - A Click Away</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Stream Access - A Click Away" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('css/app-dark.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            @include('Admin.include.top-navbar')
        </header>
        
        @include('Admin.include.left-navbar')
        <div class="main-content">

<div class="container">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <h2 style="text-align:center">Manage Channels</h2>
    <div class="container">
        <table>
            <tr>
                <th>Channel</th>
                <th>Slug</th>
            </tr>
            @foreach ($channels as $channel)
                <tr>
                    <td>{{$channel->name}}</td>
                    <td>{{$channel->slug}}</td>
                </tr>
            @endforeach
            
        </table>
    </div>
<style>
    table {
    border-collapse: collapse;
    width: 100%;
    }

    th, td {
    text-align: center;
    padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
    background-color: #2d132c;
    color: white;
    }

    .btn{
        background: #2d132c;
        text-decoration: none;
        border: 1px solid black;
        padding: 3px 4px 3px 4px;
        color: white;
        border-radius: 6px;
    }
    .update:hover{
        background-color: #30475e
    }
    .delete:hover{
        background-color: #c02739
    }
</style>
</div>


            <footer class="footer">
                @include('Admin.include.footer')
            </footer>
        </div>
    </div>
    <!-- End Page -->

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/metisMenu.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/simplebar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/waves.min.js') }}"></script>
    
    <!-- apexcharts -->
    <script src="{{ asset('js/app.theme.js') }}"></script>
    <script src="{{ asset('js/dashboard.init.js') }}"></script>
    <script src="{{ asset('js/apexcharts.min.js') }}"></script>
</body>

</html>
