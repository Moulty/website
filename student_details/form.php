<?php
if (!isset($_POST['fields'])) {
    echo "No fields selected. <a href='index.php'>Go Back</a>";
    exit;
}

$fields = $_POST['fields'];

// Ensure $errors and $data exist (they come from process.php when form reloads)
if (!isset($errors)) $errors = [];
if (!isset($data)) $data = [];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Form</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            width: 420px;
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
        }
        h2 { text-align: center; margin-bottom: 20px; color: #222; }
        label { display: block; font-weight: bold; margin: 10px 0 5px; }
        input, select {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 5px;
        }
        .error { color: red; font-size: 14px; margin-bottom: 10px; }
        input[type=submit] {
            width: 100%;
            padding: 12px;
            background: #2196F3;
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }
        input[type=submit]:hover { background: #0b7dda; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Fill the Form</h2>
        <form method="POST" action="process.php">
            <?php foreach ($fields as $field): ?>
                <?php switch ($field):
                    case 'text': ?>
                        <label>Name</label>
                        <input type="text" name="name"
                               value="<?= htmlspecialchars($data['Name'] ?? '') ?>"
                               required>
                        <?php if (isset($errors['name'])): ?>
                            <div class="error"><?= $errors['name']; ?></div>
                        <?php endif; ?>
                        <?php break; ?>

                    <?php case 'email': ?>
                        <label>Email</label>
                        <input type="email" name="email"
                               value="<?= htmlspecialchars($data['Email'] ?? '') ?>"
                               required>
                        <?php if (isset($errors['email'])): ?>
                            <div class="error"><?= $errors['email']; ?></div>
                        <?php endif; ?>
                        <?php break; ?>

                    <?php case 'password': ?>
                        <label>Password</label>
                        <input type="password" name="password" required>
                        <?php if (isset($errors['password'])): ?>
                            <div class="error"><?= $errors['password']; ?></div>
                        <?php endif; ?>
                        <?php break; ?>

                    <?php case 'dropdown': ?>
                        <label>Course</label>
                        <select name="course" required>
                            <option value="">--Select--</option>
                            <option value="DIPLOMA" <?= (isset($data['Course']) && $data['Course']=="DIPLOMA") ? "selected" : ""; ?>>DIPLOMA</option>
                            <option value="AGRICULTURE" <?= (isset($data['Course']) && $data['Course']=="AGRICULTURE") ? "selected" : ""; ?>>AGRICULTURE</option>
                            <option value="B.Tech" <?= (isset($data['Course']) && $data['Course']=="B.Tech") ? "selected" : ""; ?>>B.Tech</option>
                        </select>
                        <?php if (isset($errors['course'])): ?>
                            <div class="error"><?= $errors['course']; ?></div>
                        <?php endif; ?>
                        <?php break; ?>

                    <?php case 'checkbox': ?>
                        <label>
                            <input type="checkbox" name="terms" value="1"
                                   <?= isset($data['Terms']) ? "checked" : ""; ?> required>
                            I agree to terms
                        </label>
                        <?php if (isset($errors['terms'])): ?>
                            <div class="error"><?= $errors['terms']; ?></div>
                        <?php endif; ?>
                        <?php break; ?>
                <?php endswitch; ?>
            <?php endforeach; ?>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
