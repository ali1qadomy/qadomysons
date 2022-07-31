<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class createProudct extends Notification
{
    use Queueable;

    private $product_id;
    private $user_created;
    private $name;
    public function __construct($product_id,$user_created,$name)
    {
        $this->product_id=$product_id;
        $this->user_created=$user_created;
        $this->name=$name;
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


    public function toArray($notifiable)
    {
        return [
            'prod_id'=>$this->product_id,
            'user_created'=>$this->user_created,
            'title'=>$this->name
        ];
    }
}
