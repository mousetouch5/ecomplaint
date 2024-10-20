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
                    <form method="GET" action="{{ route('admin.SettledComplaints.index') }}"
                        class="flex items-center border border-gray-300 rounded-lg">
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="px-4 py-2 w-full border-0 focus:outline-none" placeholder="Search complaints...">
                        <button type="submit"
                            class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-r-lg">
                            <i class="material-icons align-middle">search</i>
                        </button>
                    </form>

                    <!-- Filter by Year Button -->
                    <div>
                        <form method="GET" action="{{ route('admin.SettledComplaints.index') }}">
                            <select name="year" onchange="this.form.submit()"
                                class="bg-purple-600 hover:bg-purple-600 text-white px-4 py-2 rounded-lg">
                                <option value="">Filter by Year</option>
                                @foreach (range(date('Y'), date('Y') - 10) as $year)
                                    <option value="{{ $year }}"
                                        {{ request('year') == $year ? 'selected' : '' }}>
                                        {{ $year }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
            </div>


            <div class="space-y-4">
                <div class="bg-white border border-purple-300 shadow-lg rounded-lg overflow-hidden">
                    <div class="space-y-4">
                        @forelse($settledComplaints as $complaint)
                            <div class="bg-white border border-purple-300 shadow-lg rounded-lg overflow-hidden">
                                <div class="p-4">
                                    <h2 class="text-lg font-semibold text-purple-700">File ID: {{ $complaint->id }}</h2>
                                    <p class="text-gray-700"><strong>Complainant:</strong> {{ $complaint->first_name }}
                                        {{ $complaint->last_name }}</p>
                                    <p class="text-gray-600"><strong>Settled:</strong>
                                        {{ $complaint->settled_at->diffForHumans() }}</p>
                                </div>
                                <div class="bg-green-100 p-2 rounded-b-lg text-center">
                                    <span class="text-green-600 font-bold"><i
                                            class="material-icons align-middle">check_circle</i> Settled</span>
                                </div>
                            </div>
                        @empty
                            <p>No settled complaints found.</p>
                        @endforelse
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
