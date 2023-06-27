<div class="py-5">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Usuarios
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
                        @include('livewire.admin.user-create')
                    @endif
            </div>
        </div>
        <!--Tabla lista de items   -->
        <div class="shadow border-b border-gray-200 sm:rounded-lg overflow-scroll sm:overflow-hidden">
            <table class="w-full divide-y divide-gray-200 rounded-lg">
              <thead class="bg-indigo-500 text-white rounded-lg">
                <tr class="text-left text-xs font-bold uppercase rounded-lg">
                  <td scope="col" class="px-6 py-3">ID</td>
                  <td scope="col" class="px-6 py-3">Nombre</td>
                  <td scope="col" class="px-6 py-3">Email</td>
                  <td scope="col" class="px-6 py-3">Documento</td>
                  <td scope="col" class="px-6 py-3">Celular</td>
                  <td scope="col" class="px-6 py-3">Rol</td>
                  <td scope="col" class="px-6 py-3">Opciones</td>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                @foreach($users as $user)
                <tr class="text-sm font-medium text-gray-900 dark:text-gray-300">
                  <td class="px-6 py-4">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-500 text-white">
                      {{$user->id}}
                    </span>
                  </td>
                  <td class="px-6 py-4">{{$user->name}}</td>
                  <td class="px-6 py-4">{{$user->email}}</td>
                  <td class="px-6 py-4">{{$user->document}}</td>
                  <td class="px-6 py-4">{{$user->cellphone}}</td>
                  <td class="px-6 py-4">
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $rol)
                            <p><span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                {{$rol}}</span>
                            </p>
                        @endforeach
                    @endif
                  </td>
                  <td class="px-6 py-4 text-right">
                    {{-- @livewire('cliente-edit',['cliente'=>$item],key($item->id)) --}}
                    <x-button wire:click="edit({{$user->id}})"> <!-- Usamos metodos magicos -->
                        <i class="fas fa-edit"></i>
                    </x-button>
                    <x-danger-button wire:click="$emit('deleteItem',{{$user->id}})"> <!-- Usamos metodos magicos -->
                        <i class="fas fa-trash"></i>
                    </x-danger-button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        @if(!$users->count())
            No existe ningun registro conincidente
        @endif
        @if($users->hasPages())
        <div class="px-6 py-3">
            {{$users->links()}}
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
                Livewire.emitTo('admin.user-management','delete',id);
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
