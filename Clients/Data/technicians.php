<?php
function getAllElectricianTechnicians($conn){
    $sql = "SELECT * FROM technicians WHERE profession = 'Electrician'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
 
    if ($stmt->rowCount() >= 1) {
      $technicians = $stmt->fetchAll();
    } else {
      $technicians = 0;
    }
 
    // Close the database connection
    // $conn = null;
 
    return $technicians;
 }

 function getAllRankedCarpenterTechnicians($conn){
  $sql = "SELECT * FROM technicians WHERE profession = 'Carpenter' ORDER BY ratings DESC";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $technicians = $stmt->fetchAll();
  } else {
    $technicians = 0;
  }

  // Close the database connection
  // $conn = null;

  return $technicians;
}

function getAllRankedElectricianTechnicians($conn){
  $sql = "SELECT * FROM technicians WHERE profession = 'Electrician' ORDER BY ratings DESC";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $technicians = $stmt->fetchAll();
  } else {
    $technicians = 0;
  }

  // Close the database connection
  // $conn = null;

  return $technicians;
}

function getAllRankedPlumbersTechnicians($conn){
  $sql = "SELECT * FROM technicians WHERE profession = 'Plumber' ORDER BY ratings DESC";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $technicians = $stmt->fetchAll();
  } else {
    $technicians = 0;
  }

  // Close the database connection
  // $conn = null;

  return $technicians;
}

function getAllRankedLaundryTechnicians($conn){
  $sql = "SELECT * FROM technicians WHERE profession = 'Laundry' ORDER BY ratings DESC";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $technicians = $stmt->fetchAll();
  } else {
    $technicians = 0;
  }

  // Close the database connection
  // $conn = null;

  return $technicians;
}

function getAllRankedMoverTechnicians($conn){
  $sql = "SELECT * FROM technicians WHERE profession = 'Mover' ORDER BY ratings DESC";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $technicians = $stmt->fetchAll();
  } else {
    $technicians = 0;
  }

  // Close the database connection
  $conn = null;

  return $technicians;
}



?> 