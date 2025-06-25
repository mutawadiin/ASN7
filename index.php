<style>
    body {
    font-family: Arial, sans-serif;
    margin: 30px;
    background-color: #f8f9fa;
}

h2 {
    color: #333;
}

form {
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ddd;
    max-width: 400px;
    border-radius: 5px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

input[type="text"],
input[type="number"],
button {
    display: block;
    width: 100%;
    padding: 8px;
    margin-top: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #28a745;
    color: white;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #218838;
}

a {
    text-decoration: none;
    color: #007bff;
}

a:hover {
    text-decoration: underline;
}

table {
    border-collapse: collapse;
    width: 100%;
    background-color: white;
    margin-top: 20px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}

th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

th {
    background-color: #343a40;
    color: white;
}

td a {
    margin-right: 10px;
}
</style>

<?php include 'koneksi.php'; ?>

<h2>Data Buku</h2>
<a href="tambah.php">Tambah Data</a><br><br>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ISBN</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Tahun Terbit</th>
        <th>Aksi</th>
    </tr>

    <?php
    $result = mysqli_query($conn, "SELECT * FROM buku");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>".$row['isbn']."</td>
            <td>".$row['judul']."</td>
            <td>".$row['penulis']."</td>
            <td>".$row['penerbit']."</td>
            <td>".$row['tahun_terbit']."</td>
            <td>
                <a href='update.php?isbn=".$row['isbn']."'>update</a> |
                <a href='delete.php?isbn=".$row['isbn']."' onclick=\"return confirm('Yakin hapus buku ini?');\">delete</a>
            </td>
        </tr>";
    }
    ?>
</table>

