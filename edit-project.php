<?php
include 'db/config.php';
include 'db/Database.php';

$db = new Database();
$fetcAllEmpQuery = "SELECT  *  FROM  `employess`;";
$employees  = $db->getAllEmployess($fetcAllEmpQuery);
$project_id = $_GET['project_id'];
$fetchSingleProjectsQuery = "SELECT projects.*, employess.name AS employ_name FROM projects INNER JOIN employess ON employess.id = projects.emp_id WHERE projects.id=$project_id; ";
$project = $db->fetchSingleProject($fetchSingleProjectsQuery)->fetch_assoc();
// echo $project['project_name'];
// echo $project['employ_name'];

if(isset($_POST['submit'])){
    echo $project_name = $_POST['project_name'];
    echo $start_date = $_POST['start_date'];
    echo $end_date = $_POST['end_date'];
    echo $empolyee_id = $_POST['empolyee_id'];

    // echo $empolyee_id ,$project_name;
    $query =  "UPDATE `projects` SET `emp_id`='$empolyee_id',`project_name`='$project_name',`start_data`='$start_date',`end_date`='$end_date' WHERE `id`=$project_id";
 
    $result = $db->updateProject($query);
    
 
    if($result=='Success'){
         echo $result;
         header('Location:projects.php');
     } else{
         $error = 'Invalid name or password';
     }
 //    echo $email.' '.$password;
 }

//  echo json_encode($projects->num_rows);
?>
<?php include 'header.php';?>
<div class="wrapper">
       <div class="dashboard">
           <div class="darshboard__left__menu">
               <?php include 'inc/dash_left_menu.php';?>
           </div>
           <div class="dashboar__right__main">
               <div class="content">
                   <div class="title">
                       <h4>Edit Project</h4>
                   </div>
                   <hr style="border-top: 1px solid #333333;opacity: 0.1">
                 

                  <div class="dashboard__main__section" style="margin-top: 40px;">
                  <a href="projects.php" style="text-align: right; display:block;margin-bottom: 30px">View projects</a>
                  <form action="edit-project.php?project_id=<?php echo $project_id?>" method="post">
                      <div class="add_project_form">
                          <div class="inputs">
                              <label for="project_name">Project Name</label>
                            <input type="text" name="project_name" value="<?php echo $project['project_name']?>"  placeholder="project_name.." >
                            <label for="start_date">Start date</label>
                            <input type="date" name="start_date" value="<?php echo $project['start_data']?>" >
                          </div>
                          <div class="inputs">
                          <label for="end_date">End Date</label>
                            <input type="date" name="end_date" value="<?php echo $project['end_date']?>" >


                            <label for="empolyee_id">Assign Employee</label>
                            <select name="empolyee_id"  value="<?php echo $project['emp_id']?>">
                                <option >--select</option>
                               <?php
                                 if($employees->num_rows>0){?>
                                    <?php while($em = $employees->fetch_assoc()){?>
                                      <option value="<?php echo $em['id'];?>" <?php echo $em['name']==$project['employ_name']?'selected':"";?> ><?php echo $em['name'];?></option>
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