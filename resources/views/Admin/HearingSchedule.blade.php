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
        <!-- Hearing Schedule -->
        <div class="flex-1 p-6">
            <h1 class="text-3xl font-bold text-purple-600 mb-6">Hearing Schedule</h1>
        
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-purple-600 text-white">
                            <th class="py-3 px-4 text-left border-b">Date</th>
                            <th class="py-3 px-4 text-left border-b">Available Time</th>
                            <th class="py-3 px-4 text-left border-b">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b">2024-10-15</td>
                            <td class="py-2 px-4 border-b">10:00 AM - 11:00 AM</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-purple-700 hover:bg-blue-600 text-white py-1 px-3 rounded-md">
                                     Edit
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">2024-10-16</td>
                            <td class="py-2 px-4 border-b">02:00 PM - 03:00 PM</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-purple-700 hover:bg-blue-600 text-white py-1 px-3 rounded-md">
                                    Edit
                               </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">2024-10-17</td>
                            <td class="py-2 px-4 border-b">09:00 AM - 10:00 AM</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-purple-700 hover:bg-blue-600 text-white py-1 px-3 rounded-md">
                                    Edit
                               </button>
                            </td>
                        </tr>
                        <!-- More rows can be added here -->
                        <tr>
                            <td colspan="3" class="py-2 px-4 text-center border-b">No more hearing schedules available.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Load Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        
      
        

</x-app-layout>
