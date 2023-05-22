<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClassroomNotification extends Notification
{
    use Queueable;

    private $classroom_id;
    private $create_by;
    private $name_class;

    public function __construct($classroom_id,$create_by,$name_class)
    {
        $this->classroom_id = $classroom_id;
        $this->create_by = $create_by;
        $this->name_class = $name_class;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }



    public function toArray(object $notifiable): array
    {
        return [
            'classroom_id' =>  $this->classroom_id,
            'create_by' =>  $this->create_by,
            'name_class' =>  $this->name_class,
        ];
    }
}
