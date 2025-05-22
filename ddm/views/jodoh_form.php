<?php
require_once 'views/template/header.php';
?>

<h2 class="text-2xl font-semibold mb-6"><?php echo isset($jodoh) ? 'Edit Jodoh' : 'Add New Jodoh'; ?></h2>
<div class="bg-white p-8 rounded-lg shadow-md max-w-md mx-auto">
    <form action="index.php?entity=jodoh&action=<?php echo isset($jodoh) ? 'update&id=' . htmlspecialchars($jodoh['id']) : 'save'; ?>" method="POST" class="space-y-6">
        <div>
            <label for="id_degenerate" class="block text-gray-700 text-sm font-bold mb-2">Degenerate:</label>
            <select name="degenerate_id" id="id_degenerate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                <?php foreach ($degenerates as $dege): ?>
                    <option value="<?php echo htmlspecialchars($dege['id']); ?>" <?php echo isset($jodoh) && $jodoh['id_degenerate'] == $dege['id'] ? 'selected' : ''; ?>><?php echo htmlspecialchars($dege['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="id_haluan" class="block text-gray-700 text-sm font-bold mb-2">Haluan:</label>
            <select name="haluan_id" id="id_haluan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                <?php foreach ($haluans as $haluan_option): ?>
                    <option value="<?php echo htmlspecialchars($haluan_option['id']); ?>" <?php echo isset($jodoh) && $jodoh['id_haluan'] == $haluan_option['id'] ? 'selected' : ''; ?>><?php echo htmlspecialchars($haluan_option['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="flex justify-end space-x-4 mt-6">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 focus:outline-none focus:shadow-outline flex items-center">
                <i class="fas fa-save mr-2"></i> Save Changes
            </button>
            <a href="index.php?entity=jodoh" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300 focus:outline-none focus:shadow-outline flex items-center">
                <i class="fas fa-times-circle mr-2"></i> Cancel
            </a>
        </div>
    </form>
</div>

<?php
require_once 'views/template/footer.php';
?>
