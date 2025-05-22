<?php
require_once 'views/template/header.php';
?>

<h2 class="text-2xl font-semibold mb-6"><?php echo isset($degenerate) ? 'Edit Degenerate' : 'Add New Degenerate'; ?></h2>
<div class="bg-white p-8 rounded-lg shadow-md max-w-md mx-auto">
    <form action="index.php?entity=degenerate&action=<?php echo isset($degenerate) ? 'update&id=' . htmlspecialchars($degenerate['id']) : 'save'; ?>" method="POST" class="space-y-6">
        <div>
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo isset($degenerate) ? htmlspecialchars($degenerate['name']) : ''; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
        </div>
        <div>
            <label for="height" class="block text-gray-700 text-sm font-bold mb-2">Height (cm):</label>
            <input type="number" id="height" name="height" value="<?php echo isset($degenerate) ? htmlspecialchars($degenerate['height']) : ''; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
        </div>
        <div>
            <label for="weight" class="block text-gray-700 text-sm font-bold mb-2">Weight (kg):</label>
            <input type="number" id="weight" name="weight" value="<?php echo isset($degenerate) ? htmlspecialchars($degenerate['weight']) : ''; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Kelamin:</label>
            <div class="mt-2">
                <label class="inline-flex items-center mr-6">
                    <input type="radio" name="kelamin" value="Laki-laki"
                        <?php echo (isset($degenerate) && $degenerate['kelamin'] === 'Laki-laki') ? 'checked' : ''; ?>
                        class="form-radio text-blue-600 h-4 w-4">
                    <span class="ml-2 text-gray-700">Laki-laki</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="kelamin" value="Perempuan"
                        <?php echo (isset($degenerate) && $degenerate['kelamin'] === 'Perempuan') ? 'checked' : ''; ?>
                        class="form-radio text-pink-600 h-4 w-4">
                    <span class="ml-2 text-gray-700">Perempuan</span>
                </label>
            </div>
        </div>
        <div class="flex justify-end space-x-4 mt-6">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 focus:outline-none focus:shadow-outline flex items-center">
                <i class="fas fa-save mr-2"></i> Save Changes
            </button>
            <a href="index.php?entity=degenerate" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300 focus:outline-none focus:shadow-outline flex items-center">
                <i class="fas fa-times-circle mr-2"></i> Cancel
            </a>
        </div>
    </form>
</div>

<?php
require_once 'views/template/footer.php';
?>
