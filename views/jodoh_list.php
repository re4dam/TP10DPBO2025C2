<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Jodoh List</h2>
<a href="index.php?entity=jodoh&action=add" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Jodoh</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Degenerate</th>
        <th class="border p-2">Haluan</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($jodohList as $jodoh): ?>
        <tr>
            <td class="border p-2"><?php echo $jodoh['degenerate_name']; ?></td>
            <td class="border p-2"><?php echo $jodoh['haluan_name']; ?></td>
            <td class="border p-2">
                <a href="index.php?entity=jodoh&action=edit&id=<?php echo $jodoh['id']; ?>" class="text-blue-500">Edit</a>
                <a href="index.php?entity=jodoh&action=delete&id=<?php echo $jodoh['id']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
