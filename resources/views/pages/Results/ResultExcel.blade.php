
<table dir="rtl">
<thead>
<tr>
<th>الفصـل الدراسي</th>
<th> نتيـجة شهـر</th>
<th> المـادة</th>
<th>أسـم الطـالـب \ الطـالبـة </th>
<th>الدرجـة التي حصـل عليـها </th>
<th>التقـديـر</th>
<th> انشـئ بواسطـة</th>

</tr>
</thead>
<tbody>
@foreach($Results as $Result)
<tr>

    <td>{{ $Result->semester->name }}</td>
    <td>{{$Result->month->name}}</td>
    <td>{{ $Result->exam->subject->name }}</td>
    <td>{{ $Result->student->name }}</td>
    <td>{{$Result->marks_obtained}}</td>
    <td>{{$Result->appreciation}}</td>

</tr>
@endforeach
</tbody>
</table>
