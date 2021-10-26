<?php 
include 'db/config.php';
include 'db/Database.php'
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;200;300;400&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/styles.css">
    <title>Sign Up</title>
</head>
<body>
<!-- php code goes here -->
<?php 
   $error;
   $db = new Database();

   if(isset($_POST['submit'])){
       $name = $_POST['name'];
       $email = $_POST['email'];
       $user_type = $_POST['user_type'];
       $password = $_POST['password'];

    //    echo $name;
    //    echo $email;
    //    echo $user_type;
    //    echo $password;

       if($name==''||$email==''||$user_type==''||$password==''){
             $error = 'All fileds are required';
       } else{
           $query ="INSERT INTO `users`( `name`, `email`, `password`, `user_type`) VALUES ('$name','$email','$password','$user_type')";
           $create = $db->sign_up($query);
        //    echo $create;
       }
   }
?>
<!-- ./ -->
    <div class="container">
        <div class="left-side w-100">
            <h4 class="signup">Sign Up</h4>
           <img src="img/login.png"  alt="img" >
        </div>
        <div class="right-side">
            <div class="form-div">
                <form action="register.php" method="post">
                    <div class="inputs">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Name...">
                    </div>
                    <div class="inputs">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Email...">
                    </div>
                    <div class="inputs">
                        <label for="user_type">User Type</label>
                        <select name="user_type">
                            <option value="admin">Admin</option>
                            <option value="admin">Employee</option>
                        </select>
                    </div>
                    <div class="inputs">
                        <label for="password">Password</label>
                        <input type="password" name="password">
                    </div>
                    <div class="inputs input_buttons">
                      <button  type="submit" name="submit">Submit</button>
                       <div class="info">
                           <span>Already have account?</span>
                          <a  href="index.php" >Sign In</a>
                       </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>