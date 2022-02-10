<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminModalComponent extends Component
{
    public $data;
    public $show;

    protected $listeners = ['showModal' => 'showModal'];

    public function mount($data) {
        $this->data = $data;
        $this->show = false;
    }

    public function showModal($data) {
        $this->data = $data;

        $this->doShow();
    }

    public function doShow() {
        $this->show = true;
    }

    public function doClose() {
        $this->show = false;
    }

    public function doSomething() {
        //send email php
        $this->doClose();
    }

    public function render()
    {
        return view('livewire.admin.admin-modal-component');
    }
}
