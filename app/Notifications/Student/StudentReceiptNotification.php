<?php

namespace App\Notifications\Student;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StudentReceiptNotification extends Notification
{
    use Queueable;

    private $student_receipt_id;
    private $create_by;
    private $student_receipt_name;

    public function __construct($student_receipt_id,$create_by,$student_receipt_name)
    {
        $this->student_receipt_id = $student_receipt_id;
        $this->create_by = $create_by;
        $this->student_receipt_name = $student_receipt_name;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }



    public function toArray(object $notifiable): array
    {
        return [
            'student_receipt_id' =>  $this->student_receipt_id,
            'create_by' =>  $this->create_by,
            'student_receipt_name' =>  $this->student_receipt_name,
        ];
    }
}
