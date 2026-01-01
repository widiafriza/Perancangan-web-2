<?php

include("koneksi.php");

// KOREKSI: Menggunakan user_id
$query = mysqli_query($conn,"SELECT COUNT(user_id) FROM `user`");
if (!$query) { 
    die("Query Error (Count): " . mysqli_error($conn));
}
$row = mysqli_fetch_row($query);
$rows = $row[0];

$page_rows = 7;
$last = ceil($rows/$page_rows);
if($last < 1){
    $last = 1;
}

$pagenum = 1;
if(isset($_GET['pn'])){
    $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}

if ($pagenum < 1) {
    $pagenum = 1;
} else if ($pagenum > $last) {
    $pagenum = $last;
}

$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

$nquery = mysqli_query($conn,"SELECT * FROM `user` $limit");
if (!$nquery) { 
    die("Query Error (Data): " . mysqli_error($conn));
}

$paginationCtrls = '';
if($last != 1){
    if ($pagenum > 1) {
        $previous = $pagenum - 1;
        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-default">Previous</a> &nbsp; &nbsp; ';

        for($i = $pagenum-4; $i < $pagenum; $i++){
            if($i > 0){
                $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-default">'.$i.'</a> &nbsp; ';
            }
        }
    }

    // Penanda halaman aktif
    $paginationCtrls .= '<span class="btn btn-primary">'.$pagenum.'</span> &nbsp; ';

    for($i = $pagenum+1; $i <= $last; $i++){
        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-default">'.$i.'</a> &nbsp; ';

        if($i >= $pagenum+4){
            break;
        }
    }
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-default">Next</a> ';
    }
}

// Catatan: Tidak ada tag penutup ?>