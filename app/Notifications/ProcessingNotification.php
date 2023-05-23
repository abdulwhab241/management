<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProcessingNotification extends Notification
{
    use Queueable;

    private $processing_id;
    private $create_by;
    private $processing_name;

    public function __construct($processing_id,$create_by,$processing_name)
    {
        $this->processing_id = $processing_id;
        $this->create_by = $create_by;
        $this->processing_name = $processing_name;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }



    public function toArray(object $notifiable): array
    {
        return [
            'processing_id' =>  $this->processing_id,
            'create_by' =>  $this->create_by,
            'processing_name' =>  $this->processing_name,
        ];
    }
}
