<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            削除済明細
        </h2>
    </x-slot>

    <div class="py-12 px-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <section class="text-gray-600 body-font">
                    <div class="py-8 px-1 md:px-3 mx-auto">
                        {{-- <div class="flex flex-col text-center w-full mb-10">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900"></h1>
                        </div> --}}
                        {{-- 登録後のフラッシュメッセージ --}}
                        <x-flash-message status="session('status')" />
                        <div class="lg:w-2/3 md:w-full mx-auto overflow-auto">
                            @if ($deletePosts->isNotEmpty())
                                <table class="table-auto w-full text-center whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-1 md:px-4 md:py-3 title-font tracking-wider font-medium text-gray-900 text-xs md:text-base bg-gray-100">
                                                Month</th>
                                            <th
                                                class="px-1 md:px-4 md:py-3 title-font tracking-wider font-medium text-gray-900 text-xs md:text-base bg-gray-100">
                                                Date</th>
                                            <th
                                                class="px-1 md:px-4 md:py-3 title-font tracking-wider font-medium text-gray-900 text-xs md:text-base bg-gray-100">
                                                Amount</th>
                                            <th
                                                class="px-1 md:px-4 md:py-3 title-font tracking-wider font-medium text-gray-900 text-xs md:text-base bg-gray-100">
                                                Description</th>
                                            <th
                                                class="px-1 md:px-4 md:py-3 title-font tracking-wider font-medium text-gray-900 text-xs md:text-base bg-gray-100">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($deletePosts as $post)
                                            <tr>
                                                <td class="px-1 md:px-4 py-3 text-xs md:text-base">{{ $post->month }}
                                                </td>
                                                <td class="px-1 md:px-4 py-3 text-xs md:text-base">{{ $post->date }}
                                                </td>
                                                <td class="px-1 md:px-4 py-3 text-xs md:text-base text-gray-900">
                                                    {{ number_format($post->amount) }}</td>
                                                <td class="px-1 md:px-4 py-3 text-xs md:text-base">
                                                    {{ $post->description }}</td>
                                                <form id="delete_{{ $post->id }}" method="post"
                                                    action="{{ route('user.delete-post.destroy', $post->id) }}">
                                                    @csrf
                                                    <td class="px-1 md:px-4 py-3 text-xs md:text-base">
                                                        <button href="#" type="button" data-id="{{ $post->id }}"
                                                            onclick="deleteMain(this)"
                                                            class="flex ml-auto text-white bg-red-400 border-0 py-1 px-2 md:py-2 md:px-4 focus:outline-none hover:bg-red-500 rounded">完全に削除</button>
                                                    </td>
                                                </form>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    </section>
                @else
                    <div class="container w-full">
                    <div class="px-4">
                        <p>削除した明細はありません</p>
                    </div>
                    @endif
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
