@include('partials.header')
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full sm:w-96">
        <h2 class="text-2xl font-semibold mb-4">Login</h2>
        <form action="/login/process" method="POST">
        @csrf
        @error('email')
            <p class="text-red-500 text-xs mt-2 p-1">{{$message}}</p> 
        @enderror
            <div class="mb-4">
                <label for="email" class="block text-gray-600">Email</label>
                <input type="email" required id="email" name="email" class="w-full border rounded-md px-4 py-2 mt-1 focus:outline-none focus:border-blue-500">
            </div>
            
            <div class="mb-6">
                <label for="password" required class="block text-gray-600">Password</label>
                <input type="password" id="password" name="password" class="w-full border rounded-md px-4 py-2 mt-1 focus:outline-none focus:border-blue-500">
            </div>
            <input type="checkbox" onclick="myFunction()" class=" mb-5">   Show Password
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-200">Login</button>
        </form>
    </div>
@include('partials.footer')

<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@include('partials.footer')