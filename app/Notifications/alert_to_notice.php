<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;

class alert_to_notice extends Notification
{
    use Queueable;
    protected $notice1;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notice)
    {
    $this->notice1=$notice;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

   
    public function toDatabase($notifiable)
    {
        return [
                'notice_to'=>$this->notice1->to,
                'notice_body'=>$this->notice1->notice,
    
        ];
    }

    /**p
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
