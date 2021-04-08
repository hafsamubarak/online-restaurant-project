<?php
require './proLogic/proConnection.php';
include './proLogic/helperFunctions.php';
$user_id='';
$food_id='';
$sql="insert into user_food (user_id,food_id) values ('$user_id','$food_id')";
$op=mysqli_query($con,$sql);

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>User Food</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }
        
        .m-b-1em {
            margin-bottom: 1em;
        }
        
        .m-l-1em {
            margin-left: 1em;
        }
        
        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <!-- PHP code to read records will be here -->


        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>Id</th>
                <th>User Id</th>
                <th>Food Id</th>
            </tr>

     <?php   
     
           while ($data = mysqli_fetch_assoc($op)) {
               # code...
             echo '
            <tr>
             <td>'.$data['id'].'</td>
             <td>'.$data['user_id'].'</td>
             <td>'.$data['food_id'].'</td>
            </tr>';

           }
     
     
     
     ?>
            



           
        </table>

    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    

</body>

</html>
<?php/* }else{
    header("Location:home.php");
    }*/
    ?>