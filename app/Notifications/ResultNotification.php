<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResultNotification extends Notification
{
    use Queueable;

    private $result_id;
    private $create_by;
    private $result_name;
    private $result_month;

    public function __construct($result_id,$create_by,$result_name,$result_month)
    {
        $this->result_id = $result_id;
        $this->create_by = $create_by;
        $this->result_name = $result_name;
        $this->result_month = $result_month;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }



    public function toArray(object $notifiable): array
    {
        return [
            'result_id' =>  $this->result_id,
            'create_by' =>  $this->create_by,
            'result_name' =>  $this->result_name,
            'result_month' =>  $this->result_month,
        ];
    }
}
