<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewApplyNotification extends Notification
{
    use Queueable;

    public $user;
    public $belongsTo;
    public $project_id;

    public function __construct($user, $belongsTo, $project_id)
    {
        $this->user = $user;
        $this->belongsTo = $belongsTo;
        $this->project_id = $project_id;
    }

    
    public function via($notifiable)
    {
        return ['database'];
    }

   
    public function toMail($notifiable)
    {
       /*  return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!'); */
    }

    public function toDatabase(){
        return [
            'user_id' => $this->user->id,
            'user_name' => $this->user->name,
            'project_belongs_to' => $this->belongsTo,
            'project_id' => $this->project_id
        ];
    }
    
}
