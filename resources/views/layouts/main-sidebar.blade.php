


    @if (Auth::user()->job == 'ادمن')
    @include('layouts.main-sidebar.admin-main-sidebar')
    @endif

    @if (auth('student')->check())
    @include('layouts.main-sidebar.student-main-sidebar')
    @endif

    @if (auth('teacher')->check())
    @include('layouts.main-sidebar.teacher-main-sidebar')
    @endif
    @if (Auth::user()->job == 'محاسب')
    @include('layouts.main-sidebar.accountant-main-sidebar')
    @endif
    @if (Auth::user()->job == 'سكرتارية')
    @include('layouts.main-sidebar.secretariat-main-sidebar')
    @endif

