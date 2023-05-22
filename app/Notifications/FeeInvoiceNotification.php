<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FeeInvoiceNotification extends Notification
{
    use Queueable;

    private $fee_invoice_id;
    private $create_by;
    private $fee_invoice_name;

    public function __construct($fee_invoice_id,$create_by,$fee_invoice_name)
    {
        $this->fee_invoice_id = $fee_invoice_id;
        $this->create_by = $create_by;
        $this->fee_invoice_name = $fee_invoice_name;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }



    public function toArray(object $notifiable): array
    {
        return [
            'fee_invoice_id' =>  $this->fee_invoice_id,
            'create_by' =>  $this->create_by,
            'fee_invoice_name' =>  $this->fee_invoice_name,
        ];
    }
}
