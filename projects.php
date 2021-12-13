<?php include 'header.php';?>


<?php
include 'db/config.php';
include 'db/Database.php';

$db = new Database();
$fetcAllProjectsQuery = 'SELECT * FROM `projects`';
$projects = $db->fecthAllProjects($fetcAllProjectsQuery);


if(isset($_GET['id'])){
    $id = $_GET['id'];
    // echo $id;
    $query = "DELETE FROM `projects`  WHERE `id`=$id";
    $result = $db->deleteProject($query);
    if($result=='Success'){
        header("Location:projects.php");
    } else{
        echo "Error";
    }
}

function getEployeesById($emp_id){
    $db = new Database();
    $ids = explode(',',$emp_id);
  for($i=0;$i<count($ids);$i++){
      $q = "SELECT  `name` FROM `employess` WHERE id=$ids[$i]";
      $emp_name = $db->getEmployeForProject($q)->fetch_assoc();
      if(!empty($emp_name )){

          foreach ($emp_name  as $key => $value) {
              echo $value."<br>";
          }
      } else{
          echo "no employee assigned";
      }
    //   print_r($emp_name['name'])  ;
    //   echo $ids[$i];
  }
}

?>
   <div class="wrapper">
       <div class="dashboard">
           <div class="darshboard__left__menu">
               <?php include 'inc/dash_left_menu.php'?>
           </div>
           <div class="dashboar__right__main">
               <div class="content">
                   <div class="title">
                       <h4>Projects</h4>
                   </div>
                   <hr style="border-top: 1px solid #333333;opacity: 0.1">
                 

                  <div class="dashboard__main__section" style="margin-top: 40px;">
                     <a href="add-project.php" style="text-align: right; display:block;margin-bottom: 30px">add project</a>
                      <table>
                          <thead>
                              <tr>
                                <th>ID</th>
                                <th>Project Name</th>
                                <th>Employee</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                              </tr>

                              
                          </thead>
                          <tbody>
                              <?php if(isset($projects->num_rows)){?>
                                <?php while($project = $projects->fetch_assoc()){?>
                                    <tr>
                                        <td><?php echo $project['id']?></td>
                                        <td><?php echo $project['project_name']?></td>
                                        <td><?php echo getEployeesById($project['emp_id'])?></td>
                                        <td><?php echo $project['start_data']?></td>
                                        <td><?php echo $project['end_date']?></td>
                                        <td>
                                            <a href="edit-project.php?project_id=<?php echo urldecode($project['id'])?>">edit</a>
                                            <a href="projects.php?id=<?php echo urldecode($project['id'])?>">delete</a>
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

