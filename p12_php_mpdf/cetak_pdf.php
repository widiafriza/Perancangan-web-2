<?php
require_once __DIR__ . '/vendor/autoload.php';
include "koneksi.php";

use Mpdf\Mpdf;

$mpdf = new Mpdf([
    'format' => 'A4',
    'margin_top' => 35,
    'margin_bottom' => 20,
    'margin_left' => 15,
    'margin_right' => 15
]);

/* =======================
   HEADER / KOP SURAT
======================= */
$header = '
<table width="100%" style="border-bottom:3px solid #000; padding-bottom:10px;">
<tr>
    <td width="15%" align="center">
        <img src="logo.jpg" width="80">
    </td>
    <td width="85%" align="center">
        <h2 style="margin:0;font-size:16px;">POLITEKNIK PURBAYA</h2>
        <p style="margin:2px 0;font-size:12px;">
            Kampus Vokasi Unggul dan Berdaya Saing
        </p>
        <p style="margin:2px 0;font-size:11px;">
            Jl. Raya Karanganyar No. 08, Kabupaten Tegal, Jawa Tengah<br>
            Telp: (0283) 000000 | Email: info@politeknikpurbaya.ac.id
        </p>
    </td>
</tr>
</table>
';

$mpdf->SetHTMLHeader($header);

/* =======================
   AMBIL DATA
======================= */
$query = mysqli_query($koneksi, "SELECT * FROM pendaftaran");

/* =======================
   ISI DOKUMEN
======================= */
$html = '
<br>

<table width="100%" style="font-size:12px;">
<tr>
    <td width="15%">Nomor</td>
    <td width="2%">:</td>
    <td width="50%">014/LAP-MHS/'.date('Y').'</td>
</tr>
<tr>
    <td>Hal</td>
    <td>:</td>
    <td>Laporan Data Mahasiswa</td>
</tr>
</table>

<p style="text-align:right;font-size:12px;">
    Tegal, '.date('d F Y').'
</p>

<p style="font-size:12px;text-align:justify;">
    <b>Dengan hormat,</b><br><br>
    Bersama ini kami sampaikan laporan data mahasiswa yang telah melakukan
    proses pendaftaran pada Politeknik Purbaya Kabupaten Tegal.
    Laporan ini disusun sebagai bahan dokumentasi administrasi akademik
    serta evaluasi data mahasiswa.
</p>

<table border="1" cellpadding="6" cellspacing="0" width="100%" style="font-size:11px;">
<thead>
<tr style="background-color:#1565c0;color:white;text-align:center;">
    <th width="5%">No</th>
    <th width="18%">Nama</th>
    <th width="8%">JK</th>
    <th width="15%">Prodi</th>
    <th width="12%">Tgl Lahir</th>
    <th width="22%">Alamat</th>
    <th width="10%">Status</th>
</tr>
</thead>
<tbody>
';

$no = 1;
while ($row = mysqli_fetch_assoc($query)) {
    $html .= '
    <tr>
        <td align="center">'.$no++.'</td>
        <td>'.$row['nama_lengkap'].'</td>
        <td align="center">'.$row['jenis_kelamin'].'</td>
        <td>'.$row['program_studi'].'</td>
        <td>'.$row['tanggal_lahir'].'</td>
        <td>'.$row['alamat'].'</td>
        <td align="center">'.$row['status_pendaftaran'].'</td>
    </tr>
    ';
}

$html .= '
</tbody>
</table>

<p style="font-size:12px;text-align:justify;margin-top:10px;">
    Demikian laporan data mahasiswa ini kami sampaikan. Laporan ini dibuat
    dengan sebenar-benarnya untuk digunakan sebagaimana mestinya.
    Atas perhatian Bapak/Ibu, kami ucapkan terima kasih.
</p>

<br><br>

<table width="100%" style="font-size:12px;">
<tr>
    <td width="60%"></td>
    <td width="40%" align="center">
        Kepala Akademik<br><br><br><br>
        <b>Nama Pejabat</b><br>
        NIP. 123456789
    </td>
</tr>
</table>

<p style="font-size:10px;margin-top:10px;">
    Dicetak pada: '.date("d-m-Y H:i").'
</p>
';

$mpdf->WriteHTML($html);
$mpdf->Output("Laporan_Data_Mahasiswa.pdf", "I");
exit;
