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
                    <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                        <label for="complaintsModal" class="flex items-center p-3 hover:bg-purple-100 cursor-pointer">
                            <span class="material-icons mr-2">report_problem</span>
                            See File Complaints
                        </label>
                    </li>
                </ul>

                <!-- Hearing Schedule -->
                <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="{{ route('admin.HearingSchedule.index') }}" class="flex items-center p-3 hover:bg-purple-100">
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


                <!-- Settled Complaints Content -->
            <div class="flex-1 p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-bold text-purple-600">Settled Complaints</h1>

                    <!-- Search Bar and Filter -->
                    <div class="flex space-x-4">
                        <!-- Search Bar -->
                        <div class="flex items-center border border-gray-300 rounded-lg">
                            <input type="text" class="px-4 py-2 w-full border-0 focus:outline-none" placeholder="Search complaints...">
                            <button class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-r-lg">
                                <i class="material-icons align-middle">search</i>
                            </button>
                        </div>

                        <!-- Filter by Year Button -->
                        <div>
                            <button class="bg-purple-600 hover:bg-purple-600 text-white px-4 py-2 rounded-lg">
                                <i class="material-icons align-middle">filter_list</i> Filter by Year
                            </button>
                        </div>
                    </div>
                </div>

            <div class="space-y-4">
                <div class="bg-white border border-purple-300 shadow-lg rounded-lg overflow-hidden">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-purple-700">File ID: Complaint_001</h2>
                        <p class="text-gray-700"><strong>Complainant:</strong> User1</p>
                        <p class="text-gray-600"><strong>Settled:</strong> 5 days ago</p>
                    </div>
                    <div class="bg-green-100 p-2 rounded-b-lg text-center">
                        <span class="text-green-600 font-bold"><i class="material-icons align-middle">check_circle</i> Settled</span>
                    </div>
                </div>
        
                <div class="bg-white border border-purple-300 shadow-lg rounded-lg overflow-hidden">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-purple-700">File ID: Complaint_002</h2>
                        <p class="text-gray-700"><strong>Complainant:</strong> User2</p>
                        <p class="text-gray-600"><strong>Settled:</strong> 2 weeks ago</p>
                    </div>
                    <div class="bg-green-100 p-2 rounded-b-lg text-center">
                        <span class="text-green-600 font-bold"><i class="material-icons align-middle">check_circle</i> Settled</span>
                    </div>
                </div>
        
                <div class="bg-white border border-purple-300 shadow-lg rounded-lg overflow-hidden">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-purple-700">File ID: Complaint_003</h2>
                        <p class="text-gray-700"><strong>Complainant:</strong> User3</p>
                        <p class="text-gray-600"><strong>Settled:</strong> 1 month ago</p>
                    </div>
                    <div class="bg-green-100 p-2 rounded-b-lg text-center">
                        <span class="text-green-600 font-bold"><i class="material-icons align-middle">check_circle</i> Settled</span>
                    </div>
                </div>
        
                <!-- Uncomment this block to display a message when there are no complaints -->
                <!--
                <div class="bg-white border border-purple-300 shadow-lg rounded-lg p-4 text-center">
                    <p class="text-gray-600">No settled complaints found.</p>
                </div>
                -->
            </div>
        </div>
        
        <!-- Load Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        

</x-app-layout>
