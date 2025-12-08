<?php
echo "<h3>Tes Psiko</h3>";

// Soal a: 4 6 9 13 18 ? ?
// Pola: selisih bertambah 1 setiap kali (2, 3, 4, 5, 6, ...)
$a = [4, 6, 9, 13, 18];
for ($i = 1; $i <= 2; $i++) {
    $selisih = $i + 5; // mulai dari 6 lalu 7
    $next = end($a) + $selisih;
    $a[] = $next;
}
echo "a. " . implode(" ", $a) . "<br>";

// Soal b: 2 2 3 3 4 ? ?
// Pola: tiap angka muncul 2 kali, lalu naik 1
$b = [2, 2, 3, 3, 4];
for ($i = 0; $i < 2; $i++) {
    // ambil angka terakhir, cek apakah sudah double
    $last = end($b);
    $countLast = 0;
    foreach (array_reverse($b) as $val) {
        if ($val == $last) $countLast++;
        else break;
    }
    if ($countLast == 2) {
        $b[] = $last + 1;
    } else {
        $b[] = $last;
    }
}
echo "b. " . implode(" ", $b) . "<br>";

// Soal c: 1 9 2 10 3 ? ?
// Pola: ganjil (1,2,3,4,5,...) dan 9,10,11,... diselang-seling
$c = [1, 9, 2, 10, 3];
$next1 = 11; // setelah 10
$next2 = 4;  // setelah 3
$c[] = $next1;
$c[] = $next2;
echo "c. " . implode(" ", $c) . "<br>";
?>
