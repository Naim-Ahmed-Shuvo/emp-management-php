<?php include 'header.php';?>


<?php 
include 'db/config.php';
include 'db/Database.php';

$db = new Database(); 
$fetcAllEmpQuery = "SELECT  *  FROM  `employess`;";
$employees  = $db->getAllEmployess($fetcAllEmpQuery);


//submit form

if(isset($_POST['submit']) && !empty($_POST['emp'])){


    $project_name = $_POST['project_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $empolyee_id = implode(",",$_POST['emp']);
    // echo $empolyee_id;

    $query =  "INSERT INTO `projects`( `id`,`emp_id`, `project_name`, `start_data`, `end_date`) VALUES (NULL,'$empolyee_id','$project_name','$start_date','$end_date')";
 
    $result = $db->addProject($query);
    
 
    if($result=='Success'){
         echo $result;
         header('Location:projects.php');
     } else{
         $error = 'Error';
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


                            <label for="emp">Assign Employee</label>
                            <select name="emp[]" multiple >
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

