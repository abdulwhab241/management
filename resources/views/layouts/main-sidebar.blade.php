<!-- Left side column. contains the logo and sidebar -->
{{-- <aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar"  style="font-family: 'Cairo', sans-serif"> --}}


    @if (auth('web')->check())
    @include('layouts.main-sidebar.admin-main-sidebar')
    @endif

    @if (auth('student')->check())
    @include('layouts.main-sidebar.student-main-sidebar')
    @endif

    @if (auth('teacher')->check())
    @include('layouts.main-sidebar.teacher-main-sidebar')
    @endif

{{-- </section>
<!-- /.sidebar -->
</aside> --}}