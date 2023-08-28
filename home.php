<!-- Connecting to my sql -->
<?php
  session_start();
$servername="localhost";
$username=$_SESSION["username"];
$password=$_SESSION["password"];
$conn = new mysqli($servername,$username,$password);
?>


<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

    <title>Manage Databases</title>
<!-- CSS for Bootstrap -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
 <!-- Favicon-->
   <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="styles.css" rel="stylesheet" />
  </head>

 

<!-- script for bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        var dropdowns = document.querySelectorAll('.dropdown-toggle');
        dropdowns.forEach(function (dropdown) {
            dropdown.addEventListener('click', function () {
                var menu = dropdown.nextElementSibling;
                menu.classList.toggle('show');
            });
        });
    });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      const searchInput = document.getElementById('searchInput');
      const searchButton = document.getElementById('searchButton');
      const searchResults = document.getElementById('searchResults');

      searchButton.addEventListener('click', function () {
          const searchTerm = searchInput.value;
          searchInPage(searchTerm);
      });

      function searchInPage(term) {
          const pageContent = document.body.innerHTML;
          const regex = new RegExp(term, 'gi');
          const highlightedContent = pageContent.replace(regex, `<span class="highlight">$&</span>`);

          if (highlightedContent !== pageContent) {
              searchResults.innerHTML = `Found ${highlightedContent.match(regex).length} match(es).`;
              document.body.innerHTML = highlightedContent;
          } else {
              searchResults.innerHTML = 'No matches found.';
          }
      }
  });
</script>
<!-- Navbar   -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="home">MyDatabase</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      
      <li class="nav-item">
          <a class="nav-link" href="query.php">Query</a>
        </li>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Your Databases
          </a>
          <ul class="dropdown-menu">
            <?php $result=$conn->query("SHOW DATABASES;");
            if($result->num_rows>0){
                   while($row=$result->fetch_assoc()){

            ?>
            <li><a class="dropdown-item" href="view.php?database=<?php echo $row['Database']; ?>"><?php echo $row['Database']; ?></a></li>
            <?php }}?>
           
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php  echo "login"?>">Log out</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="text" placeholder="Search here" id="searchInput" aria-label="Search">
        <button class="btn btn-outline-success" id="searchButton">Search</button>
        <div id="searchResults"></div>
      </form>
    <script src="script.js"></script>
    </div>
  </div>
</nav>
  <!-- Header-->
  <body   style="background: linear-gradient(135deg, #800080, #6A5ACD, #4B0082); ">
  <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold">A warm welcome</h1>
                        <p class="fs-4">Welcome to my php based SQL ineterface.You can view your databases and tables using the dropdown menu or use the Query interface to execute sql queries</br>
                      <br>Do suggest changes and updation and also refer to my other projects </p>
                    </div>
                </div>
            </div>
        </header>
        <section class="pt-4">
            <div class="container px-lg-5">
                <!-- Page Features-->
                <div class="row gx-lg-5">
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="fab fa-linkedin"></i></div>
                                <h2 class="fs-4 fw-bold">My LinkedIn</h2>
                                <p class="mb-0"><a href="https://www.linkedin.com/in/vishaljha1710/">@vishaljha1710</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="fab fa-github"></i></div>
                                <h2 class="fs-4 fw-bold">My Repositories</h2>
                                <p class="mb-0"><a href="https://github.com/vishaljha1710?tab=repositories">vishaljha1710</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="far fa-envelope"></i></div>
                                <h2 class="fs-4 fw-bold">Gmail</h2>
                                <p class="mb-0"><a href="https://mail.google.com/mail/u/?authuser=romanvkj2001@gmail.com">@handle</a></p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Creation &copy; MySQL Database interface 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="scripts.js"></script>



<!-- *** -->

<?php
$conn->close();
?>
  </body>
</html>