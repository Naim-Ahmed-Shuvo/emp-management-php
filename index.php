<?php 
include 'db/config.php';
include 'db/Database.php';

$db = new Database();
$error='';
if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $password = $_POST['password'];
   $query =  "SELECT * FROM `users` WHERE email='$email' AND password='$password'";

   $result = $db->sign_in($query);


//    if($result){
//        header('Location:dashboard.php');
//    } else{
//        $error = 'Invalid name or password';
//    }
//    echo $email.' '.$password;
}
?>
 
 <?php include 'header.php';?>

    <div class="container">
        <div class="left-side w-100">
            <h4 class="signin">Sign In</h4>
           <img src="img/undraw_Login_re_4vu2.png"  alt="img" >
        </div>
        <div class="right-side">
            <?php 
               $red="red";
              echo $error? "<p style='color:".$red.";'>".$error."</p>":'';
            ?>
            <div class="form-div">
                <form action="" method="post">
                    <div class="inputs">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Email...">
                  
                    <div class="inputs">
                        <label for="password">Password</label>
                       <input type="password" name="password">
                    </div>
                    <div class="inputs input_buttons">
                      <button  type="submit" name="submit">Submit</button>
                       <div class="info">
                           <span>No Accnount?</span>
                          <a  href="register.php" >Sign Up</a>
                       </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php 
      include 'footer.php';
    ?>
