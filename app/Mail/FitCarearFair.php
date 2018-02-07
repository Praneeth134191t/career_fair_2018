<?php

namespace App\Mail;
//use App\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FitCarearFair extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    //public $company;
    protected $password;
    protected $user_name;

    public function __construct($password,$user_name)
    {
        //$this->company = $company;
        $this->password=$password;
        $this->user_name=$user_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.request-company')
                    ->with([
                        'p_w'=>$this->password,
                        'u_n'=>$this->user_name,
                    ]);
    }
}
