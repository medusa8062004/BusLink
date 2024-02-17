 <?php  include("../connections/Connection.php");?>
 
 <option>---select course---</option>
        <?php
		$pqury="select * from tbl_course where dep_id=".$_GET['cid'];
		$res=$conn->query($pqury);
		while($row=$res->fetch_assoc())
		{  
		?>
        <option value="<?php echo $row["course_id"] ?>"><?php echo $row["course_name"] ?></option>
        <?php }?>