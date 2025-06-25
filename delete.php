<?php include 'koneksi.php'; ?>

<?php
$isbn = $_GET['isbn'];
$query = "DELETE FROM buku WHERE isbn='$isbn'";

if (mysqli_query($conn, $query)) {
    header("Location: index.php");
    exit;
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>