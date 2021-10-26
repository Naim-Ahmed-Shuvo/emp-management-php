<?php include 'header.php';?>

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
                   <li><a href="projects.php"><span>Projects</span></a></li>
               </ul>

               <hr style="border-top: 1px solid #fafafafa;opacity: 0.3">

               <ul>
                   <li><a href="index.php"><span>Logout</span></a></li>
               </ul>
           </div>
           <div class="dashboar__right__main">
               <div class="content">
                   <div class="title">
                       <h4>Dashboard</h4>
                   </div>
                   <hr style="border-top: 1px solid #333333;opacity: 0.1">
                  <div class="cads">
                      <div class="card">
                          <div class="card__header">
                            <h5>Total Users</h5>
                            <i class="fas fa-users"></i>
                          </div>
                          <h5 class="amount">30</h5>
                          <a href="#">View all</a>
                      </div>
                      <div class="card">
                          <div class="card__header">
                            <h5>Total Employees</h5>
                            <i class="fas fa-user-tie"></i>
                          </div>
                          <h5 class="amount">50</h5>
                          <a href="#">View all</a>
                      </div>
                      <div class="card">
                          <div class="card__header">
                            <h5>Total Salary</h5>
                            <i class="fas fa-dollar-sign"></i>
                          </div>
                          <h5 class="amount">20</h5>
                          <a href="#">View all</a>
                      </div>
                      
                  </div>

                  <div class="dashboard__main__section">
                      <table>
                          <thead>
                              <tr>
                                <th>ID</th>
                                <th>Employee</th>
                                <th>Slaray</th>
                                <th>Paid</th>
                                
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                <td>1</td>
                                <td>Test</td>
                                <td>3000</td>
                                <td>Fasle</td>
                                
                              </tr>
                          </tbody>
                      </table>
                  </div>
               </div>
           </div>
       </div>  
   </div>
<?php include 'footer.php';  ?>