<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Mail\Content;

class ReclamationsAnnulees extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $commentaire;
    public function __construct($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.annulation')
            ->subject('Réclamation annulée')
            ->with([
                'commentaire' => $this->commentaire,
            ]);
    }
    public function content()
    {
        // return new Content(
        //     view: 'emails.annulation',
        //     with: compact("title",'body')
        //             );
    
    
    }
}