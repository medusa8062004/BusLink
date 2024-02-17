



<?php 
session_start();
include("../ASSETS/connections/Connection.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <title>Payment Gateway</title>
        <link rel="stylesheet" href="./style.css">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Baloo+Bhaijaan|Ubuntu');
            
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Ubuntu', sans-serif;
            }

            body{
				                background-color:rgb(153,102,204);
;
                margin: 0 10px;
            }

            .payment{
                background:(255,255,255,0.5);
                background-blur:3px;
				box-shadow:0 0 5px cyan,0 0 15px cyan;
                width: 50%;
                margin: 80px auto;
                height: auto;
                padding: 35px;
                padding-top: 70px;
                border-radius:20px;
                position: relative;
            }
			form
			{width:50%;}

            .payment h2{
                text-align: center;
                letter-spacing: 2px;
                margin-bottom: 40px;
                color: #0d3c61;
            }

            .form .label{
                display: block;
                color: #555555;
                margin-bottom: 6px;
            }

            .input{
                padding: 13px 0px 13px 25px;
                width: 100%;
                text-align: center;
                border: 2px solid #dddddd;
                border-radius: 5px;
                letter-spacing: 1px;
                word-spacing: 3px;
                outline: none;
                font-size: 16px;
                color: #555555;
            }

            .card-grp{
                display: flex;
                justify-content: space-between;
            }

            .card-item{
                width: 48%;
            }

            .space{
                margin-bottom: 20px;
            }

            .icon-relative{
                position: relative;
            }

            .icon-relative .fas,
            .icon-relative .far{
                position: absolute;
                bottom: 12px;
                left: 15px;
                font-size: 20px;
                color: #555555;
            }

            .btn{
                margin-top: 40px;
                background: #2196F3;
                padding: 12px;
                text-align: center;
                color: #f8f8f8;
                border-radius: 5px;
                cursor: pointer;
            }


            .payment-logo{
                position: absolute;
                top: -50px;
                left: 50%;
                transform: translateX(-50%);
                width: 100px;
                height: 100px;
                background: white;
                border-radius: 50%;
                box-shadow: 0 0 5px rgba(0,0,0,0.2);
                text-align: center;
                line-height: 85px;
            }

            .payment-logo:before{
                content: "";
                position: absolute;
                top: 5px;
                left: 5px;
                width: 90px;
                height: 90px;
                background: #2196F3;
                border-radius: 50%;
            }

            .payment-logo p{
                position: relative;
                color: #f8f8f8;
                font-family: 'Baloo Bhaijaan', cursive;
                font-size: 58px;
            }

            input[type=submit] {
                background-color: #2196F3;
                border: none;
                color: #f8f8f8;
                font-size: 16px;
            }

            @media screen and (max-width: 420px){
                .card-grp{
                    flex-direction: column;
                }
                .card-item{
                    width: 100%;
                    margin-bottom: 20px;
                }
                .btn{
                    margin-top: 20px;
                }
            }
        </style>
    </head>
	
	<?php
    if(isset($_POST["btnpay"]))
    {  
	 $current = "Select * from tbl_payment where pay_id=(select max(pay_id) from tbl_payment)";
$res1 = $conn->query($current);
    $row1 = $res1->fetch_assoc();

    if (empty($row1)) {
        $bill = date('Ym') * 1000;
    }
else {

  
 
        $p2 = substr($row1['bill_no'], 0, 6);

        if ($p2 == date('Ym')) {
			$bill=$row1['bill_no']+1;
          
          
			
        } else {
			 $bill=date('Ym')*1000;
          
			
        }
    }	
	 
	
	
        $k=$_GET['did'];
		
		 $ins="select * from tbl_stdstp s inner join tbl_stop p on p.stop_id=s.stop_id inner join tbl_route r on s.stureg_id=".$_SESSION['sid'];
        $res=$conn->query($ins);
        $row=$res->fetch_assoc();
        $amount=$row['route_rate'];
       
        
		
  $sql_check_duplicate = "SELECT pay_status  FROM tbl_payment WHERE stureg_id=".$_SESSION['sid'];
  $result =$conn->query($sql_check_duplicate);
  $row=$result->fetch_assoc();
/*if ($row['pay_status']==1)
   {
    ?>
			<script>
				 alert("Payment already received"); 
        </script><?php
  } else{*/
         $up ="insert into tbl_payment(pay_amount,pay_datetime,stureg_id,pay_status,pay_month,bill_no)values('".$amount."',now(),'".$_SESSION['sid']."',0,'".$k."','".$bill."')";
        if($conn->query($up))
        {?>
      <script type="text/javascript">
            var a=confirm("Payment Completed.Want to download bill");
			 if (a == true)
			 {<?php  if (isset($_GET['iid'])){
				 $l=$_GET['iid']; }?>
				 //console.log("Redirection successful");
				window.location.href = 'BusBill.php?iid=<?php echo  $l ?>'}
			 else
			 { 
			 
			 window.location.href = 'studenthome.php';
			}
			<!--setTimeout(function(){window.location.href='studenthome.php'},100);-->
			<?php  $u="update tbl_payment set pay_status=1 where pay_status=0";
			$conn->query($u);?>
			</script>
            <?php }  else {?>
			<script>
				 alert("Payment Failed"); 
        </script><?php }
         } 
   ?>

    <body>
        <!-- partial:index.partial.html -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
       

        <div class="wrapper">
            <div class="payment">
                <div class="payment-logo">
                    <p>p</p>
                </div>
                <h2>Payment Gateway</h2>
                <div class="form">
                <img src="../ASSETS/Templates/User/assets/images/nn.png" width="50%' height="60%" align="right">
                    <form method="post" action="">
                        <div class="card space icon-relative">
                            <label class="label">Card holder:</label>
                            <input type="text" class="input" placeholder="Card Holder" pattern="[a-zA-Z ]+" title="Please enter valid name." required="required">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card space icon-relative">
                            <label class="label">Card number:</label>
                            <input type="text" class="input" data-mask="0000 0000 0000 0000" placeholder="xxxx xxxx xxxx xxxx" required="required">
                            <i class="far fa-credit-card"></i>
                        </div>
                        <div class="card-grp space">
                            <div class="card-item icon-relative">
                                <label class="label">Expiry date:</label>
                                <input type="text" name="expiry-data" class="input" data-mask="00 / 00" placeholder="00 / 00" required="required">
                                <i class="far fa-calendar-alt"></i>
                            </div>
                            <div class="card-item icon-relative">
                                <label class="label">CVV:</label>
                                <input type="text" class="input" data-mask="000" placeholder="000" required="required">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                        <div class="btn">
                            <input type="submit" name="btnpay" id="btnpay" value="Pay">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- partial -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js'></script><script  src="./script.js"></script>

    </body>
</html>
