<?php 
  $conn = mysqli_connect('localhost:3307', 'root', '', 'tabletek');

  // torles
  if (isset($_GET['delete'])) {
  	$id = $_GET['id'];
  	$sql = "DELETE FROM tablet WHERE id=" . $id;
  	mysqli_query($conn, $sql);
  	exit();
	}
	//update
  if (isset($_POST['update'])) {
  	$id = $_POST['id'];
    $oprendszer = $_POST['oprendszer'];
    mysqli_query($conn, "SET NAMES 'utf8'");
  	$sql = "UPDATE tablet SET oprendszer={$oprendszer} WHERE id=".$id;
  	if (mysqli_query($conn, $sql)) {
  		$id = mysqli_insert_id($conn);
  	  echo $saved_comment;
  	}else {
  	  echo "Error: ". mysqli_error($conn);
  	}
  	exit();
  }

  // listazas
  mysqli_query($conn, "SET NAMES 'utf8'");
  $sql = "SELECT * FROM tablet";
  $result = mysqli_query($conn, $sql);
  $comments = '<div id="display_area">'; 
  while ($row = mysqli_fetch_array($result)) {
  	$comments .= '<div class="comment_box">
  		  <span class="delete" data-id="' . $row['id'] . '" >delete</span>
  		  <span class="edit" data-id="' . $row['id'] . '">oprendszer</span>
  		  <div class="display_name">'. $row['nev'] .'</div>
  		  <div class="comment_text">'. "Op: " . $row['oprendszer'] . " Magok: ". $row['magok']. ", Ár: " . $row['ar'] .'</div>
  	  </div>';
  }
  $comments .= '</div>';

?>