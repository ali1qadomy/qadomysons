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
   <link href="{{ asset('admin/css/colors/blue.css') }}" id="theme" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

