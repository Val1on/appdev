<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payout Setup - Car Owner</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-700">
    <?php include 'nav.php'; ?>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-100">Payout Setup</h1>
            <p class="mt-2 text-sm sm:text-base lg:text-lg text-gray-400">Set up your payout method to receive earnings</p>
        </div>

        <div class="bg-gray-800 rounded-xl shadow-xl border border-gray-700 p-4 sm:p-6 lg:p-8">
            <form action="#" method="POST" class="space-y-6 sm:space-y-8">
                <div class="space-y-4">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Bank Account Details
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-200 mb-1">Account Holder Name</label>
                            <input type="text" name="account_holder_name" required 
                                class="text-sm sm:text-base block w-full pl-3 pr-3 py-2.5 rounded-lg bg-gray-700 border-2 border-gray-600 text-gray-100 placeholder-gray-400 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-200"
                                placeholder="Enter account holder name">
                        </div>
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-200 mb-1">Bank Name</label>
                            <input type="text" name="bank_name" required 
                                class="text-sm sm:text-base block w-full pl-3 pr-3 py-2.5 rounded-lg bg-gray-700 border-2 border-gray-600 text-gray-100 placeholder-gray-400 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-200"
                                placeholder="Enter bank name">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-200 mb-1">Account Number</label>
                            <input type="text" name="account_number" required 
                                class="text-sm sm:text-base block w-full pl-3 pr-3 py-2.5 rounded-lg bg-gray-700 border-2 border-gray-600 text-gray-100 placeholder-gray-400 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-200"
                                placeholder="Enter account number">
                        </div>
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-200 mb-1">SWIFT Code</label>
                            <input type="text" name="swift_code" required 
                                class="text-sm sm:text-base block w-full pl-3 pr-3 py-2.5 rounded-lg bg-gray-700 border-2 border-gray-600 text-gray-100 placeholder-gray-400 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-200"
                                placeholder="Enter SWIFT code">
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                        </svg>
                        Additional Information
                    </h2>
                    <div class="relative">
                        <label class="block text-sm font-medium text-gray-200 mb-1">Billing Address</label>
                        <input type="text" name="billing_address" required 
                            class="text-sm sm:text-base block w-full pl-3 pr-3 py-2.5 rounded-lg bg-gray-700 border-2 border-gray-600 text-gray-100 placeholder-gray-400 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-200"
                            placeholder="Enter billing address">
                    </div>
                    <div class="relative">
                        <label class="block text-sm font-medium text-gray-200 mb-1">Phone Number</label>
                        <input type="text" name="phone_number" required 
                            class="text-sm sm:text-base block w-full pl-3 pr-3 py-2.5 rounded-lg bg-gray-700 border-2 border-gray-600 text-gray-100 placeholder-gray-400 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-200"
                            placeholder="Enter phone number">
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-700">
                    <button type="button" onclick="window.history.back()" class="px-4 sm:px-6 py-2.5 text-sm font-medium text-gray-400 hover:text-gray-100 transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 sm:px-6 py-2.5 bg-blue-500 text-white text-sm font-medium rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 focus:ring-offset-gray-800 transition-all duration-200 flex items-center">
                        <svg class="text-sm sm:text-base w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Save Payout Details
                    </button>
                </div>
            </form>
        </div>

         
        <div class="mt-8 bg-gray-800 rounded-xl shadow-xl border border-gray-700 p-6">
            <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 mb-4">Saved Payout Details</h2>
            <div class="space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                <p class="text-sm sm:text-base text-gray-400"><strong>Account Holder Name:</strong> John Doe</p>
                <p class="text-sm sm:text-base text-gray-400"><strong>Bank Name:</strong> ABC Bank</p>
                <p class="text-sm sm:text-base text-gray-400"><strong>Account Number:</strong> 1234567890</p>
                <p class="text-sm sm:text-base text-gray-400"><strong>SWIFT Code:</strong> ABCD1234</p>
                <p class="text-sm sm:text-base text-gray-400"><strong>Billing Address:</strong> 123 Main St, City, Country</p>
                <p class="text-sm sm:text-base text-gray-400"><strong>Phone Number:</strong> +1234567890</p>
                </div>
                <div class="flex items-center justify-end space-x-3 sm:mt-0 mb-8">
                    <button id="editVehicleBtn" class="px-3 py-1.5 text-sm font-medium text-gray-400 hover:text-gray-100 transition-colors duration-200 mr-2">
                        Edit
                    </button>
                    <button class="px-3 py-1.5 text-sm font-medium text-red-400 hover:text-red-300 transition-colors duration-200">
                        Delete
                    </button>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>