<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Панель Управления') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($elems as $elem)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid-cols-2">
                        <div>id: {{$elem->id}}</div>
                        <div>name: {{$elem->name}}</div>
                        <div>type: {{$elem->itemType}}</div>
                        <div>measure: {{$elem->measureName}}</div>
                        <div>quantity: {{$elem->quantity}}</div>
                        <div>price: {{$elem->price}}</div>
                        <div>costPrice: {{$elem->costPrice}}</div>
                        <div>sumPrice: {{$elem->sumPrice}}</div>
                        <div>tax: {{$elem->tax}}</div>
                        <div>taxPercent: {{$elem->taxPercent}}</div>
                        <div>discount: {{$elem->discount}}</div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{$elems->links()}}
            </div>
        </div>

    </div>


</x-app-layout>
