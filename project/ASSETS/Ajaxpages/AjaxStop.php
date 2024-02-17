 <?php  include("../connections/Connection.php");?>
 
 <option>---select stop ---</option>
        <?php
		$pqury="select * from tbl_stop where route_id=".$_GET['rid'];
		$res=$conn->query($pqury);
		while($row=$res->fetch_assoc())
		{  
		?>
        <option value="<?php echo $row["stop_id"] ?>"><?php echo $row["stop_name"] ?></option>
        <?php }?>