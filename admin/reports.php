<?php
require 'database.php';

// Fetch reports data
$sql = "SELECT * FROM report";
$result = mysqli_query($con, $sql);
$reports = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-white">
    <?php include '../includes/sidebar.php'; ?>

    <div class="lg:ml-64 p-4">
        <div class="container mx-auto px-2 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8">
            <div id="tableView" class="bg-green-600 shadow-xl rounded-lg overflow-hidden">
                <div class="px-4 sm:px-6 py-4 border-b border-green-700">
                    <h2 class="text-lg sm:text-xl font-semibold text-white">Reports Management</h2>
                </div>

                <div class="overflow-x-auto scrollbar-thin scrollbar-thumb-gray-700 scrollbar-track-gray-800">
                    <table class="min-w-full divide-y divide-green-700">
                        <thead class="bg-green-600">
                            <tr>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Report ID</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Report Message</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Account No</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Report Image</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-green-600 divide-y divide-green-700">
                            <?php foreach ($reports as $report): ?>
                            <tr class="hover:bg-green-700 transition-colors duration-200">
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-white">
                                    #<?php echo htmlspecialchars($report['reportID']); ?>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-white">
                                    <?php echo htmlspecialchars($report['reportMsg']); ?>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-white">
                                    <?php echo htmlspecialchars($report['accountNO']); ?>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-white">
                                    <?php if ($report['reportIMG']): ?>
                                        <img src="../uploads/<?php echo htmlspecialchars($report['reportIMG']); ?>" 
                                             alt="Report Evidence" class="h-8 w-8 rounded object-cover"/>
                                    <?php else: ?>
                                        <span class="text-gray-400">No image</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm font-medium">
                                    <a href="edit_reports.php?id=<?php echo $report['reportID']; ?>" 
                                       class="text-green-100 hover:text-green-300 mr-3 text-xs sm:text-sm">Edit</a>
                                    <button onclick="deleteReport(<?php echo $report['reportID']; ?>)" 
                                            class="text-red-800 hover:text-red-900 text-xs sm:text-sm">Delete</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="px-4 sm:px-6 py-4 border-t border-green-700">
                    <div class="flex flex-col sm:flex-row items-center justify-between space-y-2 sm:space-y-0">
                        <a href="create_reports.php" 
                           class="w-full sm:w-auto bg-green-500 text-white px-4 py-2 rounded-md text-xs sm:text-sm font-medium hover:bg-green-700 transition-colors duration-200">
                            Create New Report
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>