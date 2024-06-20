<?php
// Check if the username Unique
function unameIsUnique($uname, $conn, $student_id=0){
    $sql = "SELECT username, clientid FROM client
            WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$uname]);
    
    if ($student_id == 0) {
      if ($stmt->rowCount() >= 1) {
        return 0;
      }else {
       return 1;
      }
    }else {
     if ($stmt->rowCount() >= 1) {
        $student = $stmt->fetch();
        if ($student['clientid'] == $student_id) {
          return 1;
        }else {
         return 0;
       }
      }else {
       return 1;
      }
    }
    
 }
 function getclientById($id, $conn){
  $sql = "SELECT * FROM clients
          WHERE clientid=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $student = $stmt->fetch();
    return $student;
  }else {
   return 0;
  }
}

 // DELETE CLIENT
function removeClient($id, $conn){
  try {
    $sql  = "DELETE FROM clients WHERE clientid=?";
    $stmt = $conn->prepare($sql);
    $re   = $stmt->execute([$id]);
    
    // Close the database connection
    $conn = null;

    return $re ? 1 : 0;
  } catch (PDOException $e) {
    // Handle any database errors
    return -1; // Return a specific error code to indicate database error
  }
}
function getAllJobsByClientID($conn, $tid){
  $sql = "SELECT * FROM jobs WHERE clientid = ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$tid]);

  if ($stmt->rowCount() >= 1) {
      $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $jobs;
  } else {
      return 0;
  }
}
function gettechnicianById($id, $conn){
  $sql = "SELECT * FROM technicians
          WHERE technicianid=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $student = $stmt->fetch();
    return $student;
  }else {
   return 0;
  }
}
function getJobsWithReviewsByTechnicianID($conn, $tid){
  $sql = "SELECT * FROM jobs WHERE technicianid = ? AND reviews <> 'none'";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$tid]);

  if ($stmt->rowCount() >= 1) {
      $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $jobs;
  } else {
      return [];
  }
}



 ?>



