<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Management - Car Owner</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-700">
     <?php include 'nav.php'; ?>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <div class="mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-100">My Cars</h1>
                    <p class="mt-2 text-gray-400">Manage your registered cars</p>
                </div>
                <button id="addVehicleBtn" class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 focus:ring-offset-gray-800 transition-all duration-200 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Add Car
                </button>
            </div>
        </div>
        

        
        <div id="vehiclesGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            
            <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-blue-500 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-blue-500 bg-opacity-20 rounded-lg">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                        Active
                    </span>
                </div>
                <h3 class="text-xl font-semibold text-gray-100">Toyota Vios 2020</h3>
                <div class="mt-4 space-y-2">
                    <p class="text-sm text-gray-400 flex items-center">
                        <span class="w-24">Plate No:</span>
                        <span class="text-gray-100">ABC-123</span>
                    </p>
                    <p class="text-sm text-gray-400 flex items-center">
                        <span class="w-24">Color:</span>
                        <span class="text-gray-100">Silver</span>
                    </p>
                    <p class="text-sm text-gray-400 flex items-center">
                        <span class="w-24">Seats:</span>
                        <span class="text-gray-100">4</span>
                    </p>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button id="editVehicleBtn" class="px-3 py-1.5 text-sm font-medium text-gray-400 hover:text-gray-100 transition-colors duration-200">
                        Edit
                    </button>
                    <button class="px-3 py-1.5 text-sm font-medium text-red-400 hover:text-red-300 transition-colors duration-200">
                        Delete
                    </button>
                </div>
            </div>
        </div> 

    
        <div id="editVehicleForm" class="hidden bg-gray-800 rounded-xl p-6 border border-gray-700">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-semibold text-gray-100">Edit Vehicle</h2>
                <button type="button" class="text-gray-400 hover:text-gray-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
            
                <div>
                    <label class="block text-sm font-medium text-gray-200 mb-2">Current Vehicle Image</label>
                    <div class="relative w-full h-48 rounded-lg overflow-hidden bg-gray-700">
                        <img id="current-vehicle-image" class="w-full h-full object-cover" src="path_to_current_image.jpg" alt="Current vehicle image">
                    </div>
                </div>

    
                <div>
                    <label class="block text-sm font-medium text-gray-200 mb-2">Update Vehicle Image</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed border-gray-600 rounded-lg hover:border-blue-500 transition-all duration-200">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-400">
                                <label for="edit-vehicle-image" class="relative cursor-pointer bg-gray-700 rounded-md font-medium text-blue-500 hover:text-blue-400 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                    <span class="px-2 py-1">Upload new photo</span>
                                    <input id="edit-vehicle-image" name="vehicle_image" type="file" class="sr-only" accept="image/*">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-200">Vehicle Model</label>
                        <input type="text" name="model" required 
                            class="mt-1 block w-full rounded-lg bg-gray-700 border-gray-600 text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            placeholder="e.g. Toyota Vios 2020" 
                            value="Toyota Vios 2020">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-200">Plate Number</label>
                        <input type="text" name="plate_no" required 
                            class="mt-1 block w-full rounded-lg bg-gray-700 border-gray-600 text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            placeholder="e.g. ABC-123"
                            value="ABC-123">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-200">Color</label>
                        <input type="text" name="color" required 
                            class="mt-1 block w-full rounded-lg bg-gray-700 border-gray-600 text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            placeholder="e.g. Silver"
                            value="Silver">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-200">Number of Seats</label>
                        <input type="number" name="seats" min="1" max="8" required 
                            class="mt-1 block w-full rounded-lg bg-gray-700 border-gray-600 text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            placeholder="e.g. 4"
                            value="4">
                    </div>
                </div>


                <div class="flex justify-end space-x-3">
                    <button type="button" class="px-4 py-2 text-sm font-medium text-gray-400 hover:text-gray-100 transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 focus:ring-offset-gray-800 transition-all duration-200">
                        Update Vehicle
                    </button>
                </div>
            </form>
        </div>

        <div id="addVehicleForm" class="hidden bg-gray-800 rounded-xl p-6 border-2 border-dashed border-gray-700 hover:border-blue-500 transition-all duration-300">
            <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
             
                <div>
                    <label class="block text-sm font-medium text-gray-200 mb-2">Vehicle Image</label>
                    
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed border-gray-600 rounded-lg hover:border-blue-500 transition-all duration-200">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-400">
                                <label for="vehicle-image" class="relative cursor-pointer bg-gray-700 rounded-md font-medium text-blue-500 hover:text-blue-400 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                    <span class="px-2 py-1">Upload a photo</span>
                                    <input id="vehicle-image" name="vehicle_image" type="file" class="sr-only" accept="image/*" required>
                                </label>
                            </div>
                            
                        </div>
                    </div>
                </div>

            
                <div class="hidden" id="image-preview-container">
                    <label class="block text-sm font-medium text-gray-200 mb-2">Preview</label>
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
                        <label class="block text-sm font-medium text-gray-200">Vehicle Model</label>
                        <input type="text" name="model" required 
                            class="mt-1 block w-full rounded-lg bg-gray-700 border-gray-600 text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            placeholder="e.g. Toyota Vios 2020">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-200">Plate Number</label>
                        <input type="text" name="plate_no" required 
                            class="mt-1 block w-full rounded-lg bg-gray-700 border-gray-600 text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            placeholder="e.g. ABC-123">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-200">Color</label>
                        <input type="text" name="color" required 
                            class="mt-1 block w-full rounded-lg bg-gray-700 border-gray-600 text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            placeholder="e.g. Silver">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-200">Number of Seats</label>
                        <input type="number" name="seats" min="1" max="8" required 
                            class="mt-1 block w-full rounded-lg bg-gray-700 border-gray-600 text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            placeholder="e.g. 4">
                    </div>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" class="px-4 py-2 text-sm font-medium text-gray-400 hover:text-gray-100 transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 focus:ring-offset-gray-800 transition-all duration-200">
                        Save Vehicle
                    </button>
                </div>
            </form>
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
</script>
</body>
</html>