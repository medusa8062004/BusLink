 <?php  include("../connections/Connection.php");?>
 
 <option>---selectplace ---</option>
        <?php
		$pqury="select * from tbl_place where dis_id=".$_GET['pid'];
		$res=$conn->query($pqury);
		while($row=$res->fetch_assoc())
		{  
		?>
        <option value="<?php echo $row["place_id"] ?>"><?php echo $row["place_name"] ?></option>
        <?php }?>