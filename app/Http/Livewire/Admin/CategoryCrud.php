<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryCrud extends Component{

    public $isOpen=false;
    public $category,$search;
    protected $listeners=['render','delete'=>'delete'];

    protected $rules=[
        'category.name'=>'required',
    ];

    public function render(){
        $categories=Category::where('name','LIKE','%'.$this->search.'%')->paginate(6);
        return view('livewire.admin.category-crud',compact('categories'));
    }

    public function create(){
        $this->isOpen=true;
        $this->reset(['category']);
    }

    public function store(){
        $this->validate();
        if(!isset($this->category->id)){
            Category::create($this->category);
        }else{
            $this->category->save();
        }
        $this->reset(['isOpen','category']);
        $this->emitTo('CategoryCrud','render');
        $this->emit('alert','Registro creado satisfactoriamente');
    }

    public function edit(Category $category){
        $this->category=$category;
        $this->isOpen=true;
    }

    public function delete(Category $category){
        $category->delete();
    }

}
