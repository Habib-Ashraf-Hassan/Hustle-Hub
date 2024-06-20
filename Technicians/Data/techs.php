<?php
// Check if the username Unique
function unameIsUnique($uname, $conn, $student_id=0){
    $sql = "SELECT username, technicianid FROM technicians
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
        if ($student['technicianid'] == $student_id) {
          return 1;
        }else {
         return 0;
       }
      }else {
       return 1;
      }
    }
    
 }
 function getTechnicianByID($id, $conn){
  try {
      $sql = "SELECT * FROM technicians WHERE technicianid=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$id]);
      
      // Fetch the technician
      $technician = $stmt->fetch(PDO::FETCH_ASSOC);

      // Close the database connection
      $conn = null;

      return $technician ? $technician : null;
  } catch (PDOException $e) {
      // Handle any database errors
      return null; // Return null to indicate database error
  }
}
function gettechById($id, $conn){
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

 // DELETE CLIENT
function removeTechnician($id, $conn){
  try {
    $sql  = "DELETE FROM technicians WHERE technicianid=?";
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

function getAllJobsByTechnicianID($conn, $tid){
  $sql = "SELECT * FROM jobs WHERE technicianid = ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$tid]);

  if ($stmt->rowCount() >= 1) {
      $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $jobs;
  } else {
      return 0;
  }
}

function getCompletedJobsByTechnicianID($conn, $tid){
  $sql = "SELECT * FROM jobs WHERE technicianid = ? AND status = 'Completed'";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$tid]);

  if ($stmt->rowCount() >= 1) {
      $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $jobs;
  } else {
      return 0;
  }
}

function getNotCompletedJobsByTechnicianID($conn, $tid){
  $sql = "SELECT * FROM jobs WHERE technicianid = ? AND status <> 'Completed'";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$tid]);

  if ($stmt->rowCount() >= 1) {
      $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $jobs;
  } else {
      return 0;
  }
}
function getTotalJobsByTechnicianID($conn, $tid){
  $sql = "SELECT COUNT(*) AS total_jobs FROM jobs WHERE technicianid = ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$tid]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result['total_jobs'];
}

function getTotalCompletedJobsByTechnicianID($conn, $tid){
  $sql = "SELECT COUNT(*) AS total_completed_jobs FROM jobs WHERE technicianid = ? AND status = 'Completed'";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$tid]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result['total_completed_jobs'];
}

function getTotalNotCompletedJobsByTechnicianID($conn, $tid){
  $sql = "SELECT COUNT(*) AS total_not_completed_jobs FROM jobs WHERE technicianid = ? AND status <> 'Completed'";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$tid]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result['total_not_completed_jobs'];
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



