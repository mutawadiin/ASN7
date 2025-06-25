<?php include 'koneksi.php'; ?>

<?php
$isbn = $_GET['isbn'];
$data = mysqli_query($conn, "SELECT * FROM buku WHERE isbn='$isbn'");
$row = mysqli_fetch_assoc($data);
?>

<h2>Edit Data Buku</h2>
<form method="POST" action="">
    Judul Buku: <input type="text" name="judul" value="<?php echo $row['judul']; ?>" required><br>
    Penulis: <input type="text" name="penulis" value="<?php echo $row['penulis']; ?>" required><br>
    Penerbit: <input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>" required><br>
    Tahun Terbit: <input type="number" name="tahun_terbit" value="<?php echo $row['tahun_terbit']; ?>" required><br>
    <button type="submit" name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];

    $query = "UPDATE buku SET 
                judul='$judul', 
                penulis='$penulis', 
                penerbit='$penerbit', 
                tahun_terbit='$tahun' 
              WHERE isbn='$isbn'";

    if (mysqli_query($conn, $query)) {
        echo "Data berhasil diupdate! <a href='index.php'>Kembali</a>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

 <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f5f5f5;
        }

        h2 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 500px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
