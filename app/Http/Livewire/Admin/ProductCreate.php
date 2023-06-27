<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Str;

class ProductCreate extends ModalComponent{
    use WithFileUploads;
    public $product,$file;

    protected $rules=[
        'product.name'=>'required',
        'product.fullname'=>'required',
        'product.description'=>'required',
        'product.price'=>'required',
        'product.stock'=>'required',
        'product.discount'=>'required',
        'product.availability'=>'required',
        'product.category_id'=>'required',
    ];

    public function mount(){
        $this->product['availability']=true;
    }

    public function render(){
        $categories=Category::all();
        return view('livewire.admin.product-create',compact('categories'));
    }

    public function store(){
        $this->validate();
        if(!isset($this->product['id'])){
            $product=Product::create($this->product);
            if ($this->file) {
                // $url=Storage::disk('public')->put('logos',$request->file('file'));
                $url=$this->file->store('logos','public');
                $product->image()->create([
                    'url'=>$url
                ]);
            }
        }else{
            // $company=Company::whereId($this->empresa['id'])->update($this->empresa);
            $product=Product::find($this->product['id']);
            $product->update($this->product);
            //dd(is_object($this->file));
            if(is_object($this->file)){
                //$url=Storage::put('public/posts',$request->file('file'));
                $url=$this->file->store('logos','public');
                if($product->image){
                    Storage::delete($product->image->url);
                    $product->image()->update([
                        'url'=>$url
                    ]);
                }else{
                    $product->image()->create([
                        'url'=>$url
                    ]);
                }
            };
        }

        $this->reset(['product']);
        $this->emitTo('web.productmain','render');
        $this->emit('alert','Registro creado satisfactoriamente');
        $this->closeModal();
    }

    public function updatedProductName(){
        $this->product['slug']=Str::slug($this->product['name']);
    }

}
