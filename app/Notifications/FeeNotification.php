<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FeeNotification extends Notification
{
    use Queueable;

    private $fee_id;
    private $create_by;
    private $fee_name;

    public function __construct($fee_id,$create_by,$fee_name)
    {
        $this->fee_id = $fee_id;
        $this->create_by = $create_by;
        $this->fee_name = $fee_name;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }



    public function toArray(object $notifiable): array
    {
        return [
            'fee_id' =>  $this->fee_id,
            'create_by' =>  $this->create_by,
            'fee_name' =>  $this->fee_name,
        ];
    }
}
