<?php include 'header.php';?>

<?php 

include 'db/config.php';
include 'db/Database.php';

$db = new Database();

$total_emp_query = 'SELECT * FROM employess;';
$total_emp = $db->findTotal($total_emp_query);
$total_users = $db->findTotal('SELECT * FROM users;');
$total_projects = $db->findTotal('SELECT * FROM projects;');


?>
   <div class="wrapper">
       <div class="dashboard">
           <div class="darshboard__left__menu">
               <?php
                 include './inc/dash_left_menu.php';
               ?>
           </div>
           <div class="dashboar__right__main">
               <div class="content">
                   <div class="title">
                       <h4>Dashboard</h4>
                   </div>
                   <hr style="border-top: 1px solid #333333;opacity: 0.1">
                  <div class="cads">
                      <div class="card">
                          <div class="card__header">
                            <h5>Total Users</h5>
                            <i class="fas fa-users"></i>
                          </div>
                          <h5 class="amount"><?php echo $total_users->num_rows??''?></h5>
                          <a href="users.php">View all</a>
                      </div>
                      <div class="card">
                          <div class="card__header">
                            <h5>Total Employees</h5>
                            <i class="fas fa-user-tie"></i>
                          </div>
                          <h5 class="amount"><?php echo $total_emp->num_rows??''; ?></h5>
                          <a href="employee.php">View all</a>
                      </div>
                      <div class="card">
                          <div class="card__header">
                            <h5>Total Projects</h5>
                            <i class="fas fa-dollar-sign"></i>
                          </div>
                          <h5 class="amount"><?php echo $total_projects->num_rows??''?></h5>
                          <a href="projects.php">View all</a>
                      </div>
                      
                  </div>

                  <!-- <div class="dashboard__main__section">
                      <table>
                          <thead>
                              <tr>
                                <th>ID</th>
                                <th>Employee</th>
                                <th>Slaray</th>
                                <th>Paid</th>
                                
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                <td>1</td>
                                <td>Test</td>
                                <td>3000</td>
                                <td>Fasle</td>
                                
                              </tr>
                          </tbody>
                      </table>
                  </div> -->
               </div>
           </div>
       </div>  
   </div>
<?php include 'footer.php';  ?>