<x-app-layout>
    <div class="flex h-screen">
        <!-- Sidebar -->

        <!-- In your main layout or specific pages -->
        <x-sidebar />
        <x-feedback-modal />

        <!--- end feedback modal boss -->


        <!-- FullCalendar CSS -->

        <!-- Modal for Hearing Schedule -->
        <div id="scheduleModal" class="fixed z-10 inset-0 hidden overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                    <h2 class="text-xl font-semibold mb-4">Choose Hearing Schedule</h2>

                    <!-- Existing User Scheduled Section -->
                    @if ($userSchedules->isNotEmpty())
                        <div class="mb-4 p-2 bg-blue-100 rounded-lg">
                            <h3 class="text-lg font-semibold mb-2">Already Scheduled:</h3>
                            <ul>
                                @foreach ($userSchedules as $userSchedule)
                                    @if ($userSchedule->updates !== 'done')
                                        <li>
                                            Date: {{ \Carbon\Carbon::parse($userSchedule->date)->format('F j, Y') }} |
                                            Time: {{ \Carbon\Carbon::parse($userSchedule->time)->format('h:i A') }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <div class="mb-4 p-2 bg-gray-100 rounded-lg">
                            <h3 class="text-lg font-semibold mb-2">You have no scheduled appointments.</h3>
                        </div>
                    @endif

                    <!-- Schedule Form -->
                    <form action="{{ route('schedules.store') }}" method="POST" id="scheduleForm">
                        @csrf
                        <label class="block mb-2">Select Available Date:</label>
                        <input type="date" name="date" id="datePicker"
                            class="border border-gray-300 rounded-lg p-2 w-full mb-4" required>

                        <div id="availableSchedules" class="mb-4"></div>
                        <!-- Section to display available schedules -->

                        <label class="block mb-2">Select Available Time:</label>
                        <input type="time" name="time" class="border border-gray-300 rounded-lg p-2 w-full mb-4"
                            required>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="bg-purple-600 text-white px-4 py-2 rounded-lg w-full hover:bg-purple-700">
                            Confirm Schedule
                        </button>
                    </form>

                    <!-- Close Modal Button -->
                    <button onclick="closeScheduleModal()"
                        class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">
                        <i class="material-icons">close</i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Include Flatpickr -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                flatpickr("#datePicker", {
                    dateFormat: "Y-m-d",
                    allowInput: true,
                    onChange: function(selectedDates, dateStr, instance) {
                        fetchAvailableSchedules(dateStr); // Fetch schedules when date is selected
                    }
                });
            });

            function fetchAvailableSchedules(date) {
                fetch(`/schedules/available/${date}`) // Your API endpoint
                    .then(response => response.json())
                    .then(data => {
                        const scheduleDiv = document.getElementById('availableSchedules');
                        scheduleDiv.innerHTML = ''; // Clear previous schedules

                        if (data.length > 0) {
                            let schedulesHTML = '<h3 class="text-lg font-semibold mb-2">Available Schedules:</h3><ul>';
                            data.forEach(schedule => {
                                // Format the date to "Month Day, Year"
                                const scheduleDate = new Date(schedule.date);
                                const options = {
                                    year: 'numeric',
                                    month: 'long',
                                    day: 'numeric'
                                };
                                const formattedDate = scheduleDate.toLocaleDateString('en-US', options);

                                // Format the time to 12-hour format with AM/PM
                                const scheduleTime = new Date(schedule.time);
                                const hours = scheduleTime.getHours();
                                const minutes = scheduleTime.getMinutes();
                                const ampm = hours >= 12 ? 'PM' : 'AM';
                                const formattedTime =
                                    `${hours % 12 || 12}:${minutes.toString().padStart(2, '0')} ${ampm}`;

                                schedulesHTML +=
                                    `<li>Date: ${formattedDate} | Time: ${formattedTime} - <span class="text-green-600">Available</span></li>`;
                            });
                            schedulesHTML += '</ul>';
                            scheduleDiv.innerHTML = schedulesHTML;
                        } else {
                            scheduleDiv.innerHTML = '<p class="text-gray-500">No available schedules for this date.</p>';
                        }
                    })
                    .catch(error => console.error('Error fetching schedules:', error));
            }


            function openScheduleModal() {
                document.getElementById('scheduleModal').classList.remove('hidden');
            }

            function closeScheduleModal() {
                document.getElementById('scheduleModal').classList.add('hidden');
            }
        </script>









        <!-- In your layout or specific pages -->
        <x-complaint-modal />


        <!-- Complaint Detail Modal -->
        <div class="modal modal-open" id="complaint-detail-modal" style="display: none;">
            <div class="modal-box border-2 border-purple-700">
                <h3 class="font-bold text-lg mb-4 text-purple-700 text-center">Submit Your Complaint</h3>
                <form id="complaint-detail-form" onsubmit="submitComplaint(event)"
                    action="{{ route('complaints.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="first_name" id="detail_first_name" />
                    <input type="hidden" name="middle_name" id="detail_middle_name" />
                    <input type="hidden" name="last_name" id="detail_last_name" />
                    <input type="hidden" name="address" id="detail_address" />
                    <input type="hidden" name="age" id="detail_age" />
                    <input type="hidden" name="sex" id="detail_sex" />
                    <input type="hidden" name="civil_status" id="detail_civil_status" />

                    <div class="mb-4">
                        <label class="block mb-1 text-purple-700">Your Complaint</label>
                        <textarea placeholder="Write your complaint here..." name="complaint"
                            class="textarea textarea-bordered w-full border-purple-700 h-32" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 text-purple-700">Upload Files (Images/Videos/Music)</label>
                        <input type="file" class="file-input file-input-bordered w-full border-purple-700"
                            name="files[]" multiple />
                    </div>
                    <div class="modal-action flex flex-col space-y-2">
                        <button type="submit"
                            class="btn btn-purple-700 text-white bg-purple-700 hover:bg-purple-800 w-full">Submit
                            Complaint</button>
                        <a href="javascript:void(0)"
                            class="btn btn-outline border-purple-700 text-purple-700 hover:bg-purple-100 w-full"
                            onclick="closeComplaintDetailModal()">Close</a>
                    </div>
                </form>
            </div>
        </div>



        <!-- JavaScript Functions -->
        <script>
            function openComplaintModal() {
                document.getElementById('complaint-modal').classList.add('modal-open');
            }

            function openComplaintDetailModal() {
                // Get values from the first modal and set them to the second modal
                const form = document.getElementById('complaint-info-form');
                document.getElementById('detail_first_name').value = form.first_name.value;
                document.getElementById('detail_middle_name').value = form.middle_name.value;
                document.getElementById('detail_last_name').value = form.last_name.value;
                document.getElementById('detail_address').value = form.address.value;
                document.getElementById('detail_age').value = form.age.value;
                document.getElementById('detail_sex').value = form.sex.value;
                document.getElementById('detail_civil_status').value = form.civil_status.value;

                document.getElementById('complaint-modal').classList.remove('modal-open');
                document.getElementById('complaint-detail-modal').style.display = 'flex';
            }

            function closeComplaintDetailModal() {
                document.getElementById('complaint-detail-modal').style.display = 'none';
            }

            function closeComplaintModal() {
                document.getElementById('complaint-modal').classList.remove('modal-open');
            }

            function submitComplaint(event) {
                event.preventDefault();
                const form = document.getElementById('complaint-detail-form');
                const formData = new FormData(form);

                // Send the data to the server using fetch or any AJAX method
                fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Handle response data here
                        if (data.success) {
                            alert('Complaint submitted successfully!');
                            closeComplaintDetailModal();
                        } else {
                            alert('Failed to submit complaint: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        </script>
        <!-- JavaScript to Handle Modal -->

        <script>
            function openFeedbackFormModal() {
                document.getElementById('feedbackFormModal').classList.remove('hidden');
            }

            function closeFeedbackFormModal() {
                document.getElementById('feedbackFormModal').classList.add('hidden');
            }

            function submitFeedback() {
                alert("Feedback submitted successfully! ");
                closeFeedbackFormModal();
            }
        </script>

        <!-- JavaScript to auto-remove after time limit -->
        <script>
            // Automatically remove success notification after 5 seconds (5000 milliseconds)
            setTimeout(function() {
                const successNotification = document.getElementById('successNotification');
                if (successNotification) {
                    successNotification.remove();
                }
            }, 5000); // 5 seconds

            // Automatically remove error notification after 5 seconds (5000 milliseconds)
            setTimeout(function() {
                const errorNotification = document.getElementById('errorNotification');
                if (errorNotification) {
                    errorNotification.remove();
                }
            }, 5000); // 5 seconds
        </script>
    </div>
    <style>
        #complaint-detail-modal {
            display: none;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
            /* Background dimming */
            z-index: 50;
        }
    </style>
</x-app-layout>
