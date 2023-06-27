<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Indexweb extends Component{


    public function render(){
        return view('livewire.indexweb')->layout('layouts.index');
    }
}
