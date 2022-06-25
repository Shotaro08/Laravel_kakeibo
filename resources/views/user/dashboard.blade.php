<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            HOME
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:flex">
                <div class="flex-1 p-6 bg-white border-b border-gray-200">
                    <p>こんにちは</p>
                    @foreach ($user as $u)
                        <p>{{ $u->name }}さん</p>
                    @endforeach
                    <div class="py-4">
                        @if ($main_count !== 0)
                            <p>今月の支払い明細は{{ $main_count }}件です</p>
                            <p>今月の支払い合計金額は{{ number_format($main_amount) }}円です</p>
                        @else
                            <p>登録している明細はありません</p>
                        @endif
                    </div>
                    @if ($main_count !== 0)
                    <section class="text-gray-600 body-font">
                        <div class="container mx-auto mt-3 md:mt-20">
                            <div class="flex flex-wrap -m-4 text-center">
                                <div class="p-4 sm:w-1/4 w-1/2">
                                    <h2 class="title-font font-medium sm:text-4xl md:text-xl lg:text-3xl  text-gray-900">{{ number_format($amountEachCategory['category1']) }}</h2>
                                    <p class="leading-relaxed">{{ $categories->find(1)->name }}</p>
                                </div>
                                <div class="p-4 sm:w-1/4 w-1/2">
                                    <h2 class="title-font font-medium sm:text-4xl md:text-xl lg:text-3xl text-gray-900">{{ number_format($amountEachCategory['category2']) }}</h2>
                                    <p class="leading-relaxed">{{ $categories->find(2)->name }}</p>
                                </div>
                                <div class="p-4 sm:w-1/4 w-1/2">
                                    <h2 class="title-font font-medium sm:text-4xl md:text-xl lg:text-3xl text-gray-900">{{ number_format($amountEachCategory['category3']) }}</h2>
                                    <p class="leading-relaxed">{{ $categories->find(3)->name }}</p>
                                </div>
                                <div class="p-4 sm:w-1/4 w-1/2">
                                    <h2 class="title-font font-medium sm:text-4xl md:text-xl lg:text-3xl text-gray-900">{{ number_format($amountEachCategory['category4']) }}</h2>
                                    <p class="leading-relaxed">{{ $categories->find(4)->name }}</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="flex-1 container p-6 bg-white border-b border-gray-200">
                    <div class="bg-white">支出分類</div>
                    <canvas class="mx-auto" id="chartPie" style="width:400px height:400px"></canvas>
                </div>
                @else
                <div class="flex-1"></div>
                <div class="flex-1"></div>
                @endif
            </div>
        </div>
    </div>
    </div>
    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var amountEachCategory = <?php echo json_encode($amountEachCategory); ?>;        const dataPie = {
            labels: ["固定費", "食費", "交通費", "娯楽費"],
            datasets: [{
                label: "My First Dataset",
                data: [
                    amountEachCategory['category1'],
                    amountEachCategory['category2'],
                    amountEachCategory['category3'],
                    amountEachCategory['category4']
                ],
                backgroundColor: [
                    "rgb(133, 105, 241)",
                    "rgb(164, 101, 241)",
                    "rgb(101, 143, 241)",
                    "rgb(400, 143, 241)",
                ],
                hoverOffset: 4,
            }, ],
        };

        const configPie = {
            type: "pie",
            data: dataPie,
            options: {
                responsive: false,
                maintainAspectRatio: true,
                legend: {
                    display: true,
                    labels: {
                        boxWidth: 20,
                        fontSize: 8,
                    }
                }
            }
        }

        var chartBar = new Chart(document.getElementById("chartPie"), configPie);
        // なぜ赤くなる？

    </script>
</x-app-layout>
