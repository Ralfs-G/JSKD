<?php
require_once __DIR__ . '/../models/TaskModel.php';

class TaskController {
    private $model;

    public function __construct() {
        $this->model = new TaskModel();
    }

    public function handleRequest() {
        $action = $_GET['action'] ?? '';

        switch ($action) {
            case 'get':
                echo json_encode($this->model->getTasks());
                break;

            case 'add':
                $tasks = $this->model->getTasks();
                $tasks[] = [
                    'id' => time(),
                    'title' => $_POST['title'],
                    'status' => 'not-done'
                ];
                $this->model->saveTasks($tasks);
                echo json_encode(['success' => true]);
                break;

            case 'delete':
                $tasks = array_filter($this->model->getTasks(), function($t) {
                    return $t['id'] != $_POST['id'];
                });
                $this->model->saveTasks(array_values($tasks));
                echo json_encode(['success' => true]);
                break;

            case 'toggle':
                $tasks = $this->model->getTasks();
                foreach ($tasks as &$task) {
                    if ($task['id'] == $_POST['id']) {
                        $task['status'] = $task['status'] === 'done' ? 'not-done' : 'done';
                    }
                }
                $this->model->saveTasks($tasks);
                echo json_encode(['success' => true]);
                break;

            case 'edit':
                $tasks = $this->model->getTasks();
                foreach ($tasks as &$task) {
                    if ($task['id'] == $_POST['id']) {
                        $task['title'] = $_POST['title'];
                    }
                }
                $this->model->saveTasks($tasks);
                echo json_encode(['success' => true]);
                break;
        }
    }
}
