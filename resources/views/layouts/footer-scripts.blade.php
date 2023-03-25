{{-- <!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script type="text/javascript">var plugin_path = '{{ asset('assets/js') }}/';</script>

<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>



<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );
</script>



    <script src="{{ URL::asset('assets/js/bootstrap-datatables/ar/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/ar/dataTables.bootstrap4.min.js') }}"></script>


<script>
    function CheckAll(className, elem) {
        var elements = document.getElementsByClassName(className);
        var l = elements.length;
        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
            }
        }
    }
</script>

<script>
    $(document).ready(function () {
        $('select[name="Grade_id"]').on('change', function () {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('Get_classrooms') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="Classroom_id"]').empty();
                        $('select[name="Classroom_id"]').append('<option selected disabled >{{'اختيار من القائمة...'}}...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            }
            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>


<script>
    $(document).ready(function () {
        $('select[name="Classroom_id"]').on('change', function () {
            var Classroom_id = $(this).val();
            if (Classroom_id) {
                $.ajax({
                    url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="section_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            }
            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>





<script>
    $(document).ready(function () {
        $('select[name="Grade_id_new"]').on('change', function () {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('Get_classrooms') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="Classroom_id_new"]').empty();
                        $('select[name="Classroom_id_new"]').append('<option selected disabled >{{'اختيار من القائمة...'}}...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="Classroom_id_new"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            }
            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>


<script>
    $(document).ready(function () {
        $('select[name="Classroom_id_new"]').on('change', function () {
            var Classroom_id = $(this).val();
            if (Classroom_id) {
                $.ajax({
                    url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="section_id_new"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="section_id_new"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            }
            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script> 
 --}}

<!-- jQuery 2.1.4 -->
<script src="{{ URL::asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- jQuery 2.1.4 -->
<script src="/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.4 -->
{{-- <script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script> --}}
<!-- Bootstrap 3.3.4 -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
{{-- <script src="{{ URL::asset('assets/plugins/morris/morris.min.js') }}"></script> --}}
<script src="/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
{{-- <script src="{{ URL::asset('assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script> --}}
<script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
{{-- <script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script> --}}
<script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
{{-- <script src="{{ URL::asset('assets/plugins/knob/jquery.knob.js') }}"></script> --}}
<script src="/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
{{-- <script src="{{ URL::asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script> --}}
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
{{-- <script src="{{ URL::asset('assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script> --}}
<script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
{{-- <script src="{{ URL::asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script> --}}
<script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
{{-- <script src="{{ URL::asset('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script> --}}
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
{{-- <script src="{{ URL::asset('assets/plugins/fastclick/fastclick.min.js') }}"></script> --}}
<script src="/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
{{-- <script src="{{ URL::asset('assets/dist/js/app.min.js') }}"></script> --}}
<script src="/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ URL::asset('assets/dist/js/pages/dashboard.js') }}"></script> --}}
<script src="/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ URL::asset('assets/dist/js/demo.js') }}"></script> --}}
<script src="/dist/js/demo.js"></script>

<script>
$(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false
    });
});
</script>

<script>
function CheckAll(className, elem) {
    var elements = document.getElementsByClassName(className);
    var l = elements.length;
    if (elem.checked) {
        for (var i = 0; i < l; i++) {
            elements[i].checked = true;
        }
    } else {
        for (var i = 0; i < l; i++) {
            elements[i].checked = false;
        }
    }
}
</script>

<script>
$(document).ready(function () {
$('select[name="Grade_id"]').on('change', function () {
    var Grade_id = $(this).val();
    if (Grade_id) {
        $.ajax({
            url: "{{ URL::to('Get_classrooms') }}/" + Grade_id,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $('select[name="Classroom_id"]').empty();
                $('select[name="Classroom_id"]').append('<option selected disabled >{{'اختيار من القائمة...'}}...</option>');
                $.each(data, function (key, value) {
                    $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                });
            },
        });
    }
    else {
        console.log('AJAX load did not work');
    }
});
});
</script>


<script>
$(document).ready(function () {
$('select[name="Classroom_id"]').on('change', function () {
    var Classroom_id = $(this).val();
    if (Classroom_id) {
        $.ajax({
            url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $('select[name="section_id"]').empty();
                $.each(data, function (key, value) {
                    $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                });
            },
        });
    }
    else {
        console.log('AJAX load did not work');
    }
});
});
</script>





<script>
$(document).ready(function () {
$('select[name="Grade_id_new"]').on('change', function () {
    var Grade_id = $(this).val();
    if (Grade_id) {
        $.ajax({
            url: "{{ URL::to('Get_classrooms') }}/" + Grade_id,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $('select[name="Classroom_id_new"]').empty();
                $('select[name="Classroom_id_new"]').append('<option selected disabled >{{'اختيار من القائمة...'}}...</option>');
                $.each(data, function (key, value) {
                    $('select[name="Classroom_id_new"]').append('<option value="' + key + '">' + value + '</option>');
                });
            },
        });
    }
    else {
        console.log('AJAX load did not work');
    }
});
});
</script>


<script>
$(document).ready(function () {
$('select[name="Classroom_id_new"]').on('change', function () {
    var Classroom_id = $(this).val();
    if (Classroom_id) {
        $.ajax({
            url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $('select[name="section_id_new"]').empty();
                $.each(data, function (key, value) {
                    $('select[name="section_id_new"]').append('<option value="' + key + '">' + value + '</option>');
                });
            },
        });
    }
    else {
        console.log('AJAX load did not work');
    }
});
});
</script> 
