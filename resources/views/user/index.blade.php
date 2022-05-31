<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            収支管理
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="flex flex-col text-center w-full mb-5">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">収支明細</h1>
                        </div>
                        {{-- 登録後のフラッシュメッセージ --}}
                        <x-flash-message status="session('status')" />
                        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            <div class="flex justify-end">
                                <button onclick="location.href='{{ route('user.create') }}'"
                                    class="flex ml-auto text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded mb-3">新規登録</button>
                            </div>
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                            Month</th>
                                        <th
                                            class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                            Date</th>
                                        <th
                                            class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                            Price</th>
                                        <th
                                            class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                            Description</th>
                                        <th
                                            class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                        </th>
                                        <th
                                            class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($e_main as $e)
                                        <tr>
                                            <td class="px-4 py-3">{{ $e->month }}月</td>
                                            <td class="px-4 py-3">{{ $e->date }}日</td>
                                            <td class="px-4 py-3 text-lg text-gray-900">
                                                {{ number_format($e->amount) }}円</td>
                                            <td class="px-4 py-3">{{ $e->description }}</td>
                                            <td class="px-4 py-3">
                                                <button onclick="location.href='{{ route('user.edit', $e->id) }}'"
                                                    class="flex ml-auto text-white bg-blue-400 border-0 py-2 px-4 focus:outline-none hover:bg-blue-500 rounded">編集</button>
                                            </td>
                                            <form id="delete_{{ $e->id }}" method="post" action="{{ route('user.destroy', $e->id) }}">
                                                @method('delete')
                                                @csrf
                                                <td class="px-4 py-3">
                                                    <button href="#" data-id="{{ $e->id }}"
                                                        onclick="deleteMain(this)"
                                                        class="flex ml-auto text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">削除</button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $e_main->links() }}
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script>
        function deleteMain(e) {
            'use strict';
            if (confirm('本当に削除しますか？')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }

    </script>
</x-app-layout>
