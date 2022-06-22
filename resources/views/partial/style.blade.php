   <!-- Favicon icon -->
   <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/assets/images/favicon.png') }}">
   <title>Admin Press Admin Template - The Ultimate Bootstrap 4 Admin Template</title>
   <!-- Bootstrap Core CSS -->
   <link href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
   <!-- morris CSS -->
   <link href="{{ asset('admin/assets/plugins/morrisjs/morris.css') }}" rel="stylesheet">
   <!-- Custom CSS -->
   @if (App::islocale('en'))
   <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
   @else
   <link href="{{ asset('admin/css-rtl/style.css') }}" rel="stylesheet">
   @endif

   <!-- You can change the theme colors from here -->
   <link href="{{ asset('admin/css/colors/blue.css')}}" id="theme" rel="stylesheet">
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
