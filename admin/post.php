<?php
require 'database.php';

// Fetch posts with related data
$sql = "SELECT * FROM post ORDER BY date DESC, time DESC";
$result = mysqli_query($con, $sql);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-white">
    <?php include '../includes/sidebar.php'; ?>
    <div class="lg:ml-64 p-4">
        <div class="container mx-auto px-2 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8">
            <div id="tableView" class="bg-green-600 shadow-xl rounded-lg overflow-hidden">
                <div class="px-4 sm:px-6 py-4 border-b border-green-700">
                    <h2 class="text-lg sm:text-xl font-semibold text-white">Post Management</h2>
                </div>
                <div class="overflow-x-auto scrollbar-thin scrollbar-thumb-gray-700 scrollbar-track-gray-800">
                    <table class="min-w-full divide-y divide-green-700">
                        <thead class="bg-green-600">
                            <tr>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Post ID</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Message</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Car Owner</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Image</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Departure</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Date & Time</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Seats</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Price</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-green-600 divide-y divide-green-700">
                            <?php foreach ($posts as $post): ?>
                            <tr class="hover:bg-green-700 transition-colors duration-200">
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-white">
                                    #<?php echo htmlspecialchars($post['postID']); ?>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-white">
                                    <?php echo htmlspecialchars($post['postMsg']); ?>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-white">
                                    <?php echo htmlspecialchars($post['carownerNO']); ?>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-white">
                                    <img src="../uploads/<?php echo htmlspecialchars($post['postIMG']); ?>" 
                                         alt="Post Image" class="h-8 w-8 rounded object-cover"/>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-white">
                                    <?php echo htmlspecialchars($post['departure']); ?>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-white">
                                    <?php echo date('M d, Y', strtotime($post['date'])); ?><br>
                                    <?php echo date('h:i A', strtotime($post['time'])); ?>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-white">
                                    <?php echo htmlspecialchars($post['available_seats']); ?>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-white">
                                    ₱<?php echo number_format($post['price_per_seat'], 2); ?>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm font-medium">
                                    <a href="edit_post.php?id=<?php echo $post['postID']; ?>" 
                                       class="text-green-100 hover:text-green-300 mr-3 text-xs sm:text-sm">Edit</a>
                                    <button onclick="deletePost(<?php echo $post['postID']; ?>)" 
                                            class="text-red-800 hover:text-red-900 text-xs sm:text-sm">Delete</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="px-4 sm:px-6 py-4 border-t border-green-700">
                    <div class="flex flex-col sm:flex-row items-center justify-between space-y-2 sm:space-y-0">
                        <a href="create_post.php" 
                           class="w-full sm:w-auto bg-green-500 text-white px-4 py-2 rounded-md text-xs sm:text-sm font-medium hover:bg-green-700 transition-colors duration-200">
                            Create New Post
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>