<?php
require_once 'controllers/TaskController.php';

if (isset($_GET['action'])) {
    $controller = new TaskController();
    $controller->handleRequest();
    exit;
}

include 'views/taskView.php';
