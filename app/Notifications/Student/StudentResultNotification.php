<?php

namespace App\Notifications\Student;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StudentResultNotification extends Notification
{
    use Queueable;

    private $student_result_id;
    private $create_by;
    private $student_result_name;

    public function __construct($student_result_id,$create_by,$student_result_name)
    {
        $this->student_result_id = $student_result_id;
        $this->create_by = $create_by;
        $this->student_result_name = $student_result_name;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }



    public function toArray(object $notifiable): array
    {
        return [
            'student_result_id' =>  $this->student_result_id,
            'create_by' =>  $this->create_by,
            'student_result_name' =>  $this->student_result_name,
        ];
    }
}
