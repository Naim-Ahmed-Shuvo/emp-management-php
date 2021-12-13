<?php include 'header.php';?>

<?php 
include 'db/config.php';
include 'db/Database.php';

//
$db = new Database();
$emp_id = $_GET['emp_id'];

$query = "select * from employess where id=$emp_id";
$emp = $db->fetchEmployeSingle($query)->fetch_assoc();


if(isset($_POST["submit"])){
    $query = "update employess set paid='true' where id=$emp_id";
    $payResult = $db->paySalary($query);

    //updating salary table
    $salary = $emp['salary'];
    $paid = "true";
    $salaryQuery = "INSERT INTO `salaries`( `emp_id`, `salary`, `paid`) VALUES ('$emp_id','$salary','$paid')";
    $salaryResult = $db->addSalary($salaryQuery);
    
    //
    if($payResult && $salaryResult){
        echo $payResult;
        echo $salaryResult;
        header('Location:employee.php');
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
                      <a href="employee.php" style="text-align: right; display:block;margin-bottom: 30px">All emp</a>
                      <form action="pay-salary.php?emp_id=<?php echo $emp_id?>" method="post">
                        <div class="add_project_form">
                            <div class="inputs">
                                <label for="emp_name">Employee Name</label>
                                <input type="text" disabled value="<?php echo $emp['name'];?>">
                                <label for="working_days">Working Days</label>
                                <input type="text" disabled value="<?php echo $emp['working_days'];?>">
                            </div>
                            <div class="inputs">
                                <label for="salay_paid">Salary</label>
                                <input type="text" disabled value="<?php echo $emp['salary'];?>">
                            </div>

                            <input type="submit" name="submit" value="Pay" class="btn">
                        </div>
                    </form>
                  </div>
               </div>
           </div>
       </div>  
   </div>
<?php include 'footer.php';  ?>