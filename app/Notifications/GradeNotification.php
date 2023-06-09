<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GradeNotification extends Notification
{
    use Queueable;

    private $Grade_id;
    private $create_by;
    private $grade_name;

    public function __construct($Grade_id,$create_by,$grade_name)
    {
        $this->Grade_id = $Grade_id;
        $this->create_by = $create_by;
        $this->grade_name = $grade_name;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }



    public function toArray(object $notifiable): array
    {
        return [
            'Grade_id' =>  $this->Grade_id,
            'create_by' =>  $this->create_by,
            'grade_name' =>  $this->grade_name,
        ];
    }
}
