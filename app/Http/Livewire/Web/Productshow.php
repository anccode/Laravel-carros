<?php

namespace App\Http\Livewire\Web;

use App\Models\Product;
use App\Traits\CarTrait;
use Livewire\Component;

class Productshow extends Component{
    Use CarTrait;
    public $product;

    public function mount(Product $product){
        $this->product=$product;
    }

    public function render(){
        $product=Product::find(1);
        $rating=5;
        return view('livewire.web.productshow',compact('product','rating'))->layout('layouts.index');
    }

    public function agregarProducto($id){
        $product=Product::find($id);
        $this->emit('actualizarContador');
        $this->emit('loadCart');
        $this->agregar($product);
    }

}
