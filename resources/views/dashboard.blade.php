<!DOCTYPE html>
<html lang="ar">
@section('title')
برنامج عبدالوهاب لإدارة المدارس
@stop
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="مدارس" />
    <meta name="copyright" content="Abdulwhab Mohammed" />
    <meta name="keywords" content="HTML5 Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @include('layouts.head')
</head>

<body class="skin-blue sidebar-mini" dir="rtl">

    <div class="wrapper">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('layouts.header')

    @include('layouts.main-sidebar')

<!-- Content Header (Page header) -->
<section class="content-header" style="font-family: 'Cairo', sans-serif">
<h1  style="font-family: 'Cairo', sans-serif">
    لـوحـة تحـكـم :        <label style="color: #5686E0">الـ{{ auth()->user()->job }}</label> <span>{{ auth()->user()->name }}</span>
</h1>

</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
@if (Auth::user()->job == 'ادمن')
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
        <div class="inner">
            <h4>عـدد الطـلاب</h4>
            <p>{{App\Models\Student::count()}}</p>
        </div>
        <div class="icon">
            <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
        </div>
        <a href="{{route('Students.index')}}" class="small-box-footer">عـرض البيـانـات <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div><!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
    <div class="inner">
        <h4>عـدد المعلمـين</h4>
        <p>{{App\Models\Teacher::count()}}</p>
    </div>
    <div class="icon">
        <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
    </div>
    <a href="{{route('Teachers.index')}}" class="small-box-footer">عـرض البيـانـات <i class="fa fa-arrow-circle-left"></i></a>
    </div>
</div><!-- ./col -->

<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-#D0DEF6">
    <div class="inner">
        <h4>عـدد الـصفـوف الـدراسيـة</h4>
        <p>{{App\Models\Classroom::count()}}</p>
    </div>
    <div class="icon">
        <i class="fa fa-building highlight-icon" aria-hidden="true"></i>
    </div>
    <a href="{{route('Classrooms.index')}}" class="small-box-footer">عـرض البيـانـات <i class="fa fa-arrow-circle-left"></i></a>
    </div>
</div><!-- ./col -->

<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-green">
  <div class="inner">
      <h4>عـدد الفواتير الـدراسيـة</h4>
      <p>{{App\Models\FeeInvoice::count()}}</p>
  </div>
  <div class="icon">
      <i class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
  </div>
  <a href="{{route('Fees_Invoices.index')}}" class="small-box-footer">عـرض البيـانـات <i class="fa fa-arrow-circle-left"></i></a>
  </div>
</div><!-- ./col -->

</div><!-- /.row -->
<!-- Main row -->
<div class="row">
<!-- Left col -->
<section class="col-lg-12 connectedSortable" style="font-family: 'Cairo', sans-serif">

    <div class="row">
      <div class="col-md-12">
        <div class="box">
        <h2 class="page-header" style="padding:10px;">اخـر العـمليات علـى النظـام</h2>

        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li style="background-color: #BFEAEB;" class="active"><a href="#tab_1" data-toggle="tab" style="font-weight:bolder;">الطـلاب</a></li>
            <li  style="background-color: #BFEAEB;"><a href="#tab_2" data-toggle="tab" style="font-weight:bolder;">المعلميـن</a></li>
            <li  style="background-color: #BFEAEB;"><a href="#tab_3" data-toggle="tab" style="font-weight:bolder;">سنـدات القبـض</a></li>
            <li  style="background-color: #BFEAEB;"><a href="#tab_4" data-toggle="tab" style="font-weight:bolder;">الفواتير الدراسية</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
            
              <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
                <thead>
                    <tr>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >#</th>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >أسم الطالب</th>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" > النوع</th>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >المرحلة الدراسية</th>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >الصف الدراسي</th>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" > الشعـبة</th>
                        <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >تاريـخ التسجيل</th>
                    </tr>
                </thead>
                <tbody>
                  @forelse(\App\Models\Student::latest()->take(10)->get() as $student)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$student->name}}</td>
                      <td>{{$student->gender->name}}</td>
                      <td>{{$student->grade->name}}</td>
                      <td>{{$student->classroom->name_class}}</td>
                      <td>{{$student->section->name_section}}</td>
                      <td style="background-color: #C9CFDF;">{{$student->created_at}}</td>
                      @empty
                          <td style="background-color: #DDD8EF; font-weight:bolder;" colspan="7">لاتوجد بيانات</td>
                  </tr>
              @endforelse
                </tbody>
            </table>
                </div>

            </div><!-- /.tab-pane -->

            <div class="tab-pane" id="tab_2">
            
              <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
                <thead>
                    <tr>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >#</th>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >أسم المعلم</th>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" > النوع</th>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >التخـصـص</th>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >تاريخ التعيين</th>
                        <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >تاريـخ الإضافة</th>
                    </tr>
                </thead>
                <tbody>
                  @forelse(\App\Models\Teacher::latest()->take(5)->get() as $teacher)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$teacher->name}}</td>
                      <td>{{$teacher->genders->name}}</td>
                      <td>{{$teacher->specializations->name}}</td>
                      <td>{{$teacher->joining_date}}</td>
                      <td style="background-color: #C9CFDF;">{{$teacher->created_at}}</td>
                      @empty
                          <td style="background-color: #DDD8EF; font-weight:bolder;" colspan="6">لاتوجد بيانات</td>
                  </tr>
              @endforelse
                </tbody>
            </table>
                </div>

            </div><!-- /.tab-pane -->

            <div class="tab-pane" id="tab_3">
            
              <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
                <thead>
                    <tr>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >#</th>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >أسم الطالب</th>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" > المبلغ</th>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >البيان</th>
                        <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >تاريـخ التسديد</th>
                    </tr>
                </thead>
                <tbody>
                  @forelse(\App\Models\ReceiptStudent::latest()->take(10)->get() as $receipt)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$receipt->student->name}}</td>
                      <td>{{ number_format($receipt->Debit) }} ريال </td>
                      <td>{{$receipt->description}}</td>
                      <td style="background-color: #C9CFDF;">{{$receipt->created_at}}</td>
                      @empty
                          <td style="background-color: #DDD8EF; font-weight:bolder;" colspan="5">لاتوجد بيانات</td>
                  </tr>
              @endforelse
                </tbody>
            </table>
                </div>

            </div><!-- /.tab-pane -->

            <div class="tab-pane" id="tab_4">
            
              <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
                <thead>
                    <tr>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >#</th>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >أسم الطالب</th>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" > المرحلة الدراسية</th>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >الصف الدراسي</th>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >نوع الرسوم</th>
                      <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >المبلغ</th>
                        <th style="text-align: center; background-color: #D0DEF6; font-weight:bolder;" >تاريـخ الإضافة</th>
                    </tr>
                </thead>
                <tbody>
                  @forelse(\App\Models\FeeInvoice::latest()->take(10)->get() as $feeinvoice)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$feeinvoice->student->name}}</td>
                    <td>{{$feeinvoice->grade->name}}</td>
                    <td>{{$feeinvoice->classroom->name_class}}</td>
                    <td>{{$feeinvoice->fees->title}}</td>
                    <td>{{ number_format($feeinvoice->amount) }} ريال </td>
                      <td style="background-color: #C9CFDF;">{{$feeinvoice->created_at}}</td>
                      @empty
                          <td style="background-color: #DDD8EF; font-weight:bolder;" colspan="7">لاتوجد بيانات</td>
                  </tr>
              @endforelse
                </tbody>
            </table>
                </div>

            </div><!-- /.tab-pane -->

          </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->
        </div>
      </div><!-- /.col -->
    </div> <!-- /.row -->

    @endif
</section><!-- /.Left col -->

</div><!-- /.row (main row) -->

</section><!-- /.content -->
</div>
@include('layouts.footer')
</div><!-- /.content-wrapper -->

@include('layouts.footer-scripts')
{{-- @livewireScripts
@stack('scripts') --}}

</body>

</html>
