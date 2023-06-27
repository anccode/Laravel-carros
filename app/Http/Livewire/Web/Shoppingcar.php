<?php

namespace App\Http\Livewire\Web;

use App\Traits\CarTrait;
use Livewire\Component;

class Shoppingcar extends Component{

    Use CarTrait;
    protected $listeners=['loadCart'];
    public $totalImporte=0;

    public function mount(){
        $this->totalImporte=$this->totalImporteCart();
    }

    public function render(){
        $this->totalImporte=$this->totalImporteCart();
        return view('livewire.web.shoppingcar');
    }

    public function disminuirProducto($id){
        $this->restar($id);
        $this->emit('actualizarContador');
    }

    public function aumentarProducto($id){
        $this->sumar($id);
        $this->emit('actualizarContador');
    }

    public function loadCart(){ //actulliza el carro de compras
        $this->carro;
        $this->totalImporteCart();
    }

}
