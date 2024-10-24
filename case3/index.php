<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Simpan ke database atau kirim email (di sini hanya ditampilkan)
    echo "<h2>Pesan Anda telah dikirim!</h2>";
    echo "<p>Nama: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Pesan: $message</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMKM: Air Ikan</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Selamat Datang di Air Ikan</h1>
        <p>UMKM Penjual Ikan Hias Berkualitas</p>
    </header>
    <nav>
        <ul>
            <li><a href="#about">Tentang Kami</a></li>
            <li><a href="#products">Produk Kami</a></li>
            <li><a href="#contact">Kontak</a></li>
        </ul>
    </nav>
    <section id="about">
        <h2>Tentang Kami</h2>
        <p>Air Ikan adalah UMKM yang bergerak dalam penjualan ikan hias berkualitas. Kami berkomitmen untuk menyediakan ikan hias terbaik dengan pelayanan yang ramah dan profesional.</p>
    </section>
    <section id="products">
        <h2>Produk Kami</h2>
        <div class="product">
            <h3>Ikan Oschar Chili</h3>
            <a href="images/oschar_chili.png">
            <img src="images/oschar_chili.png" alt="Oschar Chili">
            </a>
            <p>Harga: Rp 100.000</p>
            
        </div>
        <div class="product">
            <h3>Ikan Oschar Black</h3>
            <a href="images/oschar_black.png">
            <img src="images/oschar_black.png" alt="Oschar Black">
            </a>
            <p>Harga: Rp 50.000</p>
            
        </div>
        <div class="product">
            <h3>Ikan Kaviat Slayer</h3>
            <a href="images/kavviat_slayer.png">
            <img src="images/kavviat_slayer.png" alt="aviat Slayer">
            </a>
            <p>Harga: Rp 200.000</p>
            
        </div>
    </section>
    <section id="contact">
        <h2>Kontak Kami</h2>
        <form method="POST" action="">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Pesan:</label>
            <textarea id="message" name="message" required></textarea>
            <button type="submit">Kirim</button>
        </form>
    </section>
    <footer>
        <p>&copy; 2024 Air Ikan. Semua hak dilindungi.</p>
    </footer>
</body>
</html>
