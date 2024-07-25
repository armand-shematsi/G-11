<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Elements - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('import/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('import/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('import/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('import/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('import/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('import/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('import/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('import/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('import/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('import/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">MATH CHALLENGE SYSTEM</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->


        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->


        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K.Agaptus</span>
          </a><!-- End Profile Iamge Icon -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="form">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms" class="active">
              <i class="bi bi-circle"></i><span>Create challenge</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="analytics">
          <i class="bi bi-layout-text-window-reverse"></i><span>Analytics</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="most-correctly-answered-questions">
              <i class="bi bi-circle"></i><span>Most Correctly Answered Questions</span>
            </a>
          </li>
          <li>
            <a href="analytics/school-rankings">
              <i class="bi bi-circle"></i><span>School Rankings</span>
            </a>
          </li>
          <li>
            <a href="performance">
              <i class="bi bi-circle"></i><span>Performance</span>
            </a>
          </li>
          <li>
            <a href="repetition-percentage">
              <i class="bi bi-circle"></i><span>Percentage Repetition of Qns</span>
            </a>
          </li>
          <li>
            <a href="worst-schools">
              <i class="bi bi-circle"></i><span>Worst Performing Schools</span>
            </a>
          </li>
          <li>
            <a href="best-schools">
              <i class="bi bi-circle"></i><span>Best Schools</span>
            </a>
          </li>
          <li>
            <a href="incomplete-challenges">
              <i class="bi bi-circle"></i><span>Participants with Incomplete Challenges</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="charts">
          <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
      </li><!-- End Charts Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Create challenge</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
          <li class="breadcrumb-item">Form</li>
          <li class="breadcrumb-item active">Create challenge</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form</h5>

              <!-- General Form Elements -->
              <div class="container">
                <h1>Create Challenge, School, and Representative</h1>

                @if (session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
                @endif

                <h2>Challenge Details</h2>
                <form action="{{ route('challenge.submit') }}" method="POST">
                  @csrf
                  <div class="row mb-3">
                    <label for="challengeName" class="col-sm-2 col-form-label">Challenge Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="challengeName" name="challengeName" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="startDate" class="col-sm-2 col-form-label">Start Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="startDate" name="startDate" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="endDate" class="col-sm-2 col-form-label">End Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="endDate" name="endDate" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="duration" class="col-sm-2 col-form-label">Duration</label>
                    <div class="col-sm-10">
                      <input type="time" class="form-control" id="duration" name="duration" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                      <button type="submit" class="btn btn-primary">Create Challenge</button>
                    </div>
                  </div>
                </form>

                <h2>School Details</h2>
                <form action="{{ route('school.submit') }}" method="POST">
                  @csrf
                  <div class="row mb-3">
                    <label for="schoolName" class="col-sm-2 col-form-label">School Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="schoolName" name="schoolName" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="district" class="col-sm-2 col-form-label">District</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="district" name="district" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="registrationNumber" class="col-sm-2 col-form-label">Registration Number</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="registrationNumber" name="registrationNumber" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                      <button type="submit" class="btn btn-primary">Add School</button>
                    </div>
                  </div>
                </form>

                <h2>Representative Details</h2>
                <form action="{{ route('representative.submit') }}" method="POST">
                  @csrf
                  <div class="row mb-3">
                    <label for="representativeName" class="col-sm-2 col-form-label">Representative Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="representativeName" name="representativeName" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="representativeEmail" class="col-sm-2 col-form-label">Representative Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="representativeEmail" name="representativeEmail" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="schoolId" class="col-sm-2 col-form-label">School ID</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="schoolId" name="schoolId" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                      <button type="submit" class="btn btn-primary">Add Representative</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- End General Form Elements -->

            </div>
          </div>

        </div>
        <div class="col-lg-6">


        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>