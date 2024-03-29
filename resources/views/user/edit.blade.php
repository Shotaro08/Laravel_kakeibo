<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            明細編集
        </h2>
    </x-slot>

    <div class="py-12 px-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="py-6 px-1 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 mx-auto">
                            <div class="flex flex-col text-center w-full mb-5">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 mt-4 text-gray-900">明細編集
                                </h1>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <form action="{{ route('user.update', $main_desc->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="-m-4">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="month" class="leading-7 text-xs md:text-base text-gray-600">Month</label>
                                                <input type="number" id="month" name="month" value="{{ $main_desc->month }}" required
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-xs md:text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="date" class="leading-7 text-xs md:text-base text-gray-600">Date</label>
                                                <input type="number" id="date" name="date" value="{{ $main_desc->date }}" required
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-xs md:text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="amount" class="leading-7 text-xs md:text-base text-gray-600">Amount</label>
                                                <input type="number" id="amount" name="amount" value="{{ $main_desc->amount }}" required
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-xs md:text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="description"
                                                    class="leading-7 text-xs md:text-base text-gray-600">Description</label>
                                                <input type="text" id="description" name="description" value="{{ $main_desc->description }}" required
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-xs md:text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="category"
                                                    class="leading-7 text-xs md:text-base text-gray-600">Category</label>
                                                <div>
                                                    <select name="category" id="category" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-xs md:text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}" @if($category->id === $main_desc->primary_categories_id) selected @endif>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="payment_method"
                                                    class="leading-7 text-xs md:text-base text-gray-600">Payment</label>
                                                <div>
                                                    <select name="payment_method" id="payment_method" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-xs md:text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                        @foreach ($payment_methods as $payment_method)
                                                            <option value="{{ $payment_method->id }}" @if($payment_method->id === $main_desc->payment_methods_id) selected @endif>{{ $payment_method->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-4 w-full mt-4 flex justify-around">
                                            <button type="button" onclick="location.href='{{ route('user.index') }}'"
                                                class=" text-white bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-xs md:text-base">Cancel</button>
                                            <button type="submit"
                                                class=" text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-xs md:text-base">更新する</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
