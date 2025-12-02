<?php 
require_once ROOT_PATH . 'app/views/header.php'; 

$schedule = $data['schedule'] ?? [];

$error_message = $_SESSION['error'] ?? null;
$success_message = $_SESSION['success'] ?? null;
unset($_SESSION['error']);
unset($_SESSION['success']);

function getColorClass($days) {
    if ($days == 0) return 'text-red-600 font-bold';
    if ($days == 1) return 'text-yellow-600 font-bold';
    if ($days <= 3) return 'text-orange-500';
    return 'text-green-600';
}
?>

<div class="container mx-auto p-4 md:p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl font-extrabold text-green-700 mb-8 pb-4 border-b border-gray-200">
            <i class="fas fa-tint mr-3"></i> Watering Schedule
        </h1>
        
        <?php if ($error_message): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6" role="alert"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>
        <?php if ($success_message): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6" role="alert"><?php echo htmlspecialchars($success_message); ?></div>
        <?php endif; ?>

        <?php if (empty($schedule)): ?>
            <div class="text-center py-12 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                <i class="fas fa-exclamation-triangle text-6xl text-gray-300 mb-4"></i>
                <p class="text-xl font-medium text-gray-600 mb-4">Your schedule is empty!</p>
                <p class="text-gray-500 mb-6">Please add plants to your inventory to see their watering needs.</p>
                <a href="index.php?page=plants&action=add" class="btn-primary inline-flex items-center">
                    <i class="fas fa-plus-circle mr-2"></i> Add New Plant
                </a>
            </div>
        <?php else: ?>
            <div class="overflow-x-auto shadow-xl rounded-xl">
                <table class="min-w-full bg-white">
                    <thead class="bg-blue-50 border-b border-blue-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold text-blue-700 uppercase tracking-wider">Plant Name</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-blue-700 uppercase tracking-wider hidden sm:table-cell">Last Watered</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-blue-700 uppercase tracking-wider hidden sm:table-cell">Frequency (Days)</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-blue-700 uppercase tracking-wider">Next Watering</th>
                            <th class="px-6 py-3 text-center text-xs font-bold text-blue-700 uppercase tracking-wider">Days Left</th>
                            <th class="px-6 py-3 text-center text-xs font-bold text-blue-700 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($schedule as $item): ?>
                            <tr class="hover:bg-blue-50 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800">
                                    <?php echo htmlspecialchars($item['name']); ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden sm:table-cell">
                                    <?php echo htmlspecialchars($item['last_watered']); ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden sm:table-cell">
                                    <?php echo htmlspecialchars($item['frequency']); ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm <?php echo getColorClass($item['days_remaining']); ?>">
                                    <?php echo htmlspecialchars($item['next_watering_date']); ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold <?php echo getColorClass($item['days_remaining']); ?>">
                                    <?php echo htmlspecialchars($item['days_remaining']); ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <!-- Form to mark as watered -->
                                    <form method="POST" action="index.php?page=watering&action=watered" class="inline-block">
                                        <input type="hidden" name="plant_id" value="<?php echo htmlspecialchars($item['plant_id']); ?>">
                                        <button type="submit" 
                                                class="text-white bg-green-500 hover:bg-green-600 p-2 rounded-lg text-xs font-semibold shadow-md transition duration-150 transform hover:scale-105"
                                                title="Mark as Watered Today">
                                            <i class="fas fa-check mr-1"></i> Watered
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php 
require_once ROOT_PATH . 'app/views/footer.php'; 
?>