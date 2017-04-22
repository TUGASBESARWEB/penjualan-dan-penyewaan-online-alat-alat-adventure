<?php
mysqli_query($con,"delete from pekerjaan where id_order='$_GET[id]'");
mysqli_query($con,"delete from biaya where id_order='$_GET[id]'");
mysqli_query($con,"delete from orders where id_order='$_GET[id]'");
echo "<meta http-equiv=refresh content='0;url=?module=order'>";
?>