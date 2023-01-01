<?php

namespace App\Mail\Stock;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class StockAlertEmail extends Mailable
{
    use Queueable;

    public function __construct(private string $name)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.stock_alert')
            ->from(config('foodics.system_email'), 'foodics')
            ->subject('Stock Alert')
            ->with([
                'product' => $this->name,
            ]);
    }
}
