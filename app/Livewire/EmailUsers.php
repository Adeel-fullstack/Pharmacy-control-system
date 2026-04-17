<?php

namespace App\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserMail;
class EmailUsers extends Component
{


    // Replace with dynamic data
    public $to;
    public $subject;
    public $body;
    

    
    public function sendEmails()    
    {
        // Validate input
        $this->validate([
            'to' => 'required|email',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        

           try{


            Mail::to($this->to)->send(new UserMail($this->subject,$this->body));

            session()->flash('success','Email sent successfully');

            $this->reset(['to','subject','body']);
           }

    
           catch(Exception $e){


      session()->flash('danger','Email Not sent,Please try again!');

           }





        
         }



    
    public function render()
    {
        return view('livewire.stock.email-users')->layout('layouts.index');
    }

}