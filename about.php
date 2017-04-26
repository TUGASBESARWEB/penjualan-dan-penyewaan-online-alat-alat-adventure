<?php
$qa=mysqli_query($con,"select * from about order by id_about desc");
$da=mysqli_fetch_array($qa);
?>
<div class="about">
				<h5><?php echo "$da[judul]";?></h5>
				  <img src="gbr_about/<?php echo "$da[gambar]";?>">
				<p><?php
                echo "$da[isi_about]";?>
                </p>		
			 </div>
		   </div>
