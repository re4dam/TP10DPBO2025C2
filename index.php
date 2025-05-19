<?php
require_once 'viewmodel/DegenerateViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'degenerate';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity == 'degenerate') {
    $viewModel = new DegenerateViewModel();
    if ($action == 'list') {
        $degenerateList = $viewModel->getDegenerateList();
        require_once 'views/degenerate_list.php';
    }
}

// echo "testing" . "<br>";
// $a = 10;
//
// $viewModel = new DegenerateViewModel();
// $degenerateList = $viewModel->getDegenerateList();
//
// for ($i = 0; $i < $a; $i++) {
//     # code...
//     echo $i + 1 . ". bisa bisa" . "<br>";
// }
//
// echo "<br>";
// foreach ($degenerateList as $degenerate) {
//     echo implode(", ", $degenerate) . "<br>";
// }
// echo "<br>";
//
// echo "bisa tidak <br>";
