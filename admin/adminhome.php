 
<?php include("../connection.php"); ?>
<?php include("adminpanel.php"); ?>

<?php
$cot=0;
$cuser=0;
$status="Under Admin Veryfications";
$fdbk="unsolved";




$query=mysql_query("SELECT COUNT(*) c FROM NEED WHERE status='$status'");
$queryus=mysql_query("SELECT COUNT(*) cus FROM USER");
$queryfeed=mysql_query("SELECT COUNT(*) cfd FROM feedback where status='$fdbk'");
$row = mysql_fetch_assoc($query);
$cot= $row['c'];
$row1 = mysql_fetch_assoc($queryus);
$cuser= $row1['cus'];
$row3=mysql_fetch_assoc($queryfeed);
$fb=$row3['cfd'];

$query1=mysql_query("SELECT * FROM NEED WHERE status='$status'");
$row2=mysql_fetch_assoc($query1);


?>
<div align="center">

<label>There are <?php echo $cot?> items to be verifyed</label><br/>
<label>There are <?php echo $cuser?> users registered</label><br/>
<label>There are <?php echo $fb?> Feedbacks to be solved</label>
</div>
<?php include("../user/footer.php"); ?>

</body>
</html>