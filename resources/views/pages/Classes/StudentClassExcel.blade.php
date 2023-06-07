
<table dir="rtl">
    <thead>
    <tr>

    <th>اليوم</th>
    <th>المرحلة الدراسية</th>
    <th>الصف الدراسي</th>
    <th>الشعبة</th>
    <th>الحصة الأولى</th>
    <th>الحصة الثانية</th>
    <th>الحصة الثالثة</th>
    <th>الحصة الرابعة</th>
    <th>الحصة الخامسة</th>
    <th>الحصة السادسة</th>
    <th>الحصة السابعة</th>
    <th>تم بواسطة</th>
    
    </tr>
    </thead>
    <tbody>
    @foreach($StudentClasses as $StudentClass)
    <tr>
    
        <td>{{ $StudentClass->day }}</td>
        <td>{{ $StudentClass->grade->name }}</td>
        <td>{{ $StudentClass->classroom->name_class }}</td>
        <td>{{ $StudentClass->section->name_section }}</td>
        <td>{{ $StudentClass->first }}</td>
        <td>{{ $StudentClass->second }}</td>
        <td>{{ $StudentClass->third }}</td>
        <td>{{ $StudentClass->fourth }}</td>
        <td>{{ $StudentClass->fifth }}</td>
        <td>{{ $StudentClass->sixth }}</td>
        <td>{{ $StudentClass->seventh }}</td>
        <td>{{ $StudentClass->create_by }}</td>
    
    </tr>
    @endforeach
    </tbody>
    </table>
    