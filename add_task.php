<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $task = trim($_POST['task']);
    $due_date = $_POST['due_date'];

    // Duplicate check
    $check = $conn->prepare("SELECT id FROM tasks WHERE LOWER(task) = LOWER(?)");
    $check->bind_param("s", $task);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "duplicate";
        exit;
    }
    $check->close();

    // Insert
    $stmt = $conn->prepare("INSERT INTO tasks (task, due_date) VALUES (?, ?)");
    $stmt->bind_param("ss", $task, $due_date);
    $stmt->execute();
    $stmt->close();

    echo "ok";
}
?>
