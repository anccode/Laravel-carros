<div class="grid sm:grid-cols-3 grid-cols-2 gap-6">
    <div class="col-span-2">
        <h1 class="text-gray-800 text-3xl font-bold mb-2">Detalle de pedido</h1>
        <div class="card text-gray-600">
            <div class="card-body">
                @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                        <article class="bg-gray-50 shadow-md rounded-lg overflow-hidden m-2 p-3">
                            <div>
                                <h3 class="text-gray-600 text-xl font-bold">{{$details['nombre']}}</h3>
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <img src="{{$details['imagen']}}" class="object-cover object-center rounded-lg">
                                </div>
                                <div class="col-span-2">
                                    <h4 class="text-gray-600 font-semibold text-md">{{$details['completo']}}</h4>
                                    <div class="flex justify-between">
                                        <p class="text-gray-900 font-bold text-lg">S/. {{$details['precio']}}</p>
                                        <div class="flex gap-3">
                                            <div wire:click="aumentarProducto({{$id}})" class="flex justify-center items-center bg-gray-200 rounded-full w-7  cursor-pointer">
                                                +</div>
                                            <p>{{$details['cantidad']}}</p>
                                            <div wire:click="disminuirProducto({{$id}})" class="flex justify-center items-center bg-gray-200 rounded-full w-7 text-center cursor-pointer">
                                                -</div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </article>
                    @endforeach
                @else
                    <p>El Carro esta vacio</p>
                @endif
            </div>
        </div>
    </div>
    <div class="sm:col-span-1 col-span-2">
        <h1 class="text-gray-800 text-3xl font-bold mb-2">Resumen</h1>
        <div class="card text-gray-600">
            <div class="card-body font-normal">
                <article class="bg-gray-50 shadow-md rounded-lg overflow-hidden m-2 p-3 space-y-2">
                <div class="flex justify-between">
                    <div>Subtotal</div>
                    <div>S/. {{$totalImporte}}</div>
                </div>
                <div class="flex justify-between">
                    <div>Cupon descuento</div>
                    <div></div>
                </div>
                <div class="flex justify-between">
                    <div>Gastos de envío</div>
                    <div></div>
                </div>
                <div class="flex justify-between">
                    <div class="font-bold">Total a pagar</div>
                    <div class="text-xl font-bold">S/. {{$totalImporte}}</div>
                </div>
                <div class="pt-4">
                    <button class="bg-indigo-600 text-white w-full rounded-full py-2 font-bold text-lg hover:bg-indigo-500">
                        Pagar ({{$totalCart}})
                    </button>
                </div>
                </article>
            </div>
        </div>
        <div class="card text-gray-600 mt-4">
            <div class="card-body space-y-2 font-normal">
                <h2 class="text-lg font-bold">Métodos de pago</h2>
                <div class="flex gap-2 justify-center">
                    <img src="/img/pago1.png">
                    <img src="/img/pago2.png">
                    <img src="/img/pago3.png">
                    <img src="/img/pago4.png">
                </div>
            </div>
        </div>
    </div>
</div>
