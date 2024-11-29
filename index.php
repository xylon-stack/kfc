<?php
// Mulai sesi untuk menyimpan pesan
session_start();

// Inisialisasi variabel pesan
$success = '';
$name = '';
$email = '';
$message = '';

// Cek apakah formulir telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir dan mengamankannya
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validasi sederhana
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Simpan data atau kirim email (contoh ini hanya menyimpan pesan sukses)
        $success = "Terima kasih, $name! Pesan Anda telah diterima.";
        
        // Reset nilai formulir
        $name = $email = $message = '';
    } else {
        $success = "Mohon lengkapi semua bidang formulir.";
    }

    // Simpan pesan ke sesi untuk ditampilkan setelah redirect
    $_SESSION['success'] = $success;
    
    // Redirect untuk mencegah pengiriman ulang formulir
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Ambil pesan dari sesi jika ada
if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contoh file index.php dengan PHP dan HTML">
    <title><?php echo $title; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        header {
            background: #0073e6;
            color: white;
            padding: 1rem 0;
            text-align: center;
        }
        nav {
            background: #f4f4f4;
            padding: 0.5rem 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        nav a {
            text-decoration: none;
            margin: 0 1rem;
            color: #0073e6;
            font-weight: bold;
        }
        nav a:hover {
            color: #005bb5;
        }
        main {
            padding: 2rem;
            text-align: center;
        }
        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 1rem 0;
        }
    </style>
</head>
<body>
    <header>
        <h1><?php echo $title; ?></h1>
        <p>Selamat datang, <?php echo $name; ?>!</p>
    </header>
    <nav>
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
    </nav>
    <main>
        <section id="home">
            <h2>Home</h2>
            <p>Ini adalah halaman utama yang dibuat menggunakan PHP dan HTML.</p>
        </section>
        <section id="about">
            <h2>About</h2>
            <p>Halaman ini dibuat sebagai contoh bagaimana PHP dapat digunakan untuk membuat halaman web dinamis.</p>
        </section>
        <section id="contact">
            <h2>Contact</h2>
            <p>Hubungi kami melalui email: <a href="mailto:info@example.com">info@example.com</a></p>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo $year; ?> Contoh Halaman PHP. All rights reserved.</p>
    </footer>
</body>
</html>
