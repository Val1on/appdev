<?php

/*
$carOwnerID = isset($_POST["carOwnerID"]) ? intval($_POST["carOwnerID"]) : 0;

$checkOwner = $con->prepare("SELECT ownerNO FROM carowner WHERE ownerNO = ?");
$checkOwner->bind_param("i", $carOwnerID);
$checkOwner->execute();
$result = $checkOwner->get_result();

if ($result->num_rows == 0) {
    die(json_encode(["success" => false, "message" => "Invalid carOwnerID. No matching record in carowner table."]));
}
$checkOwner->close();


session_start();
if (!isset($_SESSION['ownerNO'])) {
    echo "<script>console.log('ownerNO is not set in session');</script>";
} else {
    echo "<script>console.log('ownerNO: " . $_SESSION['ownerNO'] . "');</script>";
}

$carOwnerID = isset($_POST["carOwnerID"]) ? intval($_POST["carOwnerID"]) : 1; // Temporary default ID = 1

<input type="hidden" name="carOwnerID" value="<?php echo isset($_SESSION['ownerNO']) ? $_SESSION['ownerNO'] : ''; ?>"> - pag may log - in na


note: problem dito wala pang log-in so pag magregister ng car hindi properly na kukuha yung ownerID and HINDI din nababato ng properly yung ownerID sa database 
kaya nageerror siya na hindi nag-eexist yung foreign key
*/

include 'database.php';


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM cars";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Management - Car Owner</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="white">
     <?php include 'nav.php'; ?>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <div class="mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-green-600">My Cars</h1>
                    <p class="mt-2 text-green-400">Manage your registered cars</p>
                </div>
                <button id="addVehicleBtn" class="px-4 py-2 bg-green-500 text-white text-sm font-medium rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 focus:ring-offset-green-800 transition-all duration-200 flex items-center" data-bs-toggle="modal" data-bs-target="#addCarModal">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Add Car
                </button>
            </div>
        </div>
        

        
        <div id="vehiclesGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            
        <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="bg-green-800 rounded-xl p-6 border border-green-700 hover:border-green-500 transition-all duration-300">';
                        echo '<div class="flex items-center justify-between mb-4">';
                        echo '<div class="p-3 bg-green-500 bg-opacity-20 rounded-lg">';
                        echo '<svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
                        echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>';
                        echo '</svg>';
                        echo '</div>';
                        echo '<span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">' . $row["carStatus"] . '</span>';
                        echo '</div>';

                   
                        echo '<img class="w-full h-48 object-cover rounded-lg mb-4" src="' . $row["carImage"] . '" alt="Car Image">';

                    
                        echo '<h3 class="text-xl font-semibold text-green-100">' . $row["carModel"] . '</h3>';
                        echo '<div class="mt-4 space-y-2">';
                        echo '<p class="text-sm text-green-400 flex items-center"><span class="w-24">Plate No:</span><span class="text-green-100">' . $row["plateNum"] . '</span></p>';
                        echo '<p class="text-sm text-green-400 flex items-center"><span class="w-24">Color:</span><span class="text-green-100">' . $row["color"] . '</span></p>';
                        echo '<p class="text-sm text-green-400 flex items-center"><span class="w-24">Seats:</span><span class="text-green-100">' . $row["number_of_seats"] . '</span></p>';
                        echo '</div>';

                       
                        echo '<div class="mt-6 flex justify-end space-x-3">';
                        echo '<button id="editVehicleBtn" class="px-3 py-1.5 text-sm font-medium text-green-400 hover:text-green-100 transition-colors duration-200">Edit</button>';
                        echo '<button class="px-3 py-1.5 text-sm font-medium text-red-400 hover:text-red-300 transition-colors duration-200">Delete</button>';
                        echo '</div>';

                        echo '</div>'; 
                    }
                } else {
                    echo '<p class="text-green-400">No cars registered.</p>';
                }

                mysqli_close($con);
                ?>
        </div> 

    
        <div id="editVehicleForm" class="hidden bg-green-800 rounded-xl p-6 border border-green-700">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-semibold text-green-100">Edit Vehicle</h2>
                <button type="button" class="text-green-400 hover:text-green-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            <form action="update_car.php" method="POST" enctype="multipart/form-data" class="space-y-6">

            
                <div>
                    <label class="block text-sm font-medium text-green-200 mb-2">Current Vehicle Image</label>
                    <div class="relative w-full h-48 rounded-lg overflow-hidden bg-green-700">
                        <img id="current-vehicle-image" class="w-full h-full object-cover" src="path_to_current_image.jpg" alt="Current vehicle image">
                    </div>
                </div>

    
                <div>
                    <label class="block text-sm font-medium text-green-200 mb-2">Update Vehicle Image</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed border-green-600 rounded-lg hover:border-green-500 transition-all duration-200">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-green-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-green-400">
                                <label for="edit-vehicle-image" class="relative cursor-pointer bg-green-700 rounded-md font-medium text-green-500 hover:text-green-400 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                    <span class="px-2 py-1">Upload new photo</span>
                                    <input id="edit-vehicle-image" name="vehicle_image" type="file" class="sr-only" accept="image/*">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-green-200">Vehicle Model</label>
                        <input type="text" name="model" required 
                            class="mt-1 block w-full rounded-lg bg-green-700 border-green-600 text-green-100 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                            placeholder="e.g. Toyota Vios 2020" 
                            value="Toyota Vios 2020">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-green-200">Plate Number</label>
                        <input type="text" name="plate_no" required 
                            class="mt-1 block w-full rounded-lg bg-green-700 border-green-600 text-green-100 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                            placeholder="e.g. ABC-123"
                            value="ABC-123">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-green-200">Color</label>
                        <input type="text" name="color" required 
                            class="mt-1 block w-full rounded-lg bg-green-700 border-green-600 text-green-100 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                            placeholder="e.g. Silver"
                            value="Silver">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-green-200">Number of Seats</label>
                        <input type="number" name="seats" min="1" max="8" required 
                            class="mt-1 block w-full rounded-lg bg-green-700 border-green-600 text-green-100 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                            placeholder="e.g. 4"
                            value="4">
                    </div>



                </div>


                <div class="flex justify-end space-x-3">
                    <button type="button" class="px-4 py-2 text-sm font-medium text-green-400 hover:text-green-100 transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white text-sm font-medium rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 focus:ring-offset-green-800 transition-all duration-200">
                        Update Vehicle
                    </button>
                </div>
            </form>
        </div>

        <div id="addVehicleForm" class="hidden bg-green-800 rounded-xl p-6 border-2 border-dashed border-green-700 hover:border-green-500 transition-all duration-300">
            <form action="add_car.php" method="POST" enctype="multipart/form-data" class="space-y-6">
             
                <div>
                    <label class="block text-sm font-medium text-green-200 mb-2">Vehicle Image</label>
                    
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed border-green-600 rounded-lg hover:border-green-500 transition-all duration-200">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-green-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-green-400">
                                <label for="vehicle-image" class="relative cursor-pointer bg-green-700 rounded-md font-medium text-green-500 hover:text-green-400 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                    <span class="px-2 py-1">Upload a photo</span>
                                    <input id="vehicle-image" name="carImage" type="file" class="sr-only" accept="image/*" required>
                                </label>
                            </div>
                            
                        </div>
                    </div>
                </div>

            
                <div class="hidden" id="image-preview-container">
                    <label class="block text-sm font-medium text-green-200 mb-2">Preview</label>
                    <div class="relative w-full h-48 rounded-lg overflow-hidden">
                        <img id="image-preview" class="w-full h-full object-cover" src="#" alt="Vehicle preview">
                        <button type="button" id="remove-image" class="absolute top-2 right-2 p-1 bg-red-500 text-white rounded-full hover:bg-red-600 focus:outline-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>

            
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-green-200">Vehicle Model</label>
                        <input type="text" name="carModel" required 
                            class="mt-1 block w-full rounded-lg bg-green-700 border-green-600 text-green-100 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                            placeholder="e.g. Toyota Vios 2020">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-green-200">Plate Number</label>
                        <input type="text" name="plateNum" required 
                            class="mt-1 block w-full rounded-lg bg-green-700 border-green-600 text-green-100 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                            placeholder="e.g. ABC-123">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-green-200">Color</label>
                        <input type="text" name="color" required 
                            class="mt-1 block w-full rounded-lg bg-green-700 border-green-600 text-green-100 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                            placeholder="e.g. Silver">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-green-200">Number of Seats</label>
                        <input type="number" name="number_of_seats" min="1" max="8" required 
                            class="mt-1 block w-full rounded-lg bg-green-700 border-green-600 text-green-100 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                            placeholder="e.g. 4">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-green-200">Vehicle Manufacturer</label>
                        <input type="text" name="carManufacturer" required 
                            class="mt-1 block w-full rounded-lg bg-green-700 border-green-600 text-green-100 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                            placeholder="e.g. Toyota">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-green-200">Vehicle Status</label>
                        <select name="carStatus" required class="mt-1 block w-full rounded-lg bg-green-700 border-green-600 text-green-100 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                            <option value="Available">Available</option>
                            <option value="Unavailable">Unavailable</option>
                        </select>
                    </div>

                    <input type="number" name="carOwnerID" required placeholder="Enter Car Owner ID">

                    


                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" class="px-4 py-2 text-sm font-medium text-green-400 hover:text-green-100 transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white text-sm font-medium rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 focus:ring-offset-green-800 transition-all duration-200">
                        Save Vehicle
                    </button>
                </div>
            </form>
        </div>
</div>              




    </div> 

<script>
document.addEventListener('DOMContentLoaded', function() {
    const vehiclesGrid = document.getElementById('vehiclesGrid');
    const addVehicleBtn = document.getElementById('addVehicleBtn');
    const editVehicleBtn = document.getElementById('editVehicleBtn');
    const addVehicleForm = document.getElementById('addVehicleForm');
    const editVehicleForm = document.getElementById('editVehicleForm');


    addVehicleBtn.addEventListener('click', function() {
        vehiclesGrid.classList.add('hidden');
        addVehicleForm.classList.remove('hidden');
        editVehicleForm.classList.add('hidden');
    });


    editVehicleBtn.addEventListener('click', function() {
        vehiclesGrid.classList.add('hidden');
        editVehicleForm.classList.remove('hidden');
        addVehicleForm.classList.add('hidden');
    });


    function returnToGrid() {
        vehiclesGrid.classList.remove('hidden');
        addVehicleForm.classList.add('hidden');
        editVehicleForm.classList.add('hidden');
    }


    const closeButtons = document.querySelectorAll('button[type="button"]');
    closeButtons.forEach(button => {
        if (button.querySelector('svg path[d="M6 18L18 6M6 6l12 12"]') || 
            button.textContent.trim() === 'Cancel') {
            button.addEventListener('click', returnToGrid);
        }
    });
});

document.getElementById("addCarForm").addEventListener("submit", function(event) {
    event.preventDefault(); 

    let formData = new FormData(this);

    fetch("add_car.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message); 
        if (data.success) {
            location.reload(); 
        }
    })
    .catch(error => console.error("Error:", error));
});

</script>
</body>
</html>