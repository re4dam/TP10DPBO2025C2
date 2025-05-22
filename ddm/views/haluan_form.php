<?php
require_once 'views/template/header.php';
?>

<h2 class="text-2xl font-semibold mb-6"><?php echo isset($haluan) ? 'Edit Haluan' : 'Add New Haluan'; ?></h2>
<div class="bg-white p-8 rounded-lg shadow-md max-w-md mx-auto">
    <form action="index.php?entity=haluan&action=<?php echo isset($haluan) ? 'update&id=' . htmlspecialchars($haluan['id']) : 'save'; ?>" method="POST" class="space-y-6">
        <div>
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo isset($haluan) ? htmlspecialchars($haluan['name']) : ''; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
        </div>
        <div>
            <label for="asal" class="block text-gray-700 text-sm font-bold mb-2">Asal:</label>
            <input type="text" id="asal" name="asal" value="<?php echo isset($haluan) ? htmlspecialchars($haluan['asal']) : ''; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
        </div>
        <div>
            <label for="stereotipe" class="block text-gray-700 text-sm font-bold mb-2">Stereotipe:</label>
            <input type="text" id="stereotipe" name="stereotipe" value="<?php echo isset($haluan) ? htmlspecialchars($haluan['stereotipe']) : ''; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Kelamin:</label>
            <div class="mt-2">
                <label class="inline-flex items-center mr-6">
                    <input type="radio" name="kelamin" value="Laki-laki"
                        <?php echo (isset($haluan) && $haluan['kelamin'] === 'Laki-laki') ? 'checked' : ''; ?>
                        class="form-radio text-blue-600 h-4 w-4">
                    <span class="ml-2 text-gray-700">Laki-laki</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="kelamin" value="Perempuan"
                        <?php echo (isset($haluan) && $haluan['kelamin'] === 'Perempuan') ? 'checked' : ''; ?>
                        class="form-radio text-pink-600 h-4 w-4">
                    <span class="ml-2 text-gray-700">Perempuan</span>
                </label>
            </div>
        </div>
        <div class="flex justify-end space-x-4 mt-6">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 focus:outline-none focus:shadow-outline flex items-center">
                <i class="fas fa-save mr-2"></i> Save Changes
            </button>
            <a href="index.php?entity=haluan" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300 focus:outline-none focus:shadow-outline flex items-center">
                <i class="fas fa-times-circle mr-2"></i> Cancel
            </a>
        </div>
    </form>
</div>

<?php
require_once 'views/template/footer.php';
?>
