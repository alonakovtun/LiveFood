<?php

namespace App\Http\Livewire\Moderator;

use Livewire\Component;

class ModeratorDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.moderator.moderator-dashboard-component')->layout('layouts.base');
    }
}
