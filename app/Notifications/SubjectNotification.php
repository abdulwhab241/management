<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubjectNotification extends Notification
{
    use Queueable;

    private $subject_id;
    private $create_by;
    private $subject_name;

    public function __construct($subject_id,$create_by,$subject_name)
    {
        $this->subject_id = $subject_id;
        $this->create_by = $create_by;
        $this->subject_name = $subject_name;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }



    public function toArray(object $notifiable): array
    {
        return [
            'subject_id' =>  $this->subject_id,
            'create_by' =>  $this->create_by,
            'subject_name' =>  $this->subject_name,
        ];
    }
}
