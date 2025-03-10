@section('page_title', 'Student Details')
@section('page_header_title', 'Student Fees')

@section('raw_css_links')
@endsection

@section('js_links')
    {{-- @vite(['resources/js/view/student_list/index.js']) --}}
@endsection

@section('dialogs')

@endsection

<x-layout>
    <div class="flex justify-center items-center flex-col">
        <x-ui.error_handler.basic />
        <div class="flex space-x-2 justify-between items-center flex-wrap-reverse gap-2 w-full pb-2">
            <div class=" text-gray-800 text-lg pl-2 font-medium">
                {{ $student['first_name'] . ' ' . ($student['middle_name'] != null ? $student['middle_name'] . ' ' : '') . $student['last_name'] }}
                <span class="text-violet-800"> | {{ $payment['fee']['category']['category_name'] }}</span>
            </div>
            <div class="flex space-x-2 justify-end">
                <a href="javascript:history.back()"
                    class="flex text-sm items-center gap-2 px-2 py-1 border rounded-lg shadow-md text-gray-700 hover:bg-gray-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M15 18l-6-6 6-6"></path>
                    </svg>
                    Back
                </a>

                <div class="edit-student cursor-pointer flex text-sm items-center gap-2 px-2 py-1 bg-orange-500 text-white rounded-lg shadow-md hover:bg-orange-600 transition"
                    data-student="{{ json_encode($student) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M12 20h9"></path>
                        <path d="M16.5 3.5a2.121 2.121 0 113 3L7 19H3v-4L16.5 3.5z"></path>
                    </svg>
                    Edit
                </div>

                <div class=" delete-student flex text-sm items-center gap-2 px-2 py-1 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-700 transition cursor-pointer"
                    data-student="{{ json_encode($student) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6l-1 14H6L5 6"></path>
                        <path d="M10 11v6"></path>
                        <path d="M14 11v6"></path>
                        <path d="M9 6V4h6v2"></path>
                    </svg>
                    Delete
                </div>

                <button
                    class="bg-purple-700 hover:bg-purple-800 text-white px-2 py-1 rounded shadow-md flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M19 7H5V3h14v4zM6 8h12a2 2 0 0 1 2 2v6h-4v4H6v-4H2v-6a2 2 0 0 1 2-2zm2 9v2h8v-2H8zm8-6h2v4h-2v-4zm-4 0h2v4h-2v-4zm-4 0h2v4H8v-4z" />
                    </svg>
                    Print
                </button>
            </div>
        </div>

        <hr>

        <div class="w-full bg-gray-50 flex items-center justify-center p-5">
            <div class="w-[350px] mx-auto p-6 bg-white shadow-lg rounded-lg border border-gray-300 ">
                <!-- Header -->
                <div class="text-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Payment Receipt</h2>
                    <p class="text-sm text-gray-500">Receipt No: #{{ $payment->id }}</p>
                </div>

                <!-- Dashed Line -->
                <div class="border-t-2 border-dashed border-gray-300 my-4"></div>

                <!-- Payment Details -->
                <div class="text-gray-700 space-y-3">
                    <div class="flex justify-between">
                        <span class="font-semibold">Amount Paid:</span>
                        <span class="text-green-700 font-bold">₱{{ number_format($payment->amount_paid, 2) }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-semibold">Payment Method:</span>
                        <span class="capitalize">{{ $payment->payment_method }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-semibold">Received By:</span>
                        <span>{{ $payment->receivedBy->user_name }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-semibold">Fees Linked:</span>
                        <span>#{{ $payment->fees_id }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-semibold">Submission ID:</span>
                        <span>#{{ $payment->payment_submission_id }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-semibold">Date Paid:</span>
                        <span>{{ $payment->created_at->format('D, d M Y') }}</span>
                    </div>
                </div>

                <!-- Dashed Line -->
                <div class="border-t-2 border-dashed border-gray-300 my-4"></div>

                <!-- Footer -->
                <div class="text-center text-gray-600 text-sm">
                    <p class="italic">Thank you for your payment!</p>
                </div>
            </div>

        </div>

    </div>
</x-layout>
