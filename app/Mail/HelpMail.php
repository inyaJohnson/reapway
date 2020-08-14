<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HelpMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->from('johnson.inya@salesruby.com')->view('layouts.mail');
//        if($this->data['attachment'] && is_string($this->data['attachment'])){
//            $email->attach($this->data['attachment']);
//        }
        if (isset($this->data['attachment']) && !is_string($this->data['attachment'])) {
            $email->attach($this->data['attachment']->getRealPath(),
                [
                    'as' => $this->data['attachment']->getClientOriginalName(),
                    'mime' => $this->data['attachment']->getClientMimeType()
                ]);
        }
        return $email;
    }
}
