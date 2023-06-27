<?php
namespace App\Traits;

trait CarTrait{

    public $carro;

    public function __construct(){
        $this->carro=session()->get('cart');
    }

    public function agregar($producto){
        $this->carro=session()->get('cart');
        //Si el carro esta vacio se agregar un nuevo producto
        if(isset($producto->image->url)){
            $imagen='/storage/'.$producto->image->url;
        }else{
            $imagen="/img/sinfoto.png";
        }

        if(!$this->carro){
            $this->carro=[$producto->id=>[
                    "nombre"=>$producto->name,
                    "completo"=>$producto->fullname,
                    "cantidad"=>1,
                    "precio"=>$producto->price_discount,
                    "imagen"=>$imagen,
                    "subtotal"=>$producto->price_discount
                ]
            ];
        //Si el carro existe y el producto tambien, sumamos mas 1 la cantidad
        }else if(isset($this->carro[$producto->id])){
            $this->carro[$producto->id]['cantidad']++;
            $this->carro[$producto->id]['subtotal']=$this->carro[$producto->id]['subtotal']+$this->carro[$producto->id]['precio'];
        }else{ //si el carro existe pero el producto no esta en el carro
            $this->carro[$producto->id] = [
                "nombre" =>$producto->name,
                "completo" =>$producto->fullname,
                "cantidad"=>1,
                "precio"=>$producto->price_discount,
                "imagen"=>$imagen,
                "subtotal"=>$producto->subtotal+$producto->price_discount
            ];
        }
        session()->put('cart',$this->carro);
    }

    public function sumar($id){
        $this->carro=session()->get('cart');
        if(isset($this->carro[$id])){
            $this->carro[$id]['cantidad']++;
            $this->carro[$id]['subtotal']=$this->carro[$id]['subtotal']+$this->carro[$id]['precio'];
        }
        session()->put('cart',$this->carro);
    }

    public function restar($id){
        $this->carro=session()->get('cart');
        if(isset($this->carro[$id])){
            $this->carro[$id]['cantidad']--;
            $this->carro[$id]['subtotal']=$this->carro[$id]['subtotal']-$this->carro[$id]['precio'];
            if ($this->carro[$id]['cantidad']<1) {
                unset($this->carro[$id]);
            }
        }
        session()->put('cart',$this->carro);
    }

    public function totalItems(){
        $this->carro=session()->get('cart');
        if($this->carro){
            $totalcart=count(session()->get('cart'));
        }else{
            $totalcart=0;
        }
        return $totalcart;
    }

    public function totalImporteCart(){
        $this->carro=session()->get('cart');
        $sesionitems=$this->carro;
        $total=0;
        if($this->carro){
            foreach ($sesionitems as $id => $item) {
                $total=$total+($item['precio']*$item['cantidad']);
            }
        }
        //dd($sesionitems);
        return $total;
    }

}
