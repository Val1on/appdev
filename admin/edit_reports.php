<?php
require_once('database.php');

if (!isset($_GET['id']) && !isset($_POST['update'])) {
    echo "<script>alert('No Report Selected!'); window.location.href='reports.php';</script>";
    exit;
}

if (isset($_GET['id'])) {
    $reportID = $_GET['id'];

    $query = "SELECT * FROM report WHERE reportID = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $reportID);
    $stmt->execute();
    $result = $stmt->get_result();
    $report = $result->fetch_assoc();

    if (!$report) {
        echo "<script>alert('Report not found!'); window.location.href='reports.php';</script>";
        exit;
    }
}

if (isset($_POST['update'])) {
    $reportID = $_POST['reportID'];
    $reportMsg = trim($_POST['reportMsg']);
    $accountNO = trim($_POST['accountNO']);

    // Handle image upload
    $reportIMG = $report['reportIMG']; // Keep existing image by default
    if (isset($_FILES['reportIMG']) && $_FILES['reportIMG']['error'] == 0) {
        $target_dir = "../uploads/";
        $file_extension = pathinfo($_FILES["reportIMG"]["name"], PATHINFO_EXTENSION);
        $file_name = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $file_name;

        if (move_uploaded_file($_FILES["reportIMG"]["tmp_name"], $target_file)) {
            // Delete old image if exists
            if (!empty($report['reportIMG']) && file_exists($target_dir . $report['reportIMG'])) {
                unlink($target_dir . $report['reportIMG']);
            }
            $reportIMG = $file_name;
        }
    }

    $updateQuery = "UPDATE report SET reportMsg=?, accountNO=?, reportIMG=? WHERE reportID=?";
    $stmt = $con->prepare($updateQuery);
    $stmt->bind_param("sisi", $reportMsg, $accountNO, $reportIMG, $reportID);

    if ($stmt->execute()) {
        echo "<script>alert('Report updated successfully!'); window.location.href='reports.php';</script>";
    } else {
        echo "<script>alert('Update failed: " . $stmt->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Report</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <?php include '../includes/sidebar.php'; ?>

    <div class="lg:ml-64 p-4">
        <div class="container mx-auto px-2 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8">
            <div id="" class="bg-green-600 shadow-xl rounded-lg overflow-hidden max-w-5xl mx-auto p-2 sm:p-4 lg:p-6">
                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5 border-b border-green-600 bg-green-600">
                    <h2 class="text-base sm:text-lg lg:text-xl font-semibold text-white">Edit Report</h2>
                </div>

                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5">
                    <form method="POST" enctype="multipart/form-data" class="space-y-3 sm:space-y-4 lg:space-y-5">
                        <input type="hidden" name="reportID" value="<?php echo htmlspecialchars($report['reportID']); ?>">
                        
                        <div class="grid grid-cols-1 gap-3 sm:gap-4 lg:gap-6">
                            <!-- Report Message -->
                            <div class="relative">
                                <label for="reportMsg" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Report Message
                                </label>
                                <textarea name="reportMsg" id="reportMsg" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200" 
                                    rows="4"><?php echo htmlspecialchars($report['reportMsg']); ?></textarea>
                            </div>

                            <!-- Account Number -->
                            <div class="relative">
                                <label for="accountNO" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Account Number
                                </label>
                                <input type="number" name="accountNO" id="accountNO" required 
                                    value="<?php echo htmlspecialchars($report['accountNO']); ?>"
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                            <!-- Current Image -->
                            <div class="relative">
                                <label class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Current Evidence Image
                                </label>
                                <?php if ($report['reportIMG']): ?>
                                    <img src="../uploads/<?php echo htmlspecialchars($report['reportIMG']); ?>" 
                                         alt="Report Evidence" class="h-20 w-20 object-cover rounded">
                                <?php else: ?>
                                    <p class="text-white text-sm">No image uploaded</p>
                                <?php endif; ?>
                            </div>

                            <!-- New Image Upload -->
                            <div class="relative">
                                <label for="reportIMG" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Update Evidence Image
                                </label>
                                <input type="file" name="reportIMG" id="reportIMG" accept="image/*"
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>
                        </div>

                        <div class="flex justify-end space-x-2 sm:space-x-3 lg:space-x-4 pt-3 sm:pt-4 lg:pt-5 border-t border-green-700 mt-3 sm:mt-4 lg:mt-5">
                            <a href="reports.php" 
                                class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                                text-white bg-green-700 rounded-md hover:bg-green-600 
                                focus:outline-none focus:ring-1 focus:ring-green-500 transition-colors duration-200">
                                Cancel
                            </a>
                            <button type="submit" name="update"
                                class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                                text-white bg-green-500 rounded-md hover:bg-green-700 
                                focus:outline-none focus:ring-1 focus:ring-green-500 transition-colors duration-200">
                                Update Report
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>