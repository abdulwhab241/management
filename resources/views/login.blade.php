<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
<meta charset="utf-8" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content=" مدارس " />
<meta name="copyright" content="Abdulwhab Mohammed" />
<meta name="author" content="potenzaglobalsolutions.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>برنامج عبدالوهاب لادارة المدارس</title>
<link rel="stylesheet" href="/form/css\font-awesome.min.css" />
<link rel="stylesheet" href="/form/css\normalize.css" />
<link rel="stylesheet" href="/form/css\style.css" />
</head>
<body>
<!-- Start Buttons Box -->
<div class="btn-box">
 
    <div class="col-lg-4 col-md-6 bg-white">
        <div class="login-fancy pb-40 clearfix">
        @if($type == 'student')
        <h3 style="font-family: 'Cairo', sans-serif" class="mb-40">تسجيل دخول طالب</h3>
        @elseif($type == 'teacher')
        <h3 style="font-family: 'Cairo', sans-serif" class="mb-40">تسجيل دخول معلم</h3>
        @else
        <h3 style="font-family: 'Cairo', sans-serif" class="mb-40">تسجيل دخول ادمن</h3>
        @endif <br>
        <h2>مرحباً بـك في مـدارس </h2>
        <p style="margin: 5px;">إذا كنت مسجل بنظام المدرسة يمكنك تسجيل اسمك ,<br />
             وكلمة المرور  رقم الهاتف 
            
        </p>
    <form method="POST" class="log" action="{{route('login')}}">
        @csrf
        <div class="field" style="margin: 5px;">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="أسم المستخدم"
            value="{{ old('name') }}" required autocomplete="name" autofocus>
            <input type="hidden" value="{{$type}}" name="type">
            <i class="fa fa-user fa-fw"></i>
        </div>
        <div class="field" style="margin: 5px;">
            <input id="password" type="password" placeholder="كلمة المرور" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            <i class="fa fa-key fa-fw"></i>
        </div>
        <input type="submit" style="margin: 5px;" value="دخول" />
    </form>
    <div class="text-center ">
        <p class="mb-0" style="text-align: center;">   تـصمـيـم وتطوير:

            <a href="https://api.whatsapp.com/send/?phone=967770101198&text&type=phone_number&app_absent=0" style="color: white;">  Abdulwhab Mohammed</a></p>
    </div>
        </div>
    </div>
</div>
<!-- End Buttons Box -->


<!-- Start Form Box -->
<script src="/form/js\jquery-3.1.1.min.js"></script>
<script src="/form/js\script.js"></script>
</body>
</html>
