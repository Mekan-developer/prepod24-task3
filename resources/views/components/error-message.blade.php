<div>
    @if(session('error'))
        <div id="myDiv" class="fixed top-0 left-0  w-full h-auto p-4 mb-4 text-white-800 rounded-lg bg-red-600">
            <div class="flex flex-row">
                <div>
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                </div>
                <div class="w-full">{{ session('error') }}</div>
                <button type="button" onclick="document.getElementById('myDiv').style.display = 'none'" class="ms-auto -mx-1.5 -my-1.5 bg-yellow-200 text-yellow-800 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#error-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        </div>
    @endif

    <script>
        function showDiv() {
            var div = document.getElementById("myDiv");
            div.style.display = "block";  // Show the div
            setTimeout(function() {
                div.style.display = "none";  // Hide the div after 5 seconds
            }, 3000);  // 5000 milliseconds = 3 seconds
        }
        window.onload = showDiv;
    </script>
</div>