<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;

class Userprofile extends Component
{
    public function render()
    {
        return view('livewire.web.userprofile')->layout('layouts.index');;
    }
}
