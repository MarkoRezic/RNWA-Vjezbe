<?php 
$conn = mysqli_connect("localhost", "root", "", "hr") or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if(isset($_GET['employee_id'])) {	
	$employee_id = $_GET['employee_id']; 
	$sql_query = "select * from employees where employee_id = $employee_id";
	$response = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));	
	$rows = array();
	while($r = mysqli_fetch_assoc($response)) {
    $rows[] = $r;
	}
	print json_encode($rows);	
}
?>	
