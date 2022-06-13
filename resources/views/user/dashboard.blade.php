<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            HOME
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Say Hi!!
                    @foreach ($user as $u)
                    <p>{{ $u->name }}</p>
                    @endforeach
                    <div class="py-4">
                        <p>登録している支払い明細は{{ $main_count }}件です</p>
                        <p>今月の支払い合計金額は{{ number_format($main_amount) }}円です</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
