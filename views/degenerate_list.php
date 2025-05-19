<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Degenerate List</h2>
<a href="index.php?entity=degenerate&action=add" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Degenerate</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Name</th>
        <th class="border p-2">Height</th>
        <th class="border p-2">Weight</th>
        <th class="border p-2">Kelamin</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($degenerateList as $dege): ?>
        <tr>
            <td class="border p-2"><?php echo $dege['name']; ?></td>
            <td class="border p-2"><?php echo $dege['height']; ?></td>
            <td class="border p-2"><?php echo $dege['weight']; ?></td>
            <td class="border p-2"><?php echo $dege['kelamin']; ?></td>
            <td class="border p-2">
                <a href="index.php?entity=degenerate&action=edit&id=<?php echo $dege['id']; ?>" class="text-blue-500">Edit</a>
                <a href="index.php?entity=degenerate&action=delete&id=<?php echo $dege['id']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
