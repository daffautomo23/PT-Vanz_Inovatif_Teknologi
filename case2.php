<?php

// Definisi tipe data komentar
class Comment {
    public $commentId;
    public $commentContent;
    public $replies;

    public function __construct($commentId, $commentContent, $replies = []) {
        $this->commentId = $commentId;
        $this->commentContent = $commentContent;
        $this->replies = $replies;
    }
}

// Data komentar
$comments = [
    new Comment(1, 'Hai', [
        new Comment(11, 'Hai juga', [
            new Comment(111, 'Haai juga hai jugaa'),
            new Comment(112, 'Haai juga hai jugaa')
        ]),
        new Comment(12, 'Hai juga', [
            new Comment(121, 'Haai juga hai jugaa')
        ])
    ]),
    new Comment(2, 'Halooo')
];

// Fungsi rekursif untuk menghitung total komentar
function countComments($comments) {
    $total = count($comments); // Menghitung komentar pada level ini

    foreach ($comments as $comment) {
        if (!empty($comment->replies)) {
            // Menghitung komentar dalam balasan
            $total += countComments($comment->replies);
        }
    }

    return $total;
}

// Menghitung total komentar
$totalComments = countComments($comments);

// Menampilkan hasil
echo "Total komentar: " . $totalComments; // Output: Total komentar: 7
?>
