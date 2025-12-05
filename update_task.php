<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $task = $_POST['task'];
    $due_date = $_POST['due_date'];
    $status = $_POST['status'];

    // Correct SQL (no extra comma!)
    $stmt = $conn->prepare("UPDATE tasks SET task=?, due_date=?, status=? WHERE id=?");
    $stmt->bind_param("sssi", $task, $due_date, $status, $id);
    $stmt->execute();
    $stmt->close();
}
?>
