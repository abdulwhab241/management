
<table dir="rtl">
<thead>
<tr>

<th>أسـم الطـالـب \ الطـالبـة</th>
<th>المـادة</th>
<th>الأستاذ</th>
<th>إختبـار شهـر</th>
<th>الدرجـة التي حصـل عليـها</th>
<th>التقـديـر</th>

</tr>
</thead>
<tbody>
@foreach($Results as $Result)
<tr>

    <td>{{ $Result->student->name }}</td>
    <td>{{ $Result->exam->subject->name }}</td>
    <td>{{ $Result->create_by }}</td>
    <td>{{$Result->result_name}}</td>
    <td>{{$Result->marks_obtained}}</td>
    <td>{{$Result->appreciation}}</td>

</tr>
@endforeach
</tbody>
</table>
