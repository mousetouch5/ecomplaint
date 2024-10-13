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

        <div class="flex-1 p-6">
            <h1 class="text-3xl font-bold text-purple-600 mb-6">Pending Complaints</h1>
        
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-purple-600 text-white">
                            <th class="py-3 px-4 text-left border-b">File ID</th>
                            <th class="py-3 px-4 text-left border-b">Complainant</th>
                            <th class="py-3 px-4 text-left border-b">Date Submitted</th>
                            <th class="py-3 px-4 text-left border-b">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b">Complaint_004</td>
                            <td class="py-2 px-4 border-b">User4</td>
                            <td class="py-2 px-4 border-b">2024-09-30</td>
                            <td class="py-2 px-4 border-b text-yellow-600">Pending</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">Complaint_005</td>
                            <td class="py-2 px-4 border-b">User5</td>
                            <td class="py-2 px-4 border-b">2024-10-01</td>
                            <td class="py-2 px-4 border-b text-yellow-600">Pending</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">Complaint_006</td>
                            <td class="py-2 px-4 border-b">User6</td>
                            <td class="py-2 px-4 border-b">2024-10-02</td>
                            <td class="py-2 px-4 border-b text-yellow-600">Pending</td>
                        </tr>
                        <!-- More rows can be added here -->
                        <tr>
                            <td colspan="4" class="py-2 px-4 text-center border-b">No more pending complaints.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Load Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
   
        

</x-app-layout>
