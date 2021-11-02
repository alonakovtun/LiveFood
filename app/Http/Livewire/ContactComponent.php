<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $message;

    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:5'
        ]);
    }

    public function submitForm(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:5'
        ]);

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message
        ]);

        $this->reset(['name', 'email', 'message']);

        session()->flash('message', 'You inquiry has been submitted successfully!');
    }


    public function render()
    {
        return view('livewire.contact-component')->layout('layouts.base');
    }
}
