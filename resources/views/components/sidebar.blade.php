<!-- resources/views/components/sidebar.blade.php -->
<div class="w-64 bg-white text-gray-800 p-5 shadow-md border-r border-purple-500">
    <ul>
        <!-- Dashboard -->
        <li class="mb-4 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
            <a href="{{ route('dashboard') }}" class="flex items-center p-4 hover:bg-purple-100">
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
            <a href="javascript:void(0)" class="flex items-center p-4 hover:bg-purple-100"
                onclick="openScheduleModal()">
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

        <!-- Feedback Form -->
        <li class="mb-4 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
            <label for="feedbackModal" class="flex items-center p-4 hover:bg-purple-100 cursor-pointer">
                <span class="material-icons mr-2">feedback</span>
                Feedback Form
            </label>
        </li>

        <!-- Logout -->
        <li class="border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
            <a href="{{ route('logout') }}" class="flex items-center p-4 hover:bg-purple-100">
                <span class="material-icons mr-2">logout</span>
                Logout Account
            </a>
        </li>
    </ul>
</div>
