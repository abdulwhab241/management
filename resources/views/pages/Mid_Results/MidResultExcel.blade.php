
<table dir="rtl">
<thead>
<tr>

<th>الصـف الدراسي</th>
<th>أسـم الطـالـب \ الطـالبـة</th>
<th>المادة</th>
<th>المحـصلـة</th>
<th>إمتحـان نهـايـة الفـصل الاول</th>
<th>المـجموع </th>
<th>تم بواسطة</th>

</tr>
</thead>
<tbody>
    @foreach($MidResults as $MidResult)
<tr>
    <td>{{$MidResult->classroom->name_class}}</td>
    <td>{{$MidResult->student->name}}</td>
    <td>{{$MidResult->subject->name}}</td>
    <td>{{$MidResult->result }}</td>
    <td>{{ $MidResult->mid_exam }}</td>
    <td>{{ $MidResult->total }}</td>
    <td>{{ $MidResult->create_by }}</td>

</tr>
@endforeach
</tbody>
</table>
