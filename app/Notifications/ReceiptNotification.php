<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReceiptNotification extends Notification
{
    use Queueable;

    private $receipt_id;
    private $create_by;
    private $receipt_name;

    public function __construct($receipt_id,$create_by,$receipt_name)
    {
        $this->receipt_id = $receipt_id;
        $this->create_by = $create_by;
        $this->receipt_name = $receipt_name;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }



    public function toArray(object $notifiable): array
    {
        return [
            'receipt_id' =>  $this->receipt_id,
            'create_by' =>  $this->create_by,
            'receipt_name' =>  $this->receipt_name,
        ];
    }
}
