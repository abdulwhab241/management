
<table dir="rtl">
<thead>
<tr>

<th>أسـم الطـالـب \ الطـالبـة</th>
<th>المبلغ</th>
<th>البيان</th>
<th>تاريخ السداد</th>
<th>تم بواسطة</th>

</tr>
</thead>
<tbody>
@foreach($ReceiptStudents as $receipt_student)
<tr>

    <td>{{$receipt_student->student->name}}</td>
    <td>{{ number_format($receipt_student->Debit) }} ريال </td>
    <td>{{$receipt_student->description}}</td>
    <td>{{$receipt_student->date}}</td>
    <td>{{$receipt_student->create_by}}</td>

</tr>
@endforeach
</tbody>
</table>
