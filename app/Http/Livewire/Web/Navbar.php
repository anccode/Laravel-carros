<?php

namespace App\Http\Livewire\Web;

use App\Traits\CarTrait;
use Livewire\Component;

class Navbar extends Component{

    Use CarTrait;
    public $totalCart=0;
    protected $listeners=['actualizarContador'];

    public function mount(){
        $this->totalCart=$this->totalItems();
    }

    public function render(){
        return view('livewire.web.navbar');
    }

    public function actualizarContador(){
        $this->totalCart=$this->totalItems();
    }
}
