<?php

// Definisi tipe data buah
class Fruit {
    public $fruitId;
    public $fruitName;
    public $fruitType;
    public $stock;

    public function __construct($fruitId, $fruitName, $fruitType, $stock) {
        $this->fruitId = $fruitId;
        $this->fruitName = $fruitName;
        $this->fruitType = $fruitType;
        $this->stock = $stock;
    }
}

// Data buah

$fruits = [
    new Fruit(1, 'Apel', 'IMPORT', 10),
    new Fruit(2, 'Kurma', 'IMPORT', 20),
    new Fruit(3, 'apel', 'IMPORT', 50),
    new Fruit(4, 'Manggis', 'LOCAL', 100),
    new Fruit(5, 'Jeruk Bali', 'LOCAL', 10),
    new Fruit(6, 'KURMA', 'IMPORT', 20),
    new Fruit(7, 'Salak', 'LOCAL', 150)
];

// Fungsi untuk mendapatkan nama-nama buah yang dimiliki Andi dan wadah berdasarkan tipe
// Fungsi untuk mendapatkan nama-nama buah yang dimiliki Andi dan wadah berdasarkan tipe
function getFruitsAndContainers($fruits) {
    $ownedFruits = [];
    $containers = [];

    // Mengelompokkan buah berdasarkan tipe
    foreach ($fruits as $fruit) {
        if ($fruit->stock > 0) { // Mengecek apakah buah tersedia
            
            // Menyimpan nama buah tanpa duplikat (case-insensitive)
            $fruitNameLower = strtolower($fruit->fruitName);
            if (!in_array($fruitNameLower, array_map('strtolower', $ownedFruits))) {
                $ownedFruits[] = ucfirst($fruitNameLower); // Menyimpan nama buah tanpa duplikat
            }
            
            // Mengelompokkan buah ke dalam wadah berdasarkan tipe
            if (!isset($containers[$fruit->fruitType])) {
                $containers[$fruit->fruitType] = [
                    'fruits' => [], // Menyimpan nama buah
                    'totalStock' => 0 // Menyimpan total stok
                ]; 
            }
            // Menghindari duplikat dalam tiap tipe wadah juga
            if (!in_array($fruitNameLower, array_map('strtolower', $containers[$fruit->fruitType]['fruits']))) {
                $containers[$fruit->fruitType]['fruits'][] = ucfirst($fruitNameLower); // Menambahkan buah ke dalam wadah
            }
            
            $containers[$fruit->fruitType]['totalStock'] += $fruit->stock; // Menambahkan stok ke total
        }
    }

    return [$ownedFruits, $containers];
}

// Mendapatkan nama-nama buah yang dimiliki Andi dan wadah
list($andiFruits, $fruitContainers) = getFruitsAndContainers($fruits);

// Menampilkan hasil
echo "Buah yang dimiliki Andi : " . implode(", ", $andiFruits) . "<br><br>";

echo "Jumlah wadah yang dibutuhkan: " . count($fruitContainers) . "<br><br>";

echo "Buah dalam masing-masing wadah dan total stok:<br>";
foreach ($fruitContainers as $type => $data) {
    echo "Wadah ($type): " . implode(", ", $data['fruits']) . "<br>";
    echo "Total Stok: " . $data['totalStock'] . "<br><br>";
}


// Komentar terkait kasus
$comments = "Dalam kasus ini, Andi memiliki berbagai jenis buah dengan stok yang bervariasi. " .
            "Pengelompokan buah berdasarkan tipe sangat membantu dalam manajemen inventaris. " .
            "Dengan cara ini, Andi dapat lebih mudah mengelola dan menghitung kebutuhan buahnya. " .
            "Perlu dicatat bahwa ada beberapa buah dengan nama yang mirip, seperti 'Apel' dan 'apel', " .
            "yang menunjukkan pentingnya konsistensi dalam penamaan untuk menghindari kebingungan.";

echo "Komentar: " . $comments;


?>
