<?php 

include 'header.php';
include 'db/config.php';
include 'db/Database.php';

;?>

<?php 
$db = new Database();
$query = 'SELECT * FROM employess';
$empployess = $db->getAllEmployess($query);
$msg='';
if(isset($_GET['emp_id'])){
    $emp_id = $_GET['emp_id'];
    $query = "insert into salaries (emp_id,salary) values('$emp_id','1')";

    $result = $db->paySalary($query);
    if($result=='Success'){
        $msg = 'Salary Paid';
    } else{
        $msg = 'Error';
    }
}
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
                       <h4>Salary</h4>
                   </div>
                   <hr style="border-top: 1px solid #333333;opacity: 0.1">
                 

                  <div class="dashboard__main__section" style="margin-top: 30px;">

                      <table>
                          <thead>
                              <tr>
                                <th>empployee Name</th>
                                <th>working Days</th>
                                <th>Slaray</th>
                                <th>Paid</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php if($empployess->num_rows) {?>
                              <?php while($emp = $empployess->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $emp['name']?></td>
                                    <td><?php echo $emp['working_days']?></td>
                                    <td><?php echo $emp['salary']?></td>
                                    <td><?php echo $emp['paid']?></td>
                                </tr>
                            <?php };?>
                              <?php  } else {
                                  echo "<h4>No Data</h4>";
                              };?>
                          </tbody>
                      </table>
                  </div>
               </div>
           </div>
       </div>  
   </div>
<?php include 'footer.php';  ?>