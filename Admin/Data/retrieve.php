<?php
function getadminById($id, $conn){
  $sql = "SELECT * FROM admin
          WHERE adminid=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $student = $stmt->fetch();
    return $student;
  }else {
   return 0;
  }
}
function gettechById($id, $conn){
  $sql = "SELECT * FROM approvals
          WHERE approvalid=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $student = $stmt->fetch();
    return $student;
  }else {
   return 0;
  }
}
function getAllClients($conn){
    // 1. Change the SQL query to select from the "clients" table
    $sql = "SELECT * FROM clients";
    // 2. Ensure the use of parameterized queries to prevent SQL injection attacks
    $stmt = $conn->prepare($sql);
    $stmt->execute();
 
    if ($stmt->rowCount() >= 1) {
      $clients = $stmt->fetchAll();
      // 3. Close the connection after fetching the clients
    //   $conn = null; // Assuming $conn is the PDO database connection
      return $clients;
    } else {
        return 0;
    }
 }
function getAllTechnicians($conn){
    $sql = "SELECT * FROM technicians";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
 
    if ($stmt->rowCount() >= 1) {
      $technicians = $stmt->fetchAll();
      $conn = null; // Close the connection
      return $technicians;
    } else {
        return 0;
    }
}
function getAllJobs($conn){
    $sql = "SELECT * FROM jobs";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
 
    if ($stmt->rowCount() >= 1) {
      $jobs = $stmt->fetchAll();
      $conn = null; // Close the connection
      return $jobs;
    } else {
        return 0;
    }
}

function getAllFeedbacks($conn){
    $sql = "SELECT * FROM feedbacks";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
 
    if ($stmt->rowCount() >= 1) {
      $feedbacks = $stmt->fetchAll();
      $conn = null; // Close the connection
      return $feedbacks;
    } else {
        return 0;
    }
 }
 function getALLApprovals($conn){
  $sql = "SELECT * FROM approvals WHERE status = 'not approved'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $feedbacks = $stmt->fetchAll();
    $conn = null; // Close the connection
    return $feedbacks;
  } else {
      return 0;
  }
}
 
 
 

function getTotalClients($conn){
    $sql = "SELECT COUNT(clientid) AS total_clients FROM clients";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_clients'];
}
function getTotalTechnicians($conn){
    $sql = "SELECT COUNT(technicianid) AS total_technicians FROM technicians";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_technicians'];
}
function getTotalFeedbacks($conn){
    $sql = "SELECT COUNT(feedbackid) AS total_feedbacks FROM feedbacks";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_feedbacks'];
}
function getTotalNotApprovedApprovals($conn){
  $sql = "SELECT COUNT(*) AS total_not_approved_approvals FROM approvals WHERE status = 'not approved'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result['total_not_approved_approvals'];
}


function getJobsWithReviews($conn){
  $sql = "SELECT * FROM jobs WHERE reviews <> 'none'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
      $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $jobs;
  } else {
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
  
 
 

?>