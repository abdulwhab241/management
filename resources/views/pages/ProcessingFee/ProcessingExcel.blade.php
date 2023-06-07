
<table dir="rtl">
<thead>
<tr>

<th>أسـم الطـالـب \ الطـالبـة</th>
<th>المبلغ</th>
<th>البيان</th>
<th>تاريخ المعالجة</th>
<th>تم بواسطة</th>

</tr>
</thead>
<tbody>
@foreach($ProcessingFees as $ProcessingFee)
<tr>

    <td>{{$ProcessingFee->student->name}}</td>
    <td>{{ number_format($ProcessingFee->amount) }} ريال </td>
    <td>{{$ProcessingFee->description}}</td>
    <td>{{$ProcessingFee->date}}</td>
    <td>{{$ProcessingFee->create_by}}</td>

</tr>
@endforeach
</tbody>
</table>
