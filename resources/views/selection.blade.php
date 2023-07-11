<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="مدارس " />
<meta name="copyright" content="Abdulwhab Mohammed" />
<meta name="author" content="potenzaglobalsolutions.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>برنامج عبدالوهاب لادارة المدارس</title>


<!-- Font -->
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

<!-- css -->

<link rel="stylesheet" href="/rtl.css">




</head>

<body>

<div class="wrapper">

<section class="height-100vh d-flex align-items-center page-section-ptb login"
            style="background-image: url('{{ asset('/images/sativa.png')}}');">
    <div class="container">
        <div class="row justify-content-center no-gutters vertical-align">

            <div style="border-radius: 15px;" class="col-md-8 col-md-8 bg-white">
                <div class="login-fancy pb-40 clearfix">
                    <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">حدد طريقة الدخول</h3>
                    <div class="form-inline">
                        <a class="btn btn-default col-md-4" title="طالب" href="{{route('login.show','student')}}">
                            <img alt="user-img" width="100px;" src="{{URL::asset('/images/student.png')}}"><br><br>
                            <h4 style="margin: 3px;">طالب</h4>
                        </a>
                        <a class="btn btn-default col-md-4" title="معلم" href="{{route('login.show','teacher')}}">
                            <img alt="user-img" width="100px;" src="{{URL::asset('/images/teacher.png')}}"><br><br>
                            <h4 style="margin: 3px;">معلم</h4>
                        </a>
                        <a class="btn btn-default col-md-4" title="ادمن" href="{{route('login.show','admin')}}">
                            <img alt="user-img" width="100px;" src="{{URL::asset('/images/admin.png')}}"><br><br>
                            <h4 style="margin: 3px;">ادمن</h4>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!--=================================
login-->

</div>
<!-- jquery -->
<script src="/js/jquery-3.3.1.min.js"></script>
<!-- plugins-jquery -->
<script src="/js/plugins-jquery.js"></script>
<!-- plugin_path -->
<script>
var plugin_path = 'js/';
</script>


<!-- toastr -->
@yield('js')
<!-- custom -->
<script src="/js/custom.js"></script>


</body>

</html>