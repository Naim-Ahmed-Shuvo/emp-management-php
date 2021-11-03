<?php 

include 'header.php';
include 'db/config.php';
include 'db/Database.php';

;?>

<?php 

$db = new Database();
$query = 'SELECT * from employess';
$employess = $db->getAllEmployess($query);

//taking emp id from request
if(isset($_GET['emp_id'])){
    $emp_id = $_GET['emp_id'];
    $query = "DELETE FROM `employess`  WHERE `id`=$emp_id";
    $result = $db->deleteEmp($query);
    if($result=='Success'){
        header("Location:employee.php");
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
                       <h4>Employees</h4>
                   </div>
                   <hr style="border-top: 1px solid #333333;opacity: 0.1">
                   <div class="dashboard__main__section" style="margin-top: 40px;">
                  <a href="add-employee.php" style="text-align: right; display:block;margin-bottom: 30px">add emp</a>
                      <table>
                          <thead>
                              <tr>
                                <th>ID</th>
                                <th>Employee Name</th>
                                <th>Working Days</th>
                                <th>Salary</th>
                                <th>Paid</th>
                                <th>Action</th>
                              </tr>

                              
                          </thead>
                          <tbody>
                              <?php if(isset($employess->num_rows)){?>
                                <?php while($emp = $employess->fetch_assoc()){?>
                                    <tr>
                                        <td><?php echo $emp['id']?></td>
                                        <td><?php echo $emp['name']?></td>
                                        <td><?php echo $emp['working_days']?></td>
                                        <td><?php echo $emp['salary']?></td>
                                        <td><?php echo $emp['paid']?></td>
                                        <td>
                                            <a href="edit-emp.php?emp_id=<?php echo urldecode($emp['id'])?>">edit</a>
                                            <a href="employee.php?emp_id=<?php echo urldecode($emp['id'])?>">delete</a>
                                            <a href="pay-salary.php?emp_id=<?php echo urldecode($emp['id'])?>">pay</a>
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