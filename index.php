

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

                        $sql = "SELECT a.*, ab.*, u.login, u.phone FROM advertisement as a 
                                    INNER JOIN ad_books as ab on ab.ad_id = a.id
                                    INNER JOIN users as u on u.id = a.user_id";

                        $advs = mysqli_query($connection, $sql);
                        //print books
                        while($adv = $advs->fetch_assoc()){
                            echo "<div class='mb-2 jumbotron'>
                                  <p><b> cat: books </b></p>
                                  <p> book: {$adv['name']} </p>
                                  <p> author: {$adv['author']} </p>
                                  <p> description: {$adv['description']} </p>
                                  <p> cena: {$adv['cena']} &euro;</p>
                                  <p> page count: {$adv['page_count']} </p>
                                  <p><b> ad giver: <mark>{$adv['login']}</mark> phone: {$adv['phone']}</b></p>
                                  </div>";
                        }
                        
                    ?>
                </div>
            </div>
        </main>
    </body>
</html>


