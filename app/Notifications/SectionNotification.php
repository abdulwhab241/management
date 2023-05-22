<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SectionNotification extends Notification
{
    use Queueable;

    private $section_id;
    private $create_by;
    private $name_section;

    public function __construct($section_id,$create_by,$name_section)
    {
        $this->section_id = $section_id;
        $this->create_by = $create_by;
        $this->name_section = $name_section;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }



    public function toArray(object $notifiable): array
    {
        return [
            'section_id' =>  $this->section_id,
            'create_by' =>  $this->create_by,
            'name_section' =>  $this->name_section,
        ];
    }
}
