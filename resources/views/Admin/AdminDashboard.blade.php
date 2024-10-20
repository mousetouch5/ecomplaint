<x-app-layout>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white text-gray-800 p-5 shadow-md border-r border-purple-500">
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
                    <li
                        class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                        <label for="complaintsModal" class="flex items-center p-4 hover:bg-purple-100 cursor-pointer">
                            <span class="material-icons mr-2">report_problem</span>
                            See File Complaints
                        </label>
                    </li>
                </ul>

                <!-- Hearing Schedule -->
                <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="{{ route('admin.HearingSchedule.index') }}"
                        class="flex items-center p-4 hover:bg-purple-100">
                        <span class="material-icons mr-2">event_note</span>
                        Hearing Schedule
                    </a>
                </li>

                <!-- Analytics -->
                <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="{{ route('admin.Analytics.index') }}" class="flex items-center p-4 hover:bg-purple-100">
                        <span class="material-icons mr-2">bar_chart</span>
                        Analytics
                    </a>
                </li>

                <!-- User Feedbacks -->
                <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="{{ route('admin.UserFeedBack.index') }}" class="flex items-center p-4 hover:bg-purple-100">
                        <span class="material-icons mr-2">feedback</span>
                        User Feedbacks
                    </a>
                </li>

                <!-- Profile -->
                <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="" class="flex items-center p-4 hover:bg-purple-100">
                        <span class="material-icons mr-2">person</span>
                        Profile
                    </a>
                </li>

                <!-- Contact -->
                <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="" class="flex items-center p-4 hover:bg-purple-100">
                        <span class="material-icons mr-2">contact_mail</span>
                        Contact
                    </a>
                </li>

                <!-- Logout -->
                <li class="border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="" class="flex items-center p-4 hover:bg-purple-100">
                        <span class="material-icons mr-2">logout</span>
                        Logout Account
                    </a>
                </li>
            </ul>
        </div>

        <!-- Content box -->
        <div class="container mx-auto p-5">
            <h1 class="text-2xl font-bold">Dashboard</h1>
            <h1 class="text-xs font-bold mb-5 text-gray-500">Home/Dashboard</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Number of Complaints -->
                <div class="bg-white p-4 shadow-md rounded-lg border border-purple-500 w-full">
                    <h2 class="text-lg font-semibold">
                        <a href="{{ route('admin.NumberOfComplaints.index') }}"
                            class="hover:text-purple-600 transition duration-300">
                            Number of Complaints Filed <span class="text-gray-500">|This Week</span>
                        </a>
                    </h2>

                    <div class="flex items-center justify-start mt-10">
                        <span class="text-3xl font-bold">{{ $complaintsThisWeek }}</span>
                        <!-- Use the dynamic variable -->
                        <span class="material-icons text-purple-500">description</span>
                    </div>
                </div>





                <!-- Number of Settled Complaints -->
                <div class="bg-white p-4 shadow-md rounded-lg border border-purple-500 w-full">
                    <a href="{{ route('admin.SettledComplaints.index') }}"
                        class="hover:text-purple-600 transition duration-300">
                        <h2 class="text-lg font-semibold">Number of Settles Complaints <span class="text-gray-500">
                                |This Week</span></h2>
                    </a>
                    <div class="flex items-center justify-start mt-10">
                        <span class="text-3xl font-bold">{{ $pendingComplaintsThisWeek2 }}</span>
                        <span class="material-icons text-green-500">check_circle</span>
                    </div>
                </div>


                <!-- Number of Pending Complaints -->
                <div class="bg-white p-4 shadow-md rounded-lg border border-purple-500 w-full h-36">
                    <a href="{{ route('admin.NumberOfPendingComplaints.index') }}"
                        class="hover:text-purple-600 transition duration-300">
                        <h2 class="text-lg font-semibold">Number of Pending Complaints <span class="text-gray-500">|This
                                Week</span></h2>
                    </a>
                    <div class="flex items-center justify-start mt-2">
                        <span class="text-3xl font-bold mr-2">{{ $pendingComplaintsThisWeek }}</span>
                        <!-- Display dynamic count -->
                        <span class="material-icons text-red-500">close</span> <!-- X icon beside the number -->
                    </div>
                </div>





            </div>
        </div>

        <!-- DaisyUI Modal Structure -->


        <input type="checkbox" id="complaintsModal" class="modal-toggle" />
        <label for="complaintsModal" class="modal cursor-pointer">
            <label class="modal-box relative" for="">
                <h2 class="text-xl font-bold mb-4">Complaints Overview</h2>
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border px-4 py-2">Complaint ID</th>
                            <th class="border px-4 py-2">Description</th>
                            <th class="border px-4 py-2">Files</th>
                            <th class="border px-4 py-2">Status</th>
                            <th class="border px-4 py-2">Action</th> <!-- New Action Column -->
                        </tr>
                    </thead>

                    @foreach ($complaints as $complaint)
                        <tr id="complaint-{{ $complaint->id }}"> <!-- Add ID to the row -->
                            <td class="border px-4 py-2">{{ $complaint->id }}</td>
                            <td class="border px-4 py-2">{{ $complaint->complaint }}</td>
                            <td class="border px-4 py-2">
                                @php
                                    $uploadedFiles = json_decode($complaint->uploaded_file); // Decode the JSON to an array
                                @endphp

                                @foreach ($uploadedFiles as $file)
                                    @if (str_contains($file, '.mp4'))
                                        <video class="w-48 h-32 rounded-lg" controls>
                                            <source src="{{ asset($file) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @else
                                        <img src="{{ asset($file) }}" class="w-48 h-32 rounded-lg"
                                            alt="Uploaded image">
                                    @endif
                                @endforeach
                            </td>
                            <td class="border px-4 py-2">{{ ucfirst($complaint->status) }}</td>
                            <td class="border px-4 py-2">
                                <label class="toggle-switch">
                                    <input type="checkbox" class="status-toggle" data-id="{{ $complaint->id }}"
                                        data-status="{{ $complaint->status }}"
                                        {{ $complaint->status === 'fixed' ? 'checked' : '' }}>
                                    <span class="slider"></span>
                                </label>

                            </td>
                        </tr>
                    @endforeach

                    @if ($complaints->isEmpty())
                        <tr>
                            <td colspan="5" class="border px-4 py-2 text-center">No complaints found</td>
                        </tr>
                    @endif
                </table>

                <script>
                    $(document).ready(function() {
                        $(document).on('change', '.status-toggle', function() {
                            var checkbox = $(this);
                            var complaintId = checkbox.data('id');
                            var currentStatus = checkbox.data('status');
                            var newStatus = currentStatus === 'fixed' ? 'not_fixed' : 'fixed'; // Toggle status

                            console.log('Sending request to:', '/complaints/' + complaintId + '/status');

                            $.ajax({
                                url: '/complaints/' + complaintId + '/status',
                                type: 'PUT',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    status: newStatus
                                },
                                success: function(response) {
                                    console.log(response);
                                    // Update the status on the UI
                                    $('#complaint-' + complaintId + ' td:nth-child(4)').text(newStatus ===
                                        'fixed' ? 'Fixed' : 'Not Fixed');
                                    checkbox.data('status', newStatus);
                                },
                                error: function(xhr) {
                                    console.error('Error updating status:', xhr.responseText);
                                    alert('Error updating status: ' + xhr.responseText);
                                }
                            });
                        });
                    });
                </script>

                <div class="modal-action">
                    <label for="complaintsModal" class="btn bg-purple-500 text-white">Close</label>
                </div>
            </label>
        </label>
        <style>
            .toggle-switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 34px;
            }

            .toggle-switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                transition: .4s;
                border-radius: 34px;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 26px;
                width: 26px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                transition: .4s;
                border-radius: 50%;
            }

            input:checked+.slider {
                background-color: #4CAF50;
                /* Change to green when checked */
            }

            input:checked+.slider:before {
                transform: translateX(26px);
            }
        </style>

    </div>

    <!-- Load Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</x-app-layout>
