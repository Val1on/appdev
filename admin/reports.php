<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-700">
    <?php include '../includes/sidebar.php'; ?>

   
    <div class="lg:ml-64 p-4"> 
        <div class="container mx-auto px-2 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8 "> 
       
            <div id="tableView" class="bg-gray-800 shadow-xl rounded-lg overflow-hidden">
              
                <div class="px-4 sm:px-6 py-4 border-b border-gray-700">
                    <h2 class="text-lg sm:text-xl font-semibold text-white">Reports Management</h2>
                </div>
                
         
                <div class="overflow-x-auto scrollbar-thin scrollbar-thumb-gray-700 scrollbar-track-gray-800">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-800">
                            <tr>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-300 uppercase tracking-wider">Report ID</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-300 uppercase tracking-wider">Report Message</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-300 uppercase tracking-wider">Account No</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-300 uppercase tracking-wider">Report Image</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-800 divide-y divide-gray-700">
                       
                            <tr class="hover:bg-gray-700 transition-colors duration-200">
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-300">#1001</td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-300">Inappropriate content reported</td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-300">ACC001</td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-300">
                                    <img src="" alt="Report Evidence" class="h-8 w-8 rounded object-cover"/>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm font-medium">
                                    <button class="text-blue-400 hover:text-blue-300 mr-3 text-xs sm:text-sm">Edit</button>
                                    <button class="text-red-400 hover:text-red-300 text-xs sm:text-sm">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                
                <div class="px-4 sm:px-6 py-4 border-t border-gray-700">
                    <div class="flex flex-col sm:flex-row items-center justify-between space-y-2 sm:space-y-0">
                        <button class="w-full sm:w-auto bg-blue-600 text-white px-4 py-2 rounded-md text-xs sm:text-sm font-medium hover:bg-blue-700 transition-colors duration-200">
                            Create New Report
                        </button>
                        <div class="text-xs sm:text-sm text-gray-400">
                            Showing 1 to 1 of 1 entries
                        </div>
                    </div>
                </div>
            </div>
            <div id="formView" class="bg-gray-800 shadow-xl rounded-lg overflow-hidden hidden max-w-5xl mx-auto p-2 sm:p-4 lg:p-6">
           
                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5 border-b border-gray-700">
                    <h2 class="text-base sm:text-lg lg:text-xl font-semibold text-white">Create New Report</h2>
                </div>
      
                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5">
                    <form id="reportForm" class="space-y-3 sm:space-y-4 lg:space-y-5">
                        <div class="grid grid-cols-1 gap-3 sm:gap-4 lg:gap-6">
                        
                            <div class="relative">
                                <label for="reportMessage" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                                    Report Message
                                </label>
                                <textarea name="reportMessage" id="reportMessage" required rows="4"
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                                    focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                                    focus:ring-opacity-50 transition-colors duration-200"
                                    placeholder="Describe the issue"></textarea>
                            </div>
        
                   
                            <div class="relative">
                                <label for="accountNo" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                                    Account No
                                </label>
                                <input type="text" name="accountNo" id="accountNo" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                                    focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>
        
                          
                            <div class="relative">
                                <label for="reportImage" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                                    Report Evidence
                                </label>
                                <div class="mt-1 sm:mt-2 flex items-center space-x-3 sm:space-x-4">
                                    <span class="inline-block h-10 w-10 sm:h-12 sm:w-12 lg:h-16 lg:w-16 rounded overflow-hidden bg-gray-700">
                                        <img id="imagePreview" src="placeholder.jpg" alt="Evidence Preview" class="h-full w-full object-cover">
                                    </span>
                                    <input type="file" name="reportImage" id="reportImage" accept="image/*"
                                        class="text-xs sm:text-sm lg:text-base text-gray-300 
                                        file:mr-3 sm:file:mr-4 file:py-1.5 sm:file:py-2 file:px-2 sm:file:px-3
                                        file:rounded-md file:border-0 file:text-xs sm:file:text-sm lg:file:text-base
                                        file:font-medium file:bg-gray-700 file:text-gray-300
                                        hover:file:bg-gray-600">
                                </div>
                            </div>
                        </div>
        
                        <div class="flex justify-end space-x-2 sm:space-x-3 lg:space-x-4 pt-3 sm:pt-4 lg:pt-5 border-t border-gray-700 mt-3 sm:mt-4 lg:mt-5">
                            <button type="button" onclick="toggleView()" 
                                class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                                text-gray-300 bg-gray-700 rounded-md hover:bg-gray-600 
                                focus:outline-none focus:ring-1 focus:ring-gray-500 transition-colors duration-200">
                                Cancel
                            </button>
                            <button type="submit" 
                                class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                                text-white bg-blue-600 rounded-md hover:bg-blue-700 
                                focus:outline-none focus:ring-1 focus:ring-blue-500 transition-colors duration-200">
                                Submit Report
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div id="editFormView" class="bg-gray-800 shadow-xl rounded-lg overflow-hidden hidden max-w-5xl mx-auto p-2 sm:p-4 lg:p-6">
            
                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5 border-b border-gray-700">
                    <h2 class="text-base sm:text-lg lg:text-xl font-semibold text-white">Edit Report</h2>
                </div>
                
     
                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5">
                    <form id="editReportForm" class="space-y-3 sm:space-y-4 lg:space-y-5">
                        <input type="hidden" id="editReportId">
                        <div class="grid grid-cols-1 gap-3 sm:gap-4 lg:gap-6">
    
                            <div class="relative">
                                <label for="editReportMessage" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                                    Report Message
                                </label>
                                <textarea name="editReportMessage" id="editReportMessage" required rows="4"
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                                    focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                                    focus:ring-opacity-50 transition-colors duration-200"
                                    placeholder="Describe the issue"></textarea>
                            </div>
        
 
                            <div class="relative">
                                <label for="editAccountNo" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                                    Account No
                                </label>
                                <input type="text" name="editAccountNo" id="editAccountNo" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                                    focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>
        
                    
                            <div class="relative">
                                <label for="editReportImage" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                                    Report Evidence
                                </label>
                                <div class="mt-1 sm:mt-2 flex items-center space-x-3 sm:space-x-4">
                                    <span class="inline-block h-10 w-10 sm:h-12 sm:w-12 lg:h-16 lg:w-16 rounded overflow-hidden bg-gray-700">
                                        <img id="editImagePreview" src="placeholder.jpg" alt="Evidence Preview" class="h-full w-full object-cover">
                                    </span>
                                    <input type="file" name="editReportImage" id="editReportImage" accept="image/*"
                                        class="text-xs sm:text-sm lg:text-base text-gray-300 
                                        file:mr-3 sm:file:mr-4 file:py-1.5 sm:file:py-2 file:px-2 sm:file:px-3
                                        file:rounded-md file:border-0 file:text-xs sm:file:text-sm lg:file:text-base
                                        file:font-medium file:bg-gray-700 file:text-gray-300
                                        hover:file:bg-gray-600">
                                </div>
                            </div>
                        </div>
        
      
                        <div class="flex justify-end space-x-2 sm:space-x-3 lg:space-x-4 pt-3 sm:pt-4 lg:pt-5 border-t border-gray-700 mt-3 sm:mt-4 lg:mt-5">
                            <button type="button" onclick="toggleEditView()" 
                                class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                                text-gray-300 bg-gray-700 rounded-md hover:bg-gray-600 
                                focus:outline-none focus:ring-1 focus:ring-gray-500 transition-colors duration-200">
                                Cancel
                            </button>
                            <button type="submit" 
                                class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                                text-white bg-blue-600 rounded-md hover:bg-blue-700 
                                focus:outline-none focus:ring-1 focus:ring-blue-500 transition-colors duration-200">
                                Update Report
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.querySelector('.bg-blue-600').onclick = toggleView;
       
        document.querySelectorAll('.text-blue-400').forEach(button => {
            button.onclick = toggleEditView;
        });
    
    
        function toggleView() {
            const tableView = document.getElementById('tableView');
            const formView = document.getElementById('formView');
            
            tableView.classList.toggle('hidden');
            formView.classList.toggle('hidden');
        }
    
    
        function toggleEditView() {
            const tableView = document.getElementById('tableView');
            const editFormView = document.getElementById('editFormView');
            
            tableView.classList.toggle('hidden');
            editFormView.classList.toggle('hidden');
        }
    </script>
</body>
</html>