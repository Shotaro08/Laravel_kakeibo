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
                    <div class="container py-8 md:px-5 md:py-24 mx-auto">
                        <div class="flex flex-col text-center w-full mb-5">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">収支明細</h1>
                        </div>
                        {{-- 登録後のフラッシュメッセージ --}}
                        <x-flash-message status="session('status')" />
                        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            <div class="flex justify-end">
                                <button onclick="location.href='{{ route('user.create') }}'"
                                    class="flex sm:ml-auto md:ml-auto text-white bg-blue-500 border-0 py-1 px-3 md:py-2 md:px-6 focus:outline-none hover:bg-blue-600 rounded mb-3 text-sm md:test-base">新規登録</button>
                            </div>
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                                <thead>
                                    <tr>
                                        <th
                                            class="md:px-4 md:py-3 title-font tracking-wider font-medium text-gray-900 text-xs md:text-base bg-gray-100">
                                            Month</th>
                                        <th
                                            class="md:px-4 md:py-3 title-font tracking-wider font-medium text-gray-900 text-xs md:text-base bg-gray-100">
                                            Date</th>
                                        <th
                                            class="md:px-4 md:py-3 title-font tracking-wider font-medium text-gray-900 text-xs md:text-base bg-gray-100">
                                            Price</th>
                                        <th
                                            class="md:px-4 md:py-3 title-font tracking-wider font-medium text-gray-900 text-xs md:text-base bg-gray-100 rounded-tl rounded-bl">
                                            Description</th>
                                        <th
                                            class="md:px-4 md:py-3 title-font tracking-wider font-medium text-gray-900 text-xs md:text-base bg-gray-100 rounded-tr rounded-br">
                                        </th>
                                        <th
                                            class="md:px-4 md:py-3 title-font tracking-wider font-medium text-gray-900 text-xs md:text-base bg-gray-100 rounded-tr rounded-br">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($e_main as $e)
                                        <tr>
                                            <td class="md:px-4 py-3 text-xs md:text-base">{{ $e->month }}</td>
                                            <td class="md:px-4 py-3 text-xs md:text-base">{{ $e->date }} </td>
                                            <td class="md:px-4 py-3 text-xs md:text-base text-gray-900">
                                                {{ number_format($e->amount) }}</td>
                                            <td class="md:px-4 py-3 text-xs md:text-base">{{ $e->description }}</td>
                                            <td class="md:px-4 py-3">
                                                <button onclick="location.href='{{ route('user.edit', $e->id) }}'"
                                                    class="flex ml-auto text-white bg-blue-400 border-0 py-1 px-2 md:py-2 md:px-4 focus:outline-none hover:bg-blue-500 rounded text-xs">編集</button>
                                            </td>
                                            <form id="delete_{{ $e->id }}" method="post" action="{{ route('user.destroy', $e->id) }}">
                                                @method('delete')
                                                @csrf
                                                <td class="md:px-4 py-3">
                                                    <button href="#" type="button" data-id="{{ $e->id }}"
                                                        onclick="deleteMain(this)"
                                                        class="flex ml-auto text-white bg-red-400 border-0 py-1 px-2 md:py-2 md:px-4 focus:outline-none hover:bg-red-500 rounded text-xs">削除</button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-2 p-2">{{ $e_main->links() }}</div>
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
