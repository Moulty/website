<?php
$errors = [];
$data = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Name validation
    if (isset($_POST['name'])) {
        $name = trim($_POST['name']);
        if (strlen($name) < 1) {
            $errors['name'] = "Name must be at least 1 characters.";
        } else {
            $data['Name'] = $name;
        }
    }

    // Email validation
    if (isset($_POST['email'])) {
        $email = trim($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format.";
        } else {
            $data['Email'] = $email;
        }
    }

    // Password validation
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        if (strlen($password) < 3) {
            $errors['password'] = "Password must be at least 3 characters.";
        } else {
            $data['Password'] = $password;
        }
    }

    // Dropdown validation
    if (isset($_POST['course'])) {
        if ($_POST['course'] == "") {
            $errors['course'] = "Please select a course.";
        } else {
            $data['Course'] = $_POST['course'];
        }
    }

    // Checkbox validation
    if (isset($_POST['terms'])) {
        $data['Terms'] = "Accepted";
    } else if (array_key_exists('terms', $_POST)) {
        $errors['terms'] = "You must accept the terms.";
    }

    // If errors → reload form with inline errors
    if (!empty($errors)) {
        include("form.php");
    } else {
        // Unique ID for each submission
        $data['Id'] = uniqid();

        // Save valid data in text file
        $file = fopen("submissions.txt", "a");
        fwrite($file, json_encode($data) . PHP_EOL);
        fclose($file);

        echo "<div style='font-family:Segoe UI; text-align:center; margin-top:100px;'>
                <h2 style='color:green;'>✅ Form submitted successfully!</h2>
                <a href='index.php' style='display:inline-block; margin-top:15px; padding:10px 20px; background:#2196F3; color:white; text-decoration:none; border-radius:8px;'>🛠 Build New Form</a>
                <br><br>
                <a href='view.php' style='display:inline-block; margin-top:10px; padding:10px 20px; background:#4CAF50; color:white; text-decoration:none; border-radius:8px;'>📄 View Submissions</a>
              </div>";
    }
}
?>
