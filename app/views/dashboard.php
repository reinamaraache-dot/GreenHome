<?php 
require_once ROOT_PATH . 'app/views/header.php'; 

$plants = $data['plants'] ?? [];
$username = $data['username'] ?? 'User';

$error_message = $_SESSION['error'] ?? null;
$success_message = $_SESSION['success'] ?? null;
unset($_SESSION['error']);
unset($_SESSION['success']);
?>

<div class="container mx-auto p-4 md:p-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 pb-4 border-b border-gray-200">
            <h1 class="text-4xl font-extrabold text-green-700 mb-4 sm:mb-0">
                <i class="fas fa-home mr-3"></i> Welcome Back, <?php echo htmlspecialchars($username); ?>!
            </h1>
            
            <a href="index.php?page=plants&action=add" class="btn-primary flex items-center shadow-md">
                <i class="fas fa-plus-circle mr-2"></i> Add New Plant
            </a>
        </div>
        
        <?php if ($error_message): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <span class="block sm:inline"><?php echo htmlspecialchars($error_message); ?></span>
            </div>
        <?php endif; ?>
        <?php if ($success_message): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <span class="block sm:inline"><?php echo htmlspecialchars($success_message); ?></span>
            </div>
        <?php endif; ?>
        
        <h2 class="text-2xl font-semibold text-gray-700 mb-6 border-b pb-2">Your Plants Inventory (<?php echo count($plants); ?>)</h2>

        <?php if (empty($plants)): ?>
            <div class="text-center py-12 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                <i class="fas fa-tree text-6xl text-green-300 mb-4"></i>
                <p class="text-xl font-medium text-gray-600 mb-2">No plants added yet!</p>
                <p class="text-gray-500 mb-6">Start managing your garden by adding your first plant.</p>
                <a href="index.php?page=plants&action=add" class="btn-primary inline-flex items-center">
                    <i class="fas fa-plus-circle mr-2"></i> Add First Plant
                </a>
            </div>
        <?php else: ?>
            <div class="overflow-x-auto shadow-lg rounded-xl">
                <table class="min-w-full bg-white rounded-xl">
                    <thead class="bg-green-100 border-b border-green-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Nickname</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider hidden sm:table-cell">Species</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider hidden md:table-cell">Water Freq.</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Last Watered</th>
                            <th class="px-6 py-3 text-center text-xs font-bold text-green-700 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($plants as $plant): ?>
                            <tr class="hover:bg-green-50 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800">
                                    <?php echo htmlspecialchars($plant['name']); ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden sm:table-cell">
                                    <?php echo htmlspecialchars($plant['species'] ?? 'N/A'); ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden md:table-cell">
                                    <?php echo htmlspecialchars($plant['watering_frequency']) . ' days'; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">
                                    <?php echo htmlspecialchars($plant['last_watered']); ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                    <form method="POST" action="index.php?page=plants&action=delete" onsubmit="return confirm('Are you sure you want to delete <?php echo addslashes($plant['name']); ?>?');" class="inline-block">
                                        <input type="hidden" name="plant_id" value="<?php echo htmlspecialchars($plant['plant_id']); ?>">
                                        <button type="submit" class="text-red-600 hover:text-red-900 ml-3 p-2 rounded-full hover:bg-red-50 transition duration-150" title="Delete Plant">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="index.php?page=plants&action=edit&id=<?php echo htmlspecialchars($plant['plant_id']); ?>" 
                                       class="text-blue-600 hover:text-blue-900 ml-3 p-2 rounded-full hover:bg-blue-50 transition duration-150" title="Edit Plant">
                                        <i class="fas fa-edit"></i>
                                    </a>
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