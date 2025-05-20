<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($jodoh) ? 'Edit Jodoh' : 'Add Jodoh'; ?></h2>
<form action="index.php?entity=jodoh&action=<?php echo isset($jodoh) ? 'update&id=' . $jodoh['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Degenerate:</label>
        <select name="department_id" class="border p-2 w-full" required>
            <?php foreach ($degenerates as $dege): ?>
                <option value="<?php echo $dege['id']; ?>" <?php echo isset($jodoh) && $jodoh['id_degenerate'] == $dege['id'] ? 'selected' : ''; ?>><?php echo $dege['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label class="block">Haluan:</label>
        <select name="shift_id" class="border p-2 w-full" required>
            <?php foreach ($haluans as $haluan): ?>
                <option value="<?php echo $haluan['id']; ?>" <?php echo isset($jodoh) && $jodoh['id_haluan'] == $haluan['id'] ? 'selected' : ''; ?>><?php echo $haluan['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
