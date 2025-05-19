<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Degenerate List</h2>
<a href="index.php?entity=haluan&action=add" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Haluan</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Name</th>
        <th class="border p-2">Asal</th>
        <th class="border p-2">Kelamin</th>
        <th class="border p-2">Stereotype</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($haluanList as $halu): ?>
        <tr>
            <td class="border p-2"><?php echo $halu['name']; ?></td>
            <td class="border p-2"><?php echo $halu['asal']; ?></td>
            <td class="border p-2"><?php echo $halu['kelamin']; ?></td>
            <td class="border p-2"><?php echo $halu['stereotipe']; ?></td>
            <td class="border p-2">
                <a href="index.php?entity=degenerate&action=edit&id=<?php echo $halu['id']; ?>" class="text-blue-500">Edit</a>
                <a href="index.php?entity=degenerate&action=delete&id=<?php echo $halu['id']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
