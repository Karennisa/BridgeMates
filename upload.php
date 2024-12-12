<?php
// include 'db.php';  // Memasukkan koneksi ke database

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];

    // Menangani upload foto
    $foto = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $foto_folder = "uploads/".$foto;

    // Menyimpan file foto ke folder uploads
    if (move_uploaded_file($foto_tmp, $foto_folder)) {
        // Menyimpan data ke database
        $query = "INSERT INTO dosen (foto, nama, no_hp, email) VALUES ('$foto', '$nama', '$no_hp', '$email')";
        if (mysqli_query($conn, $query)) {
            echo "Data dosen berhasil ditambahkan.";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Gagal mengunggah foto.";
    }
}
?>
