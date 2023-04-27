<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>برنامج عبدالوهاب لادارة المدارس</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">


        <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- css -->
    <link rel="stylesheet" href="/rtl.css">

</head>

<body>

    <div class="wrapper">

<!--=================================
preloader -->

<div id="pre-loader">
    <img src="{{URL::asset('/images/pre-loader/loader-01.svg')}}" alt="">
</div>

<!--=================================
preloader -->

    <!--=================================
login-->

<section class="height-100vh d-flex align-items-center page-section-ptb login"
style="background-image: url('{{ asset('/images/sativa.png')}}');">




<div class="container">
    @if (Session::has('message'))
<div class="alert alert-danger">
    <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{Session::get('message')}}</h3></span>
</div>
@endif
<div class="row justify-content-center no-gutters vertical-align">
<div class="col-lg-4 col-md-6 login-fancy-bg bg"
    style="background-image: url('{{ asset('/images/login-inner-bg.jpg')}}');">
    <div class="login-fancy">
        <h3 class="text-white mb-20">مـدارس عمـر بن عبـدالعـزيـز</h3>
        <p class="mb-20 text-white">Create tailor-cut websites with the exclusive multi-purpose
            responsive template along with powerful features.</p>
        <ul class="list-unstyled  pos-bot pb-30">
            <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a> </li>
            <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
        </ul>
    </div>
</div>

<div class="col-lg-4 col-md-6 bg-white">
<div class="login-fancy pb-40 clearfix">
    @if($type == 'student')
        <h3 style="font-family: 'Cairo', sans-serif" class="mb-40">تسجيل دخول طالب</h3>
    @elseif($type == 'teacher')
        <h3 style="font-family: 'Cairo', sans-serif" class="mb-40">تسجيل دخول معلم</h3>
    @else
        <h3 style="font-family: 'Cairo', sans-serif" class="mb-40">تسجيل دخول ادمن</h3>
    @endif
<form method="POST" action="{{route('login')}}">
    @csrf

<div class="section-field mb-20">
    <label class="mb-10" for="name">أسـم المستخـدم</label>
    <input id="name" type="text"
            class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ old('name') }}" required autocomplete="name" autofocus>
    <input type="hidden" value="{{$type}}" name="type">
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="section-field mb-20">
<label class="mb-10" for="Password">كلمة المرور  </label>
<input id="password" type="password"
        class="form-control @error('password') is-invalid @enderror" name="password"
        required autocomplete="current-password">
    @error('password')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>
            <div class="section-field">
                <div class="remember-checkbox mb-30">
                    <input type="checkbox" class="form-control" name="two" id="two" />
                    <label for="two"> تذكرني</label>
                    <a href="#" class="float-right">هل نسيت كلمةالمرور ؟</a>
                </div>
            </div>
            <button class="button"><span>دخول</span><i class="fa fa-check"></i></button>
        </form>
            </div>
        </div>
    </div>
</div>
</div>
</section>



<!-- jquery -->
<script src="/js/jquery-3.3.1.min.js"></script>
<!-- plugins-jquery -->
<script src="/js/plugins-jquery.js"></script>
<!-- plugin_path -->
<script>
    var plugin_path = 'js/';
</script>

<!-- chart -->
<script src="/js/chart-init.js"></script>
<!-- calendar -->
<script src="/js/calendar.init.js"></script>
<!-- charts sparkline -->
<script src="/js/sparkline.init.js"></script>
<!-- charts morris -->
<script src="/js/morris.init.js"></script>
<!-- datepicker -->
<script src="/js/datepicker.js"></script>
<!-- sweetalert2 -->
<script src="/js/sweetalert2.js"></script>
<!-- toastr -->
@yield('js')
<script src="/js/toastr.js"></script>
<!-- validation -->
<script src="/js/validation.js"></script>
<!-- lobilist -->
<script src="/js/lobilist.js"></script>
<!-- custom -->
<script src="/js/custom.js"></script>

</body>

</html>
