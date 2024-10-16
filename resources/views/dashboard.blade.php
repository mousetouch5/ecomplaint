<x-app-layout>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white text-gray-800 p-5 shadow-md border-r border-purple-500">
            <ul>
                <!-- Dashboard -->
                <li class="mb-4 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="" class="flex items-center p-4 hover:bg-purple-100">
                        <span class="material-icons mr-2">dashboard</span>
                        Dashboard
                    </a>
                </li>
                
                <!-- File Complaint (with modal trigger) -->
                <li class="mb-4 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="javascript:void(0)" class="flex items-center p-4 hover:bg-purple-100" onclick="openComplaintModal()">
                        <span class="material-icons mr-2">report_problem</span>
                        File Complaint
                    </a>
                </li>

                  <!-- Choose Hearing Schedule (with modal trigger) -->
                  <li class="mb-4 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="javascript:void(0)" class="flex items-center p-4 hover:bg-purple-100" onclick="openScheduleModal()">
                        <span class="material-icons mr-2">schedule</span>
                        Choose Hearing Schedule
                    </a>
                </li>

                 <!-- Profile -->
                 <li class="mb-4 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="{{ route('profile.show') }}" class="flex items-center p-4 hover:bg-purple-100">
                        <span class="material-icons mr-2">person</span>
                        Profile
                    </a>
                </li>

              <!-- Trigger the Feedback Form Modal in Sidebar -->
            <li class="mb-4 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                <label for="feedbackModal" class="flex items-center p-4 hover:bg-purple-100 cursor-pointer">
                    <span class="material-icons mr-2">feedback</span>
                    Feedback Form
                </label>
            </li>

                <!-- Other Sidebar Links Here... -->
                
                <!-- Logout -->
                <li class="border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="" class="flex items-center p-4 hover:bg-purple-100">
                        <span class="material-icons mr-2">logout</span>
                        Logout Account
                    </a>
                </li>
            </ul>
        </div>

                <!-- The checkbox to control the modal visibility -->
                <input type="checkbox" id="feedbackModal" class="modal-toggle" />
                <div class="modal" role="dialog">
                    <div class="modal-box">
                        <h2 class="text-xl font-semibold mb-4">Submit Feedback</h2>
                        <form>
                            <!-- Name Input -->
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700">Name</label>
                                <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-purple-500" required>
                            </div>

                            <!-- Email Input -->
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700">Email</label>
                                <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-purple-500" required>
                            </div>

                            <!-- Complaint Input -->
                            <div class="mb-4">
                                <label for="complaint" class="block text-gray-700">Your Complaint</label>
                                <textarea name="complaint" id="complaint" rows="4" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-purple-500" required></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-right">
                                <label for="feedbackModal" class="btn bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</label>
                                <button type="submit" class="btn bg-purple-600 text-white px-4 py-2 rounded">Submit</button>
                            </div>
                        </form>
                                </div>
                </div>

                <!--- end feedback modal boss -->
















<!-- Modal for Hearing Schedule --><div id="scheduleModal" class="fixed z-10 inset-0 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4">Choose Hearing Schedule</h2>

            @if($userSchedules->isNotEmpty())
                <div class="mb-4 p-2 bg-blue-100 rounded-lg">
                    <h3 class="text-lg font-semibold mb-2">Already Scheduled:</h3>
                    <ul>
                        @foreach($userSchedules as $userSchedule)
                            <li>
                                Date: {{ \Carbon\Carbon::parse($userSchedule->date)->format('F j, Y') }} | 
                                Time: {{ \Carbon\Carbon::parse($userSchedule->time)->format('h:i A') }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div class="mb-4 p-2 bg-gray-100 rounded-lg">
                    <h3 class="text-lg font-semibold mb-2">You have no scheduled appointments.</h3>
                </div>
            @endif

            <!-- Schedule Form -->
            <form action="{{ route('schedules.store') }}" method="POST">
                @csrf
                <label class="block mb-2">Select Available Date:</label>
                <input type="date" name="date" class="border border-gray-300 rounded-lg p-2 w-full mb-4" required>

                <label class="block mb-2">Select Available Time:</label>
                <input type="time" name="time" class="border border-gray-300 rounded-lg p-2 w-full mb-4" required>

                <!-- Submit Button -->
                <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-lg w-full hover:bg-purple-700">
                    Confirm Schedule
                </button>
            </form>

            <!-- Close Modal Button -->
            <button onclick="closeScheduleModal()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">
                <i class="material-icons">close</i>
            </button>
        </div>
    </div>
</div>
<!-- End Hearing Modal -->

<!-- Success Notification -->
@if(session('success'))
    <div class="fixed top-4 right-4 bg-green-500 text-white p-4 rounded-lg shadow-lg">
        {{ session('success') }}
        <button onclick="this.parentElement.remove()" class="text-xl ml-4">&times;</button>
    </div>
@endif

@if(session('error'))
    <div class="fixed top-4 right-4 bg-red-500 text-white p-4 rounded-lg shadow-lg">
        <strong>Error:</strong> {{ session('error') }}
        <button onclick="this.parentElement.remove()" class="text-xl ml-4">&times;</button>
    </div>
@endif












        
        <!-- Complaint Info Modal -->
        <div class="modal" id="complaint-modal">
            <div class="modal-box border-2 border-purple-700">
                <h3 class="font-bold text-lg mb-4 text-purple-700 text-center">Complainant Information</h3>
                <form id="complaint-info-form" onsubmit="event.preventDefault(); openComplaintDetailModal();" method="POST">
                    @csrf
                    <!-- Input fields -->
                    <div class="mb-4">
                        <label class="block mb-1 text-purple-700">First Name</label>
                        <input type="text" placeholder="Enter First Name" name="first_name" class="input input-bordered w-full border-purple-700" required />
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 text-purple-700">Middle Name</label>
                        <input type="text" placeholder="Enter Middle Name" name="middle_name" class="input input-bordered w-full border-purple-700" required />
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 text-purple-700">Last Name</label>
                        <input type="text" placeholder="Enter Last Name" name="last_name" class="input input-bordered w-full border-purple-700" required />
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 text-purple-700">Complete Address</label>
                        <input type="text" placeholder="Enter Address" name="address" class="input input-bordered w-full border-purple-700" required />
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block mb-1 text-purple-700">Age</label>
                            <input type="number" name="age" placeholder="Enter Age" class="input input-bordered w-full border-purple-700" required />
                        </div>
                        <div>
                            <label class="block mb-1 text-purple-700">Sex</label>
                            <select class="select select-bordered w-full border-purple-700" name="sex" required>
                                <option value="" disabled selected>Select Sex</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 text-purple-700">Civil Status</label>
                        <select class="select select-bordered w-full border-purple-700" name="civil_status" required>
                            <option value="" disabled selected>Select Civil Status</option>
                            <option>Single</option>
                            <option>Married</option>
                            <option>Divorced</option>
                            <option>Widowed</option>
                        </select>
                    </div>
                    <div class="modal-action flex flex-col space-y-2">
                        <button type="submit" class="btn btn-purple-700 text-white bg-purple-700 hover:bg-purple-800 w-full ml-2">Next</button>
                        <a href="javascript:void(0)" class="btn btn-outline border-purple-700 text-purple-700 hover:bg-purple-100 w-full" onclick="closeComplaintModal()">Close</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Complaint Detail Modal -->
        <div class="modal modal-open" id="complaint-detail-modal" style="display: none;">
            <div class="modal-box border-2 border-purple-700">
                <h3 class="font-bold text-lg mb-4 text-purple-700 text-center">Submit Your Complaint</h3>
                <form id="complaint-detail-form" onsubmit="submitComplaint(event)" action="{{ route('complaints.store') }}" method="POST" enctype="multipart/form-data">
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
                        <textarea placeholder="Write your complaint here..." name="complaint" class="textarea textarea-bordered w-full border-purple-700 h-32" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 text-purple-700">Upload Files (Images/Videos/Music)</label>
                        <input type="file" class="file-input file-input-bordered w-full border-purple-700" name="files[]" multiple />
                    </div>
                    <div class="modal-action flex flex-col space-y-2">
                        <button type="submit" class="btn btn-purple-700 text-white bg-purple-700 hover:bg-purple-800 w-full">Submit Complaint</button>
                        <a href="javascript:void(0)" class="btn btn-outline border-purple-700 text-purple-700 hover:bg-purple-100 w-full" onclick="closeComplaintDetailModal()">Close</a>
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
                                function openScheduleModal() {
                                    document.getElementById('scheduleModal').classList.remove('hidden');
                                }

                                function closeScheduleModal() {
                                    document.getElementById('scheduleModal').classList.add('hidden');
                                }
                            </script>
                            
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
    background-color: rgba(0, 0, 0, 0.5); /* Background dimming */
    z-index: 50;
}

</style>
</x-app-layout>
