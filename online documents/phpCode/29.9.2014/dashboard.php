<?phpsession_start();//require 'condb.php';error_reporting(0);$uid=$_SESSION['uid'];if(empty($uid)){  //  header('location:index.php');    exit();}$sql=  mysql_query("select dashboard from user_priv where user_id='$uid' ")or die(mysql_error());$ft=  mysql_fetch_array($sql);$db=$ft['dashboard'];if($db==0){    echo 'You are not Authorized to access this page ';    exit();}?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>Dashboard</title><link rel="stylesheet" type="text/css" href="tab-code.css" />  <script src="jquer-1.9.1-1.js" type="text/javascript"></script>   <script src="jq.js" type="text/javascript"></script>   <script src="jquery.timepicker.min.js"></script>     <link rel="stylesheet" href="/resources/demos/style.css" />  <link rel="stylesheet" type="text/css" href="style_by.css"/>   <link rel="stylesheet" href="includes/paging.css" type="text/css" />  <link rel="stylesheet" type="text/css" href="jquery.timepicker.css" />    <style type="text/css">	 .transaction{width:990px; margin:0 auto;}	 .transaction #field_name{background:#DAE8F6; color:#000000;  height:30px; padding:5px 0px; line-height:15px;}	 .transaction #field_name #head_lft{float:left;  display:block; width:61px; text-align:left; font-weight:600; font-size:12px; 	}	 	 .transaction #field_name #head_lftw{float:left;  display:block; width:100px; text-align:left; font-weight:600; font-size:12px; 	}	 	 .transaction #odd{background:#F7F7F7;  color:#000000;  height:30px; padding:5px 0px; line-height:15px;}	 .transaction #odd #head_lft{float:left;  display:block; width:61px; text-align:left;}	 	 .transaction #odd #head_lftw{float:left;  display:block; width:100px; text-align:left;}	 	 .transaction #even{  color:#000000;  height:30px; padding:5px 0px; line-height:15px;}	 .transaction #even #head_lft{float:left;  display:block; width:61px; text-align:left; line-height:30px;}	 	 	 	 .transaction #even #head_lftw{float:left;  display:block; width:100px; text-align:left;  line-height:30px;}	 	 	 		.tot_earning{ width:100%; display:block; background-color:#DDD; }		.tot_earning #earning{ width:400px; float:left;padding:10px 0px; height:20px;}		</style>                      <script>  $(function() {    $( "#tabs" ).tabs();  });    $(function() {			$('#startTime').timepicker();		  });		  		  $(function() {			$('#endTime').timepicker();		  });  </script>	</head><body>    	<?php	include("header.php");	include("menubar.php");	include("condb.php"); ?><div id="container">	    <?php     $name=$_SESSION['uname'];   $r_id=$_SESSION['r_id'];   	?>    <?php  	// for deleteing the bills	// when clicking on cancel button..		if(isset($_GET['proc_id']))		{					$visit=$_GET['visit']; 		$patient_id=$_GET['patient_id'];		$bill_id=$_GET['bill_id'];				// delete procedure ID		  $update = mysql_query("update opd_items set proc_status=0 where proc_id='$_GET[proc_id];'") ;		  if($update)		  {			 		  }		  		  // check all procedure ids which are inactive for this bill id 		  		  		  // if active procedures ==0 then delete visit ID  		  		  		  $data="SELECT * FROM opd_items WHERE bill_id ='$bill_id' && proc_status =1";$data=mysql_query($data);$data = mysql_num_rows($data);if($data<1){$update1 = mysql_query("update opd_bill set proc_status=0 where bill_id='$bill_id'") ;	}		  	//	  $update1 = mysql_query("update opd_bill set proc_status=0 where bill_id='$bill_id'") ;		   // check all bill iDS which are inactive for this visit id 		  		  		  // if active bill IDS ==0 then delete visit ID  // checking bill id exists or not from opd_bill		  $data1="SELECT * FROM opd_bill WHERE bill_id ='$bill_id' && proc_status =1";$data1=mysql_query($data1);$data1 = mysql_num_rows($data1);		  		  		  // if bill_id does'nt exists in opd_bill table than delete visit id		  if($data1<1){$update2 = mysql_query("update visit_register set proc_status=0 where visit_id='$visit'");}		 // update query where set proc_status=0 where visit id= visit id on clickinng cancel button		 		 		  // $update3 = mysql_query("update patient_info set proc_status=0 where patient_id='$patient_id'") ;		   //@header("location:dashboard.php");    	//echo '<meta http-equiv="refresh" content="0" url="dashboard.php">';				} 	// end deleting bills	?>								    <div id="opd_bill" style="height:20px;">   		<div style="float:left">        <span>Dashboard</span>        </div>        <div style="float:right; margin-right:10px;">        	<a href="#"></a>        </div>   </div>            <div id="tabs">  <ul>    <li><a href="#tabs-1">All bills</a></li>    <li><a href="#tabs-5">My duty</a></li>     <li><a href="#tabs-6">My bills</a></li>     <li><a href="#tabs-2">My Receipts</a></li>    <li><a href="#tabs-3">Cancelled Bills</a></li>         <li><a href="#tabs-4">My Account</a></li>	     </ul>     <div id="tabs-1">                   <form action="#" method="post">         <div class="bill_clr">			    <div class="l_ft dash_width"><span>VisitID</span></div>				<div class="l_ft pro_name"><span>Patient</span></div>                <div class="l_ft dash_width"><span>Bill Id</span></div>                <div class="l_ft dash_width"><span>Bill Amount</span></div>                <div class="l_ft dash_width"><span>Due</span></div>                <!--<div class="l_ft dash_width"><span>Proc ID</span></div>-->                <!--<div class="l_ft dash_width"><span>Proc Name</span></div>-->               <!-- <div class="l_ft dash_width"><span>Proc Amount</span></div>-->                <div class="l_ft dash_width ali_gnment"><span>Cancel</span></div>        </div>                <div class="bill_height"> 		<?php  		 // start bills tab 		$res=mysql_query("SELECT * FROM opd_bill,patient_info,visit_register where opd_bill.visit_id=visit_register.v_id and 		visit_register.p_id=patient_info.patient.id where proc_status=1 order by bill_id desc"); 		while($row=mysql_fetch_array($res)){		?>	  <?php if($i%2==0){  ?>                <div class="l_ft dash_width"><?php echo $row['visit_id'];?></div>                <div class="l_ft pro_name"><?php echo $row['p_name'];?></div>                <div class="l_ft dash_width"><?php echo $row['bill_id']; ?></div>                <div class="l_ft dash_width"><?php echo $row['paid_amount']; ?></div>                <div class="l_ft dash_width"><?php echo $row['due_amount']; ?> </div>                <div class="l_ft dash_width ali_gnment"><span><a href="dashboard.php?proc_id=<?php echo $proc_id;?>&&visit=<?php echo $visitId; ?>&&patient_id=<?php echo $row1; ?>&&bill_id=<?php echo  $row['bill_id']; ?>" style="color:blue" onclick="return confirm('are u sure want to delete?');">Cancel</a></span></div>                <div class="cls"></div><?php } else{?>                <div class="l_ft dash_width" style="background:gray;"><?php echo $row['visit_id'];?></div>                <div class="l_ft pro_name" style=" background:gray;"><?php echo $row['p_name'];?></div>                <div class="l_ft dash_width" style=" background:gray;"><?php echo $row['bill_id']; ?></div>                <div class="l_ft dash_width" style=" background:gray;"><?php echo $row['paid_amount']; ?></div>                <div class="l_ft dash_width" style=" background:gray;"><?php echo $row['due_amount']; ?> </div>                <div class="l_ft dash_width ali_gnment"><span><a href="dashboard.php?proc_id=<?php echo $proc_id;?>&&visit=<?php echo $visitId; ?>&&patient_id=<?php echo $row1; ?>&&bill_id=<?php echo  $row['bill_id']; ?>" style="color:blue" onclick="return confirm('are u sure want to delete?');">Cancel</a></span></div>                <div class="cls"></div><?php }$i++;?><?php } ?>	   <?php // end bills tab ?>        </div>                </form>      </div>              <?php 		// start my reciept tab		            	 $max=mysql_query("select max(duty_id) from duty_roster");			             $mx=mysql_fetch_row($max);			                 $maxiId=$mx[0]; ?>				<?php $dutyTime=mysql_query("select * from  duty_roster where duty_id='$maxiId'");				while($dutyTime=mysql_fetch_array($dutyTime))				{?>				<?php $StartDate=$dutyTime['StartDate'];?> 				<?php $StartTime=$dutyTime['StartTime'];?> 			<?php	$EndDate=$dutyTime['EndDate'];?>			<?php	$EndTime=$dutyTime['EndTime'];?>			<?php	}?>            <?php			   //  $d1 = new DateTime('$StartDate $StartTime');                //$d2 = new DateTime('$EndDate $EndTime');			   			   ?>                       <div id="tabs-2">             <form>         	<div class="bill_clr">			    <div class="l_ft bill_width"><span>Receipt ID</span></div>                <div class="l_ft bill_width"><span>Visit ID</span></div>              <div class="l_ft bill_width_receive"><span>Total</span></div>                <div class="l_ft bill_width_receive"><span>Received Amount</span></div>                <div class="l_ft bill_width_receive"><span>Due Amount</span></div>                <div class="l_ft bill_width_receive"><span>Date</span></div>                 <!--<div class="l_ft bill_width_receive"><span>Print</span></div>-->	        </div>	  <div class="bill_height" style="width:800px;">            <?php			$res=mysql_query("select * from opd_recpt where recption_id='$r_id' and date between '$StartDate' and '$EndDate' and time between '$StartTime' and '$EndTime'");			 //$res=mysql_query("select * from opd_recpt where recption_id='$r_id'");	            $num_rows = mysql_num_rows($res);				 while($row=mysql_fetch_array($res))				{				   $visit_id=$row['visit_id'];				   $qr1="select paid_amount,grand_discount,grand_total from opd_bill where visit_id='$visit_id'";				   $res1=mysql_query($qr1);				   $row1=mysql_fetch_array($res1);				   $recieved=$row1['grand_discount']+$row1['paid_amount'];					$date=$row['date']; 					$time=$row['time']; 				?>				<?php if($num_rows%2==0){  ?>				<div style="background:white">			    <div class="l_ft bill_width_receive"><span><?php echo $row['recpt_id'];  ?></span></div>                <div class="l_ft bill_width_receive"><span><?php echo $row['visit_id']; ?></span></div>                <div class="l_ft bill_width_receive"><span><?php echo $row1['grand_total']; ?></span></div>                <div class="l_ft bill_width_receive"><span><?php echo $recieved; ?></span></div>                <div class="l_ft bill_width_receive"><span><?php echo $row['new_due_amnt']; ?></span></div>                  <div class="l_ft bill_width_receive"><span></span><?php echo $row['date']; ?></div>               <!--  <div class="l_ft bill_width_receive"><span><a href="print.php?r_id=<?php echo $row['recpt_id'];?>&&visit_id=<?php echo $row['visit_id']; ?>" style="color:blue">Print</a></span></div>-->                 <div class="cls"></div>				 </div>				  				 <?php } else{  ?>				 <div style="background:gray;">				  <div class="l_ft bill_width_receive"><span><?php echo $row['recpt_id'];  ?></span></div>                <div class="l_ft bill_width_receive"><span><?php echo $row['visit_id']; ?></span></div>                <div class="l_ft bill_width_receive"><span><?php echo $row1['grand_total']; ?></span></div>                <div class="l_ft bill_width_receive"><span><?php echo $recieved; ?></span></div>                <div class="l_ft bill_width_receive"><span><?php echo $row['new_due_amnt']; ?></span></div>                  <div class="l_ft bill_width_receive"><span></span><?php echo $row['date']; ?></div>				  <div class="cls"></div>				 </div>				 <?php	 } $num_rows--; ?>				 				 <div class="cls"></div>				       <?php } ?>	   <?php // end my reciept tab?>	   <!--<a href="print1.php">Print</a>-->	        </div>      </form>    </div>	  <div class="cls"></div>   <div>   <?php //=$pagination;?>   </div>   <!-- cancelled biils        -->	<div id="tabs-3">        <form>            <div class="bill_clr">			    <div class="l_ft dash_width"><span>VisitID</span></div>				<div class="l_ft pro_name"><span>Patient</span></div>                <div class="l_ft dash_width"><span>Bill Id</span></div>                <div class="l_ft dash_width"><span>Bill Amount</span></div>                <div class="l_ft dash_width"><span>Due</span></div>                <div class="l_ft dash_width"><span>Proc ID</span></div>                <div class="l_ft dash_width"><span>Proc Name</span></div>                <div class="l_ft dash_width"><span>Proc Amount</span></div>                        </div>                  <div class="bill_height"><?php // start cancelled tab $res=mysql_query("SELECT * FROM opd_bill where proc_status=0"); ?>				               <?php  while($row=mysql_fetch_array($res))   {?>	   <?php $bill_id=$row['bill_id']; ?>        <?php $res3=mysql_query("select * from opd_items where bill_id='$bill_id' && proc_status=0"); 		while($row3=mysql_fetch_array($res3)){	?>			                   <?php $visitId = $row['visit_id']; ?>                              <?php 			   $qr1="select p_id from visit_register where visit_id='$visitId'";				$res1=mysql_query($qr1);				$row1=mysql_fetch_array($res1);				$row1=$row1['p_id'];				$qr2="select p_name from patient_info where patient_id='$row1'";				$res2=mysql_query($qr2);				$row2=mysql_fetch_array($res2);			   ?>               <?php 				$visit=$row['visit_id'];			    if($i%2==0){ ?>				<div class="l_ft dash_width" ><?php echo $row['visit_id'];?></div>                <div class="l_ft pro_name"><?php echo $row2['p_name']; ?></div>                                <div class="l_ft dash_width"><?php echo $row['bill_id']; ?></div>                <div class="l_ft dash_width"><?php echo $row['paid_amount']; ?></div>                <div class="l_ft dash_width"><?php echo $row['due_amount']; ?> </div>                <div class="l_ft dash_width"><?php echo $row3['proc_id']; ?></div><?php $proc_id=$row3['proc_id']; ?>                <div class="l_ft dash_width"><?php echo $row3['proc_name']; ?></div>                <div class="l_ft dash_width"><?php echo $row3['amount']; ?></div>               <div class="cls"></div><?php }else{?>                <div class="l_ft dash_width" style="background:gray"><?php echo $row['visit_id'];?></div>                <div class="l_ft pro_name"  style="background:gray"><?php echo $row2['p_name']; ?></div>                                <div class="l_ft dash_width" style="background:gray"><?php echo $row['bill_id']; ?></div>                <div class="l_ft dash_width" style="background:gray"><?php echo $row['paid_amount']; ?></div>                <div class="l_ft dash_width" style="background:gray"><?php echo $row['due_amount']; ?> </div>                <div class="l_ft dash_width" style="background:gray"><?php echo $row3['proc_id']; ?></div><?php $proc_id=$row3['proc_id']; ?>                <div class="l_ft dash_width" style="background:gray"><?php echo $row3['proc_name']; ?></div>                <div class="l_ft dash_width" style="background:gray"><?php echo $row3['amount']; ?></div>               <div class="cls"></div><?php }$i++;?>			          <?php }} ?>	   	   <?php // end cancelled tab ?>        </div>      </form>    </div>       <div id="tabs-4">    <?php 	 //collection=;	 	// cash $cash=mysql_query("select sum(crnt_gvn_anmt) from opd_recpt where recption_id='$r_id' && payment_mode='cash' and date between '$StartDate' and '$EndDate' and time between '$StartTime' and '$EndTime'");//echo $cash;$cash=mysql_fetch_row($cash);			  $Cash=$cash[0]; 	// end cash		//credit_card	$credit_card=mysql_query("select sum(crnt_gvn_anmt) from opd_recpt where recption_id='$r_id' && payment_mode='credit_card' and date between '$StartDate' and '$EndDate' and time between '$StartTime' and '$EndTime'");$credit_card=mysql_fetch_row($credit_card);			  $Credit_card=$credit_card[0]; 			 // end credit card			 	//debit_card	$debit_card=mysql_query("select sum(crnt_gvn_anmt) from opd_recpt where recption_id='$r_id' && payment_mode='debit_card' and date between '$StartDate' and '$EndDate' and time between '$StartTime' and '$EndTime'");$debit_card=mysql_fetch_row($debit_card);			  $Debit_card=$debit_card[0]; 	// end debit card		//cheque_draft		$cheque_draft=mysql_query("select sum(crnt_gvn_anmt) from opd_recpt where recption_id='$r_id' && payment_mode='cheque_draft' and date between '$StartDate' and '$EndDate' and time between '$StartTime' and '$EndTime'");$cheque_draft=mysql_fetch_row($cheque_draft);			 $Cheque_draft=$cheque_draft[0];	// end cheque draft		//echo "Cash".$Cash;echo "Credit_card".$Credit_card;echo "Debit_card".$Debit_card;echo "Cheque_draft".$Cheque_draft; 			 	 $collection=$Cash;		 			 	//	end collection		?>               <form method="post" action="">            <div class="bill_height" style="margin-top:-10px; padding:0px;">			    <div class="l_ft bill_width" style="margin-left:400px;"> <strong>Duty Time</strong></div>                <div class="l_ft" style="padding-top:7px;">                	<img src="pre.png" />                <label for="#">				<?php $max=mysql_query("select max(duty_id) from duty_roster");			             $mx=mysql_fetch_row($max);			                 $maxiId=$mx[0]; ?>				<?php $dutyTime=mysql_query("select * from  duty_roster where duty_id='$maxiId'");				while($dutyTime=mysql_fetch_array($dutyTime))				{?>				<?php echo $dutyTime['StartDate'];?> &nbsp;&nbsp;&nbsp;				<?php echo $dutyTime['StartTime'];?> &nbsp;&nbsp;&nbsp;			<?php	echo $dutyTime['EndDate'];?>&nbsp;&nbsp;&nbsp;			<?php	echo $dutyTime['EndTime'];?>&nbsp;&nbsp;&nbsp;			<?php	}?>												</label>                <img src="next.png" />                </div>            </div>            <div class="cls"></div>        <div class="bill_clr">			    <div class="l_ft bill_width_receive"><strong>Received From</strong></div>                <div class="l_ft bill_width">&nbsp;</div>                <div class="l_ft bill_width_name">&nbsp;</div>                <div class="l_ft bill_width_receive">&nbsp;</div>                <div class="l_ft bill_width_receive">&nbsp;</div>			</div>            <div class="cls"></div>            			 <div class="bill_height">			    <div class="l_ft bill_width_receive">&nbsp;</div>                <div class="l_ft bill_width_receive">Counter</div>                <div class="l_ft bill_width_receive"><input type="text" name="counter" />				</div>			<div id="link"><a href="payment-receive.php" style="color:#84C1FF">Payment Received</a></div>	            </div>			            <div class="cls"></div>      	         <div class="bill_height">			    <div class="l_ft bill_width_receive">&nbsp;</div>                <div class="l_ft bill_width_receive">Others</div>                <div class="l_ft bill_width_receive"><input type="text" name="other" /></div>        </div>		<div class="cls"></div>	            <div class="bill_clr">			    <div class="l_ft bill_width"><strong>Collection</strong></div>            </div>				<div class="cls"></div>		             <div class="bill_height">			     <div class="l_ft bill_width">Credit Card</div>                 <div class="l_ft bill_width_receive"><?php echo $Credit_card;?></div>            </div>            <div class="cls"></div>                      <div class="bill_height">			                    <div class="l_ft bill_width_receive">Debit Card</div>                <div class="l_ft bill_width_receive"><?php echo $Debit_card ;?></div>          </div>          <div class="cls"></div>                    <div class="bill_height">			                    <div class="l_ft bill_width_receive">Cheque</div>                <div class="l_ft bill_width_receive"><?php echo $Cheque_draft;?></div>          </div>          <div class="cls"></div>                   <div class="bill_height">			    <div class="l_ft bill_width_receive">Cash</div>                <div class="l_ft bill_width_receive"><?php echo $Cash;?></div>          </div>          <div class="cls"></div>		<div class="bill_clr">			    <div class="l_ft bill_width_receive"><strong>Payment To</strong></div>         </div>         <div class="cls"></div>         		<div class="bill_height">			    <div class="l_ft bill_width_receive">Staff </div>                <div class="l_ft bill_width_receive"><input type="text" name="staff" /></div>				<div id="link"><a href="paymentto-staff.php" style="color:#84C1FF">Payment To Staff</a></div>          </div>          <div class="cls"></div>                    <div class="bill_height">			    <div class="l_ft bill_width_receive">Vendor</div>                <div class="l_ft bill_width_receive"><input type="text"  name="vendor"/></div>				<div id="link"><a href="payment-to-vendor.php" style="color:#84C1FF">Payment To Vendor</a></div>          </div>          <div class="cls"></div>                    <div class="bill_clr">          <div class="l_ft bill_width_receive" style="margin-left:0px; width:400px;"><input type="submit" name="cal" value="Calculate" class="btn" />                </div>                </form>                		   <?php		   // start balance calculationif(isset($_POST['cal'])){$counter=$_POST['counter'];$other=$_POST['other'];$staff=$_POST['staff'];$vendor=$_POST['vendor'];		 		 			 	 	// postive amount 	 $recieved=$counter+$other+$collection; // collection amount from line no 339 ...from previous collection calculation check line 310 to 341	 // negative amount 	 $paymentTo=$staff+$vendor;	  $balance=$recieved-$paymentTo;	  }	  // end balance calculation	  ?>	                			    <div class="l_ft bill_width_receive" style=" width:400px;" ><strong>Balance in Cash</strong>&nbsp;Rs: <font color="blue"><?php echo $balance;?></font></div>                <div class="l_ft c_w"><label for=""></label></div>                          </div>		   		            <div class="cls"></div>         		              </div> 	       <div id="tabs-5">        <form method="post" action="">                    	<div class="roster2_bg">                        <div class="l_ft roster_w">Start Date</div>                <div class="l_ft roster_w">Start Time</div>                <div class="l_ft roster_w">End date</div>                <div class="l_ft roster_w">End Time</div>                <div class="l_ft roster_w c_align">&nbsp;</div>                <div class="l_ft roster_w">&nbsp;</div>        	      </div>          			<div class="roster_bg">			     <div class="l_ft roster_w"><input type="date" name="StartDate"  /></div>                <div class="l_ft roster_w"><input  type="text" name="StartTime"  placeholder="eg.17:00:00 for 5pm"/></div><!-- id="startTime" -->                <div class="l_ft roster_w"><input type="date" name="EndDate" /></div>                <div class="l_ft roster_w"><input  type="text" name="EndTime" placeholder="eg.17:00:00 for 5pm"/></div> <!-- id="endTime" -->                <div class="l_ft roster_w c_align"><input type="submit" name="add" value="Add"></div>                                            </div>            <?php // DutyRoaster page on add button			if(isset($_POST['add'])){ 						date_default_timezone_set('Asia/Kolkata');    $date=date("d/m/y");    $time=date("g:i a");									 $StartDate=$_POST['StartDate'];			 $StartTime=$_POST['StartTime']; 			 $EndDate=$_POST['EndDate'];			 $EndTime=$_POST['EndTime'];			 $status=1;			//if($StartDate=="" or $StartTime=="" or $EndDate=="" or $EndTime==""){echo "plz fill all date/times";}			mysql_query("insert into duty_roster values('','$StartDate','$StartTime','$EndDate','$EndTime',$status)");			mysql_query("update duty_roster set Status=1");			}		    $max=mysql_query("select max(duty_id) from duty_roster");			$mx=mysql_fetch_row($max);			$last_entry=$mx[0];			//$_SESSION['last_entry']=$last_entry;						$dutyResult=mysql_query("select * from duty_roster order by duty_id desc");			$num_rowsD=mysql_num_rows($dutyResult);			while($dutyValues=mysql_fetch_array($dutyResult))			{                      if($num_rowsD%2==0){   ?>                          <div class="roster2_bg">			   <div class="l_ft roster_w"><?php echo $dutyValues['StartDate']; ?></div>                <div class="l_ft roster_w"><?php echo $dutyValues['StartTime']; ?></div>                <div class="l_ft roster_w"><?php echo $dutyValues['EndDate']; ?></div>                <div class="l_ft roster_w"><?php echo $dutyValues['EndTime']; ?></div>                               <div class="l_ft roster_w c_align">				<?php 				$duty_id=$dutyValues['duty_id'];				if($duty_id==$last_entry)				{				echo "<input type='submit' name='deleteDutyId' value='Delete'>";			//	@header('Location: dashboard.php');				}				?>                </div>               </div>			 <?php } else{ ?>			                  <div class="roster2_bg" >			   <div class="l_ft roster_w" style="background:gray"><?php echo $dutyValues['StartDate']; ?></div>                <div class="l_ft roster_w" style="background:gray"><?php echo $dutyValues['StartTime']; ?></div>                <div class="l_ft roster_w" style="background:gray"><?php echo $dutyValues['EndDate']; ?></div>                <div class="l_ft roster_w" style="background:gray"><?php echo $dutyValues['EndTime']; ?></div>                               <div class="l_ft roster_w c_align">				<?php 				$duty_id=$dutyValues['duty_id'];				if($duty_id==$last_entry)				{				echo "<input type='submit' name='deleteDutyId' value='Delete'>";			//	@header('Location: dashboard.php');				}				?>                </div>                             </div>			 			<?php // end else			}  ?>			<?php  $num_rowsD--;}?>            <?php 						//if()			if(isset($_POST['deleteDutyId'])){				$max=mysql_query("select max(duty_id) from duty_roster");			$mx=mysql_fetch_row($max);			$maxId=$mx[0];				$status=mysql_query("select Status from duty_roster where duty_id='$maxId'");								//echo $status;				$data=mysql_fetch_array($status);//echo $data['Status'];					if($data['Status']==0)					{						echo "<script language='javascript'>alert('can not be deleted')</script>";					}					else					{											 mysql_query("delete from duty_roster where duty_id='$maxId'");					 $max=mysql_query("select max(duty_id) from duty_roster");			             $mx=mysql_fetch_row($max);			                 $maxiId=$mx[0];					 					 					     $update=mysql_query("update duty_roster set status=0 where duty_id='$maxiId'") or die(mysql_error());					}			}?>                     </form>      </div>	  <div id="tabs-6">	<?php  	  $uname= $_SESSION['uname'];	  $_SESSION['StartDate']=$StartDate;	$_SESSION['StartTime']=$StartTime;	$_SESSION['EndDate']=$EndDate;	$_SESSION['EndTime']=$EndTime;     //Select data from 4 tables 1(opd_bill)[B] 2(visit_register)[V] 3(opd_items)[I] 4(patient_info)[P]    //Where receptionist = selected  user    //And opd_bill 's visit id matched with visit register's visit id    //And visit register 's visit id matched with patient 's patient id    //Group by bill_id for remove duplicate results    $biquery=mysql_query("SELECT B.bill_id,B.visit_id,B.reception,B.grand_total,                        V.visit_id, V.p_id,                        P.patient_id, P.p_name,                        I.proc_name, I.doc_incharge,I.proc_id,I.amount,                        B.grand_discount, B.due_amount,                        B.paid_amount, B.payment_mode,                        B.grand_discount, B.billeddate ,B.billedtime                        FROM opd_bill B, visit_register V, opd_items I, patient_info p                        WHERE B.reception='$uname'                        AND B.visit_id=V.visit_id                        AND V.p_id=P.patient_id                        AND I.bill_id=B.bill_id AND B.billeddate between '$StartDate' and '$EndDate' and B.billedtime between '$StartTime' and '$EndTime'                        group by I.proc_id")or die(mysql_error());						$sumcash=0;$sumCredit_card=0;$sumDebit_card=0;$sumCheque_draft=0;																		   //CASH    $sum=mysql_query("SELECT  SUM(paid_amount) FROM opd_bill WHERE reception='$uname' AND payment_mode='cash'AND billeddate between '$StartDate' and '$EndDate' and billedtime between '$StartTime' and '$EndTime'")or die(mysql_error());    $sumCash=mysql_fetch_array($sum);	$sumCash=$sumCash[0];  //  echo "<h2>Total Earning In Cash :- $sumamount[0]</h2>";    //echo '<br/>';//CREDIT$sum=mysql_query("SELECT  SUM(paid_amount) FROM opd_bill WHERE reception='$uname' AND payment_mode='credit_card' AND billeddate between '$StartDate' and '$EndDate' and billedtime between '$StartTime' and '$EndTime' ")or die(mysql_error());$sumCredit=mysql_fetch_array($sum);$sumCredit_card=$sumCredit[0];//echo "<h2>Total Earning In Credit :- $sumamount[0]</h2>";//echo '<br/>';//DEBIT$sum=mysql_query("SELECT  SUM(paid_amount) FROM opd_bill WHERE reception='$uname' AND payment_mode='debit_card'AND billeddate between '$StartDate' and '$EndDate' and billedtime between '$StartTime' and '$EndTime' ")or die(mysql_error());$sumDebit=mysql_fetch_array($sum);$sumDebit_card=$sumDebit[0];//echo "<h2>Total Earning In Debit :- $sumamount[0]</h2>";//echo '<br/>';//DRAFT$sum=mysql_query("SELECT  SUM(paid_amount) FROM opd_bill WHERE reception='$uname' AND payment_mode='cheque_draft'   AND billeddate between '$StartDate' and '$EndDate' and billedtime between '$StartTime' and '$EndTime'")or die(mysql_error());$sumCheque=mysql_fetch_array($sum);$sumCheque_draft=$sumCheque[0];//echo "<h2>Total Earning In Cheque :- $sumamount[0]</h2>";//echo '<br/>';if(!$sumCash){$sumCash=0;}if(!$sumCredit_card){$sumCredit_card=0;}if(!$sumDebit_card){$sumDebit_card=0;}if(!$sumCheque_draft){$sumCheque_draft=0;}	  	  ?>	  <div class="tot_earning">		  <div id="earning"><font color='green'>Total Earning In Cash</font> <font color="blue"><?php echo  $sumCash; ?></font></div>		  <div id="earning"><font color='green'>Total Earning In Credit</font><font color="blue"> <?php echo $sumCredit_card;?></font></div>		  <div id="earning"><font color='green'>Total Earning In Debit </font><font color="blue"><?php echo $sumDebit_card;?></font></div>		  <div id="earning"><font color='green'>Total Earning In Cheque</font> <font color="blue"><?php echo $sumCheque_draft;?></font></div>		  <div class="cls"></div>	  </div>	  <div class="cls"></div>		<div class="transaction">	<div id="field_name">    	<div id="head_lft">Bill<br> No</div>        <div id="head_lft">Visit<br> Id</div>        <div id="head_lftw">Patient<br /> Name</div>        <div id="head_lftw">Procedure</div>        <div id="head_lft">Amount</div>        <div id="head_lftw">Doctor</div>        <div id="head_lft">total</div>        <div id="head_lft">Due</div>        <div id="head_lft"  style="text-align:left">Discount</div>        <div id="head_lft"  style="text-align:center">Paid </div>        <div id="head_lft">Payment<br /> Mode</div>        <div id="head_lftw" style="text-align:center">Bill<br /> Date</div>        <div id="head_lftw">Bill Time</div>	 </div>    <div class="cls"></div>    <div id="even">	<form method="post" action="print_dashboard.php">	<?php  	// calculate num of rows returned through query  $num_rowsT=mysql_num_rows($biquery);	 // check wheather row is even or oddwhile($data=mysql_fetch_array($biquery)){	 if($num_rowsT%2==0){ ?>    	<div id="head_lft"><?php echo $data['bill_id'];?></div>        <div id="head_lft"><?php echo $data['visit_id'];?></div>        <div id="head_lftw"><?php echo $data['p_name'];?></div>        <div id="head_lftw"><?php echo $data['proc_name'];?></div>        <div id="head_lft"><?php echo $data['amount'];?></div>        <div id="head_lftw"><?php echo $data['doc_incharge'];?></div>        <div id="head_lft"><?php echo $data['grand_total'];?></div>        <div id="head_lft"><?php echo $data['due_amount'];?></div>        <div id="head_lft"><?php echo $data['grand_discount'];?></div>        <div id="head_lft"><?php echo $data['paid_amount'];?></div>        <div id="head_lft"><?php echo $data['payment_mode'];?></div>        <div id="head_lftw"><?php echo $data['billeddate'];?></div>        <div id="head_lftw"><?php echo $data['billedtime'];?></div>		<?php }		else { ?>		<div id="head_lft" style="background:gray"><?php echo $data['bill_id'];?></div>        <div id="head_lft" style="background:gray"><?php echo $data['visit_id'];?></div>        <div id="head_lftw" style="background:gray"><?php echo $data['p_name'];?></div>        <div id="head_lftw" style="background:gray"><?php echo $data['proc_name'];?></div>        <div id="head_lft" style="background:gray"><?php echo $data['amount'];?></div>        <div id="head_lftw" style="background:gray"><?php echo $data['doc_incharge'];?></div>        <div id="head_lft" style="background:gray"><?php echo $data['grand_total'];?></div>        <div id="head_lft" style="background:gray"><?php echo $data['due_amount'];?></div>        <div id="head_lft" style="background:gray"><?php echo $data['grand_discount'];?></div>        <div id="head_lft" style="background:gray"><?php echo $data['paid_amount'];?></div>        <div id="head_lft" style="background:gray"><?php echo $data['payment_mode'];?></div>        <div id="head_lftw" style="background:gray"><?php echo $data['billeddate'];?></div>        <div id="head_lftw" style="background:gray"><?php echo $data['billedtime'];?></div>			<?php		// end else 		} ?>		<?php $num_rowsT--;}?>	 </div>	 <input type="submit" name="print" class="btn" value="Print Page">	 </form>         <div class="cls"></div>     </div>					</div>      <div class="cls"></div></div>   <!-- close menubar-->    <div>        </div>  </div>  </div></div><div class="cls"></div></div></body></html><?php//unset($_SESSION['uname']);//unset($_SESSION['r_id']);?>