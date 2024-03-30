<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL Command Line</title>
    <!-- Add Bootstrap CSS Link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Bootstrap Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="home.php">MyDatabase</a>
    </nav>

    <div class="container mt-5">
        <h1>MySQL Command Line </h1>
        <form method="post" class="border p-4">
            <div class="form-group">
                <label for="sqlQuery">Enter SQL Query:</label>
                <textarea id="sqlQuery" name="sqlQuery" rows="5" class="form-control" required placeholder="Enter SQL Query here..."></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Execute Query</button>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Establish a MySQL database connection
            session_start();
            $servername = "localhost";
            $username=$_SESSION["username"];
            $password=$_SESSION["password"];
            $database="project";

            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get the SQL query from the form
            $sqlQuery = $_POST["sqlQuery"];

            // Execute the SQL query
            $result = $conn->query($sqlQuery);

            if ($result) {
                // Display the query results
                echo "<h2 class='mt-4'>Query Results:</h2>";
                echo "<pre>";
                while ($row = $result->fetch_assoc()) {
                    print_r($row);
                }
                echo "</pre>";
            } else {
                // Display an error message if the query fails
                echo "<h2 class='mt-4'>Error:</h2>";
                echo "Error executing the query: " . $conn->error;
            }

            // Close the database connection
            $conn->close();
        }
        ?>
    </div>

    <!-- Add Bootstrap JS and jQuery Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
