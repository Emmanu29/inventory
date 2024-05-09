@include('partials.header')
@include('partials.Sidebar')


    <div class="max-w-7xl mx-auto mr-20 mt-0 py-12">
        <div class="bg-gray-500 shadow-md rounded-2xl px-8 pt-6 pb-8 mb-4 flex flex-col border-4 border-gray-900 ">
        <form action="/edit/{{$device->id}}" method="POST">
            @method('PUT')
            @csrf
            <h2 class="text-xl font-bold mb-4 text-center">Inventory 
            </h2>

            <!-- Display QR code -->

            <div class="grid grid-cols-2 gap-4">

            <input type="hidden" name="accountingId" value="{{ $accountingId }}">
            <input type="hidden" name="staffId" value="{{ $staff->id }}">

            <div class="mb-4">
                <label for="name" class="block mb-1">User:</label>
                <input type="text" id="name" name="name" 
                placeholder="User"class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-400" value="{{ $staff->name }}">
                @error('name')
                <p class="text-red-500 text-xs mt-2 p-1">
                    {{$message}}            
                </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="computerType" class="block mb-1">Computer Type / Property No:</label>
                <input type="text" id="computerType" name="computerType" placeholder="Computer Type" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-400" value="{{$device->computerType}}">
                @error('computerType')
                <p class="text-red-500 text-xs mt-2 p-1">
                    {{$message}}            
                </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="specification" class="block mb-1">Specification:</label>
                <input type="text" id="specification" name="specification" placeholder="Specification" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-400" value="{{$device->specification}}">
                @error('specification')
                <p class="text-red-500 text-xs mt-2 p-1">
                    {{$message}}            
                </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="monitor" class="block mb-1"> Monitor:</label>
                <input type="text" id="monitor" name="monitor" placeholder="Monitor" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-400" value="{{$device->monitor}}">
                @error('monitor')
                <p class="text-red-500 text-xs mt-2 p-1">
                    {{$message}}            
                </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="avrUps" class="block mb-1">AVR/UPS/Property No:</label>
                <input type="text" id="avrUps" name="avrUps" placeholder="AVR/UPS/Property No" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-400" value="{{$device->avrUps}}">
                @error('avrUps')
                <p class="text-red-500 text-xs mt-2 p-1">
                    {{$message}}            
                </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="printer" class="block mb-1">Printer/Property No:</label>
                <input type="text" id="printer" name="printer" placeholder="Printer" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-400" value="{{$device->printer}}">
                @error('printer')
                <p class="text-red-500 text-xs mt-2 p-1">
                    {{$message}}            
                </p>
                @enderror
            </div>
                <!-- Add more fields here -->

            
            <div class="mt-4 ml-10">
                <button type="submit" class="w-3/4 py-2 bg-gray-900 text-white rounded-md hover:bg-gray-700 transition duration-200">Update</button>
            </div>
        </form>
           <!-- Delete button form -->
                <form action="{{ route('accounting.destroy', $device->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete {{$staff->name}}?')">
                    @csrf
                    @method('DELETE')
                    <div class="mt-4 ml-20">
                        <button type="submit" class="w-3/4 py-2 bg-red-600 hover:bg-orange-600 text-white font-bold rounded focus:outline-none focus:shadow-outline">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@include('partials.footer')
