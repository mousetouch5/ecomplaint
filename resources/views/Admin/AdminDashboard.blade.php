<x-app-layout>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white text-gray-800 p-5 shadow-md border-r border-purple-500">
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
                        <label for="complaintsModal" class="flex items-center p-4 hover:bg-purple-100 cursor-pointer">
                            <span class="material-icons mr-2">report_problem</span>
                            See File Complaints
                        </label>
                    </li>
                </ul>

                <!-- Hearing Schedule -->
                <li class="mb-1 border border-purple-700 rounded-lg shadow hover:shadow-lg transition-all duration-200">
                    <a href="{{ route('admin.HearingSchedule.index') }}" class="flex items-center p-4 hover:bg-purple-100">
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

        <!-- Content box -->
        <div class="container mx-auto p-5">
            <h1 class="text-2xl font-bold">Dashboard</h1>
            <h1 class="text-xs font-bold mb-5 text-gray-500">Home/Dashboard</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Number of Complaints -->
                <div class="bg-white p-4 shadow-md rounded-lg border border-purple-500 w-full">
                    <h2 class="text-lg font-semibold">
                        <a href="{{ route('admin.NumberOfComplaints.index') }}" class="hover:text-purple-600 transition duration-300">
                            Number of Complaints Filed <span class="text-gray-500">|This Week</span>
                        </a>
                    </h2>

                    <div class="flex items-center justify-start mt-10">
                        <span class="text-3xl font-bold">{{ $complaintsThisWeek }}</span> <!-- Use the dynamic variable -->
                        <span class="material-icons text-purple-500">description</span>
                    </div>
                </div>





                  <!-- Number of Settled Complaints -->
                  <div class="bg-white p-4 shadow-md rounded-lg border border-purple-500 w-full">
                    <a href="{{ route('admin.SettledComplaints.index') }}" class="hover:text-purple-600 transition duration-300">
                    <h2 class="text-lg font-semibold">Number of Settles Complaints <span class="text-gray-500"> |This Week</span></h2>
                    </a>
                    <div class="flex items-center justify-start mt-10">
                        <span class="text-3xl font-bold">{{ $pendingComplaintsThisWeek2 }}</span>
                        <span class="material-icons text-green-500">check_circle</span>
                    </div>
                </div>


                    <!-- Number of Pending Complaints -->
                    <div class="bg-white p-4 shadow-md rounded-lg border border-purple-500 w-full h-36">
                        <a href="{{ route('admin.NumberOfPendingComplaints.index') }}" class="hover:text-purple-600 transition duration-300">
                        <h2 class="text-lg font-semibold">Number of Pending Complaints <span class="text-gray-500">|This Week</span></h2>
                        </a>
                        <div class="flex items-center justify-start mt-2">
                        <span class="text-3xl font-bold mr-2">{{ $pendingComplaintsThisWeek }}</span> <!-- Display dynamic count -->
                    <span class="material-icons text-red-500">close</span> <!-- X icon beside the number -->
                        </div>
                </div>


              

           
            </div>
        </div>

        <!-- DaisyUI Modal Structure -->

        
                  <input type="checkbox" id="complaintsModal" class="modal-toggle" />
                        <label for="complaintsModal" class="modal cursor-pointer">
            <label class="modal-box relative" for="">
                <h2 class="text-xl font-bold mb-4">Complaints Overview</h2>
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border px-4 py-2">Complaint ID</th>
                            <th class="border px-4 py-2">Description</th>
                            <th class="border px-4 py-2">Files</th>
                            <th class="border px-4 py-2">Status</th>
                        </tr>
</thead>

@foreach($complaints as $complaint) <!-- Loop through complaints -->
<tr>
    <td class="border px-4 py-2">{{ $complaint->id }}</td>
    <td class="border px-4 py-2">{{ $complaint->complaint }}</td>
    <td class="border px-4 py-2">
        @php
            $uploadedFiles = json_decode($complaint->uploaded_file); // Decode the JSON to an array
        @endphp

        @foreach($uploadedFiles as $file)
            @if(str_contains($file, '.mp4'))
                <!-- Video -->
                <video class="w-48 h-32 rounded-lg" controls>
                    <source src="{{ asset($file) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @else
                <!-- Image -->
                <img src="{{ asset($file) }}" class="w-48 h-32 rounded-lg" alt="Uploaded image">
            @endif
        @endforeach
    </td>
    <td class="border px-4 py-2">{{ ucfirst($complaint->status) }}</td><!-- Capitalize the first letter of the status -->
</tr>
@endforeach
@if($complaints->isEmpty())
<tr>
    <td colspan="3" class="border px-4 py-2 text-center">No complaints found</td>
</tr>
@endif










                    <!--

                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">1</td>
                            <td class="border px-4 py-2">Complaint about noise</td>
                            <td class="border px-4 py-2">Pending</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">2</td>
                            <td class="border px-4 py-2">Complaint about stray dogs</td>
                            <td class="border px-4 py-2">Settled</td>
                        </tr>
                       
                    </tbody>

                -->
                </table>
                <div class="modal-action">
                    <label for="complaintsModal" class="btn bg-purple-500 text-white">Close</label>
                </div>
            </label>
        </label>

    </div>

    <!-- Load Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</x-app-layout>
