<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class QuizNotification extends Notification
{
    use Queueable;


    private $quiz_id;
    private $create_by;
    private $quiz_name;

    public function __construct($quiz_id,$create_by,$quiz_name)
    {
        $this->quiz_id = $quiz_id;
        $this->create_by = $create_by;
        $this->quiz_name = $quiz_name;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }



    public function toArray(object $notifiable): array
    {
        return [
            'quiz_id' =>  $this->quiz_id,
            'create_by' =>  $this->create_by,
            'quiz_name' =>  $this->quiz_name,
        ];
    }
}
