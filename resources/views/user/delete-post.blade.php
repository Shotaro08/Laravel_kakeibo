<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            削除済明細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                        {{-- <div class="flex flex-col text-center w-full mb-10">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900"></h1>
                        </div> --}}
                        {{-- 登録後のフラッシュメッセージ --}}
                        <x-flash-message status="session('status')" />
                        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deletePosts as $post)
                                        <tr>
                                            <td class="px-4 py-3">{{ $post->month }}月</td>
                                            <td class="px-4 py-3">{{ $post->date }}日</td>
                                            <td class="px-4 py-3 text-lg text-gray-900">
                                                {{ number_format($post->amount) }}円</td>
                                            <td class="px-4 py-3">{{ $post->description }}</td>
                                            <form id="delete_{{ $post->id }}" method="post" action="{{ route('user.delete-post.destroy', $post->id) }}">
                                                @csrf
                                                <td class="px-4 py-3">
                                                    <button href="#" data-id="{{ $post->id }}"
                                                        onclick="deleteMain(this)"
                                                        class="flex ml-auto text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">完全に削除</button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
