<?php include 'header.php';?>

<?php 
include 'db/config.php';
include 'db/Database.php';

//
$db = new Database();

if(isset($_POST["submit"])){
    $emp_name = $_POST["emp_name"];
    $working_days = $_POST["working_days"];
    $salary = $_POST["salay"];

    //adding employe
    $query = "INSERT INTO `employess`(`id`, `name`, `working_days`, `salary`, `paid`) VALUES (NULL,'$emp_name','$working_days','$salary','')";
    $result = $db->addEmployee($query);

    //adding data to salary
    
    //
    if($result=='Success'){
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
                      <form action="add-employee.php" method="post">
                        <div class="add_project_form">
                            <div class="inputs">
                                <label for="emp_name">Employee Name</label>
                                <input type="text" name="emp_name" placeholder="Employee Name.." required>
                                <label for="working_days">Working Days</label>
                                <input type="text" name="working_days" placeholder="Working Days.." required>
                            </div>
                            <div class="inputs">
                                <label for="salay_paid">Salary</label>
                                <input type="text" name="salay" placeholder="Salary.." required> 
                            </div>

                            <input type="submit" name="submit" value="Submit" class="btn">
                        </div>
                    </form>
                  </div>
               </div>
           </div>
       </div>  
   </div>
<?php include 'footer.php';  ?>