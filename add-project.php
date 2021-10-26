<?php include 'header.php';?>


<?php 
include 'db/config.php';
include 'db/Database.php';

$db = new Database(); 
$fetcAllEmpQuery = "SELECT  *  FROM  `employess`;";
$employees  = $db->getAllEmployess($fetcAllEmpQuery);


//submit form

if(isset($_POST['submit'])){
    $project_name = $_POST['project_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $empolyee_id = $_POST['empolyee_id'];

    // echo $empolyee_id ,$project_name;
    $query =  "INSERT INTO `projects`( `emp_id`, `project_name`, `start_data`, `end_date`) VALUES ('$empolyee_id','$project_name]','$start_date','$end_date')";
 
    $result = $db->addProject($query);
    
 
    if($result=='Success'){
         echo $result;
         header('Location:projects.php');
     } else{
         $error = 'Invalid name or password';
     }
 //    echo $email.' '.$password;
 }

?>
   <div class="wrapper">
       <div class="dashboard">
           <div class="darshboard__left__menu">
               <div class="logo">
                   <h4>Employee Management System</h4>
               </div>
               <hr style="border-top: 1px solid #fafafafa;opacity: 0.3">

               <ul>
                   <li><a href="dashboard.php"><span>Dashboard</span></a></li>
                   <li><a href=""><span>Employee</span></a></li>
                   <li><a href=""><span>Salary</span></a></li>
                   <li><a href="projects.php"><span style="font-weight: 700;">Projects</span></a></li>
               </ul>

               <hr style="border-top: 1px solid #fafafafa;opacity: 0.3">

               <ul>
                   <li><a href="index.php"><span>Logout</span></a></li>
               </ul>
           </div>
           <div class="dashboar__right__main">
               <div class="content">
                   <div class="title">
                       <h4>Projects</h4>
                   </div>
                   <hr style="border-top: 1px solid #333333;opacity: 0.1">
                 

                  <div class="dashboard__main__section" style="margin-top: 40px;">
                  <a href="projects.php" style="text-align: right; display:block;margin-bottom: 30px">View projects</a>
                  <form action="add-project.php" method="post">
                      <div class="add_project_form">
                          <div class="inputs">
                              <label for="project_name">Project Name</label>
                            <input type="text" name="project_name" placeholder="project_name.." required>
                            <label for="start_date">Start date</label>
                            <input type="date" name="start_date" placeholder="start_date.." required>
                          </div>
                          <div class="inputs">
                          <label for="end_date">End Date</label>
                            <input type="date" name="end_date" placeholder="end_date.." required>


                            <label for="empolyee_id">Assign Employee</label>
                            <select name="empolyee_id" >
                                <option selected>--select</option>
                               <?php
                                 if($employees->num_rows>0){?>
                                    <?php while($em = $employees->fetch_assoc()){?>
                                      <option value="<?php echo $em['id']?>"><?php echo $em['name'];?></option>
                                    <?php }?>
                                <?php }?>
                                
                            </select>
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

