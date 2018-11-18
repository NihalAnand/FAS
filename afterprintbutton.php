<?php 
include_once 'includes/dbh.inc.php';
if(isset($_GET['usn'])){$usn =$_GET['usn'];}

if(isset($_POST['usn'])){$usn = $_POST['usn'];}
$sql = "SELECT * FROM student WHERE usn='$usn';";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$sql1 = "SELECT * FROM  academic_fees WHERE usn='$usn';";
$result1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_assoc($result1);

$sql2 = "SELECT * FROM  hostel_fees WHERE usn='$usn';";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);

$sql3 = "SELECT * FROM  examination_fee WHERE usn='$usn';";
$result3 = mysqli_query($conn,$sql3);
$row3 = mysqli_fetch_assoc($result3);

$sql4 = "SELECT * FROM  transportation WHERE usn='$usn';";
$result4 = mysqli_query($conn,$sql4);
$row4 = mysqli_fetch_assoc($result4);


session_start();

if($_SESSION['status']!="Active")
{
    header("location:login.php");
}

$_SESSION['usn'] = $row['USN'];
$_SESSION['name'] = $row['Name'];
$_SESSION['phone'] = $row['Phone'];
$_SESSION['dob'] = $row['DOB'];
$_SESSION['hostellite'] = $row['Hostellite'];
$_SESSION['branch'] = $row['Branch'];


$_SESSION['receipt_no'] = $row1['Receipt_No'];
$_SESSION['quota'] = $row1['Quota'];
$_SESSION['frstyr'] = $row1['Frst_Yr'];//new name=yearly fees
$_SESSION['secondyr'] = $row1['Second_Yr'];//new name=total
$_SESSION['thirdyr'] = $row1['third_Yr'];
$_SESSION['fourthyr'] = $row1['fourth_Yr'];

// $_SESSION['usn'] = $row2['USN'];
$_SESSION['hostelreceiptno'] = $row2['Hostel_Receipt_no'];
$_SESSION['messfee'] = $row2['Mess_Fee'];
$_SESSION['accomodationfee'] = $row2['Accomodation_Fee'];
$_SESSION['securityfee'] = $row2['Securty_Fee'];
$_SESSION['roomno'] = $row2['Room_no'];// new name=total


// $_SESSION['usn'] = $row3['USN'];
$_SESSION['registrationno'] = $row3['Registration_no'];
$_SESSION['amount1'] = $row3['Amount'];
$_SESSION['backlogfee'] = $row3['Backlog_fee'];
$_SESSION['total'] = $row3['Total'];


// $_SESSION['usn'] = $row4['USN'];
$_SESSION['treceiptno'] = $row4['Treceipt_no'];
$_SESSION['amount'] = $row4['Amount'];


$backfee = $_SESSION['backlogfee'];
$sqlback = "SET @bf='$backfee';";
mysqli_query($conn,$sqlback);
$sqlback1 = "call backlogcalc(@bf,@abc);";
mysqli_query($conn,$sqlback1);
$sqlback2 = "SELECT @abc;";
$resd = mysqli_query($conn,$sqlback2);
while ($rowd = $resd ->fetch_assoc()) {
     $var=$rowd['@abc'];
 } 

?>
<!DOCTYPE html>

<head>
  <title>Receipt Print</title>
    <link rel="stylesheet" type="text/css" href="printreceipt.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  function printlayer(layer)
  {
    var generator=window.open(",'name,");
    var layetext = document.getElementById(layer);
    generator.document.write(layetext.innerHTML.replace("Print Me"));

    generator.document.close();
    generator.print();
    generator.close();
  }
  </script>
</head>
<body >
  <h3>
<a href="" id="print" style="margin-right: 40px; float: right;" onclick="javascript:printlayer('div-id-name')">Print Receipt</a>
</h3>
<div class="container" style="margin-left: 40px; margin-top: 100px;" id="div-id-name">
 <h1 style="margin-left: 40px; "> Dayananda Sagar Academy Of Technology and Management</h1> 
 <u><h2 style=" margin-left:  300px;">Fee Invoice</h2></u>
<header>

  <nav class="main-nav">
    
     <ul >
          <!-- <li>
            <a href="#">Home</a>
          </li>
          <li><a href="about.html">About</a></li>
          <li><a href="faq.html">FAQ?</a></li>
          <li><a href="contact.html">Contact us</a></li> -->
                     <li ><a href="beforeprintreceipt.php">BACK</a></li>
         <!--  <?php
          if (isset($_SESSION['Email'])){
            echo '<li><form action="includes/logout.inc.php" method="POST">
      <input type="submit" name="logout-submit" value="Logout"></li>  
      
    </form>';
  }
  ?> -->
         </ul>

  </nav><br><br><br><br><br><br><br>
<div class="tabcontainer">
      <div class="buttonContainer">
        <!-- <button onclick="showPanel(0,'#')">All Fields </button> -->
        <button style="margin-bottom: 120px; width: 120px;" onclick="showPanel(0,'#')"> Academic Fees Receipt </button>
        <button style="width: 120px;" onclick="showPanel(1,'#')"> Hostel Fees Receipt</button>
        <button style="width: 120px;" onclick="showPanel(2,'#')">Examination Fee Receipt</button>
        <button style="width: 120px; " onclick="showPanel(3,'#')">Transportaion Fee Receipt </button>
    </div>

  <!-- <div class ="tabPanel"><fieldset class="fieldset" style="border: 0;">
      
    <label for="name">USN:</label>
   <?php echo $_SESSION['usn'];?>
    <br /><br>
    <label for="mail">Name:</label>
   <?php echo $_SESSION['name'];?>
    <br /><br>
    <label for="address">Mobile:</label>
    <?php echo $_SESSION['phone'];?> <br><br>
    <label for="name">DOB:</label>
    <?php echo $_SESSION['dob'];?> <br><br>
    <label for="name">Hostellite:</label>
   <?php echo $_SESSION['hostellite'];?><br><br>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label for="name">Branch:</label>
  <?php echo $_SESSION['branch'];?><br><br>
    </fieldset></div> -->

    <div class ="tabPanel" > <fieldset class="fieldset" style="border: 90px;">
    <h3 style="color: red; margin-top: -70px;">Academic Fee Receipt</h3>
    <label for="name">USN:</label>
    <?php echo $_SESSION['usn'];?>
    <br /><br>
    <label for="mail">Receipt No:</label>
     <?php echo $_SESSION['receipt_no'];?>
    <br /><br>
    <label for="address">Quota:</label>
     <?php echo $_SESSION['quota'];?><br><br>
    <label for="name">Tution Fees:</label>
      <?php echo $_SESSION['frstyr'];?><br><br>
    <label for="name">Development Fees:</label>
    <?php echo $_SESSION['secondyr'];?><br><br>
    <label for="name">Library Fees:</label>
     <?php echo $_SESSION['thirdyr'];?><br><br>
    <label for="name">Total:</label>
     <?php echo $_SESSION['fourthyr'];?><br><br>
</fieldset></div>

<div class ="tabPanel"><fieldset class="fieldset" style="border: 0;">
        <h3 style="color: red; margin-top: -70px;">Hostel Fees Receipt</h3>
    <label for="name">USN:</label>
    <?php echo $_SESSION['usn'];?>
    <br /><br>
    <label for="mail">Hostel Receipt No.:</label>
     <?php echo $_SESSION['hostelreceiptno'];?>
    <br /><br>
    <label for="address">Mess Fee:</label>
     <?php echo $_SESSION['messfee'];?><br><br>
    <label for="name">Accomodation Fee:</label>
    <?php echo $_SESSION['accomodationfee'];?><br><br>
    <label for="name">Security Fee:</label>
    <?php echo $_SESSION['securityfee'];?><br><br>
    <label for="name">Total:</label>
    <?php echo $_SESSION['roomno'];?><br><br>
    </fieldset></div>


    <div class ="tabPanel"><fieldset class="fieldset" style="border: 0;">
      <h3 style="color: red; margin-top: -70px;">Examination fee Receipt</h3>
          <label for="name">USN:</label>

    <?php echo $_SESSION['usn'];?>
    <br /><br>
    <label for="mail">Registration No.:</label>
   <?php echo $_SESSION['registrationno'];?>
    <br /><br>
    <label for="address">Amount:</label>
    <?php echo $_SESSION['amount1'];?><br><br>
    <label for="name">Backlog Fee:</label>
    <?php echo $_SESSION['backlogfee'];?><br><br>
    <label>No. of Backlog Subjects:</label>
    <?php echo $var;?><br><br>
    <label for="name">Total:</label>
    <?php echo $_SESSION['total'];?><br><br>
    
    </fieldset></div>

      <div class ="tabPanel"><fieldset class="fieldset" style="border: 0;">
         <h3 style="color: red; margin-top: -70px;">Transportation fee Receipt</h3>
          <label for="name">USN:</label>
    <?php echo $_SESSION['usn'];?>
    <br /><br>
    <label for="mail">TReceipt No.:</label>
     <?php echo $_SESSION['treceiptno'];?>
    <br /><br>
    <label for="address">Amount:</label>
   <?php echo $_SESSION['amount'];?><br><br>
   </fieldset></div>
      
    <script src="myScript.js"></script>
</header>
</div>
</div>
</body>
</html>