<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earnings - Car Owner</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-700">
    <?php include 'nav.php'; ?>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-100">Earnings</h1>
            <p class="mt-2 text-sm sm:text-base lg:text-lg text-gray-400">Overview of your earnings</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-800 rounded-xl shadow-xl border border-gray-700 p-6">
                <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 mb-4">Total Earnings</h2>
                <p class="text-3xl sm:text-4xl lg:text-5xl font-bold text-green-400">₱15,000.00</p>
            </div>

            <div class="bg-gray-800 rounded-xl shadow-xl border border-gray-700 p-6">
                <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 mb-4">Trips Completed</h2>
                <p class="text-3xl sm:text-4xl lg:text-5xl font-bold text-blue-400">120</p>
            </div>

            <div class="bg-gray-800 rounded-xl shadow-xl border border-gray-700 p-6">
                <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 mb-4">Average Rating</h2>
                <p class="text-3xl sm:text-4xl lg:text-5xl font-bold text-yellow-400">4.8</p>
            </div>

            <div class="bg-gray-800 rounded-xl shadow-xl border border-gray-700 p-6">
                <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 mb-4">Today's Earnings</h2>
                <p class="text-3xl sm:text-4xl lg:text-5xl font-bold text-blue-400">₱1,000.00</p>
            </div>

            <div class="bg-gray-800 rounded-xl shadow-xl border border-gray-700 p-6">
                <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 mb-4">Monthly Earnings</h2>
                <p class="text-3xl sm:text-4xl lg:text-5xl font-bold text-pink-400">₱15,000.00</p>
            </div>

            <div class="bg-gray-800 rounded-xl shadow-xl border border-gray-700 p-6">
                <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 mb-4">Yearly Earnings</h2>
                <p class="text-3xl sm:text-4xl lg:text-5xl font-bold text-purple-400">₱180,000.00</p>
            </div>
        </div>

        <div class="mt-8 bg-gray-800 rounded-xl shadow-xl border border-gray-700 p-6">
            <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 mb-4">Earnings Breakdown</h2>
            <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-800 text-gray-400">
            <thead>
            <tr>
                <th class="px-4 py-2 text-left">Date</th>
                <th class="px-4 py-2 text-left">Trip ID</th>
                <th class="px-4 py-2 text-left">Earnings</th>
                <th class="px-4 py-2 text-left">Earnings</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="border-t border-gray-700 px-4 py-2">Feb 26, 2024</td>
                <td class="border-t border-gray-700 px-4 py-2">123456</td>
                <td class="border-t border-gray-700 px-4 py-2">₱500.00</td>
                <td class="border-t border-gray-700 px-4 py-2">₱450.00</td>
            </tr>
            <tr>
                <td class="border-t border-gray-700 px-4 py-2">Feb 25, 2024</td>
                <td class="border-t border-gray-700 px-4 py-2">123455</td>
                <td class="border-t border-gray-700 px-4 py-2">₱450.00</td>
                <td class="border-t border-gray-700 px-4 py-2">₱450.00</td>
            </tr>
            <!-- Add more rows as needed -->
            </tbody>
            </table>
            </div>
        </div>
    </div>
</body>
</html>