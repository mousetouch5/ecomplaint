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
                    <a href="javascript:void(0)" class="flex items-center p-4 hover:bg-purple-100" onclick="document.getElementById('complaint-modal').classList.add('modal-open')">
                        <span class="material-icons mr-2">report_problem</span>
                        File Complaint
                    </a>
                </li>

                <!-- Choose Hearing Schedule -->
                <li class="mb-4 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="" class="flex items-center p-4 hover:bg-purple-100">
                        <span class="material-icons mr-2">event_note</span>
                        Choose Hearing Schedule
                    </a>
                </li>

                <!-- Profile -->
                <li class="mb-4 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="" class="flex items-center p-4 hover:bg-purple-100">
                        <span class="material-icons mr-2">person</span>
                        Profile
                    </a>
                </li>

                <!-- Feedback Form -->
                <li class="mb-4 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="" class="flex items-center p-4 hover:bg-purple-100">
                        <span class="material-icons mr-2">feedback</span>
                        Feedback Form
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

        <!-- 1st complainant info File Modal -->
        <div class="modal" id="complaint-modal">
            <div class="modal-box border-2 border-purple-700">
                <h3 class="font-bold text-lg mb-4 text-purple-700 text-center">Complainant Information</h3>
                <form id="complaint-info-form" onsubmit="openComplaintDetailModal(event)" action="{{route('complaint.store')}}"
                method="POST" enctype="multipart/form-data"
                >
                    @csrf <!-- security purposes -->
                    <!-- Input fields -->
                    <div class="mb-4">
                        <label class="block mb-1 text-purple-700">First Name</label>
                        <input type="text" name="first_name" placeholder="Enter First Name" class="input input-bordered w-full border-purple-700" />
                    </div>
                
                    <div class="mb-4">
                        <label class="block mb-1 text-purple-700">Middle Name</label>
                        <input type="text" name="middle_name" placeholder="Enter Middle Name" class="input input-bordered w-full border-purple-700" />
                    </div>
                
                    <div class="mb-4">
                        <label class="block mb-1 text-purple-700">Last Name</label>
                        <input type="text" name="last_name" placeholder="Enter Last Name" class="input input-bordered w-full border-purple-700" />
                    </div>
                
                    <div class="mb-4">
                        <label class="block mb-1 text-purple-700">Complete Address</label>
                        <input type="text" name="address" placeholder="Enter Address" class="input input-bordered w-full border-purple-700" />
                    </div>
                
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block mb-1 text-purple-700">Age</label>
                            <input type="number" name="age" placeholder="Enter Age" class="input input-bordered w-full border-purple-700" />
                        </div>
                        <div>
                            <label class="block mb-1 text-purple-700">Sex</label>
                            <select class="select select-bordered w-full border-purple-700" name="sex">
                                <option value="" disabled selected>Select Sex</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="mb-4">
                        <label class="block mb-1 text-purple-700">Civil Status</label>
                        <select class="select select-bordered w-full border-purple-700" name="civil_status">
                            <option value="" disabled selected>Select Civil Status</option>
                            <option>Single</option>
                            <option>Married</option>
                            <option>Divorced</option>
                            <option>Widowed</option>
                        </select>
                    </div>
                
                    <!-- Modal action buttons -->
                    <div class="modal-action flex flex-col space-y-2">
                        <button type="button" onclick="openComplaintDetailModal()" class="btn btn-purple-700 text-white bg-purple-700 hover:bg-purple-800 w-full">Submit</button>
                        <a href="javascript:void(0)" class="btn btn-outline border-purple-700 text-purple-700 hover:bg-purple-100 w-full" onclick="closeComplaintModal()">Close</a> <!-- Close button -->
                    </div>
                </form>

                <!-- 2nd modal boss Complaint Detail Modal -->
                <div class="modal" id="complaint-detail-modal" style="display: none;">
                    <div class="modal-box border-2 border-purple-700">
                        <h3 class="font-bold text-lg mb-4 text-purple-700 text-center">Submit Your Complaint</h3>
                        <form id="complaint-detail-form" onsubmit="submitComplaint(event)">
                            <div class="mb-4">
                                <label class="block mb-1 text-purple-700">Your Complaint</label>
                                <textarea placeholder="Write your complaint here..." name="complaint" class="textarea textarea-bordered w-full border-purple-700 h-32" required></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="block mb-1 text-purple-700">Upload Files (Images/Videos/Music)</label>
                                <input type="file" class="file-input file-input-bordered w-full border-purple-700" name="files[]" multiple required />
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
                    function closeComplaintModal() {
                        document.getElementById('complaint-modal').classList.remove('modal-open');
                    }

                    function openComplaintDetailModal() {
                        document.getElementById('complaint-modal').classList.remove('modal-open');
                        document.getElementById('complaint-detail-modal').style.display = 'block';
                    }

                    function closeComplaintDetailModal() {
                        document.getElementById('complaint-detail-modal').style.display = 'none';
                    }
                </script>
    </div>
</x-app-layout>
