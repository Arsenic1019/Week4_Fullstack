<?php
// Read form inputs
$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$password = trim($_POST["password"]);
$confirm_password = trim($_POST["confirm_password"]);

// Basic validation
if (empty($name) || empty($email) || empty($password)) {
    header("Location: registration.html?error=All fields are required");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: registration.html?error=Invalid email format");
    exit;
}

if ($password !== $confirm_password) {
    header("Location: registration.html?error=Passwords do not match");
    exit;
}

if (strlen($password) < 6) {
    header("Location: registration.html?error=Password must be at least 6 characters");
    exit;
}

// File
$file = "users.json";

// Read existing users
$users = [];
if (file_exists($file)) {
    $json = file_get_contents($file);
    $users = json_decode($json, true);
}

// Check duplicate email
foreach ($users as $u) {
    if (strtolower($u["email"]) === strtolower($email)) {
        header("Location: registration.html?error=Email already registered");
        exit;
    }
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Create new user
$new_user = [
    "name" => $name,
    "email" => $email,
    "password" => $hashed_password
];

// Add new user to array
$users[] = $new_user;

// Save back to JSON file
file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));

// Redirect to form with success message
header("Location: registration.html?success=1");
exit;
?>
