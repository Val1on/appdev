<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedbackMsg = trim($_POST['feedbackMsg']);
    $ratingNO = trim($_POST['ratingNO']);

    $stmt = $con->prepare("INSERT INTO feedback (feedbackMsg, ratingNO) VALUES (?, ?)");
    $stmt->bind_param("si", $feedbackMsg, $ratingNO);
    
    if ($stmt->execute()) {
        echo "<script>alert('Feedback submitted successfully!'); window.location.href='feedback.php';</script>";
    } else {
        echo "<script>alert('Error submitting feedback: " . $stmt->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-white">
    <?php include '../includes/sidebar.php'; ?>

    <div class="lg:ml-64 p-4">
        <div class="container mx-auto px-2 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8">
            <div id="" class="bg-green-600 shadow-xl rounded-lg overflow-hidden max-w-5xl mx-auto p-2 sm:p-4 lg:p-6">
                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5 border-b border-green-600 bg-green-600">
                    <h2 class="text-base sm:text-lg lg:text-xl font-semibold text-white">Submit New Feedback</h2>
                </div>

                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5">
                    <form method="POST" class="space-y-3 sm:space-y-4 lg:space-y-5">
                        <div class="grid grid-cols-1 gap-3 sm:gap-4 lg:gap-6">
                            <!-- Feedback Message -->
                            <div class="relative">
                                <label for="feedbackMsg" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Your Feedback
                                </label>
                                <textarea name="feedbackMsg" id="feedbackMsg" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200" rows="4"
                                    placeholder="Please share your experience..."></textarea>
                            </div>

                            <!-- Rating -->
                            <div class="relative">
                                <label class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Rating
                                </label>
                                <div class="flex space-x-4">
                                    <select name="ratingNO" id="ratingNO" required
                                        class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                        bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                        focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                        focus:ring-opacity-50 transition-colors duration-200">
                                        <option value="" disabled selected>Select a rating</option>
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-2 sm:space-x-3 lg:space-x-4 pt-3 sm:pt-4 lg:pt-5 border-t border-green-700 mt-3 sm:mt-4 lg:mt-5">
                            <button type="button" onclick="window.location.href='feedback.php'" 
                                class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                                text-white bg-green-700 rounded-md hover:bg-green-600 
                                focus:outline-none focus:ring-1 focus:ring-green-500 transition-colors duration-200">
                                Cancel
                            </button>
                            <button type="submit" 
                                class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                                text-white bg-green-500 rounded-md hover:bg-green-700 
                                focus:outline-none focus:ring-1 focus:ring-green-500 transition-colors duration-200">
                                Submit Feedback
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>
</html>