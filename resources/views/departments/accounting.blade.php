@include('partials.header')
@include('partials.Sidebar')

<div class="relative overflow-x-auto shadow-2xl sm:rounded-lg mt-20 bg-blue-100 dark:bg-gray-800 max-w-7xl mx-auto mr-20 mb-10 z-0">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <caption class="text-lg font-bold text-center mt-4 mb-4">Inventory for I.T. Equipment Accounting Office</caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    User
                </th>
                <th scope="col" class="px-6 py-3">
                Computer Type/Property No.
                </th>
                <th scope="col" class="px-6 py-3">
                Specification
                </th>
                <th scope="col" class="px-6 py-3">
                Monitor/Property No.
                </th>
                <th scope="col" class="px-6 py-3">
                AVR/UPS/Property No.
                </th>
                <th scope="col" class="px-6 py-3">
                Printer/Property No.
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Qr</span>
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($staffs as $staff)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $staff->name }}
                </th>
                <td class="px-6 py-4">
                    @foreach ($staff->devices as $device)
                        {{ $device->computerType }} 
                    @endforeach
                </td>
                <td class="px-6 py-4">
                    @foreach ($staff->devices as $device)
                        {{ $device->specification }} 
                    @endforeach
                </td>
                <td class="px-6 py-4">
                    @foreach ($staff->devices as $device)
                        {{ $device->monitor }} 
                    @endforeach
                </td>
                <td class="px-6 py-4">
                    @foreach ($staff->devices as $device)
                        {{ $device->avrUps }} 
                    @endforeach
                </td>
                <td class="px-6 py-4">
                    @foreach ($staff->devices as $device)
                        {{ $device->printer }} 
                    @endforeach
                </td>
                <td class="px-6 py-4 text-right">
                    @foreach ($staff->devices as $device)
                        <a href="/edit/{{ $device->id }}"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>
                    @endforeach
                </td>
                <td class="px-6 py-4 text-right">
                    @foreach ($staff->devices as $device)
                        <a href="/accounting/qr/{{ $device->id }}"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 3.75 9.375v-4.5ZM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 0 1-1.125-1.125v-4.5ZM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 13.5 9.375v-4.5Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75ZM6.75 16.5h.75v.75h-.75v-.75ZM16.5 6.75h.75v.75h-.75v-.75ZM13.5 13.5h.75v.75h-.75v-.75ZM13.5 19.5h.75v.75h-.75v-.75ZM19.5 13.5h.75v.75h-.75v-.75ZM19.5 19.5h.75v.75h-.75v-.75ZM16.5 16.5h.75v.75h-.75v-.75Z" />
                        </svg></a>
                    @endforeach
                </td>     
            </tr>
        @endforeach


            <!-- Additional row for buttons -->
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td colspan="8" class="px-6 py-4 text-center"> <!-- Center align -->
                    <a href="/add/accounting" class="inline-block px-10 py-2 font-medium text-blue-600 dark:text-blue-500 hover:underline bg-gray-200 dark:bg-gray-600 rounded-md">Add</a> <!-- Center align -->
                </td>
            </tr>
        </tbody>
    </table>
</div>   

@include('partials.footer')

