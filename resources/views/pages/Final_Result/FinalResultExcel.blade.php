
<table dir="rtl">
<thead>
<tr>

<th>الصـف الدراسي</th>
<th>أسـم الطـالـب \ الطـالبـة</th>
<th>المادة</th>
<th>درجات الفصل الاول 50% (رقـماً)</th>
<th>(كتـابـة) 50%</th>
<th>درجات الفصل الثـانـي 50% (رقـماً)</th>
<th>(كتـابـة) 50%</th>
<th>المـجموع 100</th>
<th>تم بواسطة</th>

</tr>
</thead>
<tbody>
@foreach($FinalResults as $FinalResult)
<tr>
    <td>{{$FinalResult->classroom->name_class}}</td>
    <td>{{$FinalResult->student->name}}</td>
    <td>{{$FinalResult->subject->name}}</td>
    <td>{{$FinalResult->f_total_number }}</td>
    <td>{{ $FinalResult->f_total_write }}</td>
    <td>{{ $FinalResult->s_total_number }}</td>
    <td>{{$FinalResult->s_total_write}}</td>
    <td>{{ $FinalResult->total }}</td>
    <td>{{ $FinalResult->create_by }}</td>

</tr>
@endforeach
</tbody>
</table>
