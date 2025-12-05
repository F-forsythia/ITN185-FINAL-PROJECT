<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get the values sent through AJAX / form
    $id = $_POST['id'];
    $task = $_POST['task'];
    $due_date = $_POST['due_date'];
    $status = $_POST['status'];

    // Validate (optional but recommended)
    if (empty($id) || empty($task)) {
        echo "Error: Missing required fields.";
        exit;
    }

    // Update query
    $stmt = $conn->prepare("UPDATE tasks SET task = ?, due_date = ?, status = ? WHERE id = ?");
    $stmt->bind_param("sssi", $task, $due_date, $status, $id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
}
?>
