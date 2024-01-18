<?php
require_once 'Library.php';

$library = new Library();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrow'])) {
    $bookTitle = $_POST['bookTitle'];
    $message = $library->borrowBook($bookTitle);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Book Rental</title>
</head>
<body>

    <header>
        <h1>Book Rental</h1>
    </header>

    <div class="container">

        
        <form action="index.php" method="post">
            <label for="bookTitle">Book Title:</label>
            <input type="text" name="bookTitle" required>
            <button type="submit" name="borrow">Borrow</button>
        </form>

        
        <?php if (isset($message)): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>

        
        <h2>Available Books:</h2>
        <?php
        echo "<ul>";
        $library->displayAvailableBooks();
        echo "</ul>";
        ?>

    </div>

    <footer>
        &copy; 2024 Book Rental
    </footer>

</body>
</html>
