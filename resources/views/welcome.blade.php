<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="مدارس " />
    <meta name="copyright" content="Abdulwhab Mohammed" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title") برنامج عبدالوهاب لإدارة المدارس</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/enter/bootstrap/bootstrapRTL.min.css">
    <link rel="stylesheet" href="/enter/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/enter/css/styleRTL.css">


</head>
<body class="antialiased"  style="font-family: 'Cairo', sans-serif" dir="rtl">

	<header class="header_area" style="font-family: 'Cairo', sans-serif">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<a class="navbar-brand logo_h" ><img src="/images/lo.png" alt="">
				</a>
				
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="icon-bar"> </span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<div style="padding: 5px; margin:5px; font-weight:bold ;"><span style="padding: 5px; margin:5px;">مدارس  </span></div>
				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
				<ul class="nav navbar-nav menu_nav ml-auto mr-auto">
					<li class="nav-item active"><a class="nav-link" href="#">الرئيسية</a></li>
          <li class="nav-item"><a class="nav-link" href="#">الأنشطة</a></li>
          <li class="nav-item"><a class="nav-link" href="#">نبـذة عنـا</a></li>
					<li class="nav-item submenu dropdown">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">دخول</a>
					<ul class="dropdown-menu">
						<li class="nav-item">
              <a class="btn btn-default nav-link"  href="{{route('login.show','student')}}">
               بوابة الطالب الإلكترونية
            </a>
            </li>
						<li class="nav-item">
              <li class="nav-item">
                <a class="btn btn-default nav-link"  href="{{route('login.show','teacher')}}">
                  مـعـلـم
              </a>
              </li>
              <li class="nav-item">
                <a class="btn btn-default nav-link"  href="{{route('login.show','admin')}}">
                  ادمـن
              </a>
              </li>

					</ul>
								</li>
					
				</ul>
				</div>
			</div>
			</nav>
		</div>
		</header>
        
<section>
  <h1 style="margin-top: 700px;">Welcom</h1>
</section>




@yield('Page')




<!-- footer
================================================== -->
<footer style="background: #F4F4F8; margin: 5px;">


<div class="container">
<div class="row">
<div class="col-md-6">
      <h3 style="text-align: right;" >مـدارس</h3><br>
  <ul >
    <li class="my-list" style="text-align: right; font-weight: bolder; ">
      <p style="color: black;"><i class="fa fa-map-marker fa-fw"></i> &nbsp;  اليمن - صنعاء <br>
      asddasdasdasd
      </p>

      <p style="color: green;"><i class="fab fa-whatsapp"></i>&nbsp;  +967 123656789 </p>
      <p style="color: black;"><i class="fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp;  +967 123656789 </p>
      <p style="color: cornflowerblue;" ><i class="fa fa-envelope fa-fw "></i>&nbsp;  ......a@gmail.com </p>
    </li>
  </ul>
</div>


<div class="col-md-6">
  <h3 style="font-weight:bold ; text-align: right;">مواقع التواصل الاجتماعي</h3><br>
  
  <ul style="text-align: right; color:blue;">
      <li><a href="#"> <i class="fab fa-twitter" aria-hidden="true"></i>&nbsp; Twitter</a></li>
      <li><a href="#"> <i class="fab fa-facebook" aria-hidden="true"></i>&nbsp; Facebook</a></li>
    
  </ul>
  </div>
</div>

<div class="col-md-12 navbar-fixed-bottom" style="background: #F4F4F8; color:cornflowerblue;">
  <p class="mytext" style=" font-weight: bold; text-align:center; margin-top:20px;"> تصميم وتطوير : <br>
    <a  href="https://api.whatsapp.com/send/?phone=967770101198&text&type=phone_number&app_absent=0" style="font-weight:bold ;">Abdulwhab Mohammed</i></a> 
  </h5>
</div> 

</div>

</footer> <!-- end s-footer -->


<script src="/enter/jquery/jquery-3.2.1.min.js"></script>
<script src="/enter/bootstrap/bootstrap.bundle.min.js"></script>

<script src="/enter/js/main.js"></script>
</body>

</html>
