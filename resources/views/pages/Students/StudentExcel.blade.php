
<table dir="rtl">
<thead>
<tr>

<th>أسـم الطـالـب \ الطـالبـة</th>
<th>الجنس</th>
<th>تاريخ الميلاد</th>
<th>المؤهل</th>
<th>المرحلة الدراسية</th>
<th>الصف الدراسي</th>
<th>الشعبة</th>
<th>السنة الدراسية</th>
<th>أسم الأب</th>
<th>الوظيفة</th>
<th>جهة العمل</th>
<th>الهاتف الشخصي</th>
<th>هاتف العمل</th>
<th>هاتف المنزل</th>
<th>العنوان</th>
<th>أسم الام</th>
<th>الوظيفة</th>
<th>رقم الهاتف</th>
<th>انشـئ بواسطـة</th>

</tr>
</thead>
<tbody>
@foreach($Students as $Student)
<tr>
    <td>{{ $Student->name }}</td>
    <td>{{ $Student->gender->name }}</td>
    <td>{{ $Student->birth_date }}</td>
    <td>{{ $Student->qualification }}</td>
    <td>{{$Student->grade->name}}</td>
    <td>{{$Student->classroom->name_class}}</td>
    <td>{{$Student->section->name_section}}</td>
    <td>{{ $Student->father_name }}</td>
    <td>{{ $Student->father_job }}</td>
    <td>{{ $Student->employer }}</td>
    <td>{{ $Student->father_phone }}</td>
    <td>{{ $Student->job_phone }}</td>
    <td>{{ $Student->home_phone }}</td>
    <td>{{ $Student->address }}</td>
    <td>{{ $Student->mother_name }}</td>
    <td>{{ $Student->mother_job }}</td>
    <td>{{ $Student->mother_phone }}</td>
    <td>{{ $Student->create_by }}</td>

</tr>
@endforeach
</tbody>
</table>
