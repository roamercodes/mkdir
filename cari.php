<?php
  require_once('koneksi.php');
  // if($_SERVER['REQUEST_METHOD']=='POST') {
  $response = array();
  $nim = $_POST['nim'];

  $result = mysqli_query($db, "SELECT * FROM dt_mhs where nim='$nim'") or die(mysqli_error());

  if (mysqli_num_rows($result) > 0){
    $response["Hasil"] = array();
    while($row = mysqli_fetch_array($result)){
      $hasil = array();
      $hasil["nama"] = $row["nama"];
      $hasil["alamat"] = $row["alamat"];
      $hasil["no_hp"] = $row["no_hp"];
      $hasil["email"] = $row["email"];
      array_push($response["Hasil"],$hasil);
      $response["success"] = 1;
    }
    echo json_encode($response);
  
  }else{
    $response["success"] = 0;
    $response["message"] = "Hasil Tidak Di Ditemukan";
    echo json_encode($response);
  }
   mysqli_close($db);
  // } else {
  //   $response["success"] = 0;
  //   $response["message"] = "Error";
  //   echo json_encode($response);
  // }
?>
