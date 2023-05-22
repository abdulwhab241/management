<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TeacherNotification extends Notification
{
    use Queueable;

    private $teacher_id;
    private $create_by;
    private $teacher_name;

    public function __construct($teacher_id,$create_by,$teacher_name)
    {
        $this->teacher_id = $teacher_id;
        $this->create_by = $create_by;
        $this->teacher_name = $teacher_name;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }



    public function toArray(object $notifiable): array
    {
        return [
            'teacher_id' =>  $this->teacher_id,
            'create_by' =>  $this->create_by,
            'teacher_name' =>  $this->teacher_name,
        ];
    }
}
