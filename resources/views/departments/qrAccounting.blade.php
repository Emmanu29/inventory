@include('partials.header')
@include('partials.Sidebar')

<div class="flex justify-center items-center h-screen bg-gray-100 ml-20">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-md">
        <h2 class="text-2xl font-bold mb-4 text-center">QR Code</h2>
        <!-- Display the QR code image -->
        <div class="flex justify-center items-center mb-6">
            <div>
                {!! QrCode::size(300)->generate(route('edit.device', ['device' => $device->id])) !!}
            </div>
        </div>
        <div class="flex justify-between items-center">
            <div class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md text-sm">
                <a href="{{ route('accounting') }}" class="text-white">Back</a>
            </div>
            <a href="{{ route('download.qr', $device->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md text-sm">Download QR Code</a>
        </div>
        <p class="text-gray-600 text-sm text-center mt-4">Scan the QR code to access the content</p>
    </div>
</div>


@include('partials.footer')
