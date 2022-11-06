<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Course Registration | <?php echo $matric; ?> Course Registration Form</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="uploads/pan-africa.png">
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="bootstrap/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
      body{
        width:90%;
        margin:0 auto;
      }
      .invoice{
        margin-top: -12px !important;
      }
      address, table{
        margin-bottom: 0px !important;
      }
      .cus-header{
        list-style: none;
      }
      .cus-header li{
        display: table-cell;
        padding:0 10px 10px 10px;
      }
      .my-margin{
        margin-bottom:23px !important;
      }
      .child{
        margin-left: 70px;
      }
    </style>
  </head>
  <body onload="window.print()">
    <div class="wrapper">
      <!-- Main content onload="window.print()"-->
      <section class="invoice">
        <!-- title row -->
        <table id="" class="table">
          <tbody> 
          <tr><td style="width: 25% !important; text-align: center;"><img src="uploads/pan-africa.png" width="80" height="100"></td>
            <td style="width: 50% !important; text-align: center;"><b>INSTITUTE OF LIFE AND EARTH SCIENCES</b> <br />
                    (including Health and Agriculture) <br />
                    <b>PAN AFRIAN UNIVERSITY</b> <br />
                    <b>UNIVERSITY OF IBADAN, IBADAN</b> <br />
                    <b>COURSE REGISTRATION FORM</b> <br />
                    (TO BE COMPLETED IN QUADRUPLICATE)</td>
            <td style="width: 25% !important; text-align: center;"><img src="uploads/uilogo.png" width="80" height="100"></td>
          </tr>                
          </tbody>
        </table>
        <!--<div class="row my-margin">
          <div class="col-sm-3" style="text-align: center !important;">
          <img src="uploads/pan-africa.png" width="100" height="119">
          </div>
          <div class="col-sm-6" style="text-align: center !important;">
                    <b>INSTITUTE OF LIFE AND EARTH SCIENCES</b> <br />
                    (including Health and Agriculture) <br />
                    <b>PAN AFRIAN UNIVERSITY</b> <br />
                    <b>UNIVERSITY OF IBADAN, IBADAN</b> <br />
                    <b>COURSE RESGISTRATION FORM</b> <br />
                    (TO BE COMPLETED IN QUADRUPLIATE)
          </div>
          <div class="col-sm-3" style="text-align: center !important;">
          <img src="uploads/uilogo.png" width="100" height="119">
          </div>
          </div>-->
        <!-- info row -->
        <div class="row invoice-info" >
          <div class="col-sm-5 invoice-col" style="width:100% !important;">
            <address>
              <h3 class="hidden">Student Details </h3><img class="hidden" style="float:right; margin-top: -4%;" src="uploads/<?php echo $pic; ?>" width="100px" height="100px" />
              <p><strong>Session: <?php echo $session; ?></strong><strong style="float:right;">Matriculation No: <?php echo $matric; ?></strong></p>
              <strong>1. Names in full (Surname Last) : </strong><?php echo $row['othername'] . " <strong>$surname</strong>"; ?><br />
              <strong>2. Email Address : </strong><?php echo $email; ?><br />
              <strong>3. Local Phone No. : </strong><?php echo $phone; ?><br />
              <strong>4. Foreign Phone No. : </strong><?php echo $phones; ?><br />
              <strong>5. Programme of Study : </strong><?php echo $programme; ?><br />              
              <strong>6. Department : </strong><?php echo $department; ?><br />
              <strong>7. Mode of Study : </strong><?php echo $mode; ?><br />
              <strong>8. Degree in View : </strong><?php echo $degree; ?><br />
              <strong>9. University Attended : </strong><?php echo $university; ?><br />
              <strong>10. Year of Graduation : </strong><?php echo $gyear; ?><br /><br />
              <strong>11. Courses Registered for : </strong>
            </address>
            <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Course Code</th>
                        <th>Course Title</th>
                        <th>Units</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $query2 = ("SELECT SUM(cunit) FROM regcourse WHERE matric_no = '$matric' AND degree='$degree'");
                      $result2 = mysqli_query($conn,$query2);
                      $row2 = mysqli_fetch_array($result2);
                      $query = ("SELECT matric_no, ctitle, ccode, cunit FROM regcourse WHERE matric_no ='$matric'");
                      $result = mysqli_query($conn,$query);
                      $counter = 0;                      
                      //$nums = mysqli_num_rows($result);
                      //if($nums > 0){
                        while ($row = mysqli_fetch_assoc($result)){?> 
                        <tr><td><?php echo ++$counter; ?></td><td><?php echo $row['ccode']; ?></td><td><?php echo $row['ctitle']; ?></td><td><?php echo $row['cunit']; ?></td></tr>
                      <?php
                      }
                    //}
                      /*else{?>
                        <tr><td colspan="4">You have not register any Course yet</td></tr>
                      <?php
                      } */                 
                      ?>
                      </tbody>
                  </table>
                  <table id="example1" class="table">
                    <tbody> 
                    <tr>
                      <td><b>Thesis/Dissertation</b> Research Yes/No ........................</td>
                      <td><b>Total No. of Units</b> .... <?php echo $row2[0]; ?> ....</td>
                    </tr>
                    <tr>
                      <td><b>Signature</b> ..................................................
                        <br /> <b class="child">(Programme Head)</b></td>
                      <td><b>Student's Signature</b> ..............................<br /><br /><b>Date</b> ...................................
                      </td>
                    </tr>
                    <td><b>Signature</b> ......................................................<br /><b class="child">(Secretary to Institute)</b></td>
                    <td><b>Date</b> ................................</td>
                    
                  </div>
          </div>
      </section><!-- /.content -->
    </div><!-- ./wrapper -->
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>

  </body>
</html>