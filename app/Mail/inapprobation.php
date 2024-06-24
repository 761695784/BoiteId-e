<?php

namespace App\Mail;

use App\Models\Idee;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class inapprobation extends Mailable
{
    use Queueable, SerializesModels;

    public $idee;

    public function __construct(Idee $idee)
    {
        $this->idee = $idee;
    }

    public function build()
    {
        return $this->from('malang2019marna@gmail.com')
                    ->subject('Votre idée a été inapprouvée')
                    ->view('email.inapprobation')
                    ->with(['idee' => $this->idee]);
    }
}
