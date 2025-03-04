<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-700">
    <?php include 'nav.php'; ?>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-gray-800 rounded-xl shadow-2xl mb-4 sm:mb-6 lg:mb-8 p-4 sm:p-6 border border-gray-700">
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-100 mb-4">Payment</h2>
            <form action="process_payment.php" method="POST" class="space-y-4">
                <div>
                    <label for="payment_method" class="block text-sm font-medium text-gray-300">Payment Method</label>
                    <select id="payment_method" name="payment_method" class="mt-1 block w-full bg-gray-600 text-gray-100 border border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <option value="credit_card">Credit Card</option>
                        <option value="bank">Bank</option>
                        <option value="digital_wallet">Digital Wallet</option>
                    </select>
                </div>
                <div id="credit_card_fields" class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300">Name on Card</label>
                        <input type="text" id="name" name="name" class="mt-1 block w-full bg-gray-600 text-gray-100 border border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="card_number" class="block text-sm font-medium text-gray-300">Card Number</label>
                        <input type="text" id="card_number" name="card_number" class="mt-1 block w-full bg-gray-600 text-gray-100 border border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex-1">
                            <label for="expiry_date" class="block text-sm font-medium text-gray-300">Expiry Date</label>
                            <input type="text" id="expiry_date" name="expiry_date" class="mt-1 block w-full bg-gray-600 text-gray-100 border border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="MM/YY">
                        </div>
                        <div class="flex-1">
                            <label for="cvv" class="block text-sm font-medium text-gray-300">CVV</label>
                            <input type="text" id="cvv" name="cvv" class="mt-1 block w-full bg-gray-600 text-gray-100 border border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                </div>
                <div id="bank_fields" class="space-y-4 hidden">
                    <div>
                        <label for="bank_name" class="block text-sm font-medium text-gray-300">Bank Name</label>
                        <input type="text" id="bank_name" name="bank_name" class="mt-1 block w-full bg-gray-600 text-gray-100 border border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="account_number" class="block text-sm font-medium text-gray-300">Account Number</label>
                        <input type="text" id="account_number" name="account_number" class="mt-1 block w-full bg-gray-600 text-gray-100 border border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>
                <div id="digital_wallet_fields" class="space-y-4 hidden">
                    <div>
                        <label for="wallet_name" class="block text-sm font-medium text-gray-300">Digital Wallet Name</label>
                        <input type="text" id="wallet_name" name="wallet_name" class="mt-1 block w-full bg-gray-600 text-gray-100 border border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="wallet_number" class="block text-sm font-medium text-gray-300">Wallet Number</label>
                        <input type="text" id="wallet_number" name="wallet_number" class="mt-1 block w-full bg-gray-600 text-gray-100 border border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-300">Amount</label>
                    <input type="text" id="amount" name="amount" class="mt-1 block w-full bg-gray-600 text-gray-100 border border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Add</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('payment_method').addEventListener('change', function() {
            var creditCardFields = document.getElementById('credit_card_fields');
            var bankFields = document.getElementById('bank_fields');
            var digitalWalletFields = document.getElementById('digital_wallet_fields');
            
            creditCardFields.classList.add('hidden');
            bankFields.classList.add('hidden');
            digitalWalletFields.classList.add('hidden');
            
            if (this.value === 'credit_card') {
                creditCardFields.classList.remove('hidden');
            } else if (this.value === 'bank') {
                bankFields.classList.remove('hidden');
            } else if (this.value === 'digital_wallet') {
                digitalWalletFields.classList.remove('hidden');
            }
        });
    </script>
</body>
</html>