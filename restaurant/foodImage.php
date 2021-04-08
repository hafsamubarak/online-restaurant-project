<?php
require './proLogic/proConnection.php';
include './proLogic/helperFunctions.php';
$sql="select * from food";
$op  = mysqli_query($con,$sql);

    $ErrorFlag = 0;
    $ErrorMessage = [];
    $message = '';
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        if(!isset($_FILES['image'])){
            $ErrorFlag =1;
            $ErrorMessage['image'] = "empty image";
        }
        $fileTmpName=$_FILES['image']['tmp_name'];
        $fileName=$_FILES['image']['name'];
        $fileSize=$_FILES['image']['size'];
        $fileType=$_FILES['image']['type'];
        $fileExt=explode(".",$fileName);
        $count=count($fileExt);
        $extension=strtolower($fileExt[$count-1]);
        $testName= time().$fileExt[0].'.'.$extension;
        $allow_ext=['jpg','png','gif'];
        if(in_array($extension,$allow_ext)){
            $uploadFolder='./uploads/';
            $destPath=$uploadFolder.$testName;
            if(move_uploaded_file($fileTmpName,$destPath)){
                echo('Image uploaded: '.$testName.'<br>');
            }else{
                $ErrorFlag =1;
                $ErrorMessage['image'] = "error in uploaded file";
            }
            echo'allowed extension<br>';
        }else{
            $ErrorFlag=1;
            $ErrorMessage['image']='error in file extension';
        }
        if($ErrorFlag==0){
            $sql = "insert into food_images (food_image) values ('$testName') ";
            $op=mysqli_query($con,$sql);
        }
    }
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
                <th>Image</th>
            </tr>

     <?php   
     
           while ($data = mysqli_fetch_assoc($op)) {
               # code...
             echo '
            <tr>
             <td>'.$data['id'].'</td>
             <td>'.$data['testName'].'</td>
            </tr>';

           }
     
     
     
     ?>
            



           
        </table>

    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <div class="card-body">
                                        <form  action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post"  enctype="multipart/form-data">
                                            <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Upload Image</label>
                                                <input class="form-control py-4"  name="image" id="inputEmailAddress" type="file" required />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                               <input type="submit" class="btn btn-primary" value="Save"> 
                                            </div>
                                        </form>
        </div>


    

</body>

</html>