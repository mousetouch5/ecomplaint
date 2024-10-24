<!-- resources/views/components/complaint-modal.blade.php -->
<div class="modal" id="complaint-modal">
    <div class="modal-box border-2 border-purple-700">
        <h3 class="font-bold text-lg mb-4 text-purple-700 text-center">Complainant Information</h3>
        <form id="complaint-info-form" onsubmit="event.preventDefault(); openComplaintDetailModal();" method="POST">
            @csrf
            <!-- Input fields -->
            <div class="mb-4">
                <label class="block mb-1 text-purple-700">First Name</label>
                <input type="text" placeholder="Enter First Name" name="first_name"
                    class="input input-bordered w-full border-purple-700" required />
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-purple-700">Middle Name</label>
                <input type="text" placeholder="Enter Middle Name" name="middle_name"
                    class="input input-bordered w-full border-purple-700" required />
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-purple-700">Last Name</label>
                <input type="text" placeholder="Enter Last Name" name="last_name"
                    class="input input-bordered w-full border-purple-700" required />
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-purple-700">Complete Address</label>
                <input type="text" placeholder="Enter Address" name="address"
                    class="input input-bordered w-full border-purple-700" required />
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-1 text-purple-700">Age</label>
                    <input type="number" name="age" placeholder="Enter Age"
                        class="input input-bordered w-full border-purple-700" required />
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
                <button type="submit"
                    class="btn btn-purple-700 text-white bg-purple-700 hover:bg-purple-800 w-full ml-2">Next</button>
                <a href="javascript:void(0)"
                    class="btn btn-outline border-purple-700 text-purple-700 hover:bg-purple-100 w-full"
                    onclick="closeComplaintModal()">Close</a>
            </div>
        </form>
    </div>
</div>
