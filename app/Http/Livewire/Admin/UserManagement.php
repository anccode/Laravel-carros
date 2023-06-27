<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;


class UserManagement extends Component{

    public $isOpen=false;
    public $user,$selectroles;
    public $name,$email,$password,$document,$cellphone,$address,$password_confirmation,$search;
    protected $listeners=['render','delete'=>'delete'];

    public function render(){
        $users=User::where('name','like','%'.$this->search.'%')->paginate();
        $roles=Role::all();
        return view('livewire.admin.user-management',compact('users','roles'));
    }

    public function create(){
        $this->isOpen=true;
        $this->reset(['user']);
        $this->resetValidation();
    }

    public function store(){
        if(!isset($this->user['id'])){
            $rules=[
                'name'=>['required', 'string', 'max:255'],
                'email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'=>'required|confirmed|min:4',
                'document'=>['required','unique:users'],
                'cellphone'=>'required',
                'address'=>'required',
            ];
        }else{
            $rules=[
                'name'=>['required', 'string', 'max:255'],
                'email'=>['required', 'string', 'email', 'max:255'],
                'document'=>['required'],
                'cellphone'=>'required',
                'address'=>'required',
            ];
        }
        $this->validate($rules);
        if(!isset($this->user['id'])){
            $user=User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'document' => $this->document,
                'cellphone' => $this->cellphone,
                'address' => $this->address,
            ]);
            $user->roles()->attach(array_keys($this->selectroles,'true'));
        }else{
            $user=User::find($this->user['id']);
            $user->name=$this->name;
            $user->email=$this->email;
            $user->document=$this->document;
            $user->cellphone=$this->cellphone;
            $user->address=$this->address;
            $user->save();
            $user->roles()->sync(array_keys($this->selectroles,'true'));
        }

        $this->reset(['isOpen','name','email','password','document','cellphone','address','user']);
        $this->emitTo('UserManagement','render');
        $this->emit('alert','Registro creado satisfactoriamente');

    }

    public function edit($id){
        $this->resetValidation();
        $this->isOpen=true;
        $user=User::find($id);
        $this->name=$user->name;
        $this->cellphone=$user->cellphone;
        $this->email=$user->email;
        $this->document=$user->document;
        $this->address=$user->address;
        $this->user['id']=$user->id;
        $this->selectroles=array_fill_keys($user->roles->pluck('id')->toArray(), true);
    }

    public function delete($id){
        $user=User::find($id);
        $user->delete();
    }
}
