<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="مدارس عمر" />
    <meta name="copyright" content="Abdulwhab Mohammed" />
    {{-- <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" /> --}}
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
</head>

<body  class="skin-blue sidebar-mini"  style="font-family: 'Cairo', sans-serif">

    <div class="wrapper">

        <!--=================================
 preloader -->

        {{-- <div id="pre-loader"> --}}
            {{-- <img src="/assets/images/pre-loader/loader-01.svg" alt=""> --}}
            {{-- <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div> --}}

        <!--=================================
 preloader -->

        @include('layouts.header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper" style="min-height: 923px;">

            {{-- @yield('page-header') --}}

            @yield('content')

            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

        </div><!-- main content wrapper end-->
        
        @include('layouts.footer')
    </div>
    {{-- </div>
    </div> --}}

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

</body>

</html>
