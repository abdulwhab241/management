<?php

namespace App\Repository;


interface TeacherRepositoryInterFace{
    
    // get all teachers
    public function getAllTeachers();

     // get all specializations
    public function GetSpecializations();

     // get all Gender
    public function GetGender();

     // edit Teachers
    public function editTeachers($id);

     // update Teachers
    public function updateTeachers($request);

    //  // store Teachers
    public function storeTeachers($request);

     // delete Teachers
    public function deleteTeachers($request);
}