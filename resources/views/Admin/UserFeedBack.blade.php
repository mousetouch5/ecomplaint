<x-app-layout>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white text-gray-800 p-5 shadow-md border-r border-purple-500">
            <ul>
                <!-- Dashboard -->
                <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="{{ route('admin.adminDashboard.index') }}" class="flex items-center p-4 hover:bg-purple-100">
                        <span class="material-icons mr-2">dashboard</span>
                        Dashboard
                    </a>
                </li>

                <!-- File Complaints -->
                <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <label for="complaintsModal" class="flex items-center p-4 hover:bg-purple-100 cursor-pointer">
                        <span class="material-icons mr-2">report_problem</span>
                        See File Complaints
                    </label>
                </li>

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

        <!-- Main content -->
        <div class="flex-1 p-10">
            <!-- User Feedbacks Section -->
            <h1 class="text-3xl font-bold mb-5">User Feedbacks</h1>
            <div id="user-feedback-section" class="bg-white p-6 rounded-lg shadow-lg">
                <table class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-purple-700 text-white">
                            <th class="px-4 py-2 border">User</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Feedback</th>
                            <th class="px-4 py-2 border">Date Submitted</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $feedback)
                            <tr class="hover:bg-gray-100">
                                <td class="border px-4 py-2">{{ optional($feedback->user)->name ?? 'N/A' }}</td>
                                <td class="border px-4 py-2">
                                    {{ $feedback->email ?? (optional($feedback->user)->email ?? 'N/A') }}
                                </td>
                                <td class="border px-4 py-2">{{ $feedback->complaint }}</td>
                                <td class="border px-4 py-2">{{ $feedback->created_at->format('Y-m-d') }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <button
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Load Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</x-app-layout>
