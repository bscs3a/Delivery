<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link href="./../src/tailwind.css" rel="stylesheet" />
  </head>
  
  <body>
    <div class="flex h-screen bg-gray-100">
      
    <?php include "components/po.sidebar.php" ?>

      <!-- Navbar -->
      <div class="flex flex-col flex-1 overflow-y-auto">
        <!-- header -->
        <div
          class="flex items-center justify-between h-16 bg-zinc-200 border-b border-gray-200">
          <div class="flex items-center px-4">
            <button
              class="text-gray-500 focus:outline-none focus:text-gray-700">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
            <h1 class="text-2xl font-semibold px-5">Dashboard</h1>
          </div>

          <div class="flex items-center pr-4 text-xl font-semibold">
            Sample User

            <span class="p-3">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
            </span>
          </div>
        </div>

        <!-- Main Content -->
        <div class="h-screen">
          <div class="flex flex-row justify-center gap-16 drop-shadow-md my-8">
            <div class="flex border-2 border-gray-400 rounded-md w-80 h-40 justify-center items-center">
              <a class="text-lg">Suppliers</a>
            </div>
            <div class="flex border-2 border-gray-400 rounded-md w-80 h-40 justify-center items-center">
              <a class="text-lg">Items</a>
            </div>
            <div class="flex border-2 border-gray-400 rounded-md w-80 h-40 justify-center items-center">
              <a class="text-lg">Order Request</a>
            </div>
          </div>

          <!-- table -->
          <div
            class="overflow-hidden rounded-lg border border-gray-300 shadow-md m-5">
            <table
              class="w-full border-collapse bg-white text-left text-sm text-gray-500">
              <thead class="bg-gray-200">
                <tr class="border-b border-y-gray-300">
                  <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                    Date
                  </th>
                  <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                    User  
                  </th>
                  <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                    Time In
                  </th>
                  <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                    Time Out
                  </th>
                  <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                    Action
                  </th>
                </tr>
              </thead>

              <tbody class="divide-y divide-gray-100 border-b border-gray-300">
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4">
                    <div class="font-medium text-gray-700 text-sm">
                      2024-16-03
                    </div>
                  </td>
                  <th class="px-6 py-4">
                    <div class="font-medium text-gray-700 text-sm">
                      POAdmin@gmail.com
                    </div>
                  </th>
                  <td class="px-6 py-4">
                    <div class="font-medium text-gray-700 text-sm">
                      07:30:15 AM
                    </div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="font-medium text-gray-700 text-sm">
                      06:45:15 PM
                    </div>
                  </td>
                  <td class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                    <div class="flex flex-col font-medium text-gray-700 text-sm">
                      <a>Send Request to Finance</a>
                      <a>06:45:15 PM</a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
