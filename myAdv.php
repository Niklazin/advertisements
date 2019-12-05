
<html>
    <head>
        <?php 
            require 'blocks/head.php';
            require 'blocks/header.php';
        ?>
        <title>My advertisements</title>
    </head>
    <body>
        <main class="container mt-5">
            <div class="row">
                <div class="col-md-8 mb-5">
        <?php
            require 'database_connection/db.php';

            $sql = "SELECT a.*, ab.*, u.login, u.phone FROM advertisement as a 
                        INNER JOIN ad_books as ab on ab.ad_id = a.id
                        INNER JOIN users as u on u.id = a.user_id
                        where u.login = '{$_COOKIE['login']}'";

            if($advs = mysqli_query($connection, $sql)){
            //print books
                while($adv = $advs->fetch_assoc()){
                    echo "<div class='mb-2 jumbotron'>
                          <p><b> cat: books </b></p>";
                          $foto = mysqli_query($connection,"SELECT img_link from galery where ad_id = '{$adv['ad_id']}'");
                          while ($fotos = mysqli_fetch_array($foto)) {

                              echo "<img src='".$fotos['img_link']."' class='img-fluid' alt='Responsive image'>";

                          }
                    echo  "<p> book: {$adv['name']} </p>
                          <p> author: {$adv['author']} </p>
                          <p> description: {$adv['description']} </p>
                          <p> cena: {$adv['cena']} &euro;</p>
                          <p> page count: {$adv['page_count']} </p>
                          <p><b> ad giver: <mark>{$adv['login']}</mark> phone: {$adv['phone']}</b></p>
                          <a href='adv_edit.php'>edit</a>
                          </div>";
                }
            }

            $sql = "SELECT a.*, ac.*, u.login, u.phone FROM advertisement as a 
                        INNER JOIN ad_car as ac on ac.ad_id = a.id
                        INNER JOIN users as u on u.id = a.user_id
                        where u.login = {$_COOKIE['login']} ";

            if($advs = mysqli_query($connection, $sql)){
                //print cars
                while($adv = $advs->fetch_assoc()){
                    echo "<div class='mb-2 jumbotron'>
                          <p><b> cat: cars </b></p>";
                          $foto = mysqli_query($connection,"SELECT img_link from galery where ad_id = '{$adv['ad_id']}'");
                          while ($fotos = mysqli_fetch_array($foto)) {

                              echo "<img src='".$fotos['img_link']."' class='img-fluid' alt='Responsive image'>";

                          }
                    echo  "<p> mark: {$adv['car_mark']} </p>
                          <p> model: {$adv['car_model']} </p>
                          <p> description: {$adv['description']} </p>
                          <p> cena: {$adv['cena']} &euro;</p>
                          <p> mileage: {$adv['mileage']} </p>
                          <p> release year: {$adv['release_year']} </p>
                          <p><b> ad giver: <mark>{$adv['login']}</mark> phone: {$adv['phone']}</b></p>
                          <a href='adv_edit.php'>edit</a>
                          </div>";
                }
            }


            $sql = "SELECT a.*, ap.*, u.login, u.phone FROM advertisement as a 
                        INNER JOIN ad_phones as ap on ap.ad_id = a.id
                        INNER JOIN users as u on u.id = a.user_id
                        where u.login = {$_COOKIE['login']} ";

            if($advs = mysqli_query($connection, $sql)){
                //print phones
                while($adv = $advs->fetch_assoc()){
                    echo "<div class='mb-2 jumbotron'>
                          <p><b> cat: phones </b></p>";
                          $foto = mysqli_query($connection,"SELECT img_link from galery where ad_id = '{$adv['ad_id']}'");
                          while ($fotos = mysqli_fetch_array($foto)) {

                              echo "<img src='".$fotos['img_link']."' class='img-fluid' alt='Responsive image'>";

                          }
                    echo  "<p> brand: {$adv['brand']} </p>
                          <p> model: {$adv['model']} </p>
                          <p> description: {$adv['description']} </p>
                          <p> cena: {$adv['cena']} &euro;</p>
                          <p> release year: {$adv['release_year']} </p>
                          <p><b> ad giver: <mark>{$adv['login']}</mark> phone: {$adv['phone']}</b></p>
                          <a href='adv_edit.php'>edit</a>
                          </div>";
                } 
            }


        ?>
                </div>
            </div>
        </main>
        

    </body>
</html>




