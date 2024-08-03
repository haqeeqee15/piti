
<?php
session_start();
error_Reporting(0);
include('database.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{
?>
  
  <!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Piti</title>
    <link rel="icon" href="favicon.ico" >
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">



     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-album'></i>
      <span class="logo_name">Piti</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="home.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="add-Pengeluaran.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Pengeluaran</span>
          </a>
        </li>
        <li>
          <a href="manage-Pengeluaran.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Daftar Pengeluaran</span>
          </a>
        </li>
        
        <li>
          <a href="Utang.php">
          <i class='bx bx-money'></i>
            <span class="links_name">Utang</span>
          </a>
        </li>
        <li>
        <a href="manage-Utang.php" >
        <i class='bx bx-coin-stack'></i>
            <span class="links_name">Manage Utang</span>
          </a>
        </li>
        <li>
          <a href="Analisis.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Analisis</span>
          </a>
        </li>
        <li>
          <a href="Laporan.php" class="active">
          <i class="bx bx-file"></i>
            <span class="links_name">Laporan</span>
          </a>
        </li>
       <li>
       <a href="user_profile.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Pengaturan</span>
          </a>
        </li>
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Keluar</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
    <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Piti</span>
      </div>
   

      <?php
$uid=$_SESSION['detsuid'];
$ret=mysqli_query($db,"select name  from users where id='$uid'");
$row=mysqli_fetch_array($ret);
$name=$row['name'];

?>

      <div class="profile-details">
  <img src="images/maex.png" alt="">
  <span class="admin_name"><?php echo $name; ?></span>
  <i class='bx bx-chevron-down' id='profile-options-toggle'></i>
  <ul class="profile-options" id='profile-options'>
  <li><a href="user_profile.php"><i class="fas fa-user-circle"></i> Profil Pengguna</a></li>
    <!-- <li><a href="#"><i class="fas fa-cog"></i> Account Pengaturans</a></li> -->
    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
  </ul>
</div>


<script>
  const toggleButton = document.getElementById('profile-options-toggle');
  const profileOptions = document.getElementById('profile-options');
  
  toggleButton.addEventListener('click', () => {
    profileOptions.classList.toggle('show');
  });
</script>


    </nav>

 <div class="home-content">
  <div class="overview-boxes">
    <div class="col-md-12">
      <br>
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6">
              <h4 class="card-title">Laporan</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form id="LaporanForm" method="GET" >
            <div class="form-group">
              <label for="LaporanType">Tipe Laporan</label>
              <select class="form-control" id="LaporanType" name="LaporanType" required>
                <option value="" selected disabled>Pilih Tipe Laoran</option>
                <option value="expense">Laporan Pengeluaran</option>
                <option value="pending">Laporan menunggu</option>
                <option value="received">Laporan diterima</option>
              </select>
            </div>
            <div class="form-group">
              <label for="startDate">Tanggal mulai</label>
              <input type="date" class="form-control" id="startDate" name="startDate" required>
            </div>
            <div class="form-group">
              <label for="endDate">Sampai</label>
              <input type="date" class="form-control" id="endDate" name="endDate" required>
            </div>
            <button type="submit" name="generateLaporan" class="btn btn-primary">Buat Laporan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
session_start();

if(isset($_GET['generateLaporan'])) {
  $LaporanType = $_GET['LaporanType'];
  $startDate = $_GET['startDate'];
  $endDate = $_GET['endDate'];

  if ($LaporanType === 'expense') {
    echo "<script>window.location.href='expense-Laporan.php?startDate=$startDate&endDate=$endDate';</script>";
  } else if ($LaporanType === 'pending') {
    echo "<script>window.location.href='pending-Laporan.php?startDate=$startDate&endDate=$endDate';</script>";
  } else if ($LaporanType === 'received') {
    echo "<script>window.location.href='received-Laporan.php?startDate=$startDate&endDate=$endDate';</script>";
  }

  // Set a session variable to track if the page was already refreshed
  $_SESSION['LaporanGenerated'] = true;
}

// Check if the session variable is set to true and refresh the page only once
if(isset($_SESSION['LaporanGenerated']) && $_SESSION['LaporanGenerated'] === true) {
  echo '<meta http-equiv="refresh" content="0;url=' . htmlspecialchars($_SERVER['PHP_SELF']) . '" />';
  unset($_SESSION['LaporanGenerated']); // Reset the session variable
}
?>


  </section>

    <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
 <?php } ?>