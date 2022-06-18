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
                        @if ($main_count !== 0)
                            <p>今月の支払い明細は{{ $main_count }}件です</p>
                            <p>今月の支払い合計金額は{{ number_format($main_amount) }}円です</p>
                        @else
                            <p>登録している明細はありません</p>
                        @endif
                    </div>
                    <div class="py-4">
                        <p>category1_amount:{{ number_format($amountEachCategory['category1']) }}</p>
                        <p>category2_amount:{{ number_format($amountEachCategory['category2']) }}</p>
                        <p>category3_amount:{{ number_format($amountEachCategory['category3']) }}</p>
                        <p>category4_amount:{{ number_format($amountEachCategory['category4']) }}</p>
                    </div>
                    <div class="">
                        <div class="py-3 bg-white">Pie chart</div>
                        <canvas width="100" height="100" class="p-10 w-5" id="chartPie"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var amountEachCategory = <?php echo json_encode($amountEachCategory); ?>;

        const dataPie = {
            labels: ["固定費", "食費", "交通費", "娯楽費"],
            datasets: [{
                label: "My First Dataset",
                data:
                [
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
            options: {},
        };

        var chartBar = new Chart(document.getElementById("chartPie"), configPie);
        // なぜ赤くなる？
    </script>
</x-app-layout>
