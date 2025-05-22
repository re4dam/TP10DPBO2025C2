<?php

require_once 'viewmodel/DegenerateViewModel.php';
require_once 'viewmodel/HaluanViewModel.php';
require_once 'viewmodel/JodohViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'degenerate';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

$message_text = isset($_GET['message_text']) ? urldecode($_GET['message_text']) : null;
$message_type = isset($_GET['message_type']) ? $_GET['message_type'] : null;

if ($entity == 'degenerate') {
    $viewModel = new DegenerateViewModel();
    if ($action == 'list') {
        $degenerateList = $viewModel->getDegenerateList();
        require_once 'views/degenerate_list.php';
    } elseif ($action == 'add') {
        require_once 'views/degenerate_form.php';
    } elseif ($action == 'edit') {
        $degenerate = $viewModel->getDegenerateById($_GET['id']);
        require_once 'views/degenerate_form.php';
    } elseif ($action == 'save') {
        $viewModel->addDegenerate($_POST['name'], $_POST['height'], $_POST['weight'], $_POST['kelamin']);
        header('Location: index.php?entity=degenerate&message_type=success&message_text=' . urlencode('Degenerate added successfully!'));
        exit();
    } elseif ($action == 'update') {
        $viewModel->updateDegenerate($_GET['id'], $_POST['name'], $_POST['height'], $_POST['weight'], $_POST['kelamin']);
        header('Location: index.php?entity=degenerate&message_type=success&message_text=' . urlencode('Degenerate updated successfully!'));
        exit();
    } elseif ($action == 'delete') {
        $result = $viewModel->deleteDegenerate($_GET['id']);
        if ($result === true) {
            header('Location: index.php?entity=degenerate&message_type=success&message_text=' . urlencode('Degenerate deleted successfully!'));
        } else {
            // $result contains the error message string
            header('Location: index.php?entity=degenerate&message_type=error&message_text=' . urlencode($result));
        }
        exit();
    }
} else if ($entity == 'haluan') {
    $viewModel = new HaluanViewModel();
    if ($action == 'list') {
        $haluanList = $viewModel->getHaluanList();
        require_once 'views/haluan_list.php';
    } elseif ($action == 'add') {
        require_once 'views/haluan_form.php';
    } elseif ($action == 'edit') {
        $haluan = $viewModel->getHaluanById($_GET['id']);
        require_once 'views/haluan_form.php';
    } elseif ($action == 'save') {
        $viewModel->addHaluan($_POST['name'], $_POST['asal'], $_POST['kelamin'], $_POST['stereotipe']);
        header('Location: index.php?entity=haluan&message_type=success&message_text=' . urlencode('Haluan added successfully!'));
        exit();
    } elseif ($action == 'update') {
        $viewModel->updateHaluan($_GET['id'], $_POST['name'], $_POST['asal'], $_POST['kelamin'], $_POST['stereotipe']);
        header('Location: index.php?entity=haluan&message_type=success&message_text=' . urlencode('Haluan updated successfully!'));
        exit();
    } elseif ($action == 'delete') {
        $result = $viewModel->deleteHaluan($_GET['id']);
        if ($result === true) {
            header('Location: index.php?entity=haluan&message_type=success&message_text=' . urlencode('Haluan deleted successfully!'));
        } else {
            // $result contains the error message string
            header('Location: index.php?entity=haluan&message_type=error&message_text=' . urlencode($result));
        }
        exit();
    }
} else if ($entity == 'jodoh') {
    $viewModel = new JodohViewModel();
    if ($action == 'list') {
        $jodohList = $viewModel->getJodohList();
        require_once 'views/jodoh_list.php';
    } elseif ($action == 'add') {
        $degenerates = $viewModel->getDegenerates();
        $haluans = $viewModel->getHaluans();
        require_once 'views/jodoh_form.php';
    } elseif ($action == 'edit') {
        $jodoh = $viewModel->getJodohById($_GET['id']);
        $degenerates = $viewModel->getDegenerates();
        $haluans = $viewModel->getHaluans();
        require_once 'views/jodoh_form.php';
    } elseif ($action == 'save') {
        $viewModel->addJodoh($_POST['degenerate_id'], $_POST['haluan_id']);
        header('Location: index.php?entity=jodoh&message_type=success&message_text=' . urlencode('Jodoh added successfully!'));
        exit();
    } elseif ($action == 'update') {
        $viewModel->updateJodoh($_GET['id'], $_POST['degenerate_id'], $_POST['haluan_id']);
        header('Location: index.php?entity=jodoh&message_type=success&message_text=' . urlencode('Jodoh updated successfully!'));
        exit();
    } elseif ($action == 'delete') {
        $viewModel->deleteJodoh($_GET['id']);
        header('Location: index.php?entity=jodoh&message_type=success&message_text=' . urlencode('Jodoh deleted successfully!'));
        exit();
    }
}
