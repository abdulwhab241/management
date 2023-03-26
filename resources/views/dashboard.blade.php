{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
<!DOCTYPE html>
<html lang="en">
@section('title')
برنامج عبدالوهاب لإدارة المدارس
@stop
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @include('layouts.head')
    {{-- @livewireStyles --}}
</head>

<body class="skin-blue sidebar-mini">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('layouts.header')

    @include('layouts.main-sidebar')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1  style="font-family: 'Cairo', sans-serif">
    لوحة تحكم الادمن
</h1>

</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
    <div class="inner">
        <h3>۱۵۰</h3>
        <p>سفارش جدید</p>
    </div>
    <div class="icon">
        <i class="ion ion-bag"></i>
    </div>
    <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
    </div>
</div><!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
    <div class="inner">
        <h3>۵۳<sup style="font-size: 20px">%</sup></h3>
        <p>افزایش آمار</p>
    </div>
    <div class="icon">
        <i class="ion ion-stats-bars"></i>
    </div>
    <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
    </div>
</div><!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
    <div class="inner">
        <h3>۴۴</h3>
        <p>کاربر ثبت نام کرده</p>
    </div>
    <div class="icon">
        <i class="ion ion-person-add"></i>
    </div>
    <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
    </div>
</div><!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
    <div class="inner">
        <h3>۶۵</h3>
        <p>بازدید کننده یکتا</p>
    </div>
    <div class="icon">
        <i class="ion ion-pie-graph"></i>
    </div>
    <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
    </div>
</div><!-- ./col -->
</div><!-- /.row -->
<!-- Main row -->
<div class="row">
<!-- Left col -->
<section class="col-lg-7 connectedSortable">
    <!-- Custom tabs (Charts with tabs)-->
    <div class="nav-tabs-custom">
    <!-- Tabs within a box -->
    <ul class="nav nav-tabs pull-right">
        <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
        <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
        <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
    </ul>
    <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->
        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
    </div>
    </div><!-- /.nav-tabs-custom -->

    <!-- Chat box -->
    <div class="box box-success">
    <div class="box-header">
        <i class="fa fa-comments-o"></i>
        <h3 class="box-title">Chat</h3>
        <div class="box-tools pull-left" data-toggle="tooltip" title="Status">
        <div class="btn-group" data-toggle="btn-toggle" >
            <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
        </div>
        </div>
    </div>
    <div class="box-body chat" id="chat-box">
        <!-- chat item -->
        <div class="item">
        <img src="dist/img/user4-128x128.jpg" alt="user image" class="online">
        <p class="message">
            <a href="#" class="name">
            <small class="text-muted pull-left"><i class="fa fa-clock-o"></i> 2:15</small>
            Mike Doe
            </a>
            I would like to meet you to discuss the latest news about
            the arrival of the new theme. They say it is going to be one the
            best themes on the market
        </p>
        <div class="attachment">
            <h4>Attachments:</h4>
            <p class="filename">
            Theme-thumbnail-image.jpg
            </p>
            <div class="pull-left">
            <button class="btn btn-primary btn-sm btn-flat">Open</button>
            </div>
        </div><!-- /.attachment -->
        </div><!-- /.item -->
        <!-- chat item -->
        <div class="item">
        <img src="dist/img/user3-128x128.jpg" alt="user image" class="offline">
        <p class="message">
            <a href="#" class="name">
            <small class="text-muted pull-left"><i class="fa fa-clock-o"></i> 5:15</small>
            محمد شریفی
            </a>
            I would like to meet you to discuss the latest news about
            the arrival of the new theme. They say it is going to be one the
            best themes on the market
        </p>
        </div><!-- /.item -->
        <!-- chat item -->
        <div class="item">
        <img src="dist/img/user2-160x160.jpg" alt="user image" class="offline">
        <p class="message">
            <a href="#" class="name">
            <small class="text-muted pull-left"><i class="fa fa-clock-o"></i> 5:30</small>
            Susan Doe
            </a>
            I would like to meet you to discuss the latest news about
            the arrival of the new theme. They say it is going to be one the
            best themes on the market
        </p>
        </div><!-- /.item -->
    </div><!-- /.chat -->
    <div class="box-footer">
        <div class="input-group">
        <input class="form-control" placeholder="Type message...">
        <div class="input-group-btn">
            <button class="btn btn-success"><i class="fa fa-plus"></i></button>
        </div>
        </div>
    </div>
    </div><!-- /.box (chat box) -->

    <!-- TO DO List -->
    <div class="box box-primary">
    <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">To Do List</h3>
        <div class="box-tools pull-left">
        <ul class="pagination pagination-sm inline">
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">&raquo;</a></li>
        </ul>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body">
        <ul class="todo-list">
        <li>
            <!-- drag handle -->
            <span class="handle">
            <i class="fa fa-ellipsis-v"></i>
            <i class="fa fa-ellipsis-v"></i>
            </span>
            <!-- checkbox -->
            <input type="checkbox" value="" name="">
            <!-- todo text -->
            <span class="text">Design a nice theme</span>
            <!-- Emphasis label -->
            <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
            <!-- General tools such as edit or delete-->
            <div class="tools">
            <i class="fa fa-edit"></i>
            <i class="fa fa-trash-o"></i>
            </div>
        </li>
        <li>
            <span class="handle">
            <i class="fa fa-ellipsis-v"></i>
            <i class="fa fa-ellipsis-v"></i>
            </span>
            <input type="checkbox" value="" name="">
            <span class="text">Make the theme responsive</span>
            <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
            <div class="tools">
            <i class="fa fa-edit"></i>
            <i class="fa fa-trash-o"></i>
            </div>
        </li>
        <li>
            <span class="handle">
            <i class="fa fa-ellipsis-v"></i>
            <i class="fa fa-ellipsis-v"></i>
            </span>
            <input type="checkbox" value="" name="">
            <span class="text">Let theme shine like a star</span>
            <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
            <div class="tools">
            <i class="fa fa-edit"></i>
            <i class="fa fa-trash-o"></i>
            </div>
        </li>
        <li>
            <span class="handle">
            <i class="fa fa-ellipsis-v"></i>
            <i class="fa fa-ellipsis-v"></i>
            </span>
            <input type="checkbox" value="" name="">
            <span class="text">Let theme shine like a star</span>
            <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
            <div class="tools">
            <i class="fa fa-edit"></i>
            <i class="fa fa-trash-o"></i>
            </div>
        </li>
        <li>
            <span class="handle">
            <i class="fa fa-ellipsis-v"></i>
            <i class="fa fa-ellipsis-v"></i>
            </span>
            <input type="checkbox" value="" name="">
            <span class="text">Check your messages and notifications</span>
            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
            <div class="tools">
            <i class="fa fa-edit"></i>
            <i class="fa fa-trash-o"></i>
            </div>
        </li>
        <li>
            <span class="handle">
            <i class="fa fa-ellipsis-v"></i>
            <i class="fa fa-ellipsis-v"></i>
            </span>
            <input type="checkbox" value="" name="">
            <span class="text">Let theme shine like a star</span>
            <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
            <div class="tools">
            <i class="fa fa-edit"></i>
            <i class="fa fa-trash-o"></i>
            </div>
        </li>
        </ul>
    </div><!-- /.box-body -->
    <div class="box-footer clearfix no-border">
        <button class="btn btn-default pull-left"><i class="fa fa-plus"></i> Add item</button>
    </div>
    </div><!-- /.box -->

    <!-- quick email widget -->
    <div class="box box-info">
    <div class="box-header">
        <i class="fa fa-envelope"></i>
        <h3 class="box-title">Quick Email</h3>
        <!-- tools box -->
        <div class="pull-left box-tools">
        <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
    </div>
    <div class="box-body">
        <form action="#" method="post">
        <div class="form-group">
            <input type="email" class="form-control" name="emailto" placeholder="Email to:">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="subject" placeholder="Subject">
        </div>
        <div>
            <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
        </div>
        </form>
    </div>
    <div class="box-footer clearfix">
        <button class="pull-left btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-left"></i></button>
    </div>
    </div>

</section><!-- /.Left col -->
<!-- right col (We are only adding the ID to make the widgets sortable)-->
<section class="col-lg-5 connectedSortable">

    <!-- Map box -->
    <div class="box box-solid bg-light-blue-gradient">
    <div class="box-header">
        <!-- tools box -->
        <div class="pull-left box-tools">
        <button class="btn btn-primary btn-sm daterange pull-left" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
        <button class="btn btn-primary btn-sm pull-left" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
        </div><!-- /. tools -->

        <i class="fa fa-map-marker"></i>
        <h3 class="box-title">
        Visitors
        </h3>
    </div>
    <div class="box-body">
        <div id="world-map" style="height: 250px; width: 100%;"></div>
    </div><!-- /.box-body-->
    <div class="box-footer no-border">
        <div class="row">
        <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
            <div id="sparkline-1"></div>
            <div class="knob-label">Visitors</div>
        </div><!-- ./col -->
        <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
            <div id="sparkline-2"></div>
            <div class="knob-label">Online</div>
        </div><!-- ./col -->
        <div class="col-xs-4 text-center">
            <div id="sparkline-3"></div>
            <div class="knob-label">Exists</div>
        </div><!-- ./col -->
        </div><!-- /.row -->
    </div>
    </div>
    <!-- /.box -->

    <!-- solid sales graph -->
    <div class="box box-solid bg-teal-gradient">
    <div class="box-header">
        <i class="fa fa-th"></i>
        <h3 class="box-title">Sales Graph</h3>
        <div class="box-tools pull-left">
        <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body border-radius-none">
        <div class="chart" id="line-chart" style="height: 250px;"></div>
    </div><!-- /.box-body -->
    <div class="box-footer no-border">
        <div class="row">
        <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
            <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC">
            <div class="knob-label">Mail-Orders</div>
        </div><!-- ./col -->
        <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
            <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC">
            <div class="knob-label">Online</div>
        </div><!-- ./col -->
        <div class="col-xs-4 text-center">
            <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC">
            <div class="knob-label">In-Store</div>
        </div><!-- ./col -->
        </div><!-- /.row -->
    </div><!-- /.box-footer -->
    </div><!-- /.box -->

    <!-- Calendar -->
    <div class="box box-solid bg-green-gradient">
    <div class="box-header">
        <i class="fa fa-calendar"></i>
        <h3 class="box-title">Calendar</h3>
        <!-- tools box -->
        <div class="pull-left box-tools">
        <!-- button with a dropdown -->
        <div class="btn-group">
            <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
            <ul class="dropdown-menu pull-left" role="menu">
            <li><a href="#">Add new event</a></li>
            <li><a href="#">Clear events</a></li>
            <li class="divider"></li>
            <li><a href="#">View calendar</a></li>
            </ul>
        </div>
        <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
    </div><!-- /.box-header -->
    <div class="box-body no-padding">
        <!--The calendar -->
        <div id="calendar" style="width: 100%"></div>
    </div><!-- /.box-body -->
    <div class="box-footer text-black">
        <div class="row">
        <div class="col-sm-6">
            <!-- Progress bars -->
            <div class="clearfix">
            <span class="pull-right">Task #1</span>
            <small class="pull-left">90%</small>
            </div>
            <div class="progress xs">
            <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
            </div>

            <div class="clearfix">
            <span class="pull-right">Task #2</span>
            <small class="pull-left">70%</small>
            </div>
            <div class="progress xs">
            <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
            </div>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <div class="clearfix">
            <span class="pull-right">Task #3</span>
            <small class="pull-left">60%</small>
            </div>
            <div class="progress xs">
            <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
            </div>

            <div class="clearfix">
            <span class="pull-right">Task #4</span>
            <small class="pull-left">40%</small>
            </div>
            <div class="progress xs">
            <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
            </div>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    </div><!-- /.box -->

</section><!-- right col -->
</div><!-- /.row (main row) -->

</section><!-- /.content -->

@include('layouts.footer')
</div><!-- /.content-wrapper -->

@include('layouts.footer-scripts')

</body>

</html>
