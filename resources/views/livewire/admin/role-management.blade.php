<div class="py-5">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Roles
        </h2>
    </x-slot>
    <x-card-main>
        <div class="flex items-center justify-between">
            <!--Input de busqueda   -->
            <div class="flex items-center p-2 rounded-md flex-1">
                <label class="w-full relative text-gray-400 focus-within:text-gray-600 block">
                    <svg class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 left-3" viewBox="0 0 25 25"  fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <x-input type="text" wire:model="search" class="w-full block pl-14" placeholder="Buscar equipo..."/>
                </label>
            </div>
            <!--Boton nuevo   -->
            <div class="lg:ml-40 ml-10 space-x-8">
                <button wire:click="create()" class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer" >
                    <i class="fa-solid fa-plus"></i></i> Nuevo
                </button>
                @if($isOpen)
                    @include('livewire.admin.role-create')
                @endif
            </div>
        </div>
        <!--Tabla lista de items   -->
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="w-full divide-y divide-gray-200 table-auto">
              <thead class="bg-indigo-500 text-white">
                <tr class="text-left text-xs font-bold  uppercase">
                  <td scope="col" class="px-6 py-3">ID</td>
                  <td scope="col" class="px-6 py-3">Nombre</td>
                  <td scope="col" class="px-6 py-3">Permisos</td>
                  <td scope="col" class="px-6 py-3">Opciones</td>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                @foreach($roles as $role)
                <tr class="text-sm font-medium text-gray-900 dark:text-gray-300">
                    <td class="px-6 py-4">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-500 text-white">
                        {{$role->id}}
                        </span>
                    </td>
                    <td class="px-6 py-4">{{$role->name}}</td>
                    <td class="px-6 py-4">
                        {{-- dropdown categorias --}}
                        <div x-data="{ open: false }" class="mr-4">
                            @if (count($role->permissions)>=1)
                                <button x-on:click="open=true" class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow">
                                    Permisos <i class="fas fa-angle-down"></i>
                                </button>
                                <div x-show="open" x-on:click.away="open=false" class="flex flex-wrap z-50 left-0 mt-1 bg-indigo-50 border rounded shadow-xl">
                                    @foreach ($role->permissions as $permission)
                                        <span class="text-xs border-t-2 transition-colors duration-200 block px-2 py-2 text-gray-900 rounded hover:bg-indigo-200">
                                            {{$permission->name}}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow">
                                    Sin permisos
                                </button>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right">
                    {{-- @livewire('cliente-edit',['cliente'=>$item],key($item->id)) --}}
                    <x-button wire:click="edit({{$role->id}})"> <!-- Usamos metodos magicos -->
                        <i class="fas fa-edit"></i>
                    </x-button>
                    <x-danger-button wire:click="$emit('deleteItem',{{$role->id}})"> <!-- Usamos metodos magicos -->
                        <i class="fas fa-trash"></i>
                    </x-danger-button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        @if(!$roles->count())
            No existe ningun registro conincidente
        @endif
        @if($roles->hasPages())
        <div class="px-6 py-3">
            {{$roles->links()}}
        </div>
        @endif
    </x-card-main>
    <!--Scripts - Sweetalert   -->
    @push('js')
    <script>
      Livewire.on('deleteItem',id=>{
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                //alert(id);
                Livewire.emitTo('admin.role-management','delete',id);
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )

            }
          })
      });
    </script>
    @endpush
</div>
