<?php 

class Database{
   private $host = DB_HOST;
   private $db_name = DB_NAME;
   private $db_user = DB_USER;
   private $db_pass = DB_PASS;

   public $link;
   public $error;
   function __construct(){
     $this->connectDb();
  }

  private function connectDb()
  {
      $this->link = new mysqli($this->host,$this->db_user,$this->db_pass,$this->db_name);
      if(!$this->link){
        $this->error = 'connection failed'.$this->link->connect_error;
      }
  }

  public function sign_up($query){
    // echo ($query);
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
        if($result){
          header('Location: login.php');
          //  return $result;
        } else{
          return false;
        }
  }

  public function sign_in($query){
    // echo "login";
    $reslut = $this->link->query($query) or die($this->link->error.__LINE__);
    // echo $reslut->num_rows;
    // echo $reslut;
    if($reslut->num_rows>0){
        return 'Login Success';
    } else{
        return false;
    }
  }

  public function getAllEmployess($fetcAllEmpQuery){
    // echo $fetcAllEmpQuery;
    $employees = $this->link->query($fetcAllEmpQuery) or die($this->link->error.__LINE__);
    // echo $employees->num_rows;

    if($employees->num_rows>0){
      return $employees;
    } else{
      echo 'no employes';
    }
  }

  //project
  public function addProject($query)
  {
     // echo "login";
     $reslut = $this->link->query($query) or die($this->link->error.__LINE__);
     // echo $reslut->num_rows;
     // echo $reslut;
     if($reslut){
         return 'Success';
     } else{
         return false;
     }
  }

  //fecthAllProjects
  public function fecthAllProjects($query)
  {
     // echo "login";
     $reslut = $this->link->query($query) or die($this->link->error.__LINE__);
    //  echo json_encode($reslut);
     echo $reslut->num_rows;
     // echo $reslut;
     if($reslut->num_rows>0){
         return $reslut;
     } else{
         return false;
     }
  }

  // fetchSingleProject
  function fetchSingleProject($query){

    $reslut = $this->link->query($query) or die($this->link->error.__LINE__);

    //  echo "num rows: ".$reslut->num_rows;
     // echo $reslut;
     if($reslut->num_rows>0){
         return $reslut;
     } else{
         return false;
     }
  }

  //updateproject
  function updateProject($query){
    $reslut = $this->link->query($query) or die($this->link->error.__LINE__);

    //  echo "num rows: ".$reslut->num_rows;
     // echo $reslut;
     if($reslut){
         return "Success";
     } else{
         return false;
     }
  }

  //delete project
  function deleteProject($query){
    $reslut = $this->link->query($query) or die($this->link->error.__LINE__);

    //  echo "num rows: ".$reslut->num_rows;
     // echo $reslut;
     if($reslut){
         return "Success";
     } else{
         return false;
     }
  }

  //fetchEmployeSingle
  public function fetchEmployeSingle($query)
  {
     
     $reslut = $this->link->query($query) or die($this->link->error.__LINE__);
     return $reslut;
  }

  //addEmployee
  function addEmployee($query){
    $reslut = $this->link->query($query) or die($this->link->error.__LINE__);

    //  echo "num rows: ".$reslut->num_rows;
     // echo $reslut;
     if($reslut){
         return "Success";
     } else{
         return false;
     }
  }

  //update emp
  function updateEmp($query){
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
    if($result){
        return "Success";
    } else{
        return false;
    }
  }

  //delete emp
  function deleteEmp($query){
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
    if($result){
        return "Success";
    } else{
        return false;
    }
  }

  //paySalary
  function paySalary($query){
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
    if($result){
        return  $result;
    } else{
        return false;
    }
  }

  //update salary table
  function addSalary($query){
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
    if($result){
        return "Success";
    } else{
        return false;
    }
  }

  function findTotal($query){
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
    if($result){
        return $result;
    } else{
        return false;
    }
  }


  function deleteUser($query){
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
    if($result){
        return "Success";
    } else{
        return false;
    }
  }

  function getAllUsers($query){
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
    if($result){
        return $result;
    } else{
        return false;
    }
  }

  function getEmployeForProject($query){
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
    if($result){
        return $result;
    } else{
        return false;
    }
  }
}

