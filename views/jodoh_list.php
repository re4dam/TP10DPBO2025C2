<?php
require_once 'views/template/header.php';
?>

<h2 class="text-2xl font-semibold mb-6">Jodoh List</h2>
<a href="index.php?entity=jodoh&action=add" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg mb-6 inline-flex items-center transition duration-300 transform hover:scale-105">
    <i class="fas fa-plus-circle mr-2"></i> Add Jodoh
</a>
<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full leading-normal">
        <thead>
            <tr class="bg-gray-800 text-white">
                <th class="px-5 py-3 border-b-2 border-gray-700 text-left text-sm uppercase font-semibold tracking-wider">Degenerate</th>
                <th class="px-5 py-3 border-b-2 border-gray-700 text-left text-sm uppercase font-semibold tracking-wider">Haluan</th>
                <th class="px-5 py-3 border-b-2 border-gray-700 text-center text-sm uppercase font-semibold tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jodohList as $jodoh): ?>
                <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                    <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm"><?php echo htmlspecialchars($jodoh['degenerate_name']); ?></td>
                    <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm"><?php echo htmlspecialchars($jodoh['haluan_name']); ?></td>
                    <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm text-center">
                        <a href="index.php?entity=jodoh&action=edit&id=<?php echo htmlspecialchars($jodoh['id']); ?>" class="text-blue-600 hover:text-blue-900 mr-3 transition duration-300">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="index.php?entity=jodoh&action=delete&id=<?php echo htmlspecialchars($jodoh['id']); ?>" class="text-red-600 hover:text-red-900 transition duration-300" onclick="return confirm('Are you sure you want to delete this record?');">
                            <i class="fas fa-trash-alt"></i> Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require_once 'views/template/footer.php';
?>
