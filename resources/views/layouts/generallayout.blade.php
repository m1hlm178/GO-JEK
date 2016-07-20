<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ Request::is('login') ? 'Go-Jek Admin Login' : 'Go-Jek Visitor Register' }}</title>
     {{ Html::style('assets/css/bootstrap.css') }}
     {{ Html::style('assets/font-awesome/css/font-awesome.css') }}
     {{ Html::style('assets/css/animate.css') }}
     {{ Html::style('assets/css/style.css') }}
     @yield('cssloc')
     <link rel="icon" href="{{ url('assets/image/icon.png')}}" type="image/png" />
</head>
<body class="gray-bg">
    @yield('content')
    <!-- Mainly scripts -->
     {{ Html::script('assets/js/jquery-2.1.1.js') }}
     {{ Html::script('assets/js/bootstrap.js') }}
     @yield('jsloc')
</body>
</html>
