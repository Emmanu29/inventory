@include('partials.header')
@include('partials.Sidebar')
<form action="/add/accounting" method="POST">
    @csrf
    
<div class="max-w-7xl mx-auto mr-20 py-12 mt-10">
        <div class="bg-gray-500 shadow-md rounded-2xl px-8 pt-6 pb-8 mb-4 flex flex-col border-4 border-gray-900">
            <h2 class="text-lg font-bold mb-4 text-center">Add New Inventory</h2>
            <div class="grid grid-cols-2 gap-4">

            <input type="hidden" name="accountingId" value="{{ $accountingId }}">

            <div class="mb-4">
                <label for="name" class="block mb-1">User:</label>
                <input type="text" id="name" name="name" 
                placeholder="User"class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-400" value="{{old('name')}}">
                @error('name')
                <p class="text-red-500 text-xs mt-2 p-1">
                    {{$message}}            
                </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="computerType" class="block mb-1">Computer Type / Property No:</label>
                <input type="text" id="computerType" name="computerType" placeholder="Computer Type" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-400" value="{{old('computerType')}}">
                @error('computerType')
                <p class="text-red-500 text-xs mt-2 p-1">
                    {{$message}}            
                </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="specification" class="block mb-1">Specification:</label>
                <input type="text" id="specification" name="specification" placeholder="Specification" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-400" value="{{old('specification')}}">
                @error('specification')
                <p class="text-red-500 text-xs mt-2 p-1">
                    {{$message}}            
                </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="monitor" class="block mb-1"> Monitor:</label>
                <input type="text" id="monitor" name="monitor" placeholder="Monitor" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-400" value="{{old('monitor')}}">
                @error('monitor')
                <p class="text-red-500 text-xs mt-2 p-1">
                    {{$message}}            
                </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="avrUps" class="block mb-1">AVR/UPS/Property No:</label>
                <input type="text" id="avrUps" name="avrUps" placeholder="AVR/UPS/Property No" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-400" value="{{old('avrUps')}}">
                @error('avrUps')
                <p class="text-red-500 text-xs mt-2 p-1">
                    {{$message}}            
                </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="printer" class="block mb-1">Printer/Property No:</label>
                <input type="text" id="printer" name="printer" placeholder="Printer" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-400" value="{{old('printer')}}">
                @error('printer')
                <p class="text-red-500 text-xs mt-2 p-1">
                    {{$message}}            
                </p>
                @enderror
            </div>

                <!-- Add more fields here -->
            </div>
            <div class="mt-4">
            <button type="submit" class="w-full py-2 bg-gray-900 text-white rounded-md hover:bg-gray-700 transition duration-200">Submit</button>
            </div>
        </div>
    </div>
</form>

@include('partials.footer')