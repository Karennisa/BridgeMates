<?php
include 'db.php'; // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Proses upload foto
    $foto = $_FILES['foto']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto);

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        // Query untuk menyimpan data
        $query = "INSERT INTO dosen (foto, nama, no_hp, email) VALUES ('$foto', '$nama', '$no_hp', '$email')";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data berhasil ditambahkan!');</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        echo "<script>alert('Gagal mengupload foto!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Dosen</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Gaya dasar untuk body */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            flex-direction: column; /* Menata elemen secara vertikal */
            background-color: #eef2f7; /* Warna latar belakang */
            font-family: 'Poppins', sans-serif;
        }

        /* Tombol kembali */
        .back-button {
            display: block;
            margin: 20px 0; /* Memberikan jarak atas dan bawah */
            background-color: #5D768B; /* Warna tombol */
            color: white; /* Warna teks */
            text-decoration: none; /* Hilangkan garis bawah */
            padding: 10px 20px; /* Padding dalam tombol */
            font-size: 14px; /* Ukuran font */
            border-radius: 5px; /* Sudut tombol melengkung */
            text-align: center; /* Teks berada di tengah */
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: background-color 0.3s; /* Efek transisi saat hover */
        }

        .back-button:hover {
            background-color: #4b6175; /* Warna tombol saat di-hover */
        }

        /* Kontainer utama */
        .wrapper {
            width: 80%; /* Panjang maksimal 80% dari layar */
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Efek bayangan */
            border-radius: 10px; /* Sudut melengkung */
            background-color: #ffffff; /* Latar belakang putih */
            box-sizing: border-box; /* Hindari padding memengaruhi lebar */
        }

        /* Heading */
        .wrapper h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Form styling */
        form {
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 10px; /* Jarak antar elemen lebih rapat */
            align-items: stretch;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }

        /* Label styling */
        form label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Input dan tombol */
        form input, form button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            width: 100%;
        }

        form button {
            background-color: #5D768B;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #4b6175;
        }

        /* Styling tabel */
        table {
            width: 70%; /* Lebar tabel penuh */
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table thead {
            background-color: #5D768B;
            color: white;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #ddd;
        }

        table img {
            /* border-radius: 50%; */
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>
</head>
<body>
      <a href="index.php" class="back-button">Kembali</a>  <!--Tombol di atas  --> 
    <!-- <div class="wrapper">
        <form method="POST" enctype="multipart/form-data">
            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto" required>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>
            <label for="no_hp">No Hp:</label>
            <input type="text" name="no_hp" id="no_hp" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <button type="submit" name="submit">Tambah Dosen</button>
        </form>  -->

        <h2>Dosen Politeknik Purbaya</h2>
        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>No Hp</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php'; // Memasukkan koneksi ke database

                $query = "SELECT * FROM dosen";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td><img src='uploads/".$row['foto']."' alt='Foto'></td>";
                    echo "<td>".$row['nama']."</td>";
                    echo "<td>".$row['no_hp']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
