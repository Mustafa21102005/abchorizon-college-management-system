@if (session('error'))
    <div id="error-message" class="mb-4 p-4 bg-red-500 text-white rounded-lg">
        {{ session('error') }}
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        setTimeout(function() {
            $('#error-message').fadeOut();
        }, 5000);
    </script>
@endif
