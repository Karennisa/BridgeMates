<?php
session_start();
include "db.php";

// Pastikan session "username" tersedia
$username = isset($_POST['username']) ? $_POST['username'] : '';
$_SESSION['username'] = $username;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Manajemen Perkuliahan</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
      
    </style>
</head>
<body>

<header class="header">
    <nav class="top-nav">
        <ul>
        <li><a href="#" onclick="showContent('jadwal')"><i class="fas fa-calendar-alt"></i> Jadwal Mata Kuliah</a></li>
            <li><a href="dosen.php"><i class="fas fa-chalkboard-teacher"></i> Informasi Dosen</a></li>
            <li><a href="#" onclick="showContent('denah')"><i class="fas fa-map-marker-alt"></i> Informasi Ruang</a></li>
            <!-- <li><a href="#"><i class="fas fa-search"></i> Cari</a></li> -->
            <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
            <li><a href="register.php"><i class="fas fa-user-plus"></i> Register</a></li>
        </ul>
    </nav>
</header>
 
<aside class="sidebar">
    <div class="logo-container">
        <img src="logo.jpg" alt="Logo" class="logo-img">
        <span class="logo-text">BRIDGE MATES</span>
    </div>
    <div class="user-info">
    <p class="user-role">Nama Pengguna:</p>
        <p class="user-name"><?php echo "Hai,". $_SESSION['username']; ?></p>
        
        <a href="logout.php" class="logout-btn">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
</aside>
<!-- Start Jadwal -->
<div class="container-jadwal" id="jadwal" >
        <div class="header-jadwal">
            Jadwal Kuliah Kelas TI-3A
        </div>
        <table>
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Waktu</th>
                    <th>Mata Kuliah</th>
                    <th>Dosen</th>
                    <th>Ruang</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php'; // File koneksi ke database

                // Query untuk mengambil data dari tabel
                $sql = "SELECT * FROM jadwal ORDER BY FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'), waktu_mulai";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['hari']}</td>
                                <td>{$row['waktu_mulai']} - {$row['waktu_selesai']}</td>
                                <td>{$row['mata_kuliah']}</td>
                                <td>{$row['dosen']}</td>
                                <td>{$row['ruang']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada jadwal</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
<!-- end jadwal -->

<!-- start dosen -->
<div class="content" id="dosen" style="display:none;">
    
</div>
<!-- end dosen -->


<!-- denah start -->
<?php
include 'db.php';

// Handle form submission untuk mengubah status ruangan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $sql = "UPDATE ruang SET status='$status' WHERE id=$id";
    if ($conn->query($sql)) {
        $message = "Status ruang berhasil diperbarui!";
    } else {
        $message = "Terjadi kesalahan: " . $conn->error;
    }
}

// Ambil data ruang dari database
$result = $conn->query("SELECT * FROM ruang");
?>


<div class="container-denah" id="denah" style="display:none;" >
    <h1>Status Ruangan</h1>

    <!-- Menampilkan pesan (jika ada) -->
    <?php if (!empty($message)): ?>
        <p class="message"><?= $message ?></p>
    <?php endif; ?>

    <!-- Denah Ruangan -->
     
    <div style="display: flex; flex-wrap: wrap;">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="ruang <?= $row['status'] === 'digunakan' ? 'digunakan' : 'tidak-digunakan' ?>">
                <h2><?= $row['nama_ruang'] ?></h2>
                <p>Status: <?= $row['status'] ?></p>
            </div>
        <?php endwhile; ?>
    </div>

    `

    <!-- Menampilkan pesan (jika ada) -->
    <?php if (!empty($message)): ?>
        <p class="message"><?= $message ?></p>
    <?php endif; ?>

    <!-- Denah Ruangan -->
    <div style="display: flex; flex-wrap: wrap;">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="ruang <?= $row['status'] === 'digunakan' ? 'digunakan' : 'tidak-digunakan' ?>">
                <h2><?= $row['nama_ruang'] ?></h2>
                <p>Status: <?= $row['status'] ?></p>
            </div>
        <?php endwhile; ?>
    </div>

    <!-- Form untuk Admin Mengubah Status Ruangan -->
    <h2>Ubah Status Ruang</h2>
    <form method="POST">
        <label for="id">Pilih Ruang:</label>
        <select name="id" required>
            <?php
            // Mengambil ulang data ruang untuk dropdown
            $result = $conn->query("SELECT * FROM ruang");
            while ($row = $result->fetch_assoc()):
            ?>
                <option value="<?= $row['id'] ?>"><?= $row['nama_ruang'] ?></option>
            <?php endwhile; ?>
        </select>
        <br>
        <label for="status">Status:</label>
        <select name="status" required>
            <option value="digunakan">Digunakan</option>
            <option value="tidak digunakan">Tidak Digunakan</option>
        </select>
        <br><br>
        <button type="submit">Perbarui</button>
    </form>
    </div>
 <!-- END DENAH -->
<script>
    function showContent(contentId) {
        // Sembunyikan semua konten
        document.getElementById('jadwal').style.display = 'none';
        // document.getElementById('dosen').style.display = 'none';
        document.getElementById('denah').style.display = 'none';

        // Tampilkan konten yang dipilih
        document.getElementById(contentId).style.display = 'block';
    }
</script>
</body>
<?php
mysqli_close($conn);
?>
</html>
