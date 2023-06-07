
<table dir="rtl">
<thead>
<tr>

<th>أسـم الطـالـب \ الطـالبـة</th>
<th>نوع الرسوم</th>
<th>المبلغ</th>
<th>المرحلة الدراسية</th>
<th>الصف الدراسي</th>
<th>البيان</th>
<th>تاريخ الفاتورة</th>
<th>تم بواسطة</th>

</tr>
</thead>
<tbody>
@foreach($FeeInvoices as $Fee_invoice)
<tr>

    <td>{{$Fee_invoice->student->name}}</td>
    <td>{{$Fee_invoice->fees->title}}</td>
    <td>{{ number_format($Fee_invoice->amount) }} ريال </td>
    <td>{{$Fee_invoice->grade->name}}</td>
    <td>{{$Fee_invoice->classroom->name_class}}</td>
    <td>{{$Fee_invoice->description}}</td>
    <td>{{$Fee_invoice->invoice_date}}</td>
    <td>{{ $Fee_invoice->create_by }}</td>

</tr>
@endforeach
</tbody>
</table>
