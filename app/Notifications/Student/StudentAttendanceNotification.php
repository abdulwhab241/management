<?php

namespace App\Notifications\Student;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StudentAttendanceNotification extends Notification
{
    use Queueable;

    private $student_attendance_id;
    private $create_by;
    private $student_attendance_name;

    public function __construct($student_attendance_id,$create_by,$student_attendance_name)
    {
        $this->student_attendance_id = $student_attendance_id;
        $this->create_by = $create_by;
        $this->student_attendance_name = $student_attendance_name;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }



    public function toArray(object $notifiable): array
    {
        return [
            'student_attendance_id' =>  $this->student_attendance_id,
            'create_by' =>  $this->create_by,
            'student_attendance_name' =>  $this->student_attendance_name,
        ];
    }
}
