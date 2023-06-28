
<table dir="rtl">
<thead>
<tr>
    <th>الصـف الدراسي</th>
    <th>أسـم الطـالـب \ الطـالبـة</th>
    <th>المادة</th>
    <th colspan="6">درجات الفصل الاول 50% </th>
    <th colspan="6">درجات الفصل الثـانـي 50% </th>

<th>تم بواسطة</th>

</tr>
</thead>
<tbody>
@foreach($FinalResults as $FinalResult)
<tr>

    <td>{{$FinalResult->classroom->name_class}}</td>
    <td>{{$FinalResult->student->name}}</td>
    <td>{{$FinalResult->subject->name}}</td>
    <th>المحصلة</th>
    <td>{{ $FinalResult->mid->result }}</td>
    <th>الاختبار</th>
    <td>{{ $FinalResult->mid->mid_exam }}</td>
    <th>المجموع</th>
    <td>{{ $FinalResult->mid->total }}</td>
    <th>المحصلة</th>
    <td>{{ $FinalResult->result }}</td>
    <th>الاختبار</th>
    <td>{{ $FinalResult->final_exam }}</td>
    <th>المجموع</th>
    <td>{{ $FinalResult->total }}</td>
    <td>{{ $FinalResult->create_by }}</td>

</tr>
@endforeach
</tbody>
</table>
