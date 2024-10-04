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
                        <button type="submit" class="btn btn-purple-700 text-white bg-purple-700 hover:bg-purple-800 w-full">Next</button>
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
                document.getElementById('complaint-detail-modal').style.display = 'block';
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
    </div>
</x-app-layout>
