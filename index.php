<?php
include("koneksi.php");
?>
<body>
<form method="POST" action="">
Search: <input type="text" name="txtsearch">
<select name="kategori">
 <option value="sepatu">Sepatu</option>
 <option value="tenda">Tenda</option>
 <option value="jaket">Jaket</option>
</select>
<select name="jaket">
 <option value="merk">merk</option>
 <option value="ukuran">ukuran</option>
 <option value="jenis">Jenis</option>
</select>
<input type="submit" value="Search" name="submit"/>

<?php
  if (isset($_POST['submit'])) {
   $search = $_POST['txtsearch'];
   $kategori = $_POST['kategori'];
   
   $sql = "SELECT * FROM barang WHERE $kategori LIKE '%$search%'";
   $result = mysql_query($sql) or die('Error, list Kategori failed. ' . mysql_error());
    
   if (mysql_num_rows($result) == 0) {
    echo '<p></p><p>Pencarian tidak ditemukan</p>';
   } else {
    echo '<p></p>';
    while ($row = mysql_fetch_array($result)) {
     extract($row);
      
     echo '<p>sepatu: '.$Sepatu.'</p>';
     echo '<p>tenda: '.$tenda.'</p>';
     echo '<p>sendal: '.$sendal.'</p>';
     echo '<p>tas: '.$tas.'</p>';
     echo '<p>jaket: '.$jaket.'</p>';
     echo '<p>celana: '.$celana.'</p>';
     echo '<p>lain-lain: '.$lain_lain.'</p>';
     echo '<p></p>';
    }
   }
  }
?>
</form>
</body>
</html>