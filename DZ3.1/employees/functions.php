<?php

function get_employees($id = NULL)
{
	global $connection;
	$query = "SELECT * FROM employees";
	if(!is_null($id))
	{
		$query .= " WHERE employee_id=".$id." LIMIT 1";
	}
	$response = array();
	$result = mysqli_query($connection, $query);
		while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response);
}

function insert_employee()
	{
		global $connection;

		$data = json_decode(file_get_contents('php://input'), true);
		$employee_first_name = $data["first_name"];
		$employee_last_name	= $data["last_name"];
		$employee_email = $data["email"];
		$employee_phone_number = $data["phone_number"];
		$employee_hire_date = $data["hire_date"];
		$employee_job_id = $data["job_id"];
		$employee_salary = $data["salary"];
		$employee_commission_pct = $data["commission_pct"];
		$employee_manager_id = $data["manager_id"];
		$employee_department_id = $data["department_id"];
		
		$query = "INSERT INTO employees (first_name, last_name, email, phone_number, hire_date, job_id, salary, commission_pct, manager_id, department_id) VALUES ('".$employee_first_name."','".$employee_last_name."','".$employee_email."','".$employee_phone_number."','".$employee_hire_date."','".$employee_job_id."','".$employee_salary."','".$employee_commission_pct."','".$employee_manager_id."','".$employee_department_id."')";
		
		
		if(mysqli_query($connection, $query))
		{
			$broj_redaka = mysqli_affected_rows($connection);
			
			if ($broj_redaka > 0){
				$response=array(
				'status' => 1,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' => 'Employee Added Successfully.'
				);
				
			}
			else {
				$response = array(
				'status' => 0,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' => 'Employee Insert Error.'
				);
				
			}
			
		}
		else
		{

			$response = array(
				'status' => 0,
				'query' => $query,
				'status_message' => 'Employee Addition Error.',
				'sql_error' => mysqli_error($connection)
				
			);
		}

		header('Content-Type: application/json');
		echo json_encode($response);
	}
function update_employee($id)
	{
		global $connection;
		$data = json_decode(file_get_contents("php://input"), true);
		$employee_first_name = $data["first_name"];
		$employee_last_name	= $data["last_name"];
		$employee_email = $data["email"];
		$employee_phone_number = $data["phone_number"];
		$employee_hire_date = $data["hire_date"];
		$employee_job_id = $data["job_id"];
		$employee_salary = $data["salary"];
		$employee_commission_pct = $data["commission_pct"];
		$employee_manager_id = $data["manager_id"];
		$employee_department_id = $data["department_id"];
		//$employee_age=$data["employee_age"];
		
		$query = "UPDATE employees SET first_name='".$employee_first_name."', last_name='".$employee_last_name."', email='".$employee_email."', phone_number='".$employee_phone_number."', hire_date='".$employee_hire_date."', job_id='".$employee_job_id."', salary='".$employee_salary."', commission_pct='".$employee_commission_pct."', manager_id='".$employee_manager_id."', department_id='".$employee_department_id."' WHERE employee_id=".$id;
		
		$result = mysqli_query($connection, $query);
		$broj_redaka = mysqli_affected_rows($connection);
		
		if($result)
		{
			$response = array(
				'status' => 1,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Employee Updated Successfully.'
			);
		}
		else
		{
			$response = array(
				'status' => 0,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' => 'Employee Updation Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}

function delete_employee($id)
{
	global $connection;
	$query = "DELETE FROM employees WHERE employee_id=".$id;
	if($result = mysqli_query($connection, $query))
	{
		$broj_redaka = mysqli_affected_rows($connection);
		//echo $broj_redaka;
		if ($broj_redaka === 1) {
			$response = array(
			'status' => 1,
			'broj_redaka' => $broj_redaka,
			'status_message' => 'Employee Deleted Successfully.'
		);
		}
		else {
			$response = array(
			'status' => 0, //some internal error status
			'broj_redaka' => $broj_redaka,
			'status_message' => 'Employee Deletion Error'
		);
			
		}

	}
	else
	{
		$response = array(
			'status' => 0,
			'status_message' => 'Employee Deletion Failed.'
		);
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}


?>
