<!-- resources/views/components/feedback-modal.blade.php -->
<input type="checkbox" id="feedbackModal" class="modal-toggle" />
<div class="modal" role="dialog">
    <div class="modal-box">
        <h2 class="text-xl font-semibold mb-4">Submit Feedback</h2>
        <form method="POST" action="{{ route('feedback.store') }}">
            @csrf
            <!-- Name Input -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-purple-500"
                    required>
            </div>

            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email <span
                        class="text-gray-500">(optional)</span></label>
                <input type="email" name="email" id="email" placeholder="Optional"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-purple-500">
            </div>

            <!-- Complaint Input -->
            <div class="mb-4">
                <label for="complaint" class="block text-gray-700">Your Complaint</label>
                <textarea name="complaint" id="complaint" rows="4"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-purple-500" required></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-right">
                <label for="feedbackModal" class="btn bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</label>
                <button type="submit" class="btn bg-purple-600 text-white px-4 py-2 rounded">Submit</button>
            </div>
        </form>
    </div>
</div>
