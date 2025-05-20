<?php
require_once 'viewmodel/DegenerateViewModel.php';
require_once 'viewmodel/HaluanViewModel.php';
require_once 'viewmodel/JodohViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'degenerate';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

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
        header('Location: index.php?entity=degenerate');
    } elseif ($action == 'update') {
        $viewModel->updateDegenerate($_GET['id'], $_POST['name'], $_POST['height'], $_POST['weight'], $_POST['kelamin']);
        header('Location: index.php?entity=degenerate');
    } elseif ($action == 'delete') {
        $viewModel->deleteDegenerate($_GET['id']);
        header('Location: index.php?entity=degenerate');
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
        $viewModel->addHaluan($_POST['name'], $_POST['height'], $_POST['weight'], $_POST['kelamin']);
        header('Location: index.php?entity=haluan');
    } elseif ($action == 'update') {
        $viewModel->updateHaluan($_POST['id'], $_POST['name'], $_POST['height'], $_POST['weight'], $_POST['kelamin']);
        header('Location: index.php?entity=haluan');
    } elseif ($action == 'delete') {
        $viewModel->deleteHaluan($_GET['id']);
        header('Location: index.php?entity=haluan');
    }
} else if ($entity == 'jodoh') {
    $viewModel = new JodohViewModel();
    if ($action == 'list') {
        $jodohList = $viewModel->getJodohList();
        require_once 'views/staff_list.php';
    } elseif ($action == 'add') {
        $degenerates = $viewModel->getDegenerates();
        $haluans = $viewModel->getHaluans();
        require_once 'views/staff_form.php';
    } elseif ($action == 'edit') {
        $jodoh = $viewModel->getJodohById($_GET['id']);
        $degenerates = $viewModel->getDegenerates();
        $haluans = $viewModel->getHaluans();
        require_once 'views/staff_form.php';
    } elseif ($action == 'save') {
        $viewModel->addJodoh($_POST['name'], $_POST['department_id'], $_POST['shift_id']);
        header('Location: index.php?entity=staff');
    } elseif ($action == 'update') {
        $viewModel->updateJodoh($_GET['id'], $_POST['name'], $_POST['department_id'], $_POST['shift_id']);
        header('Location: index.php?entity=staff');
    } elseif ($action == 'delete') {
        $viewModel->deleteJodoh($_GET['id']);
        header('Location: index.php?entity=staff');
    }
}
