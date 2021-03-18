 <?php

    $showalert = false;
    $showerror = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include '_dbconnect.php';
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
       

        $existsql = "SELECT * FROM `users` WHERE username = '$username'";
        $result = mysqli_query($conn,$existsql);
        $numexistrows = mysqli_num_rows($result);
        if($numexistrows >0){
            $showerror = "username already exists.. asshole";
        }


        if (($password == $cpassword) ) {
            $hash = password_hash($password , PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ( '$username', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showalert = true;
            }
        } else {

            $showerror = "password dont match! check the password biyoccchhh";
        }
    }



    ?>



 <!doctype html>
 <html lang="en">

 <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

     <title>signup</title>
 </head>

 <body>
     <?php
        include 'components/_nav.php'
        ?>

     <?php

        if ($showalert) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>success!!</strong> you have created your account now you can login 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        }
        ?>

     <?php

        if ($showerror) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>failure!!</strong>' . $showerror . ' 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        }
        ?>

     <div class="container my-4">

         <h2>Fill the signup form bitches</h2>

         <form action="signup.php" method="post">
             <div class="mb-3 ">
                 <label for="username" class="form-label">Username</label>
                 <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username">

             </div>
             <div class="mb-3 ">
                 <label for="password" class="form-label">Password</label>
                 <input type="password" class="form-control" id="password" name="password">
             </div>
             <div class="mb-3">
                 <label for="cpassword" class="form-label">Confirm password</label>
                 <input type="password" class="form-control" id="cpassword" name="cpassword">
                 <div id="emailHelp" class="form-text">Make sure you type the same password</div>
             </div>

             <button type="submit" class="btn btn-primary">signup</button>
         </form>

     </div>

     <!-- Optional JavaScript; choose one of the two! -->

     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

     <!-- Option 2: Separate Popper and Bootstrap JS -->

     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

 </body>

 </html>