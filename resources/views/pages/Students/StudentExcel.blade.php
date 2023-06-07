
<table dir="rtl">
<thead>
<tr>

<th>أسـم الطـالـب \ الطـالبـة</th>
<th>الجنس</th>
<th>المرحلة الدراسية</th>
<th>الصف الدراسي</th>
<th>الشعبة</th>
<th>أسم الأب</th>
<th>الهاتف</th>
<th>العنوان</th>

</tr>
</thead>
<tbody>
@foreach($Students as $Student)
<tr>
    <td>{{ $Student->name }}</td>
    <td>{{ $Student->gender->name }}</td>
    <td>{{$Student->grade->name}}</td>
    <td>{{$Student->classroom->name_class}}</td>
    <td>{{$Student->section->name_section}}</td>
    <td>{{ $Student->father_name }}</td>
    <td>{{ $Student->father_phone }}</td>
    <td>{{ $Student->address }}</td>

</tr>
@endforeach
</tbody>
</table>
