<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Commande;

class OrderPlaced extends Notification
{
    use Queueable;

    public $order;

    public function __construct(Commande $order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Confirmation de commande #' . substr($this->order->id, 0, 8))
            ->view('emails.order-confirmation', ['order' => $this->order]);
    }

    public function toArray($notifiable)
    {
        return [
            'order_id' => $this->order->id,
            'montant' => $this->order->montant,
        ];
    }
}