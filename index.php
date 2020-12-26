<?php
  session_start();
  if(!isset($_SESSION['user_session']))
  {
    
    header('Location:login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Web Crate </title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  
</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-9 d-flex align-items-center">
          <h1 class="logo mr-auto font-weight-bold"><a href="index.html">Web Crate</a></h1>
         

          <nav class="nav-menu d-none d-lg-block">
            <ul>
                  <li class="nav-item ">
                    <h5 style="color:skyblue"><?php 
                    
                    $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
                    $qry=new MongoDB\Driver\Query([]);
                    $rows=$mongo->executeQuery("WebCrate.users",$qry);

                    foreach($rows as $row)
                    {
                      if($_SESSION['user_session']==$row->mail )
                      {
                          echo $row->fname;
                      }
                    }
                    ?></h5>
                  </li>
                  
              <li class="active"><a href="#">Home</a></li>
              <li><a href="developer.php">Developer</a></li>
              <li><a href="#designs">Sample Designs</a></li>
              
              <li><a href="my_request.php">My Request</a></li>
              <li><a href="#contact">Contact</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </nav><!-- .nav-menu -->

          
        </div>
      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container-fluid" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Design, Development  and  Hosting</h1>
          <h2>We are team of talented designers making websites with Client requirement</h2>
          <div><a href="#about" class="btn-get-started scrollto">Get Started</a></div>
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
            <h3>About Web Crate</h3>
            <p class="font-italic">
            This project is a web-based client management system. This project is an attempt
to provide the advantages to the clients as well as to the developers to get
connected at the same platform. It will help client to search or get the developers as
they are looking for, and they can also see how many developers fulfilling the
client requirement and they can request their project. And at the same time, it will
help the individual developers to get the clients. Clients will get lots of developer
options with their uploaded details, like name, expertise, charges, and more.

            </p>
           
            <a href="#" class="read-more">Read More <i class="icofont-long-arrow-right"></i></a>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">100</span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">75</span>
            <p>Projects</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1,463</span>
            <p>Hours Of Support</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">7</span>
            <p>Hard Workers</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                </svg>
                <i class="bx bxl-dribbble"></i>
              </div>
              <h4><a href="">Super Fast Server</a></h4>
              <p>, it can cause your website to rank lower in search engine ... the simplest ways you can speed up your website: looking at your server</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box iconbox-orange ">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                </svg>
                <i class="bx bx-file"></i>
              </div>
              <h4><a href="">Daily BackUps</a></h4>
              <p>The daily data backup service provided by hosts is aimed at giving users automatic recovery of lost data.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box iconbox-pink">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
                </svg>
                <i class="bx bx-tachometer"></i>
              </div>
              <h4><a href="">Technical Services</a></h4>
              <p>Technical services are services that an IT organization provides to support business services or IT operations. Employee provisioning, backup and recovery, storage, and self-service help desk are examples of technical services</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-yellow">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813"></path>
                </svg>
                <i class="bx bx-layer"></i>
              </div>
              <h4><a href="">Secure and Reliable</a></h4>
              <p>If something such as a job or institution is secure, it is safe and reliable, and unlikely to be lost or fail. The industry has a strong and secure future.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box iconbox-red">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,532.3542879108572C369.38199826031484,532.3153073249985,429.10787420159085,491.63046689027357,474.5244479745417,439.17860296908856C522.8885846962883,383.3225815378663,569.1668002868075,314.3205725914397,550.7432151929288,242.7694973846089C532.6665558377875,172.5657663291529,456.2379748765914,142.6223662098291,390.3689995646985,112.34683881706744C326.66090330228417,83.06452184765237,258.84405631176094,53.51806209861945,193.32584062364296,78.48882559362697C121.61183558270385,105.82097193414197,62.805066853699245,167.19869350419734,48.57481801355237,242.6138429142374C34.843463184063346,315.3850353017275,76.69343916112496,383.4422959591041,125.22947124332185,439.3748458443577C170.7312796277747,491.8107796887764,230.57421082200815,532.3932930995766,300,532.3542879108572"></path>
                </svg>
                <i class="bx bx-slideshow"></i>
              </div>
              <h4><a href="">DNS Control</a></h4>
              <p>With DNS Control, you can define rules that control DNS requests and responses. However, DNS traffic often goes unmonitored and does not go through ...</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box iconbox-teal">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,566.797414625762C385.7384707136149,576.1784315230908,478.7894351017131,552.8928747891023,531.9192734346935,484.94944893311C584.6109503024035,417.5663521118492,582.489472248146,322.67544863468447,553.9536738515405,242.03673114598146C529.1557734026468,171.96086150256528,465.24506316201064,127.66468636344209,395.9583748389544,100.7403814666027C334.2173773831606,76.7482773500951,269.4350130405921,84.62216499799875,207.1952322260088,107.2889140133804C132.92018162631612,134.33871894543012,41.79353780512637,160.00259165414826,22.644507872594943,236.69541883565114C3.319112789854554,314.0945973066697,72.72355303640163,379.243833228382,124.04198916343866,440.3218312028393C172.9286146004772,498.5055451809895,224.45579914871206,558.5317968840102,300,566.797414625762"></path>
                </svg>
                <i class="bx bx-arch"></i>
              </div>
              <h4><a href="">24/7 Support</a></h4>
              <p>24x7 means 24 hours a day 7 days a week and is used to describe a service such as computer server monitoring that is continuous is always available day ...</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Features</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column align-items-lg-center">
            <div class="icon-box mt-5 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-receipt"></i>
              <h4>Messaging</h4>
              <p>Client can messaging with develper and client about the project in the message box.what ever project  updates in the messaging feature</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-cube-alt"></i>
              <h4>Requesting</h4>
              <p>We are Requesting feature in our project tells the firstly user want to see the
samples to the our website which specification he wants the sample</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-images"></i>
              <h4>Notification</h4>
              <p>We are adding the notification feature in our project about this notification user
can get the notification status about project information</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-shield"></i>
              <h4>Progess Bar</h4>
              <p>We are add progress bars to any element that can show compartments and that can
display any numerical value within a range, when displayed on a diagram. </p>
            </div>
          </div>
          <div class="image col-lg-6 order-1 order-lg-2 " data-aos="zoom-in" data-aos-delay="100">
            <img src="assets/img/features.svg" alt="" class="img-fluid">
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Our provide Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="owl-carousel testimonials-carousel">

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium autem quaerat excepturi iusto officia temporibus veniam, dolores eos cum veritatis?
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="assets/img/WhatsApp Image 2020-09-17 at 1.57.50 AM.jpeg" class="testimonial-img" alt="">
            <h3>Lazares Sathya</h3>
            <h4>Web Developer</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, ratione similique? Vero, ab! Id obcaecati doloribus assumenda labore excepturi. Nesciunt.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="assets/img/WhatsApp Image 2020-09-17 at 2.10.45 AM.jpeg" class="testimonial-img" alt="">
            <h3>Shobhan Manik</h3>
            <h4>Full Stack Developer</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo excepturi distinctio officia fugit consectetur, assumenda ducimus corrupti nobis voluptatem quidem.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="assets/img/WhatsApp Image 2020-12-01 at 9.06.59 PM.jpeg" class="testimonial-img" alt="">
            <h3>Atul Ashish</h3>
            <h4>Web Developer</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum eaque ipsum vitae molestias enim aut dolore commodi et eos corporis?
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="assets/img/IMG_8766.JPG" class="testimonial-img" alt="">
            <h3>Syed Faizan</h3>
            <h4>Manager & CEO</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae, est non doloribus itaque expedita eveniet facere quo adipisci natus fugit.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="assets/img/IMG_8869.JPG" class="testimonial-img" alt="">
            <h3>Sijoy Samuel</h3>
            <h4>Network Security</h4>
          </div>
          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
Lorem ipsum dolor, sit amet consectetur adipisicing elit. Saepe vitae repellat ex non, praesentium enim distinctio provident perferendis dolores aperiam!              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="assets/img/IMG_8873.JPG" class="testimonial-img" alt="">
            <h3>Sangram Rauta</h3>
            <h4>UX/UI Designer</h4>
          </div>

        </div>

      </div>
    </section><!-- End Testimonials Section -->
      <!-- sample designs section -->
      <section id="designs" class="features">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Our Sample Designs</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            <a href="login.php">get your own website</a>
          </div>
          <div class="section-title">
            <h2>Business</h2>
            <p>The term "business" also refers to the organized efforts and activities of individuals to produce and sell goods and services for profit.</p>
              <div class="row mt-5">
                <div class="col-md-4">
                  <div class="card">
                    <img src="./assets/img/business1.jpg" class="img-fluid">

                  </div>
                  <div class="card-title mt-2">
                    <p class="font-weight-bold">Business

                    </p>
                     <a href="./college/index.html"> <button class="btn align-items-center justify-content-center d-flex mt-3 float-center  font-weight-bold" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">visit site

                    </button></a>
                    

                  </div>

                </div>
                <div class="col-md-4">
                  <div class="card">
                    <img src="./assets/img/business1.jpg" class="img-fluid">

                  </div>
                  <div class="card-title mt-2">
                    <p class="font-weight-bold">Business

                    </p>
                    <a href="./eNno/index.html"> <button class="btn align-items-center justify-content-center d-flex mt-3 float-center  font-weight-bold" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">visit site

                    </button></a>

                  </div>

                </div>
                <div class="col-md-4">
                  <div class="card">
                    <img src="./assets/img/business1.jpg" class="img-fluid">

                  </div>
                  <div class="card-title mt-2">
                    <p class="font-weight-bold">Business

                    </p>
                    <a href="./Gp/index.html"> <button class="btn align-items-center justify-content-center d-flex mt-3 float-center  font-weight-bold" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">visit site

                    </button></a>

                  </div>

                </div>

              </div>
          </div>
          <div class="section-title">
            <h2>Education</h2>
            <p>The act or process of imparting or acquiring particular knowledge or skills, as for a profession. a degree, level, or kind of schooling: a university education. the result produced by instruction, training, or study: to show one's education. the science or art of teaching; pedagogics.</p>
          </div>
          <div class="row mt-5 mb-5">
            <div class="col-md-6">
              <div class="card">
                <img src="./assets/img/education.jpg" class="img-fluid">

              </div>
              <div class="card-title mt-2">
                <p class="font-weight-bold">Education

                </p>
                <a href="./Mentor/index.html"> <button class="btn align-items-center justify-content-center d-flex mt-3 float-center  font-weight-bold" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">visit site

                </button></a>

              </div>

            </div>
            <div class="col-md-6">
              <div class="card">
                <img src="./assets/img/college.jpg" class="img-fluid" style="height:405px ;">

              </div>
              <div class="card-title mt-2">
                <p class="font-weight-bold">Education

                </p>
                <a href="./company/college.html"> <button class="btn align-items-center justify-content-center d-flex mt-3 float-center  font-weight-bold" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">visit site

                </button></a>

              </div>

            </div>

          </div>
          <div class="section-title">
            <h2>Medical</h2>
            <p>The healthcare industry is an aggregation and integration of sectors within the economic ... Other approaches to defining the scope of the healthcare industry tend to adopt a broader definition, also including other key actions related to health</p>
          </div>
          <div class="row mt-5 mb-5">
            <div class="col-md-6">
              <div class="card">
                <img src="./assets/img/medical.jpg" class="img-fluid">

              </div>
              <div class="card-title mt-2">
                <p class="font-weight-bold">Medical

                </p>
                <a href="./Medicio/index.html"> <button class="btn align-items-center justify-content-center d-flex mt-3 float-center  font-weight-bold" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">visit site

                </button></a>

              </div>

            </div>
            <div class="col-md-6">
              <div class="card">
                <img src="./assets/img/medical.jpg" class="img-fluid" >

              </div>
              <div class="card-title mt-2">
                <p class="font-weight-bold">Medical

                </p>
                <a href="./Medilab/index.html"> <button class="btn align-items-center justify-content-center d-flex mt-3 float-center  font-weight-bold" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">visit site

                </button></a>

              </div>

            </div>

          </div>
          <div class="section-title">
            <h2>Restaurants</h2>
            <p>A restaurant is a business that prepares and serves food and drinks to customers. Meals are generally served and eaten on the premises, but many restaurants also offer take-out and food delivery services.</p>
          </div>
          <div class="row mt-5 mb-5  align-items-center justify-content-center">
              <div class="col-md-6">
                <div class="card">
                  <img src="./assets/img/restuart.jpg" class="img-fluid" >

                </div>
                <div class="card-title mt-2">
                  <p class="font-weight-bold">Restaurant

                  </p>
                  <a href="./Delicious/index.html"> <button class="btn align-items-center justify-content-center d-flex mt-3 float-center  font-weight-bold" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">visit site

                  </button></a>

                </div>

              </div>
              <div class="col-md-6">
                <div class="card">
                  <img src="./assets/img/restuart.jpg" class="img-fluid" >
  
                </div>
                <div class="card-title mt-2">
                  <p class="font-weight-bold">Restaurant
  
                  </p>
                  <a href="./Restaurantly/index.html"> <button class="btn align-items-center justify-content-center d-flex mt-3 float-center  font-weight-bold" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">visit site

                  </button></a>
  
                </div>
  
              </div>
  


          </div>
          <div class="section-title">
            <h2>Resume & CV</h2>
            <p>A resume is a formal document that a job applicant creates to itemize his or her qualifications for a position. A resume is usually accompanied by a customized cover letter in which the applicant expresses an interest in a specific job or company and draws attention to the most relevant specifics on the resume.</p>
          </div>
          <div class="row mt-5 mb-5 float-center align-items-center justify-content-center">
            <div class="col-md-6">
              <div class="card">
                <img src="./assets/img/cv.jpg" class="img-fluid" >

              </div>
              <div class="card-title mt-2">
                <p class="font-weight-bold">Resume & CV

                </p>
                <a href="./DevFolio/index.html"> <button class="btn align-items-center justify-content-center d-flex mt-3 float-center  font-weight-bold" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">visit site

                </button></a>

              </div>

            </div>
            <div class="col-md-6">
              <div class="card">
                <img src="./assets/img/cv.jpg" class="img-fluid" >

              </div>
              <div class="card-title mt-2">
                <p class="font-weight-bold">Resume & CV

                </p>
                <a href="./Lonely/Lonely/index.html"> <button class="btn align-items-center justify-content-center d-flex mt-3 float-center  font-weight-bold" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">visit site

                </button></a>

              </div>

            </div>


          </div>
          <div class="section-title">
            <h2>Agencies</h2>
            <p>The employment agency helps those who have been recently laid off find jobs.</p>
          </div>
          <div class="row mt-5 mb-5 float-center align-items-center justify-content-center">
            <div class="col-md-6">
              <div class="card">
                <img src="./assets/img/blog-3.jpg" class="img-fluid" >

              </div>
              <div class="card-title mt-2">
                <p class="font-weight-bold">Agency

                </p>
                <a href="./DevFolio/index.html"> <button class="btn align-items-center justify-content-center d-flex mt-3 float-center  font-weight-bold" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">visit site

                </button></a>

              </div>

            </div>


          </div>
          <div class="section-title">
            <h2>Coming Soon Site</h2>
            <p>The employment agency helps those who have been recently laid off find jobs.</p>
          </div>
          <div class="row mt-5  align-items-center justify-content-center">
            <div class="col-md-6">
              <div class="card">
                <img src="./assets/img/bg.jpg" class="img-fluid" >

              </div>
              <div class="card-title mt-2">
                <p class="font-weight-bold">Coming Soon1

                </p>
                <a href="./ComingSoon/index.html"> <button class="btn align-items-center justify-content-center d-flex mt-3 float-center  font-weight-bold" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">visit site

                </button></a>

              </div>

            </div>
            <div class="col-md-6">
              <div class="card">
                <img src="./assets/img/bg.jpg" class="img-fluid" >

              </div>
              <div class="card-title mt-2">
                <p class="font-weight-bold">Coming soon2

                </p>
                <a href="./WeBuild/index.html"> <button class="btn align-items-center justify-content-center d-flex mt-3 float-center  font-weight-bold" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">visit site

                </button></a>
              </div>

            </div>


          </div>
  
          
         
  
        </div>
      </section>
    

    
 <!--   -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact Us</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>Kristu Jayanti College, Bangalore, N 560077</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>webcrate@gmail.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+91 9985600446</p>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-lg-6 ">
            <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.6464414959937!2d77.64067241536544!3d13.058162516504815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae17578c79da7d%3A0xe96dcd8e2b982f8e!2sKristu%20Jayanti%20College%2C%20Autonomous!5e0!3m2!1sen!2sin!4v1581486673150!5m2!1sen!2sin"
            width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>webcrate</h3>
            <p>
              Kristu Jayanti College <br>
              Bangalore, N 5660077<br>
              Karnataka <br><br>
              <strong>Phone:</strong> +91 9985600446<br>
              <strong>Email:</strong> webcrate@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li> <a href="#">Home</a></li>
              <li> <a href="#">About us</a></li>
              <li> <a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li> <a href="#">Web Design</a></li>
              <li><a href="#">Web Development</a></li>
              <li><a href="#">Product Management</a></li>
              <li> <a href="#">UX/UI Designing</a></li>
              <li> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Web Crate</h4>
            <p>Designing  Developing & Hosting</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">

      <div class="copyright-wrap d-md-flex py-4">
        <div class="mr-md-auto text-center text-md-left">
          <div class="copyright">
            &copy; Copyright <strong><span>Web Crate</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/techie-free-skin-bootstrap-3/ -->
            Designed by <a href="#"><strong>Lazares Sathya</strong> &<strong> Atul Ashish Xalxo</strong></a>
          </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>