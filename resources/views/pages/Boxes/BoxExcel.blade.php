
<table dir="rtl">
<thead>
<tr>

<th>أسـم الطـالـب \ الطـالبـة</th>
<th>العملـيات</th>
<th>الفواتير الدراسية</th>
<th>المبلغ </th>
<th>سندات القبض</th>
<th>المبلغ </th>
<th> معالجة الرسوم</th>
<th>المبلغ </th>
<th> سندات الصرف</th>
<th>المبلغ </th>
<th> تاريخ العمليات</th>
<th>تم بواسطة</th>

</tr>
</thead>
<tbody>
@foreach($Boxes as $box)
<tr>

    <td>{{$box->student->name}}</td>
    <td>{{$box->type}}</td>
    <td>{{$box->fee_invoice}}</td>
    <td>{{ number_format($box->Debit_feeInvoice) }} ريال </td>
    <td>{{$box->receipt}}</td>
    <td>{{ number_format($box->credit_receipt) }} ريال </td>
    <td>{{$box->processing}}</td>
    <td>{{ number_format($box->credit_processing) }} ريال </td>
    <td>{{$box->payment}}</td>
    <td>{{ number_format($box->Debit_payment) }} ريال </td>
    <td>{{$box->date}}</td>
    <td>{{ $box->create_by }}</td>

</tr>
@endforeach
</tbody>
</table>
