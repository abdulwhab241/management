
<table dir="rtl">
<thead>
<tr>

<th>أسـم الطـالـب \ الطـالبـة</th>
<th>المبلغ</th>
<th>البيان</th>
<th>تاريخ الصرف</th>
<th>تم بواسطة</th>

</tr>
</thead>
<tbody>
@foreach($PaymentStudents as $payment_student)
<tr>

    <td>{{$payment_student->student->name}}</td>
    <td>{{ number_format($payment_student->amount) }} ريال </td>
    <td>{{$payment_student->description}}</td>
    <td>{{$payment_student->date}}</td>
    <td>{{$payment_student->create_by}}</td>

</tr>
@endforeach
</tbody>
</table>
