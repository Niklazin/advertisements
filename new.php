<?php include "database_connection/db.php"?>
<!DOCTYPE html>
<html>
<head>
<?php 
    require 'blocks/head.php';
    require 'blocks/header.php';
?>

<title>Page Title</title>
</head>
<body>
<div class = "container">
<form action="new.php" method="POST" name="newad_form">
    
       <label for="ad_type">Type</label>
     
       
        <select name="ad_type" id="ad_type" class="mb-2 form-control"> 
            <?php 
                $types = mysqli_query($connection,"SELECT * from ad_type");
                while($row = mysqli_fetch_array($types))
                {
                    echo "<option value='".$row['name']."'>".$row['name']."</option>";
                }
            ?>
        </select>
                  
 
      
         <label for="cena">Cena</label>
           <Input type="Number" size = "30" name="cena" step="0.01" class="form-control">

        <label for="Image">Image(URL)(not necessary)</label>
            <Input type="text" name="Image" class="form-control">
		


        <label for="description">description</label>
        <input type="text" class="mb-2 form-control" name="description">
    
        <div name="TypeCars" id="TypeCars">
            <label for="car_mark">car mark</label>
            <input class="mb-2 form-control" type="text" name="car_mark">

            <label for="car_model">car model</label>
            <input class="mb-2 form-control" type="text" name="car_model">

            <label for="release_year">release year</label>
            <input class="mb-2 form-control" type="number" name="release_year">

            <label for="mileage">mileage</label>
            <input class="mb-2 form-control" type="number" name="mileage">
        </div>
    
        <div name="TypeBooks" id="TypeBooks">
            <label for="book_name">book name</label>
            <input class="mb-2 form-control" type="text" name="book_name">

            <label for="author">author</label>
            <input class="mb-2 form-control" type="text" name="author">

            <label for="page_count">page count</label>
            <input class="mb-2 form-control" type="number" name="page_count">
        </div>
    
        <div name="TypeBooks" id="TypePhones">
            <label for="brand">brand(company)</label>
            <input class="mb-2 form-control" type="text" name="brand">

            <label for="model">model</label>
            <input class="mb-2 form-control" type="text" name="model">

            <label for="release_year">release year</label>
            <input class="mb-2 form-control" type="number" name="phone_release_year">
        </div>
    
        <Input type="submit" id ="submit" name="new" value="Izveidot">
</form>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
            
            //chech what type user choose
            $("#ad_type").change(function(){
                if($('#ad_type').val() == "cars"){
                    $('#TypeCars').slideToggle();
                    $('#TypeBooks').hide();
                    $('#TypePhones').hide();
                    
                }else if($('#ad_type').val() == "books"){
                    $('#TypeBooks').slideToggle();
                    $('#TypeCars').hide();
                    $('#TypePhones').hide();
                }else if($('#ad_type').val() == "phones"){
                    $('#TypePhones').slideToggle();
                    $('#TypeBooks').hide();
                    $('#TypeCars').hide();
                }
                  
            });
            
            
        })
    
</script>


<?php
    
    if(!isset($_POST['ad_type']))
        exit();
    else if(!isset($_POST['description'])){
        echo 'type description';
        exit();
    }else if(!isset($_POST['cena'])){
        echo 'type cena';
        exit();
    }

    switch ($_POST['ad_type']) {
        case 'books':
            if(!isset($_POST['book_name']))
                exit();
            else if(!isset($_POST['author']))
                exit();
            else if(!isset($_POST['page_count']))
                exit();
            
            $sql = "SELECT id FROM users where login = '{$_COOKIE['login']}'";
            $user_id = mysqli_query($connection, $sql);
            $user_id = $user_id->fetch_assoc();
            
            $sql = "INSERT INTO advertisement VALUES(0, {$user_id['id']}, '{$_POST['description']}', 1, {$_POST['cena']})";
            mysqli_query($connection, $sql);

            $sql = "SELECT LAST_INSERT_ID() as 'id'";
            $a = mysqli_query($connection, $sql);
            $ad_id = $a->fetch_assoc();
            $ad_id = $ad_id['id'];
            if(!empty($_POST['Image'])){
                $query4 = mysqli_query($connection,"INSERT INTO `galery` VALUES (0, '$ad_id', '{$_POST['Image']}')");
            }
             
            $sql = "INSERT INTO ad_books VALUES(0, '{$_POST['book_name']}', '{$_POST['author']}','{$_POST['page_count']}', $ad_id)";
            mysqli_query($connection, $sql);
        
            echo "added"; 
            break;
        
        case 'cars':
            if(!isset($_POST['car_mark']))
                exit();
            else if(!isset($_POST['car_model']))
                exit();
            else if(!isset($_POST['phone_release_year']))
                exit();
            else if (!isset($_POST['mileage']))
                exit();

            $sql = "SELECT id FROM users where login = '{$_COOKIE['login']}'";
            $user_id = mysqli_query($connection, $sql);
            $user_id = $user_id->fetch_assoc();
            
            $sql = "INSERT INTO advertisement VALUES(0, {$user_id['id']}, '{$_POST['description']}', 2, {$_POST['cena']})";
            mysqli_query($connection, $sql);

            $sql = "SELECT LAST_INSERT_ID() as 'id'";
            $a = mysqli_query($connection, $sql);
            $ad_id = $a->fetch_assoc();
            $ad_id = $ad_id['id'];
            if(!empty($_POST['Image'])){
                $query4 = mysqli_query($connection,"INSERT INTO `galery` VALUES (0, '$ad_id', '{$_POST['Image']}')");
            }
             
            $sql = "INSERT INTO ad_car VALUES(0, $ad_id,'{$_POST['release_year']}', '{$_POST['mileage']}','{$_POST['car_mark']}', '{$_POST['car_model']}')";
            mysqli_query($connection, $sql);
        
            echo "added"; 

            break;

        case 'phones':
            if(!isset($_POST['brand']))
                exit();
            else if(!isset($_POST['model']))
                exit();
            else if(!isset($_POST['phone_release_year']))
                exit();
            
            $sql = "SELECT id FROM users where login = '{$_COOKIE['login']}'";
            $user_id = mysqli_query($connection, $sql);
            $user_id = $user_id->fetch_assoc();
            
            $sql = "INSERT INTO advertisement VALUES(0, {$user_id['id']}, '{$_POST['description']}', 3, {$_POST['cena']})";
            mysqli_query($connection, $sql);

            $sql = "SELECT LAST_INSERT_ID() as 'id'";
            $a = mysqli_query($connection, $sql);
            $ad_id = $a->fetch_assoc();
            $ad_id = $ad_id['id'];
            if(!empty($_POST['Image'])){
                $query4 = mysqli_query($connection,"INSERT INTO `galery` VALUES (0, '$ad_id', '{$_POST['Image']}')");
            }
             
            $sql = "INSERT INTO ad_phones VALUES(0,$ad_id, '{$_POST['brand']}', '{$_POST['model']}','{$_POST['phone_release_year']}')";
            mysqli_query($connection, $sql);
        
            echo "added"; 
            break;


        default:
            # code...
            break;
    }
    




	

?>
 
</div>
</body>
</html>