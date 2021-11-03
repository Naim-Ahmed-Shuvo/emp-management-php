<?php 

include 'header.php';
include 'db/config.php';
include 'db/Database.php';

;?>

<?php 

$db = new Database();
$query = 'SELECT * from users';
$users = $db->getAllUsers($query);

//taking emp id from request
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $query = "DELETE FROM `users`  WHERE `id`=$user_id";
    $result = $db->deleteUser($query);
    if($result=='Success'){
        header("Location:users.php");
    } else{
        echo "Error";
    }
}

?>

   <div class="wrapper">
       <div class="dashboard">
           <div class="darshboard__left__menu">
              <?php include 'inc/dash_left_menu.php';?>
           </div>
           <div class="dashboar__right__main">
               <div class="content">
                   <div class="title">
                       <h4>Users</h4>
                   </div>
                   <hr style="border-top: 1px solid #333333;opacity: 0.1">
                   <div class="dashboard__main__section" style="margin-top: 40px;">
                  
                      <table>
                          <thead>
                              <tr>
                                <th>ID</th>
                                <th> Name</th>
                                <th>Email</th>
                           
                                <th>Type</th>
                                <th>Action</th>
                              </tr>

                              
                          </thead>
                          <tbody>
                              <?php if(isset($users->num_rows)){?>
                                <?php while($user = $users->fetch_assoc()){?>
                                    <tr>
                                        <td><?php echo $user['id']?></td>
                                        <td><?php echo $user['name']?></td>
                                        <td><?php echo $user['email']?></td>
                                        
                                        <td><?php echo $user['user_type']?></td>
                                        <td>
                                            
                                            <a href="users.php?user_id=<?php echo urldecode($user['id'])?>">delete</a>
                                           
                                        </td>
                                    </tr>
                                <?php }?>
                              <?php } else{?>
                                <h5>No data</h5>
                                
                                <?php }?>
                          </tbody>
                      </table>
                  </div>
               </div>
           </div>
       </div>  
   </div>
<?php include 'footer.php';  ?>