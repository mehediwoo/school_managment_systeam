<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BranchMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $branch;
    public function __construct($branch)
    {
        $this->branch=$branch;
    }

   public function build(){

        return $this->subject('Your Temporary Password')->view('Backend.admin.Branch.GenerateMail')->with('branch',$this->branch);

   }
}
