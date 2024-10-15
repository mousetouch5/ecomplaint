<x-app-layout>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white text-gray-800 p-3 shadow-md border-r border-purple-500">
            <ul>
                <!-- Dashboard -->
                <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="" class="flex items-center p-4 hover:bg-purple-100">
                        <span class="material-icons mr-2">dashboard</span>
                        Dashboard
                    </a>
                </li>   

                <ul>
                    <!-- File Complaints (with modal trigger) -->
                    <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                        <label for="complaintsModal" class="flex items-center p-3 hover:bg-purple-100 cursor-pointer">
                            <span class="material-icons mr-2">report_problem</span>
                            See File Complaints
                        </label>
                    </li>
                </ul>

                <!-- Hearing Schedule -->
                <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="" class="flex items-center p-3 hover:bg-purple-100">
                        <span class="material-icons mr-2">event_note</span>
                        Hearing Schedule
                    </a>
                </li>

                <!-- Analytics -->
                <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="" class="flex items-center p-3 hover:bg-purple-100">
                        <span class="material-icons mr-2">bar_chart</span>
                        Analytics
                    </a>
                </li>

                <!-- User Feedbacks -->
                <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="" class="flex items-center p-3 hover:bg-purple-100">
                        <span class="material-icons mr-2">feedback</span>
                        User Feedbacks
                    </a>
                </li>

                <!-- Profile -->
                <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="" class="flex items-center p-3 hover:bg-purple-100">
                        <span class="material-icons mr-2">person</span>
                        Profile
                    </a>
                </li>

                <!-- Contact -->
                <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="" class="flex items-center p-3 hover:bg-purple-100">
                        <span class="material-icons mr-2">contact_mail</span>
                        Contact
                    </a>
                </li>

                <!-- Logout -->
                <li class="border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="" class="flex items-center p-3 hover:bg-purple-100">
                        <span class="material-icons mr-2">logout</span>
                        Logout Account
                    </a>
                </li>
            </ul>
        </div>

<div class="flex-grow p-4">
    <!-- Title for Number of Complaints Filed -->
    <h2 class="text-xl font-semibold mb-4 text-purple-700">Number of Complaints Filed</h2>

    <!-- Button Group for Filtering -->
    <div class="mb-4">
        <button id="todayBtn" class="btn btn-primary bg-purple-700 hover:bg-purple-800 text-white mr-2" data-period="today">Today</button>
        <button id="weekBtn" class="btn btn-primary bg-purple-700 hover:bg-purple-800 text-white mr-2" data-period="week">This Week</button>
        <button id="monthBtn" class="btn btn-primary bg-purple-700 hover:bg-purple-800 text-white" data-period="month">This Month</button>
    </div>

    <!-- Container for Complaints -->
    <div id="complaintList" class="mb-4">
        <h1 class="text-violet-700">Select a period to see complaints.</h1> <!-- Default text -->
    </div>
</div>

<!-- JavaScript for handling button clicks -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('button').on('click', function () {
            var period = $(this).data('period');

            $.ajax({
                url: '{{ route("fetch.complaints") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    period: period
                },
                success: function (response) {
                    var complaintList = '';
                    if (response.length > 0) {
                        response.forEach(function (complaint) {
                            // Format the created_at timestamp
                            var formattedDate = formatDateTime(complaint.created_at);

                            complaintList += `
                                <div role="alert" class="alert flex items-center p-4 border border-gray-300 bg-white rounded-md shadow-md mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info h-6 w-6 shrink-0 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <div class="">
                                        <div class="">
                                            <h1 class="mt-2 text-lg font-bold text-purple-700">Complaint File</h1>
                                        </div>
                                        <h1 class="text-violet-700">${complaint.complaint || 'No Description'} (${formattedDate})</h1>
                                    </div>
                                </div>`;
                        });
                    } else {
                        complaintList = '<h1 class="text-violet-700">No complaints found for this period.</h1>';
                    }

                    $('#complaintList').html(complaintList);
                },
                error: function () {
                    $('#complaintList').html('<h1 class="text-violet-700">Error fetching complaints.</h1>');
                }
            });
        });

        function formatDateTime(dateString) {
            const date = new Date(dateString);
            const options = { month: 'numeric', day: 'numeric', year: 'numeric', hour: 'numeric', minute: 'numeric', hour12: true };
            return date.toLocaleString('en-US', options);
        }
    });
</script>










<!--
        <div class="flex-grow p-4">
            
            <h2 class="text-xl font-semibold mb-4 text-purple-700">Number of Complaints Filed</h2> 
        
        
            <div class="mb-4">
                <button class="btn btn-primary bg-purple-700 hover:bg-purple-800 text-white mr-2">Today</button> 
                <button class="btn btn-primary bg-purple-700 hover:bg-purple-800 text-white mr-2">This Week</button>
                <button class="btn btn-primary bg-purple-700 hover:bg-purple-800 text-white">This Month</button> 
            </div>
        
         
            <div role="alert" class="alert flex items-center p-4 border border-gray-300 bg-white rounded-md shadow-md mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info h-6 w-6 shrink-0 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div class="">
                    <div class="">
                        <h1 class="mt-2 text-lg font-bold text-purple-700">Complaint File</h1>
                    </div>
                    <h1 class="text-violet-700">Noisy Complaint</h1>
                </div>
            </div>
        </div>
        
-->
        
        
           
        
        
    <!-- DaisyUI Modal Structure -->
    <input type="checkbox" id="complaintsModal" class="modal-toggle" />
    <label for="complaintsModal" class="modal cursor-pointer">
        <label class="modal-box relative w-3/4 max-w-md" for="">
            <h2 class="text-lg font-bold mb-3">Complaints Overview</h2>
            <table class="min-w-full bg-white border border-gray-300 text-sm">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border px-2 py-1">Complaint ID</th>
                        <th class="border px-2 py-1">Description</th>
                        <th class="border px-2 py-1">Files</th>
                        <th class="border px-2 py-1">Status</th>
                    </tr>
                </thead>

                @foreach($complaints as $complaint)
                <tr>
                    <td class="border px-2 py-1">{{ $complaint->id }}</td>
                    <td class="border px-2 py-1">{{ $complaint->complaint }}</td>
                    <td class="border px-2 py-1">
                        <!-- Sample Video -->
                        <video class="w-32 h-20 rounded-lg" controls>
                            <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </td>
                    <td class="border px-2 py-1">{{ ucfirst($complaint->status) }}</td>
                </tr>
                @endforeach

                @if($complaints->isEmpty())
                <tr>
                    <td colspan="4" class="border px-2 py-1 text-center">No complaints found</td>
                </tr>
                @endif

            </table>
            <div class="modal-action">
                <label for="complaintsModal" class="btn bg-purple-500 text-white">Close</label>
            </div>
        </label>
    </label>

    <!-- Load Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</x-app-layout>
