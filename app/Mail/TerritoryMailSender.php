<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TerritoryMailSender extends Mailable {
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $details ) {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        //return $this->subject( __( 'emails.territory.title' ) )->markdown( 'emails.territory' );
        return $this->subject( __( 'TEST!!!' ) )->markdown( 'emails.territory' );
    }
}
