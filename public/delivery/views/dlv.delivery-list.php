<?php
//database connection
require_once './src/dbconn.php';

$db = Database::getInstance();
$conn = $db->connect();
if ($conn === null) {
    die('Failed to connect to the database.');
}
?>

<!-- 
// to display truck with Intransit status
$query = $conn->prepare("SELECT TruckID, PlateNumber FROM Trucks WHERE TruckStatus = 'In Transit'");
$query->execute();

// Fetch all rows as an associative array
$results = $query->fetchAll(PDO::FETCH_ASSOC);
-->
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
    <?php include "component/sidebar.php" ?>

    <!-- Start: Dashboard -->
    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <!-- Start: Header -->

        <div class="py-2 px-6 bg-white flex items-center shadow-md sticky top-0 left-0 z-30">

            <!-- Start: Active Menu -->

            <button type="button" class="text-lg sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>

            <ul class="flex items-center text-md ml-4">

                <li class="mr-2">
                    <p class="text-black font-medium">Delivery / List</p>
                </li>

            </ul>

            <!-- End: Active Menu -->

            <!-- Start: Profile -->

            <ul class="ml-auto flex items-center">
                <div class="text-black font-medium">Sample User</div>
                <li class="dropdown ml-3">
                    <i class="ri-arrow-down-s-line"></i>
                </li>
            </ul>

            <!-- End: Profile -->

        </div>

            <!-- Content here -->
            <div class="flex-1 pr-10 pl-10 h-full">
        <div class="h-auto bg-white p-4 rounded-lg shadow-xl border overflow-hidden">
            <div class="max-h-[650px] overflow-y-auto">
                <table id="orderTable" class="w-full">
                    <thead class="sticky top-0 bg-white z-10">
                        <tr>
                            <th class="border-b border-gray-400 px-4 py-2">TruckID</th>
                            <th class="border-b border-gray-400 px-4 py-2">Plate Number</th>
                            <th class="border-b border-gray-400 px-4 py-2" style="pointer-events: none;">Mark as Delivered</th>
                            <th class="border-b border-gray-400 px-4 py-2" style="pointer-events: none;" >Show</th>
                        </tr>
                    </thead>
                    <tbody>
                                <tr>
                                    <!-- detail result -->
                                    <td class="border px-4 py-2"></td>
                                    <td class="border px-4 py-2"></td>
                                    <td class="p-6 whitespace-nowrap">
                                        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Delivered</button>
                                    </td>
                                    <td class="p-6 whitespace-nowrap">
                                        <button class="show-popup px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                            Show
                                        </button>
                                    </td>
                                </tr>            
                    </tbody>                
                </table>
            </div>
        </div>
    </div>
                                        <!-- The div that will act as the popup -->
        <div id="truck-info-popup" class="hidden p-4">
            <!-- Put your truck info here -->
            <table class="table-auto bg-blue-600 rounded-lg text-white shadow-2xl">
                <thead>
                    <tr>
                        <th class="px-8 py-2 border-b border-gray-300">Order ID</th>
                        <th class="px-8 py-2 border-b border-gray-300">Sale ID</th>
                        <th class="px-8 py-2 border-b border-gray-300">Delivery Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-8 py-2 border-b border-gray-300">0001</td>
                        <td class="px-8 py-2 border-b border-gray-300">#20</td>
                        <td class="px-8 py-2 border-b border-gray-300">2012-30-2</td>
                    </tr>
                </tbody>
            </table>
        </div>


</main>                     

    <!-- The script that turns the div into a popup and shows it when the button is clicked -->
    <script>
    $(document).ready(function() {
        $("#truck-info-popup").dialog({
            autoOpen: false,
            modal: true,
            closeOnEscape: false,
            open: function(event, ui) {
                $(".ui-dialog-titlebar").hide(); // This will hide the title bar
            }
        });

        $(".show-popup").click(function() {
            if ($("#truck-info-popup").dialog("isOpen")) {
                $("#truck-info-popup").dialog("close");
            } else {
                $("#truck-info-popup").dialog("open");
            }
        });
    });
    </script>
            <!-- JS function for sidebar -->
    <script>
        document.querySelector('.sidebar-toggle').addEventListener('click', function() {
            document.getElementById('sidebar-menu').classList.toggle('hidden');
            document.getElementById('sidebar-menu').classList.toggle('transform');
            document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
            document.getElementById('mainContent').classList.toggle('md:w-full');
            document.getElementById('mainContent').classList.toggle('md:ml-64');
        });
    </script>

    <script  src="./../src/route.js"></script>
    <script  src="./../src/form.js"></script>
</body>
</html>