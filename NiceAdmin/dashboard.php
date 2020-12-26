<?php
  session_start();
  if(!isset($_SESSION['user_session']))
  {
    
    header('Location:login.php');
  }
                   $mail=$_SESSION['user_session'];
                    $name=$_REQUEST['name'];
                    $info=$_REQUEST['info'];
                    $dev_mail=$_REQUEST['dev_mail'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Web Crate</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.php" class="logo">WEBCRATE <span class="lite">  DASHBOARD</span></a>
      <!--logo end-->

      

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
         
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            </span>
            <span class="profile-ava">
              
                   <?php 
                    
                    $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
                    $qry=new MongoDB\Driver\Query([]);
                    $rows=$mongo->executeQuery("WebCrate.admins",$qry);

                    foreach($rows as $row)
                    {
                      if($_SESSION['user_session']==$row->mail )
                      {
                          echo $row->fname;
                      }
                    }
                    ?> <b class="caret"></b></h4>
                    </span>         
                        
                           
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="#"><i class="icon_profile"></i> My Profile</a>
              </li>
              <li>
                <a href="../index.php"><i class="icon_mail_alt"></i> Home</a>
              </li>
              <li>
                <a href="../my_request.php"><i class="icon_clock_alt"></i> My Request</a>
              </li>
              <li>
                <a href="../logout.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>

      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <a href="">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>
      </a>

        <a href="">
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-cloud-download"></i>
              <div class="count"></div>
              <?php 
                        ?>
              <div class="title"><a  href="../u_details.php?key=pro&name=<?php echo $name;?>&mail=<?php echo $mail;?>&info=<?php echo $info;?>&dev_mail=<?php echo $dev_mail;?>" style="color:white;">Project Details</a></div>
              
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->
          </a>

          <a href="">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-shopping-cart"></i>
              <div class="count"></div>
              <div class="title"><a  href="../u_details.php?key=client&name=<?php echo $name;?>&mail=<?php echo $mail;?>&info=<?php echo $info;?>&dev_mail=<?php echo $dev_mail;?>" style="color:white;">Client Details</a></div>
              
            </div>
            <!--/.info-box-->
          </div>
          </a>
          <!--/.col-->

          <a href="">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-thumbs-o-up"></i>
              <div class="count"></div>
              <div class="title"><a  href="../u_details.php?key=dev&name=<?php echo $name;?>&mail=<?php echo $mail;?>&info=<?php echo $info;?>&dev_mail=<?php echo $dev_mail;?>" style="color:white;">Developer details</a></div>
            
            </div>
            <!--/.info-box-->
          </div>
          </a>
          <!--/.col-->

          <a href="">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-cubes"></i>
              <div class="count"></div>
              <div class="title"><a  href="../report.php?key=dev&name=<?php echo $name;?>&mail=<?php echo $mail;?>&info=<?php echo $info;?>&dev_mail=<?php echo $dev_mail;?>" style="color:white;">Report</a></div>
            
            </div>
            <!--/.info-box-->
          </div>
          </a>
          <!--/.col-->

        </div>
        <!--/.row-->



        <!-- project team & activity start -->
        <div class="row" style="margin-top:100px">
          <div class="col-md-4 portlets">
            <!-- Widget -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left">Message</div>
                <div class="widget-icons pull-right">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>
                <div class="clearfix"></div>
              </div>

              <div class="panel-body">
                <!-- Widget content -->
                <div class="padd sscroll">

                  <ul class="chats">

                    <!-- Chat by us. Use the class "by-me". -->
                    <li class="by-me">
                    <a class="text-success">Developer</a>

                      <div class="chat-content">
                        <!-- Developer msg -->
                        <?php
                           $filter=['mail'=>$mail,'dev_mail'=>$dev_mail,'info'=>$info];
                            $qry=new MongoDB\Driver\Query($filter);
                            $rows=$mongo->executeQuery("WebCrate.chat",$qry);

                            foreach($rows as $row)
                            { 
                              if($row->sender!=$_SESSION['user_session'])
                              {
                        ?>
                        <p class="text-success"><?php echo $row->msg;?></p>
                        <?php 
                              }
                            
                        ?>

                      </div>
                    </li>
                    
                    <li class="by-me">
                      <div class="chat-content">
                        <!-- Developer msg -->
                        <?php
                           
                           if($row->sender==$_SESSION['user_session'])
                           {
                        ?>
                        <p class="text-primary"><?php echo $row->msg;?></p>
                        <?php 
                            }
                          }
                        ?>
                        
                      </div>
                      <a class="text-primary">You</a>
                    </li>


                </div>
                <!-- Widget footer -->
                <div class="widget-foot">

                  <form class="form-inline" method="POST">
                    <div class="form-group">
                      <input type="text" name="msg" class="form-control" placeholder="Type your message here...">
                    </div>
                    <button name="send" type="submit" class="btn btn-info">Send</button>
                    
                  </form>
                </div>
              </div>
              <?php 
                    
                    if(isset($_POST['send']))
                    {
                              
                      $bulk = new MongoDB\Driver\BulkWrite;
                      $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
                             
                                  $ins= array(
                                      "msg"=>$_REQUEST['msg'],
                                      "sender"=>$mail,
                                      "reciever"=>$dev_mail,
                                      "info"=>$info,
                                      "mail"=>$mail,
                                      "dev_mail"=>$dev_mail
                                  );
                                  $bulk->insert($ins); 
                                  $result = $mongo->executeBulkWrite('WebCrate.chat',$bulk);
                                  echo "<script>{document.location.href='dashboard.php?name=$client&mail=$mail&info=$info&dev_mail=$dev_mail';}</script>";
                            
                            
                    }
                  ?>

            </div>
          </div>

          <div class="col-lg-8" style="">
            <!--Project Activity start-->
            <section class="panel">
              <div class="panel-body progress-panel">
                <div class="row">
                  <div class="col-lg-8 task-progress pull-left">
                    <h1>To Do Everyday</h1>
                  </div>

                </div>
              </div>
              <table class="table table-hover personal-task">
                <tbody>
                  <tr>
                    <td><a class="btn btn-warning btn-block">DATE</a></td>
                    <td>
                    <a class="btn btn-primary btn-block">TASK</a>
                    </td>
                    <td>
                    <a class="btn btn-success btn-block">STATUS</a>
                    </td>
                  </tr>
                  <?php
                  $filters=['dev_mail'=>$dev_mail,'info'=>$info];
                  $qry=new MongoDB\Driver\Query($filters);
                  $rows=$mongo->executeQuery("WebCrate.daily",$qry);

                  foreach($rows as $row)
                  {
                  ?>
                  <tr>
                    <td> <?php echo $row->date; ?></td>
                    <td>
                    <?php echo $row->task; ?>
                    </td>
                    <td>
                      <span class="badge bg-success"> <?php echo $row->status; ?></span>
                    </td>
                    <td>
                      <div id="work-progress2"></div>
                    </td>
                  </tr>
                  <?php 
                   }
                  ?>
                  
                </tbody>
              </table>
            </section>
            <!--Project Activity end-->
          </div>
        </div><br><br>

      </section>
      <div class="text-right">
        <div class="credits">
          
          Designed by <a href="">Atul & Sathya</a>
        </div>
      </div>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>

</html>
