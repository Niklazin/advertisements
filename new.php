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
    <table class="mt-5"> 
        <tr>
        <td>Tips</td>
        <td>
        <select name="ad_type" id="ad_type">
            <?php 
                $types = mysqli_query($connection,"SELECT * from ad_type");
                while($row = mysqli_fetch_array($types))
                {
                    echo "<option value='".$row['name']."'>".$row['name']."</option>";
                }
            ?>
        </select></td>
        </tr>               
 
        <tr>
            <td>Cena</td>
            <td><Input type="Number" size = "30" name="cena" step="0.01" class="form-control"></td>
        </tr>
		
		


	</table>
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
            <input class="mb-2 form-control" type="number" name="release_year">
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
    
    if($_POST['ad_type'] == 'books'){
        
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
         
        $sql = "INSERT INTO ad_books VALUES(0, '{$_POST['book_name']}', '{$_POST['author']}','{$_POST['page_count']}', LAST_INSERT_ID())";
        mysqli_query($connection, $sql);
    
       echo "added"; 
        
    }

	

?>
 
</div>
</body>
</html>