<x-mymodal maxWidth="7xl">
    <x-slot name="title">
        <h3 class="text-xl font-medium text-gray-900 dark:text-white">Registro de nuevo producto</h3>
    </x-slot>
    <x-slot name="content">
        <button wire:click="$emit('closeModal')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Close modal</span>
        </button>
        <div class="grid grid-cols-3 gap-2">
            <div class="col-span-2">
                <div class="flex mb-2 justify-between gap-2">
                    <div class="mb-2 md:mb-0 w-full">
                        <x-label value="Categoria del producto" class="font-bold text-left"/>
                        <select wire:model.defer="product.category_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                            <option selected>Seleccione opción</option>
                            @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error for="product.category_id"/>
                    </div>
                </div>
                <div class="flex mb-2 justify-between gap-2">
                    <div class="mb-2 md:mb-0 w-full">
                        <x-label value="Nombre corto" class="font-bold text-left"/>
                        <x-input wire:model.defer="product.name" name="stand" type="text" class="w-full"/>
                        <x-input-error for="product.name"/>
                    </div>
                </div>
            </div>
            <div>
                <div class="">

                    <div class="mr-2 mt-6">
                        @if(isset($product['image']['url'])) {{-- caso editar --}}
                            @if(substr($file,-3)!='tmp')
                                <img src="{{'storage/'.$product['image']['url']}}">
                            @else
                                <img src="{{$file->temporaryUrl()}}">
                            @endif
                        @else {{-- caso nuevo --}}
                            @if(substr($file,-3)!='tmp')
                                <img src="img/sinfoto.png">
                            @else
                                <img src="{{$file->temporaryUrl()}}">
                            @endif
                        @endif
                        <div>
                            <input id="file" wire:model="file" class="w-full file:rounded-lg file:bg-gray-800 file:text-white file:font-semibold file:text-xs text-xs cursor-pointer" type="file" accept="image/png, image/jpeg">
                        </div>
                        <div class="text-blue-500 font-bold mt-1 text-sm" wire:loading wire:target="file">
                            Cargando ...
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex mb-2 justify-between gap-2">
            <div class="mb-2 md:mb-0 w-full">
                <x-label value="Nombre completo" class="font-bold text-left"/>
                <x-input wire:model.defer="product.fullname" name="stand" type="text" class="w-full"/>
                <x-input-error for="product.fullname"/>
            </div>
        </div>
        <div class="flex mb-2 justify-between gap-2">
            <div class="mb-2 md:mb-0 w-full">
                <x-label value="Descripción" class="font-bold text-left"/>
                <textarea wire:model.defer="product.description" name="obsevaciones" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"></textarea>
                <x-input-error for="product.description"/>
            </div>
        </div>
        <div class="flex mb-4 justify-between gap-2">
            <div class="mb-2 md:mb-0 w-full">
                <x-label value="Precio" class="font-bold text-left"/>
                <x-input wire:model.defer="product.price" name="stand" type="text" class="w-full"/>
                <x-input-error for="product.price"/>
            </div>
            <div class="mb-2 md:mb-0 w-full">
                <x-label value="Stock" class="font-bold text-left"/>
                <x-input wire:model.defer="product.stock" name="stand" type="text" class="w-full"/>
                <x-input-error for="product.stock"/>
            </div>
            <div class="mb-2 md:mb-0 w-full">
                <x-label value="Descuento (%)" class="font-bold text-left"/>
                <x-input wire:model.defer="product.discount" name="stand" type="text" class="w-full"/>
                <x-input-error for="product.discount"/>
            </div>
        </div>
        <div class="flex mb-4 justify-between gap-2">
            <div class="mb-2 md:mb-0 w-full">
                <div class="form-check">
                    <input wire:model.defer="product.availability" value="1" class="form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox"  checked>
                    <label class="form-check-label inline-block text-gray-800" for="flexRadioDefault1">
                    Producto disponible
                    </label>
                </div>
                <x-input-error for="product.availability"/>
            </div>
        </div>
    </x-slot>

    <x-slot name="buttons">
        <button wire:click.prevent="store()" wire:loading.attr="disabled" wire:target="store" class="disabled:bg-gray-600 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Registrar producto
        </button>
    </x-slot>
</x-mymodal>
