<div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <!--
      Background backdrop, show/hide based on slide-over state.

      Entering: "ease-in-out duration-500"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in-out duration-500"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 overflow-hidden">
      <div class="absolute inset-0 overflow-hidden">
        <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
          <!--
            Slide-over panel, show/hide based on slide-over state.

            Entering: "transform transition ease-in-out duration-500 sm:duration-700"
              From: "translate-x-full"
              To: "translate-x-0"
            Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
              From: "translate-x-0"
              To: "translate-x-full"
          -->
          <div class="pointer-events-auto w-screen max-w-md">
            <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
              <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                <div class="flex items-start justify-between">
                  <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
                  <div class="ml-3 flex h-7 items-center">
                    <button x-on:click="open=false" type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                      <span class="sr-only">Close panel</span>
                      <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </button>
                  </div>
                </div>

                <div class="mt-8">
                  <div class="flow-root">
                    <ul role="list" class="-my-6 divide-y divide-gray-600">
                      @if(session('cart'))
                      @foreach(session('cart') as $id => $details)
                        <li class="flex py-6">
                            <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                <img src="{{$details['imagen']}}" class="h-full w-full object-cover object-center">
                            </div>
                            <div class="ml-4 flex flex-1 flex-col">
                            <div>
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <h3 class="font-bold text-lg"><a href="#">{{$details['nombre']}}</a></h3>
                                    <p class="ml-4">S/ {{$details['precio']}}</p>
                                </div>
                                <div class="flex justify-between text-base font-medium text-gray-900 mt-6">
                                    <p class="text-sm text-gray-500">Subtotal</p>
                                    <p class="ml-4">S/ {{$details['subtotal']}}</p>
                                </div>

                                {{-- <p class="mt-1 text-sm text-gray-500">Blue</p> --}}
                            </div>
                            <div class="flex flex-1 items-end justify-between text-sm">
                                <p class="text-gray-500">Cantidad
                                    <span class="ml-4 font-bold bg-indigo-600 py-1 px-2 rounded-full text-white">{{$details['cantidad']}}</span>
                                </p>
                                <div class="flex gap-2">
                                    <button wire:click="aumentarProducto({{$id}})" type="button" class="text-xs bg-indigo-600 text-white rounded-md px-2 py-1 hover:text-indigo-300">Agregar</button>
                                    <button wire:click="disminuirProducto({{$id}})" type="button" class="text-xs bg-red-600 text-white rounded-md px-2 py-1 hover:text-red-500">Quitar</button>
                                </div>
                            </div>
                            </div>
                        </li>
                        @endforeach
                      @else
                        <p>El Carro esta vacio</p>
                      @endif
                      <!-- More products... -->
                    </ul>
                  </div>
                </div>
              </div>

              <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                <div class="flex justify-between text-gray-900 text-xl font-bold">
                  <p>Total</p>
                  <p>S/  {{$totalImporte}}</p>
                </div>
                <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                @if(session('cart'))
                <div class="mt-6">
                  <a href="{{route('payment.checkout')}}" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">
                    Ir a comprar</a>
                @endif
                </div>
                <div class="mt-6 mb-4 flex justify-center text-center text-sm text-gray-500">
                    <button x-on:click="open=false" type="button" class="font-medium text-indigo-600 hover:text-indigo-500">
                      Continua comprando
                      <span aria-hidden="true"> &rarr;</span>
                    </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
