<!DOCTYPE html>
<html>
<head>
    <title>View Submissions</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
        h2 { margin-bottom: 15px; }
        table { border-collapse: collapse; width: 100%; background: #fff; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background: #333; color: #fff; }
        .home { background: #2196F3; color: #fff; display: inline-block; margin-bottom: 15px; padding: 6px 10px; border-radius: 5px; text-decoration: none; }
    </style>
</head>
<body>
    <a class="home" href="index.php">🏠 Home</a>
    <h2>📄 Stored Submissions</h2>
    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Course</th>
            <th>Terms</th>
        </tr>

        <?php
        $file = "submissions.txt";
        if (file_exists($file)) {
            $lines = file($file, FILE_IGNORE_NEW_LINES);
            foreach ($lines as $index => $line) {
                $data = json_decode($line, true);
                if (!$data) continue; // skip empty/invalid lines

                echo "<tr>";
                echo "<td>".($index+1)."</td>";
                echo "<td>".($data['Name'] ?? '')."</td>";
                echo "<td>".($data['Email'] ?? '')."</td>";
                echo "<td>".($data['Password'] ?? '')."</td>";
                echo "<td>".($data['Course'] ?? '')."</td>";
                echo "<td>".($data['Terms'] ?? '')."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No submissions found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
