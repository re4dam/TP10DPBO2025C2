<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($haluan) ? 'Edit Haluan' : 'Add Haluan'; ?></h2>
<form action="index.php?entity=haluan&action=<?php echo isset($haluan) ? 'update&id=' . $haluan['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Name:</label>
        <input type="text" name="name" value="<?php echo isset($haluan) ? $haluan['name'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Asal:</label>
        <input type="text" name="asal" value="<?php echo isset($haluan) ? $haluan['asal'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Stereotipe:</label>
        <input type="text" name="stereotipe" value="<?php echo isset($haluan) ? $haluan['stereotipe'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block mb-1">Kelamin:</label>
        <label class="inline-flex items-center mr-4">
            <input type="radio" name="kelamin" value="Laki-laki"
                <?php echo (isset($haluan) && $haluan['kelamin'] === 'Laki-laki') ? 'checked' : ''; ?>
                class="mr-2">
            Laki-laki
        </label>
        <label class="inline-flex items-center">
            <input type="radio" name="kelamin" value="Perempuan"
                <?php echo (isset($haluan) && $haluan['kelamin'] === 'Perempuan') ? 'checked' : ''; ?>
                class="mr-2">
            Perempuan
        </label>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
