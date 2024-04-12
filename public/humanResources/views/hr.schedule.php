<?php
    $db = Database::getInstance();
    $conn = $db->connect();

    $query = "SELECT COUNT(*) as count FROM leave_requests WHERE CURDATE() BETWEEN start_date AND end_date AND status = 'Approved'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $onLeave = $result['count'];

    $pdo = null;
    $stmt = null;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
  <link href="./../src/tailwind.css" rel="stylesheet">
  <title>Schedule</title>
</head>
<body class="text-gray-800 font-sans">

<!-- sidenav -->
<?php 
    include 'inc/sidenav.php';
?>
<!-- end of sidenav -->

<!-- Start Main Bar -->
<main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
  <!-- Top Bar -->
  <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/10">
   <button type="button" class="text-lg text-gray-600 sidebar-toggle">
  <i class="ri-menu-line"></i>
   </button>
   <ul class="flex items-center text-sm ml-4">  
  <li class="mr-2">
    <a route="/hr/dashboard" class="text-[#151313] hover:text-gray-600 font-medium">Human Resources</a>
  </li>
  <li class="text-[#151313] mr-2 font-medium">/</li>
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Schedule</a>
   </ul>
   <ul class="ml-auto flex items-center">
  <li class="mr-1">
    <a href="#" class="text-[#151313] hover:text-gray-600 text-sm font-medium">Sample User</a>
  </li>
  <li class="mr-1">
    <button type="button" class="w-8 h-8 rounded justify-center hover:bg-gray-300"><i class="ri-arrow-down-s-line"></i></button> 
  </li>
   </ul>
  </div>
  <!-- End Top Bar -->
  <br>

<!-- component -->
<div class="lg:flex lg:h-auto lg:flex-col">
  <header class="flex items-center justify-between border-b border-gray-200 px-6 py-4 lg:flex-none">
    <h1 class="text-base font-semibold leading-6 text-gray-900">
        <time datetime="<?php echo date('Y-m'); ?>"><?php echo date('F Y'); ?></time>
    </h1>
    <div class="flex items-center">
      <div class="relative flex items-center rounded-md bg-white shadow-sm md:items-stretch">
        <button type="button" class="flex h-9 w-12 items-center justify-center rounded-l-md border-y border-l border-gray-300 pr-1 text-gray-400 hover:text-gray-500 focus:relative md:w-9 md:pr-0 md:hover:bg-gray-50">
          <span class="sr-only">Previous month</span>
          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
          </svg>
        </button>
        <button type="button" class="hidden border-y border-gray-300 px-3.5 text-sm font-semibold text-gray-900 hover:bg-gray-50 focus:relative md:block">Today</button>
        <span class="relative -mx-px h-5 w-px bg-gray-300 md:hidden"></span>
        <button type="button" class="flex h-9 w-12 items-center justify-center rounded-r-md border-y border-r border-gray-300 pl-1 text-gray-400 hover:text-gray-500 focus:relative md:w-9 md:pl-0 md:hover:bg-gray-50">
          <span class="sr-only">Next month</span>
          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
        </button>
      </div>
      <div class="hidden md:ml-4 md:flex md:items-center">
        <div class="relative">
          <div class="relative"></div>
            <button type="button" class="flex items-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="false" aria-haspopup="true">
              Month view
              <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
              </svg>
            </button>
            <div class="hidden absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Month view</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Week view</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Day view</a>
            </div>
          </div>
          <script>
            document.getElementById('menu-button').addEventListener('click', function() {
              var dropdown = this.nextElementSibling;
              dropdown.classList.toggle('hidden');
            });
          </script>
        
          <!--
            Dropdown menu, show/hide based on menu state.

            Entering: "transition ease-out duration-100"
              From: "transform opacity-0 scale-95"
              To: "transform opacity-100 scale-100"
            Leaving: "transition ease-in duration-75"
              From: "transform opacity-100 scale-100"
              To: "transform opacity-0 scale-95"
          -->
              
        </div>
        <div class="ml-6 h-6 w-px bg-gray-300"></div>
        <button type="button" class="ml-6 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Add event</button>
        <button type="button" class="ml-6 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Remove event</button>
      </div>
      <div class="relative ml-6 md:hidden">
        <button type="button" class="-mx-2 flex items-center rounded-full border border-transparent p-2 text-gray-400 hover:text-gray-500" id="menu-0-button" aria-expanded="false" aria-haspopup="true">
          <span class="sr-only">Open menu</span>
          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" />
          </svg>
        </button>

        <!--
          Dropdown menu, show/hide based on menu state.

          Entering: "transition ease-out duration-100"
            From: "transform opacity-0 scale-95"
            To: "transform opacity-100 scale-100"
          Leaving: "transition ease-in duration-75"
            From: "transform opacity-100 scale-100"
            To: "transform opacity-0 scale-95"
        -->
        <div class="absolute right-0 z-10 mt-3 w-36 origin-top-right divide-y divide-gray-100 overflow-hidden rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1">
          <div class="py-1" role="none">
            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-0">Create event</a>
          </div>
          <div class="py-1" role="none">
            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-1">Go to today</a>
          </div>
          <div class="py-1" role="none">
            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-2">Day view</a>
            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-3">Week view</a>
            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-4">Month view</a>
            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-5">Year view</a>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <div class="shadow ring-1 ring-black ring-opacity-5 lg:flex lg:flex-auto lg:flex-col">
    <div class="grid grid-cols-7 gap-px border-b border-gray-300 bg-gray-200 text-center text-xs font-semibold leading-6 text-gray-700 lg:flex-none">
      <div class="flex justify-center bg-blue-400 py-2">
        <span>M</span>
        <span class="sr-only sm:not-sr-only">on</span>
      </div>
      <div class="flex justify-center bg-blue-400 py-2">
        <span>T</span>
        <span class="sr-only sm:not-sr-only">ue</span>
      </div>
      <div class="flex justify-center bg-blue-400 py-2">
        <span>W</span>
        <span class="sr-only sm:not-sr-only">ed</span>
      </div>
      <div class="flex justify-center bg-blue-400 py-2">
        <span>T</span>
        <span class="sr-only sm:not-sr-only">hu</span>
      </div>
      <div class="flex justify-center bg-blue-400 py-2">
        <span>F</span>
        <span class="sr-only sm:not-sr-only">ri</span>
      </div>
      <div class="flex justify-center bg-blue-400 py-2">
        <span>S</span>
        <span class="sr-only sm:not-sr-only">at</span>
      </div>
      <div class="flex justify-center bg-blue-400 py-2">
        <span>S</span>
        <span class="sr-only sm:not-sr-only">un</span>
      </div>
    </div>
<div class="flex bg-gray-50 text-xs leading-6 text-gray-700 lg:flex-auto">
<div class="hidden w-full lg:grid lg:grid-cols-7 lg:grid-rows-6 lg:gap-px">
<?php
    date_default_timezone_set('Asia/Manila');

    // Get the current month and year
    $month = date('m');
    $year = date('Y');

    // Get the number of days in the month
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    // Find out what day of the week the first day of the month is
    $firstDayOfMonth = date('N', strtotime("$year-$month-01"));

    // Calculate how many days to go back to the previous month
    $daysToGoBack = $firstDayOfMonth - 1;

    // Get the timestamp for the day to start from in the previous month
    $startDayOfPrevMonth = strtotime("$year-$month-01 - $daysToGoBack day");

    // Loop through each day of the month
    for ($day = 1; $day <= $daysInMonth; $day++) {
        // Format the date
        $date = $year . '-' . $month . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);

        // Find out what day of the week this day is
        $dayOfWeek = date('N', strtotime($date));

        // If this is the first day of the loop, add divs for the last few days of the previous month
        if ($day == 1) {
            for ($i = 0; $i < $daysToGoBack; $i++) {
                // Get the date for this day of the previous month
                $prevMonthDate = date('Y-m-d', $startDayOfPrevMonth + ($i * 24 * 60 * 60));

                // Output the div for this day
                echo '<div class="relative bg-gray-100 px-3 py-2 text-gray-500">';
                echo '<time datetime="' . $prevMonthDate . '">' . date('j', strtotime($prevMonthDate)) . '</time>';
                echo '</div>';
            }
        }
?>
<div class="relative bg-white px-3 py-2">
    <?php
    $currentDate = date('Y-m-d');
    $timeClass = $date == $currentDate ? 'flex h-6 w-6 items-center justify-center rounded-full bg-blue-600 font-semibold text-white' : '';
    ?>
    <time datetime="<?php echo $date; ?>" class="<?php echo $timeClass; ?>"><?php echo $day; ?></time>
    <?php if ($date == $currentDate && $onLeave > 0): ?>
    <ol class="mt-2">
    <li>
        <a href="#" class="group flex">
        <p class="flex-auto mt-2 mb-2 truncate text-sm font-medium text-gray-900">Employees</p>
        </a>
    </li>
    <li>
        <a href="#" class="group flex">
        <p class="flex-auto mb-4 truncate text-sm font-medium text-gray-900">On Leave</p>
        <p class="ml-3 hidden flex-none text-sm font-bold text-blue-500 xl:block"><?php echo $onLeave; ?></p>
        </a>
    </li>
    </ol>
    <?php endif; ?>
</div>
<?php
    // If this is the last day of the loop and it's not a Sunday, add divs for the first few days of the next month
    if ($day == $daysInMonth) {
        // Get the timestamp for the first day of the next month
        $firstDayOfNextMonth = strtotime("$year-$month-$day + 1 day");

        for ($i = $dayOfWeek; $i < 7; $i++) {
            // Get the date for this day of the next month
            $nextMonthDate = date('Y-m-d', $firstDayOfNextMonth);

            // Output the div for this day
            echo '<div class="relative bg-gray-100 px-3 py-2 text-gray-500">';
            echo '<time datetime="' . $nextMonthDate . '">' . date('j', $firstDayOfNextMonth) . '</time>';
            echo '</div>';

            // Add one day to the timestamp
            $firstDayOfNextMonth += 24 * 60 * 60;
        }
    }
    }
?>
</div>


      <!-- <div class="hidden w-full lg:grid lg:grid-cols-7 lg:grid-rows-6 lg:gap-px">
        <div class="relative bg-gray-50 px-3 py-2 text-gray-500">
          <time datetime="<?php //echo date('Y-m') . '-27'; ?>">27</time>
        </div>
        <div class="relative bg-gray-50 px-3 py-2 text-gray-500">
          <time datetime="2021-12-28">28</time>
        </div>
        <div class="relative bg-gray-50 px-3 py-2 text-gray-500">
          <time datetime="2021-12-29">29</time>
        </div>
        <div class="relative bg-gray-50 px-3 py-2 text-gray-500">
          <time datetime="2021-12-30">30</time>
        </div>
        <div class="relative bg-gray-50 px-3 py-2 text-gray-500">
          <time datetime="2021-12-31">31</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-01">1</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-01">2</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-03">3</time>
          <ol class="mt-2">
            <li>
              <a href="#" class="group flex">
                <p class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600">Design review</p>
                <time datetime="2022-01-03T10:00" class="ml-3 hidden flex-none text-gray-500 group-hover:text-indigo-600 xl:block">10AM</time>
              </a>
            </li>
            <li>
              <a href="#" class="group flex">
                <p class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600">Sales meeting</p>
                <time datetime="2022-01-03T14:00" class="ml-3 hidden flex-none text-gray-500 group-hover:text-indigo-600 xl:block">2PM</time>
              </a>
            </li>
          </ol>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-04">4</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-05">5</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-06">6</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-07">7</time>
          <ol class="mt-2">
            <li>
              <a href="#" class="group flex">
                <p class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600">Date night</p>
                <time datetime="2022-01-08T18:00" class="ml-3 hidden flex-none text-gray-500 group-hover:text-indigo-600 xl:block">6PM</time>
              </a>
            </li>
          </ol>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-08">8</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-09">9</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-10">10</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-11">11</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-12" class="flex h-6 w-6 items-center justify-center rounded-full bg-indigo-600 font-semibold text-white">12</time>
          <ol class="mt-2">
            <li>
              <a href="#" class="group flex">
                <p class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600">Sam's birthday party</p>
                <time datetime="2022-01-25T14:00" class="ml-3 hidden flex-none text-gray-500 group-hover:text-indigo-600 xl:block">2PM</time>
              </a>
            </li>
          </ol>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-13">13</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-14">14</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-15">15</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-16">16</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-17">17</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-18">18</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-19">19</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-20">20</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-21">21</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-22">22</time>
          <ol class="mt-2">
            <li>
              <a href="#" class="group flex">
                <p class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600">Maple syrup museum</p>
                <time datetime="2022-01-22T15:00" class="ml-3 hidden flex-none text-gray-500 group-hover:text-indigo-600 xl:block">3PM</time>
              </a>
            </li>
            <li>
              <a href="#" class="group flex">
                <p class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600">Hockey game</p>
                <time datetime="2022-01-22T19:00" class="ml-3 hidden flex-none text-gray-500 group-hover:text-indigo-600 xl:block">7PM</time>
              </a>
            </li>
          </ol>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-23">23</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-24">24</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-25">25</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-26">26</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-27">27</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-28">28</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-29">29</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-30">30</time>
        </div>
        <div class="relative bg-white px-3 py-2">
          <time datetime="2022-01-31">31</time>
        </div>
        <div class="relative bg-gray-50 px-3 py-2 text-gray-500">
          <time datetime="2022-02-01">1</time>
        </div>
        <div class="relative bg-gray-50 px-3 py-2 text-gray-500">
          <time datetime="2022-02-02">2</time>
        </div>
        <div class="relative bg-gray-50 px-3 py-2 text-gray-500">
          <time datetime="2022-02-03">3</time>
        </div>
        <div class="relative bg-gray-50 px-3 py-2 text-gray-500">
          <time datetime="2022-02-04">4</time>
          <ol class="mt-2">
            <li>
              <a href="#" class="group flex">
                <p class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600">Cinema with friends</p>
                <time datetime="2022-02-04T21:00" class="ml-3 hidden flex-none text-gray-500 group-hover:text-indigo-600 xl:block">9PM</time>
              </a>
            </li>
          </ol>
        </div>
        <div class="relative bg-gray-50 px-3 py-2 text-gray-500">
          <time datetime="2022-02-05">5</time>
        </div>
        <div class="relative bg-gray-50 px-3 py-2 text-gray-500">
          <time datetime="2022-02-06">6</time>
        </div>
      </div> -->


      <div class="isolate grid w-full grid-cols-7 grid-rows-6 gap-px lg:hidden">
        <!--
          Always include: "flex h-14 flex-col py-2 px-3 hover:bg-gray-100 focus:z-10"
          Is current month, include: "bg-white"
          Is not current month, include: "bg-gray-50"
          Is selected or is today, include: "font-semibold"
          Is selected, include: "text-white"
          Is not selected and is today, include: "text-indigo-600"
          Is not selected and is current month, and is not today, include: "text-gray-900"
          Is not selected, is not current month, and is not today: "text-gray-500"
        -->
        <button type="button" class="flex h-14 flex-col bg-gray-50 px-3 py-2 text-gray-500 hover:bg-gray-100 focus:z-10">
          <!--
            Always include: "ml-auto"
            Is selected, include: "flex h-6 w-6 items-center justify-center rounded-full"
            Is selected and is today, include: "bg-indigo-600"
            Is selected and is not today, include: "bg-gray-900"
          -->
          <time datetime="2021-12-27" class="ml-auto">27</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-gray-50 px-3 py-2 text-gray-500 hover:bg-gray-100 focus:z-10">
          <time datetime="2021-12-28" class="ml-auto">28</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-gray-50 px-3 py-2 text-gray-500 hover:bg-gray-100 focus:z-10">
          <time datetime="2021-12-29" class="ml-auto">29</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-gray-50 px-3 py-2 text-gray-500 hover:bg-gray-100 focus:z-10">
          <time datetime="2021-12-30" class="ml-auto">30</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-gray-50 px-3 py-2 text-gray-500 hover:bg-gray-100 focus:z-10">
          <time datetime="2021-12-31" class="ml-auto">31</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-01" class="ml-auto">1</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-02" class="ml-auto">2</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-03" class="ml-auto">3</time>
          <span class="sr-only">2 events</span>
          <span class="-mx-0.5 mt-auto flex flex-wrap-reverse">
            <span class="mx-0.5 mb-1 h-1.5 w-1.5 rounded-full bg-gray-400"></span>
            <span class="mx-0.5 mb-1 h-1.5 w-1.5 rounded-full bg-gray-400"></span>
          </span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-04" class="ml-auto">4</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-05" class="ml-auto">5</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-06" class="ml-auto">6</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-07" class="ml-auto">7</time>
          <span class="sr-only">1 event</span>
          <span class="-mx-0.5 mt-auto flex flex-wrap-reverse">
            <span class="mx-0.5 mb-1 h-1.5 w-1.5 rounded-full bg-gray-400"></span>
          </span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-08" class="ml-auto">8</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-09" class="ml-auto">9</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-10" class="ml-auto">10</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-11" class="ml-auto">11</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 font-semibold text-indigo-600 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-12" class="ml-auto">12</time>
          <span class="sr-only">1 event</span>
          <span class="-mx-0.5 mt-auto flex flex-wrap-reverse">
            <span class="mx-0.5 mb-1 h-1.5 w-1.5 rounded-full bg-gray-400"></span>
          </span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-13" class="ml-auto">13</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-14" class="ml-auto">14</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-15" class="ml-auto">15</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-16" class="ml-auto">16</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-17" class="ml-auto">17</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-18" class="ml-auto">18</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-19" class="ml-auto">19</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-20" class="ml-auto">20</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-21" class="ml-auto">21</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 font-semibold text-white hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-22" class="ml-auto flex h-6 w-6 items-center justify-center rounded-full bg-gray-900">22</time>
          <span class="sr-only">2 events</span>
          <span class="-mx-0.5 mt-auto flex flex-wrap-reverse">
            <span class="mx-0.5 mb-1 h-1.5 w-1.5 rounded-full bg-gray-400"></span>
            <span class="mx-0.5 mb-1 h-1.5 w-1.5 rounded-full bg-gray-400"></span>
          </span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-23" class="ml-auto">23</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-24" class="ml-auto">24</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-25" class="ml-auto">25</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-26" class="ml-auto">26</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-27" class="ml-auto">27</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-28" class="ml-auto">28</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-29" class="ml-auto">29</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-30" class="ml-auto">30</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-white px-3 py-2 text-gray-900 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-01-31" class="ml-auto">31</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-gray-50 px-3 py-2 text-gray-500 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-02-01" class="ml-auto">1</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-gray-50 px-3 py-2 text-gray-500 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-02-02" class="ml-auto">2</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-gray-50 px-3 py-2 text-gray-500 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-02-03" class="ml-auto">3</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-gray-50 px-3 py-2 text-gray-500 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-02-04" class="ml-auto">4</time>
          <span class="sr-only">1 event</span>
          <span class="-mx-0.5 mt-auto flex flex-wrap-reverse">
            <span class="mx-0.5 mb-1 h-1.5 w-1.5 rounded-full bg-gray-400"></span>
          </span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-gray-50 px-3 py-2 text-gray-500 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-02-05" class="ml-auto">5</time>
          <span class="sr-only">0 events</span>
        </button>
        <button type="button" class="flex h-14 flex-col bg-gray-50 px-3 py-2 text-gray-500 hover:bg-gray-100 focus:z-10">
          <time datetime="2022-02-06" class="ml-auto">6</time>
          <span class="sr-only">0 events</span>
        </button>
      </div>
    </div>
  </div>
</div>
  <!-- component -->
</main>
<!-- End Main Bar -->
<script  src="./../src/route.js"></script>
<script  src="./../src/form.js"></script>
<script type="module" src="../public/humanResources/js/sidenav-active-inactive.js"></script>
</script>
</body>
</html>