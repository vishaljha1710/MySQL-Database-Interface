<!-- Connecting to my sql -->
<?php
  session_start();
$servername="localhost";
$username=$_SESSION["username"];
$password=$_SESSION["password"];
$defaultdatabase=$_GET["database"];
$conn = new mysqli($servername,$username,$password,$defaultdatabase);
$tablename=$_GET["tablename"];
$content=array();
?>


<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .highlight {
            background-color: yellow;
            font-weight: bold;
        }
    </style>
    <title>Manage Databases</title>
<!-- CSS for Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>

  <body>

<!-- script for bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


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
 <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="home">MyDatabase</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      
        <li class="nav-item">
          <a class="nav-link" href="query">Query</a>
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
          <a class="nav-link" href="<?php echo "login"?>">Log out</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="text" placeholder="Search here" id="searchInput" aria-label="Search">
        <button class="btn btn-outline-success" id="searchButton">Search</button>
        <div id="searchResults"></div>
      </form>
    </div>
  </div>
</nav>


<!-- Showing tables -->
<table class="table">
  <thead class="thead-dark">
    <tr><?php
    $result=$conn->query("desc $tablename;");
    if($result->num_rows>0){
    while($row=$result->fetch_assoc()){?>

    <th scope="col" ><?php $n=array_push($content,$row['Field']); echo $row['Field']?></th>
    <?php }}?>
    </tr>
  </thead>
  <tbody>
    <?php 
    $number=1;
    $result=$conn->query("SELECT * FROM $tablename");
    if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      ?>
    <tr>
      <?php for($i=0;$i<$n;$i++){?>
      <td scope="row"><?php echo $row[$content[$i]];?></td>
        <?php }?>
    </tr>
  <?php }}?>
  </tbody>
</table>

<!-- *** -->

<?php
$conn->close();
?>
  </body>
</html>