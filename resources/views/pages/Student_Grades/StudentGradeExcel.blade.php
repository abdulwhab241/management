
<table dir="rtl">
<thead>
<tr>
<th>الفـصل الدراسي</th>
<th>الاستاذ</th>
<th>المادة</th>
<th>محصلة شهر</th>
<th>أسـم الطـالـب \ الطـالبـة</th>
<th>واجبات</th>
<th>شفهي</th>
<th>مواظبة</th>
<th>تحريري</th>
<th>المحصلة</th>


</tr>
</thead>
<tbody>
@foreach($StudentGrades as $Student_Grade)
<tr>

    <td>{{$Student_Grade->semester->name}}</td>
    <td>{{$Student_Grade->teacher->name}}</td>
    <td>{{$Student_Grade->subject->name}}</td>
    <td>{{ $Student_Grade->month->name }}</td>
    <td>{{$Student_Grade->student->name}}</td>
    <td>{{$Student_Grade->homework }}</td>
    <td>{{$Student_Grade->verbal}}</td>
    <td>{{ $Student_Grade->attendance }}</td>
    <td>{{ $Student_Grade->result }}</td>
    <td>{{ $Student_Grade->total }}</td>


</tr>
@endforeach
</tbody>
</table>
