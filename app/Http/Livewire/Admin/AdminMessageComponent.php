<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;


class AdminMessageComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $messages = Contact::paginate(10);

        return view('livewire.admin.admin-message-component', ['messages' => $messages])->layout('layouts.base');;
    }
}
