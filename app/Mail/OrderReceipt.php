<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;



class OrderReceipt extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @param Order $order
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Generate PDF
        $pdf = PDF::loadView('emails.order_receipt_pdf', ['order' => $this->order]);

        return $this->subject('Your Order Receipt')
            ->view('emails.order_receipt')  // View untuk email body (opsional)
            ->attachData($pdf->output(), 'order_receipt.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
