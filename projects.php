<?php include 'header.php';?>


<?php
include 'db/config.php';
include 'db/Database.php';

$db = new Database();
$fetcAllProjectsQuery = 'SELECT projects.*, employess.name AS employ_name FROM projects INNER JOIN employess ON employess.id = projects.emp_id; ';
$projects = $db->fecthAllProjects($fetcAllProjectsQuery);
// echo $projects;
// if($projects->num_rows>0){
//     $project = $projects->fetch_assoc();
//     $emp_id = $project['emp_id'];
//     echo "em_id  ",$emp_id;
// } else{
//     echo 'no projects';SELECT projects.*, employess.name AS employ_name FROM projects INNER JOIN employess ON employess.id = projects.emp_id; 
// }

// $project = $projects->fetch_assoc();
// $emp_id = $project['emp_id'];
// $emp = $db->fetchEmployeSingle('SELECT * FROM `employess` WHERE id= ".$emp_id."');
// echo $emp_id;

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
                              <?php if($projects->num_rows>0){?>
                                <?php while($project = $projects->fetch_assoc()){?>
                                    <tr>
                                        <td><?php echo $project['id']?></td>
                                        <td><?php echo $project['project_name']?></td>
                                        <td><?php echo $project['employ_name']?></td>
                                        <td><?php echo $project['start_data']?></td>
                                        <td><?php echo $project['end_date']?></td>
                                        <td>
                                            <a href="edit-project.php?project_id=<?php echo urldecode($project['id'])?>">edit</a>
                                            <a href="#">delete</a>
                                            <a href="#">assign</a>
                                        </td>
                                    </tr>
                                <?php }?>
                              <?php }?>
                          </tbody>
                      </table>
                  </div>
               </div>
           </div>
       </div>  
   </div>
<?php include 'footer.php';  ?>

