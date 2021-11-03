<?php include 'header.php';?>

<?php 
include 'db/config.php';
include 'db/Database.php';

//initializing instance of Database class
$db = new Database();

//taking emp id from request
$emp_id = $_GET['emp_id'];

//fetching employee by the id
$query = "select * from employess where id=$emp_id";
$emp = $db->fetchEmployeSingle($query)->fetch_assoc();

//checking if successfully got the exact emp
if(count($emp)>0){
    // echo $emp['name'];
} else{
    echo "nai";
}

//checking the request method 
if(isset($_POST['submit'])){

    //taking form data
    $name = $_POST['emp_name'];
    $working_days = $_POST['working_days'];
    $salary = $_POST['salary'];

    //making sql query
    $query = "update employess set name='$name', working_days='$working_days',salary='$salary' where id=$emp_id";

    //calling db method
    $result = $db->updateEmp($query);

    //checking successfull or not
    if($result=='Success'){

        // success and go to emplye table page
        header('Location:employee.php');

    } else{

        //if filed to update the print error
        echo "Something wrong";
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
                       <h4>Edit Employees</h4>
                   </div>
                   <hr style="border-top: 1px solid #333333;opacity: 0.1">
                   <div class="dashboard__main__section" style="margin-top: 40px;">
                      <a href="employee.php" style="text-align: right; display:block;margin-bottom: 30px">All emp</a>
                      <form action="edit-emp.php?emp_id=<?php echo $emp_id?>" method="post">
                        <div class="add_project_form">
                            <div class="inputs">
                                <label for="emp_name">Employee Name</label>
                                <input type="text" name="emp_name" value="<?php echo $emp['name']?>" placeholder="Employee Name.." required>
                                <label for="working_days">Working Days</label>
                                <input type="text" name="working_days" value="<?php echo $emp['working_days']?>" placeholder="Working Days.." required>
                            </div>
                            <div class="inputs">
                                <label for="salay_paid">Salary</label>
                                <input type="text" name="salary" value="<?php echo $emp['salary']?>" placeholder="Salary.." required>
    
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