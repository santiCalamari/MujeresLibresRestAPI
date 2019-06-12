<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RecuperarPassword extends Mailable {

    use Queueable, SerializesModels;
    public $obj;

    public function __construct($obj){
        $this->obj = $obj;
    }

    public function build(){
        return $this->from('mujereslibressfc@gmail.com')
    		    ->view('recover_password')
    		    ->subject('Mujeres Libres SFC - Nueva constraseña');
    }

}
