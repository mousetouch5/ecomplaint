<x-app-layout>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white text-gray-800 p-3 shadow-md border-r border-purple-500">
            <ul>
                <!-- Dashboard -->
                <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="{{ route('admin.adminDashboard.index') }}" class="flex items-center p-4 hover:bg-purple-100">
                        <span class="material-icons mr-2">dashboard</span>
                        Dashboard
                    </a>
                </li>

                <ul>
                    <!-- File Complaints (with modal trigger) -->
                    <li
                        class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                        <label for="complaintsModal" class="flex items-center p-3 hover:bg-purple-100 cursor-pointer">
                            <span class="material-icons mr-2">report_problem</span>
                            See File Complaints
                        </label>
                    </li>
                </ul>

                <!-- Hearing Schedule -->
                <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="{{ route('admin.HearingSchedule.index') }}"
                        class="flex items-center p-3 hover:bg-purple-100">
                        <span class="material-icons mr-2">event_note</span>
                        Hearing Schedule
                    </a>
                </li>

                <!-- Analytics -->
                <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="{{ route('admin.Analytics.index') }}" class="flex items-center p-3 hover:bg-purple-100">
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
                    <a href="profile.show" class="flex items-center p-3 hover:bg-purple-100">
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
        <!-- Hearing Schedule -->






























        <div class="flex-1 p-6">
            <h1 class="text-3xl font-bold text-purple-600 mb-6">Hearing Schedule</h1>
            <!--
            <div class="flex justify-between items-center mb-6">
          
                <div class="flex space-x-4">
                 
                    <div class="flex items-center border border-gray-300 rounded-lg">
                        <input type="text" class="px-4 py-2 w-full border-0 focus:outline-none"
                            placeholder="Search hearing Schedules...">
                        <button class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-r-lg">
                            <i class="material-icons align-middle">search</i>
                        </button>
                    </div>

                
                    <div>
                        <button class="bg-purple-600 hover:bg-purple-600 text-white px-4 py-2 rounded-lg">
                            <i class="material-icons align-middle">filter_list</i> Filter by Year
                        </button>
                    </div>
                </div>
            </div>


                -->


            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-purple-600 text-white">
                            <th class="py-3 px-4 text-left border-b">Date</th>
                            <th class="py-3 px-4 text-left border-b">Available Time</th>
                            <th class="py-3 px-4 text-left border-b">Name</th>
                            <th class="py-3 px-4 text-left border-b">Updates</th>
                            <th class="py-3 px-4 text-left border-b">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($schedules as $schedule)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $schedule->date }}</td>
                                <td class="py-2 px-4 border-b">
                                    {{ \Carbon\Carbon::parse($schedule->time)->format('h:i A') }}</td>

                                <td class="py-2 px-4 border-b">{{ $schedule->user->name }}</td>
                                <td class="py-2 px-4 border-b">
                                    <label
                                        style="border-radius: 10px; padding: 5px; 
                                background-color: {{ $schedule->status == 'done' ? 'green' : ($schedule->status == 'ongoing' ? 'yellow' : 'transparent') }};
                               color: {{ $schedule->status == 'done' ? 'white' : ($schedule->status == 'ongoing' ? 'black' : 'inherit') }}">
                                        {{ $schedule->updates }}
                                    </label>
                                </td>

                                <td class="py-2 px-4 border-b">
                                    <button for="editScheduleModal"
                                        class="bg-purple-700 hover:bg-blue-600 text-white py-1 px-3 rounded-md"
                                        onclick="openEditModal({{ $schedule->id }}, '{{ $schedule->date }}', '{{ $schedule->time }}')">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-2 px-4 text-center border-b">No more hearing schedules
                                    available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>


        <!-- Edit Modal -->
        <input type="checkbox" id="editScheduleModal" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box relative">
                <h2 class="text-xl font-bold mb-4">Edit Schedule</h2>

                <!-- Form to Edit Schedule -->
                <form id="editScheduleForm" method="POST">
                    @csrf
                    @method('PUT')
                <input type="hidden" id="scheduleId" name="scheduleId">
                    <!-- Date Input -->
                    <div class="mb-4">
                        <label for="editDate" class="block mb-2 font-bold">Select Date:</label>
                        <input type="date" id="editDate" name="date" value="{{ $schedule->date }}"
                            class="border border-gray-300 rounded-lg p-2 w-full" required>
                    </div>

                    <!-- Time Input -->
                    <div class="mb-4">
                        <label for="editTime" class="block mb-2 font-bold">Select Time:</label>
                        <input type="time" id="editTime" name="time" value="{{ $schedule->time }}"
                            class="border border-gray-300 rounded-lg p-2 w-full" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg">
                            Save Changes
                        </button>
                    </div>
                </form>




                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

                <script>
                    $(document).ready(function() {
                        $('#editScheduleForm').on('submit', function(e) {
                            e.preventDefault(); // Prevent the default form submission

                            var scheduleId = "{{ $schedule->id }}"; // Replace with your actual method to get the ID
                            var formData = $(this).serialize(); // Serialize form data

                            console.log(formData); // Log the serialized data for debugging

                            $.ajax({
                                url: '/schedules/' + scheduleId, // The URL for the AJAX request
                                type: 'PUT',
                                data: formData,
                                success: function(response) {
                                    alert('Schedule updated successfully!');
                                    location.reload(); // Reload the page or update the UI as needed
                                },
                                error: function(xhr) {
                                    if (xhr.status === 422) { // Unprocessable Entity
                                        var errors = xhr.responseJSON.errors;
                                        var errorMessage = '';
                                        for (var key in errors) {
                                            if (errors.hasOwnProperty(key)) {
                                                errorMessage += errors[key].join(', ') +
                                                    '\n'; // Collect all error messages
                                            }
                                        }
                                        alert('Error updating schedule:\n' + errorMessage);
                                    } else {
                                        alert('An error occurred: ' + xhr.responseText);
                                    }
                                }
                            });
                        });
                    });
                </script>








                <!-- Close Modal Button -->
                <button onclick="closeEditModal()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">
                    <i class="material-icons">close</i>
                </button>
            </div>
        </div>































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
                        </tr>
                    </thead>

                    @foreach ($complaints as $complaint)
                        <!-- Loop through complaints -->
                        <tr>
                            <td class="border px-4 py-2">{{ $complaint->id }}</td>
                            <td class="border px-4 py-2">{{ $complaint->complaint }}</td>
                            <td class="border px-4 py-2">
                                @php
                                    $uploadedFiles = json_decode($complaint->uploaded_file); // Decode the JSON to an array
                                @endphp

                                @foreach ($uploadedFiles as $file)
                                    @if (str_contains($file, '.mp4'))
                                        <!-- Video -->
                                        <video class="w-48 h-32 rounded-lg" controls>
                                            <source src="{{ asset($file) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @else
                                        <!-- Image -->
                                        <img src="{{ asset($file) }}" class="w-48 h-32 rounded-lg"
                                            alt="Uploaded image">
                                    @endif
                                @endforeach
                            </td>
                            <td class="border px-4 py-2">{{ ucfirst($complaint->status) }}</td>
                            <!-- Capitalize the first letter of the status -->
                        </tr>
                    @endforeach
                    @if ($complaints->isEmpty())
                        <tr>
                            <td colspan="3" class="border px-4 py-2 text-center">No complaints found</td>
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




        <!-- Script to populate and open modal -->
        <script>
            function openEditModal(scheduleId, scheduleDate, scheduleTime) {
                // Open the modal
                document.getElementById('editScheduleModal').checked = true;

                // Populate the form fields with the existing schedule data
                document.getElementById('editDate').value = scheduleDate;
                document.getElementById('editTime').value = scheduleTime;
            }

            function closeEditModal() {
                // Close the modal
                document.getElementById('editScheduleModal').checked = false;
            }
        </script>


</x-app-layout>
