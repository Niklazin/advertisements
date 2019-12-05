<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <!-- <a class="navbar-brand" href="#">Fixed navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="cars.php">Cars</a>
     </li>

      <li class="nav-item">
        <a class="nav-link mr-2 mb-2" href="books.php">Books</a>
     </li> 
      <li class="nav-item">
        <a class="nav-link mr-2 mb-2" href="phones.php">Phones</a>
     </li> 
     
     <?php if (!isset($_COOKIE['login'])): ?>
     <li class="nav-item">
        <a class="nav-link" href="reg.php">Registration</a>
     </li>
     
     <li class="nav-item">
        <a class="nav-link" href="auth.php">Login</a>
     </li>
     <?php else: ?>
     <li class="nav-item">
        <a class="btn btn-outline-primary mr-2 mb-2" href="/auth.php">user cab</a>
     </li> 
     
     <li class="nav-item">
        <a class="nav-link mr-2 mb-2" href="new.php">add advertisement</a>
     </li> 
     
     <li class="nav-item">
        <a class="nav-link" href="myAdv.php">My advertisements</a>
     </li>
    <?php endif; ?> 
     
 
  
    </ul>
    
  </div>
</nav>

