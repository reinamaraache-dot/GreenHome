
<div class="container mx-auto p-4 md:p-8">
    <div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-lg border border-green-100">
        
        <h1 class="text-3xl font-bold text-green-700 mb-6 border-b pb-2">Edit Plant: [Plant Name]</h1>
        
        <a href="index.php?page=dashboard" class="text-blue-500 hover:text-blue-700 mb-6 inline-block">
            <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
        </a>
        
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
            <span class="block sm:inline font-semibold"><i class="fas fa-exclamation-triangle mr-2"></i> Error:</span>
            <span class="block sm:inline">[Error message will appear here]</span>
        </div>

      <form method="POST" action="index.php?page=plants&action=submitEdit" class="space-y-6">
            
            <input type="hidden" name="plant_id" value="[Plant ID]">
            
           <div>
                <label for="name" class="label">Plant Nickname <span class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" required value="[Plant Name]" class="input">
            </div>
            
         <div>
                <label for="species" class="label">Species / Variety</label>
                <input type="text" id="species" name="species" value="[Plant Species]" class="input">
            </div>

         <div>
                <label for="category_id" class="label">Category <span class="text-red-500">*</span></label>
                <select id="category_id" name="category_id" required class="input appearance-none bg-white">
                    <option value="" disabled>-- Select Category --</option>
             </select>
            </div>
            
            <div>
                <label for="acquisition_date" class="label">Acquisition Date</label>
                <input type="date" id="acquisition_date" name="acquisition_date" value="[Acquisition Date]" class="input">
            </div>

            <div>
                <label for="last_watered" class="label">Last Watered <span class="text-red-500">*</span></label>
                <input type="date" id="last_watered" name="last_watered" required value="[Last Watered Date]" class="input">
            </div>

            <div>
                <label for="watering_frequency" class="label">Watering Frequency (days) <span class="text-red-500">*</span></label>
                <input type="number" id="watering_frequency" name="watering_frequency" required min="1" max="365" value="[Watering Frequency]" class="input">
            </div>

            <button type="submit" class="btn-primary w-full flex justify-center items-center bg-blue-600 hover:bg-blue-700 shadow-md">
                <i class="fas fa-save mr-2"></i> Save Changes
            </button>
            
        </form>
    </div>
</div>

