	
		<div class="content-top">
	    	<div class="sellers">
	    		<h4><span><span>GALERI</span> PESANAN</span></h4>    	
	    	</div>
    	   <div class="section group">
				<?php
				$qg=mysqli_query($con,"select * from galeri order by id_galeri desc");
				while($dg=mysqli_fetch_array($qg))
				{
					?>
                <div class="col_1_of_3 span_1_of_3">
					<div class="product-desc">
						<img src="gbr_galeri/<?php echo "$dg[gbr_galeri]";?>"/>
						<h4><?php echo $dg['judul_galeri'];?></h4>
					</div>
					<div class="prod-inner">
						<span class="price">&nbsp;</span>
						
                        <?php echo "$dg[keterangan]";?>
						<div class="clear"></div> 
					</div>
				</div>	
                <?php
				}
				?>
				<div class="clear"></div> 
			</div>
		</div>