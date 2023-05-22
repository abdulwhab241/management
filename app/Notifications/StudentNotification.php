<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StudentNotification extends Notification
{
    use Queueable;

    private $student_id;
    private $create_by;
    private $student_name;

    public function __construct($student_id,$create_by,$student_name)
    {
        $this->student_id = $student_id;
        $this->create_by = $create_by;
        $this->student_name = $student_name;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'student_id' =>  $this->student_id,
            'create_by' =>  $this->create_by,
            'student_name' =>  $this->student_name,
        ];
    }
}
