<html>
<?php include "koneksi.php";
 $sqlm = mysql_query("select * from member where username='$_SESSION[usermbr]'");
 $rm = mysql_fetch_array($sqlm);
$nama=$rm['nama'];
echo "<center style='font-family:GreyscaleBasic;font-weight:bold;'><h2><span style='font-size:23px'><u> Selamat Datang $nama</u></span></br></br>Sistem Pakar : Kerusakan Motor Vario 125  </h2></center>";
?>

<p align="justify">Sistem pakar merupakan cabang dari Artificial Intellegence (AI) yang cukup tua karena sistem ini mulai dikembangkan pada pertengaan 1960. Sistem pakar yang muncul pertama kali adalah General-purpose problem solver (GPS) yang dikembangkan oleh Newel dan Simon. Istilah sistem pakar berasal dari istilah Knowledge-based expert system. Istilah ini muncul karena untuk pemecahan masalah, sistem pakar menggunakan pengetahuan seorang pakar yang dimasukkan kedalam computer (Sutojo, T., Edy Mulyanto, dan Vincent Suhartono, 2011 : 160).
</p>
<p align="justify"> Secara umum, sistem pakar adalah system yang berusaha mengadopsi pengetahuan manusia ke komputer yang dirancang untuk memodelkan kemampuan menyelesaikan masalah seperti layaknya seorang pakar. Dengan sistem pakar ini, orang awam pun dapat menyelesaikan masalahnya atau hanya sekedar mencari suatu informasi berkualitas yang hanya dapat diperoleh dengan bantuan para ahli di bidangnya (Mujilahwati, Siti, 2014).
</p>
<p align="justify">
Istilah sistem pakar berasal dari kata knowledge-based expert system. Istilah ini muncul karena untuk memecahkan suatu masalah, sistem pakar menggunakan pengetahuan yang dimasukkan ke dalam komputer. Seseorang yang bukan pakar menggunakan sistem pakar untuk meningkatkan kemampuan pemecahan masalah, sedangkan seorang pakar menggunakan sistem pakar untuk knowledge assistant (Rahman, Fakhrul, Eka Praja Wiyata Mandala dan Teri Ade Putra, 2017).
</p>

</html>
</html>
