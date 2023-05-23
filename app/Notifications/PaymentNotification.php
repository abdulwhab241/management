<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentNotification extends Notification
{
    use Queueable;

    private $payment_id;
    private $create_by;
    private $payment_name;

    public function __construct($payment_id,$create_by,$payment_name)
    {
        $this->payment_id = $payment_id;
        $this->create_by = $create_by;
        $this->payment_name = $payment_name;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }



    public function toArray(object $notifiable): array
    {
        return [
            'payment_id' =>  $this->payment_id,
            'create_by' =>  $this->create_by,
            'payment_name' =>  $this->payment_name,
        ];
    }
}
