<?php

namespace App\Notifications\StudentGrades;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EditStudentGradeNotification extends Notification
{
    use Queueable;

    private $edit_student_grade_id;
    private $create_by;
    private $edit_student_grade_name;

    public function __construct($edit_student_grade_id,$create_by,$edit_student_grade_name)
    {
        $this->edit_student_grade_id = $edit_student_grade_id;
        $this->create_by = $create_by;
        $this->edit_student_grade_name = $edit_student_grade_name;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'edit_student_grade_id' =>  $this->edit_student_grade_id,
            'create_by' =>  $this->create_by,
            'edit_student_grade_name' =>  $this->edit_student_grade_name,
        ];
    }
}
