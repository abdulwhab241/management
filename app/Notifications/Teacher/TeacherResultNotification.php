<?php

namespace App\Notifications\Teacher;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TeacherResultNotification extends Notification
{
    use Queueable;

    private $teacher_result_id;
    private $create_by;
    private $teacher_result_name;

    private $teacher_result_month;

    public function __construct($teacher_result_id,$create_by,$teacher_result_name,$teacher_result_month)
    {
        $this->teacher_result_id = $teacher_result_id;
        $this->create_by = $create_by;
        $this->teacher_result_name = $teacher_result_name;
        $this->teacher_result_month = $teacher_result_month;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }



    public function toArray(object $notifiable): array
    {
        return [
            'teacher_result_id' =>  $this->teacher_result_id,
            'create_by' =>  $this->create_by,
            'teacher_result_name' =>  $this->teacher_result_name,
            'teacher_result_month' =>  $this->teacher_result_month,
        ];
    }
}
