<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Arr;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleManagement extends Component{
    public $isOpen=false;
    public $role,$rolname,$rolpermissions,$search;
    protected $listeners=['render','delete'=>'delete'];

    public function render(){
        $roles=Role::where('name','like','%'.$this->search.'%')->paginate();
        $permissions=Permission::all();
        return view('livewire.admin.role-management',compact('roles','permissions'));
    }

    public function create(){
        $this->isOpen=true;
        $this->reset(['rolname','rolpermissions']);
        $this->resetValidation();
    }

    public function edit($id){
        $this->resetValidation();
        $this->isOpen=true;
        $this->role=Role::find($id);
        $this->rolname=$this->role->name;
        //$this->rolpermissions=[1=>true,2=>false,3=>true,13=>true];
        $this->rolpermissions=array_fill_keys($this->role->permissions->pluck('id')->toArray(), true);
    }

    public function store(){
        $this->validate([
            'rolname'=>'required'
        ]);
        if(!isset($this->role['id'])){
            $role=Role::create([
                'name'=>$this->rolname
            ]);
            $role->permissions()->attach(array_keys($this->rolpermissions,'true'));
        }else{
            $role=Role::find($this->role['id']);
            $role->name=$this->rolname;
            $role->save();
            $role->permissions()->sync(array_keys($this->rolpermissions,'true'));
        }

        $this->reset(['isOpen','rolname','rolpermissions']);
        $this->emitTo('RoleManagement','render');
        $this->emit('alert','Registro creado satisfactoriamente');
    }

    public function delete($id){
        $company=Role::find($id);
        $company->delete();
    }

}
