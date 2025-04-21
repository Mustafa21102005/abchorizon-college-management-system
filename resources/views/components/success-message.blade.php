@if (session('success'))
    <div id="success-message" class="mb-4 p-4 bg-green-500 text-white rounded-lg">
        {{ session('success') }}
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        setTimeout(function() {
            $('#success-message').fadeOut();
        }, 5000);
    </script>
@endif
