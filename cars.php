

<html>
    <head>
        <title>Advertisements</title>
        <?php require 'blocks/head.php' ?>
    </head>
    <body>
        <?php require 'blocks/header.php' ?>
        <main class="container mt-5">
            <div class="row">
                <div class="col-md-8 mb-5">
                    <?php
                        require 'database_connection/db.php';

                        $sql = "SELECT a.*, ac.*, u.login, u.phone FROM advertisement as a 
                                    INNER JOIN ad_car as ac on ac.ad_id = a.id
                                    INNER JOIN users as u on u.id = a.user_id";

                        $advs = mysqli_query($connection, $sql);
                        //print books
                        while($adv = $advs->fetch_assoc()){
                            
                            echo "<div class='mb-2 jumbotron'>
                                  <p><b> cat: cars </b></p>";
                            
                                  $foto = mysqli_query($connection,"SELECT img_link from galery where ad_id = '{$adv['ad_id']}'");
                                  while ($fotos = mysqli_fetch_array($foto)) {
                                        
                                      echo "<img src='".$fotos['img_link']."' class='img-fluid' alt='Responsive image'>";
                                      
                                  }
                                  
                            echo "<p> mark: {$adv['car_mark']} </p>
                                  <p> model: {$adv['car_model']} </p>
                                  <p> description: {$adv['description']} </p>
                                  <p> cena: {$adv['cena']} &euro;</p>
                                  <p> mileage: {$adv['mileage']} </p>
                                  <p> release year: {$adv['release_year']} </p>
                                  <p><b> ad giver: <mark>{$adv['login']}</mark> phone: {$adv['phone']}</b></p>
                                  </div>";
                        }
                        
                    ?>
                </div>
            </div>
        </main>
    </body>
</html>


