<?php 
      require './proLogic/proConnection.php';
      include './proLogic/helperFunctions.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
  $email    = cleanInputs($_POST['email']);
  $password = cleanInputs($_POST['password']);
  $errorFlag=0;
  $messageEmpty='';
  $messageEmail='';
  $messagePassword='';

    // Validation { code }   true  . . . 

       if( empty($email) || empty($password)){

         $errorFlag = 1; 
         $messageEmpty='empty field<br>';
       }
       if(filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE){
           $errorFlag=1;
           $messageEmail='Invalid Email<br>';
       }
       if(strlen($password) <6 ){
           $errorFlag =1;
           $messagePassword='invalid Password';
       }
       if($errorFlag == 0){
           $password= md5($password);
           $sql= "select * from users where email= '$email' and password= '$password'";
           $op=mysqli_query($con,$sql);
           if(mysqli_num_rows($op)==1){
               $data= mysqli_fetch_assoc($op);
               $_SESSION['id']=$data['id'];
               //$_SESSION['name']=$data['name']; 
               header("Location:home.php");
           }else{
               echo 'Error in Login';
           }
          


       }else{
        echo $messageEmpty .'<br>'. $messageEmail .'<br>'. $messagePassword;
       }



}
    
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    
    <body>

        <div class="container">
            <h2>Login</h2>
            <form  method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">

                <div class="form-group">
					<input type="hidden" name="id" class="form-control" placeholder="Name" value="id"/>
				</div>
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" >
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Password" >
                </div> 

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
   
    </body>
    
    </html>