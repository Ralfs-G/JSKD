<?php
class TaskModel {
    private $file = __DIR__ . '/../data/tasks.json';

    public function getTasks() {
        return json_decode(file_get_contents($this->file), true);
    }

    public function saveTasks($tasks) {
        file_put_contents($this->file, json_encode($tasks, JSON_PRETTY_PRINT));
    }
}
