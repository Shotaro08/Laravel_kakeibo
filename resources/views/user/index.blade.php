<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($e_main_all as $e)
                        <div>{{ $e->year }}年</div>
                        <div>{{ $e->month }}月</div>
                        <div>{{ $e->date }}日</div>
                        <div>{{ number_format($e->amount) }}円</div>
                        <div>{{ $e->description }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
