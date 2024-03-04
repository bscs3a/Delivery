<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Dashboard</title>

    <!-- Stylesheets -->
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

    <!-- Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <!-- Main container -->
    <div class="min-h-screen p-6">
        <!-- Dashboard Analytics -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <!-- Target Sales Card -->
            <div class="md:col-span-2 bg-white rounded-md border border-gray-200 p-6 shadow-md shadow-black/5">
                <!-- Card header -->
                <div class="flex justify-between">
                    <!-- Card title -->
                    <div>
                        <div class="text-lg font-semibold text-gray-800" style="color: #262261;">
                            <i class="ri-funds-box-fill ri-fw" style="font-size: 1.2em;"></i> Target Sales for This Month
                        </div>
                        <!-- Card data -->
                        <div class="text-4xl font-semibold ml-5 mt-4" style="color: #262261;">Php 52,580 <span style="color: gray;">/ Php 32,000</span></div>
                        <!-- Additional data -->
                        <div class="text-sm font-semibold ml-5 mt-2" style="color: #5DD783;">+10% more than average</div>
                    </div>
                    <!-- Card options -->
                    <div>
                        <button type="button" class="dropdown-toggle text-gray-800 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                    </div>
                </div>
            </div>

            <!-- Transaction Rate Card -->
            <div class="bg-white rounded-md border p-6 shadow-md shadow-black/5">
                <!-- Card header -->
                <div class="flex justify-between">
                    <!-- Card title -->
                    <div>
                        <div class="text-lg font-semibold text-gray-800" style="color: #262261;">
                            <i class="ri-shake-hands-fill" style="font-size: 1.2em;"></i> Transaction Rate
                        </div>
                        <!-- Card data -->
                        <div class="text-4xl font-semibold ml-5 mt-4" style="color: #262261;">53</div>
                        <!-- Additional data -->
                        <div class="text-sm font-semibold ml-5 mt-2" style="color: #5DD783;">+10% more than average</div>
                    </div>
                    <!-- Card options -->
                    <div>
                        <button type="button" class="dropdown-toggle text-gray-800 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sales and Stocks Analytics -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <!-- Sales Chart Card -->
            <div class="md:col-span-2 bg-white rounded-md border border-gray-200 p-6 shadow-md shadow-black/5">
                <!-- Card header -->
                <div class="flex justify-between">
                    <!-- Card title -->
                    <div>
                        <div class="text-lg font-semibold text-gray-800" style="color: #262261;">
                            <i class="ri-funds-box-fill ri-fw" style="font-size: 1.2em;"></i> Sales
                        </div>
                    </div>
                    <!-- Card options -->
                    <div>
                        <button type="button" class="dropdown-toggle text-gray-800 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                    </div>
                </div>

                <!-- Sales Chart -->
                <div class="h-60">
                    <canvas id="myChart" class="w-full h-full"></canvas>
                </div>
            </div>

            <!-- Stocks Chart Card -->
            <div class="bg-white rounded-md border p-6 shadow-md shadow-black/5 h-full">
                <!-- Card header -->
                <div class="flex justify-between">
                    <!-- Card title -->
                    <div class="mb-8">
                        <div class="text-lg font-semibold text-gray-800" style="color: #262261;">
                            <i class="ri-box-3-fill" style="font-size: 1.2em;"></i> Stocks
                        </div>
                    </div>
                    <!-- Card options -->
                    <div>
                        <button type="button" class="dropdown-toggle text-gray-800 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                    </div>
                </div>
                <!-- Stocks Chart -->
                <div class="">
                    <canvas id="stocksChart" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>

        <div>
            <div class="flex justify-between items-center">
                <h1 class="mb-3 text-xl font-bold text-black">Transactions</h1>
                <div class="relative mb-3">
                    <input type="text" placeholder="Search by ID..." class="px-3 py-2 pl-5 pr-10 border rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-6a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            <table class="table-auto w-full mx-auto text-left rounded-lg overflow-hidden shadow-lg">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 font-semibold">Product</th>
                        <th class="px-4 py-2 font-semibold">Order ID</th>
                        <th class="px-4 py-2 font-semibold">Date and Time</th>
                        <th class="px-4 py-2 font-semibold">Buyer</th>
                        <th class="px-4 py-2 font-semibold">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border border-gray-200 bg-white">
                        <td class="px-4 py-2 flex items-start">
                            <img src="https://via.placeholder.com/150" alt="Product Image" class="w-20 h-20 object-cover mr-4">
                            <div>
                                <div>Product Name</div>
                                <div>Quantity: 2</div>
                                <div>Price: $100</div>
                            </div>
                        </td>
                        <td class="px-4 py-2">123456</td>
                        <td class="px-4 py-2">2022-03-01 12:00:00</td>
                        <td class="px-4 py-2">John Doe</td>
                        <td class="px-4 py-2">View</td>
                    </tr>
                    <tr class="border border-gray-200 bg-white">
                        <td class="px-4 py-2 flex items-start">
                            <img src="https://via.placeholder.com/150" alt="Product Image" class="w-20 h-20 object-cover mr-4">
                            <div>
                                <div>Hammer</div>
                                <div>Quantity: 5</div>
                                <div>Price: $25</div>
                            </div>
                        </td>
                        <td class="px-4 py-2">123457</td>
                        <td class="px-4 py-2">2022-03-02 14:00:00</td>
                        <td class="px-4 py-2">Jane Doe</td>
                        <td class="px-4 py-2">View</td>
                    </tr>
                    <tr class="border border-gray-200 bg-white">
                        <td class="px-4 py-2 flex items-start">
                            <img src="https://via.placeholder.com/150" alt="Product Image" class="w-20 h-20 object-cover mr-4">
                            <div>
                                <div>Screwdriver</div>
                                <div>Quantity: 3</div>
                                <div>Price: $15</div>
                            </div>
                        </td>
                        <td class="px-4 py-2">123458</td>
                        <td class="px-4 py-2">2022-03-03 16:00:00</td>
                        <td class="px-4 py-2">Jim Doe</td>
                        <td class="px-4 py-2">View</td>
                    </tr>
                </tbody>
            </table>
        </div>


        <!-- Go to Sales Button -->
        <button onclick="location.href='/Master/sls/sample'" class="mt-6 px-6 py-3 text-white bg-blue-500 rounded hover:bg-blue-700">Go to Sales</button>
    </div>


    <!-- Chart.js configurations -->
    <script>
        // Line Chart for Sales
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'Sales',
                    data: [120, 60, 50, 180, 120, 200, 300, 400, 1000, 600, 700, 800],
                    backgroundColor: 'transparent',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2
                }, {
                    label: 'Target',
                    data: [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100, 1200],
                    backgroundColor: 'transparent',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Bar Chart for Stocks
        var ctx = document.getElementById('stocksChart').getContext('2d');
        var stocksChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Sold', 'Remaining'],
                datasets: [{
                    label: 'Stocks',
                    data: [24, 76],
                    backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(75, 192, 192, 0.2)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)'],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>