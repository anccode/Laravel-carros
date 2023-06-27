<div>
    {{-- Filtros categoria --}}
    <div class="w-full mb-4 dark:text-gray-400">
        <div class="text-center border-b-2 border-gris-200 py-2">
            <h3 class="uppercase font-bold text-lg mb-2">Categorías</h3>
            <ul class="flex justify-center gap-4">
                <li class="hover:border-b-indigo-600 border-b-2 mb-1">
                    <input wire:model="sendCategory" type="radio" id="todo" name="category" value="0" checked class="mb-1 h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]">
                    <label for="todo" class="cursor-pointer">Todo</label>
                </li>
                @foreach ($categories as $category)
                <li class="hover:border-b-indigo-600 hover:border-b-2 mb-1">
                    <input wire:model="sendCategory" type="radio" id="{{$category->name}}" name="category" value="{{$category->id}}" class="mb-1 h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]">
                    <label for="{{$category->name}}" class="cursor-pointer ">{{$category->name}}</label>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    {{-- Cards productos categoria --}}
    <div>
        @auth
        @can('Crear productos')
        <div class="mb-2 mr-5 relative">
            <button onclick="Livewire.emit('openModal', 'admin.product-create')" class="absolute right-2 top-[-60px] bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer" >
                <i class="fa-solid fa-plus"></i> Agregar producto
            </button>
        </div>
        @endcan
        @endauth
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
            @forelse ($products as $product)
            <div class="relative scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl dark:text-gray-400 from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div>
                    <div class="absolute right-0 top-0 bg-red-600 text-white w-14 py-1 text-center rounded-tr-lg rounded-bl-lg">
                        -{{$product->discount}}%
                    </div>
                    <div class="grid lg:grid-cols-2 gap-4">
                        <a href="{{ route('product.show',$product) }}" class="w-full object-cover">
                            <img src="@if($product->image){{Storage::url($product->image->url)}}@else img/sinfoto.png @endif">
                        </a>
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{$product->name}}</h2>
                            <h3 class="mt-2 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">{{$product->fullname}}</h3>
                            <div class="mt-4">
                                <p class="line-through text-sm">S/ {{$product->price}}</p>
                                <p class="font-bold">S/ {{number_format($product->price-(($product->discount/100)*$product->price),2)}}</p>
                            </div>
                            @auth
                            <div class="absolute top-2 left-2">
                                @can('Editar productos')
                                <x-button onclick="Livewire.emit('openModal','admin.product-create',{{json_encode(['product'=>$product])}})"><i class="fas fa-edit"></i></x-jet-button>
                                @endcan
                                @can('Eliminar productos')
                                <x-danger-button wire:click="$emit('deleteItem',{{$product->id}})"><i class="fas fa-trash"></i></x-jet-danger-button>
                                @endcan
                            </div>
                            @endauth
                        </div>
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <ul class="flex items-center cursor-pointer">
                                <li class="mr-1">
                                    <i class="fas fa-star text-{{$rating >= 1 ? 'yellow' : 'gray'}}-400"></i>
                                </li>
                                <li class="mr-1">
                                    <i class="fas fa-star text-{{$rating >= 2 ? 'yellow' : 'gray'}}-400"></i>
                                </li>
                                <li class="mr-1">
                                    <i class="fas fa-star text-{{$rating >= 3 ? 'yellow' : 'gray'}}-400"></i>
                                </li>
                                <li class="mr-1">
                                    <i class="fas fa-star text-{{$rating >= 4 ? 'yellow' : 'gray'}}-400"></i>
                                </li>
                                <li class="mr-1r">
                                    <i class="fas fa-star text-{{$rating == 5 ? 'yellow' : 'gray'}}-400"></i>
                                </li>
                            </ul>
                            <p class="text-xs text-gray-400">Valoración del producto</p>
                        </div>
                        <button wire:click="agregarProducto({{$product->id}})" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-400">
                            <i class="fa-solid fa-cart-arrow-down text-yellow-400"></i> Agregar
                        </button>
                    </div>
                </div>
            </div>
            @empty
                <p>Productos vacios</p>
            @endforelse
        </div>
        <div class="mt-2">{{$products->links()}}</div>
    </div>
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
                  Livewire.emitTo('web.productmain','delete',id);
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
