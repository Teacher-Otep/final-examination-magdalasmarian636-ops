<?php
// includes/update_logic.php

// Ensure this path correctly points to your db.php file
require_once __DIR__ . '/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect all inputs from the form
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $middlename = $_POST['middlename'] ?? '';
    $address = $_POST['address'] ?? '';
    $contact = $_POST['contact'] ?? '';

    // Basic validation: ID, Name, and Surname should not be empty
    if (empty($id) || empty($name) || empty($surname)) {
        echo "Error: Student ID, Name, and Surname are required.";
        exit();
    }

    // Sanitize inputs
    $id = (int)$id;
    $name = htmlspecialchars(trim($name));
    $surname = htmlspecialchars(trim($surname));
    $middlename = htmlspecialchars(trim($middlename));
    $address = htmlspecialchars(trim($address));
    $contact = htmlspecialchars(trim($contact));

    try {
        // SQL query to update all columns for the specific record
        $sql = "UPDATE students 
                SET name = :name, 
                    surname = :surname, 
                    middlename = :middlename, 
                    address = :address, 
                    contact_number = :contact 
                WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name'       => $name,
            ':surname'    => $surname,
            ':middlename' => $middlename,
            ':address'    => $address,
            ':contact'    => $contact,
            ':id'         => $id
        ]);

        // Redirect to index.php with success status
        header("Location: ../public/index.php?status=success");
        exit();
        
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
} else {
    header("Location: ../public/index.php");
    exit();
}
?>