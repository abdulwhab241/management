<?php

namespace App\Notifications\StudentGrades;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddStudentGradeNotification extends Notification
{
    use Queueable;

    private $add_student_grade_id;
    private $create_by;
    private $add_student_grade_name;

    public function __construct($add_student_grade_id,$create_by,$add_student_grade_name)
    {
        $this->add_student_grade_id = $add_student_grade_id;
        $this->create_by = $create_by;
        $this->add_student_grade_name = $add_student_grade_name;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'add_student_grade_id' =>  $this->add_student_grade_id,
            'create_by' =>  $this->create_by,
            'add_student_grade_name' =>  $this->add_student_grade_name,
        ];
    }
}
