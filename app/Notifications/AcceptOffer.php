<?php

namespace App\Notifications;

use App\Offer;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;

class AcceptOffer extends Notification
{
    use Queueable;

    protected $offer;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Offer $offer)
    {
        $this->offer = $offer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast', 'mail']; //close send email
        //return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line($this->offer->user->accounts->steam_name . ' Has accepted your offer to join your team')
            ->action('View', url('/notifications'))
            ->line('Good luck, Have Fun!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user_id' => $this->offer->user->id,
            'steam_name' => $this->offer->user->accounts->steam_name,
            'offer_id' => $this->offer->id,
            'dota_id' => $this->offer->user->accounts->dota_id,
            'offer_status' => $this->offer->status,
        ];
    }

    public function toBroadcast($notifiable)
    {
        // return new BroadcastMessage([
        //     $this->tournament
        // ]);

        return (new BroadcastMessage([
            'user_id' => $this->offer->user->id,
            'steam_name' => $this->offer->user->accounts->steam_name,
            'offer_id' => $this->offer->id,
            'dota_id' => $this->offer->user->accounts->dota_id,
            'offer_status' => $this->offer->status,
        ]))->onConnection('sync');
    }
}
