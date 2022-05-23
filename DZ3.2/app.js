var express = require('express');
var app = express();
var bodyParser = require('body-parser');
var mysql = require('mysql');
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
	extended: true
}));
// default route
app.get('/', function (req, res) {
	return res.send({ error: true, message: 'hello' })
});
// connection configurations
var dbConn = mysql.createConnection({
	host: 'localhost',
	user: 'root',
	password: '',
	database: 'hr'
});
// connect to database
dbConn.connect();
// Retrieve all employees 
app.get('/employees', function (req, res) {
	dbConn.query('SELECT * FROM employees',
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results, message: 'All employees list.' });
		});
});
// Retrieve employee with employee_id 
app.get('/employee/:id', function (req, res) {
	let employee_id = req.params.id;
	if (!employee_id) {
		return res.status(400).send({ error: true, message: 'Please provide employee_id' });
	}
	dbConn.query(
		`SELECT * FROM employees WHERE employee_id = ?`,
		employee_id,
		function (error, results, fields) {
			if (error) throw error;
			//return res.send({ error: false, data: results[0], message: 'Single employee list error.' });
			return res.send({ error: false, data: results[0], message: 'Single employee list.' });
		});
});
// Add a new employee  
app.post('/employee', function (req, res) {
	let employee = req.body.employee;
	let first_name = employee.first_name;
	let last_name = employee.last_name;
	let email = employee.email;
	let phone_number = employee.phone_number;
	let hire_date = employee.hire_date;
	let job_id = employee.job_id;
	let salary = employee.salary;
	let commission_pct = employee.commission_pct;
	let manager_id = employee.manager_id;
	let department_id = employee.department_id;

	if (!employee) {
		return res.status(400).send({ error: true, message: 'Please provide employee' });
	}
	dbConn.query(
		`INSERT INTO employees 
		(first_name, last_name, email, phone_number, hire_date, job_id, salary, commission_pct, manager_id, department_id)
		VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`,
		[first_name, last_name, email, phone_number, hire_date, job_id, salary, commission_pct, manager_id, department_id],
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results, message: 'New Employee has been created successfully.' });
		});
});
//  Update employee with employee_id in body
app.put('/employee', function (req, res) {
	console.log('body :', req.body.employee);
	let employee = req.body.employee;
	let employee_id = employee.employee_id;
	let first_name = employee.first_name;
	let last_name = employee.last_name;
	let email = employee.email;
	let phone_number = employee.phone_number;
	let hire_date = employee.hire_date;
	let job_id = employee.job_id;
	let salary = employee.salary;
	let commission_pct = employee.commission_pct;
	let manager_id = employee.manager_id;
	let department_id = employee.department_id;

	//!variabla vraca true i za vrijednost 0, pa je zamijenjeno sa variabla == null (koje provjeri jeli null ili undefined)
	if (employee_id == null || employee == null) {
		return res.status(400).send({ error: employee, message: 'Please provide employee and employee_id' });
	}
	dbConn.query(
		`UPDATE employees 
		SET first_name = ?, 
		last_name = ?, 
		email = ?, 
		phone_number = ?, 
		hire_date = ?, 
		job_id = ?, 
		salary = ?, 
		commission_pct = ?, 
		manager_id = ?, 
		department_id = ? 
		WHERE employee_id = ?`,
		[first_name, last_name, email, phone_number, hire_date, job_id, salary, commission_pct, manager_id, department_id, employee_id],
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results, message: 'Employee has been updated successfully.' });
		});
});
//  Update employee with employee_id in params
app.put('/employee/:id', function (req, res) {
	let employee_id = req.params.id;
	if (employee_id == null) {
		return res.status(400).send({ error: employee, message: 'Please provide employee_id in url' });
	}

	console.log('body :', req.body.employee);
	let employee = req.body.employee;
	let first_name = employee.first_name;
	let last_name = employee.last_name;
	let email = employee.email;
	let phone_number = employee.phone_number;
	let hire_date = employee.hire_date;
	let job_id = employee.job_id;
	let salary = employee.salary;
	let commission_pct = employee.commission_pct;
	let manager_id = employee.manager_id;
	let department_id = employee.department_id;

	if (employee == null) {
		return res.status(400).send({ error: employee, message: 'Please provide employee' });
	}
	dbConn.query(
		`UPDATE employees 
		SET first_name = ?, 
		last_name = ?, 
		email = ?, 
		phone_number = ?, 
		hire_date = ?, 
		job_id = ?, 
		salary = ?, 
		commission_pct = ?, 
		manager_id = ?, 
		department_id = ? 
		WHERE employee_id = ?`,
		[first_name, last_name, email, phone_number, hire_date, job_id, salary, commission_pct, manager_id, department_id, employee_id],
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results, message: 'Employee has been updated successfully.' });
		});
});
//  Delete employee
app.delete('/employee/:id', function (req, res) {
	let employee_id = req.params.id;
	if (employee_id == null) {
		return res.status(400).send({ error: true, message: 'Please provide employee_id' });
	}
	dbConn.query(
		`DELETE FROM employees WHERE employee_id = ?`,
		[employee_id],
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results, message: 'Employee  has been deleted successfully.' });
		});
});
// set port
app.listen(3001, function () {
	console.log('Node MySQL REST API app is running on port 3001');
});
module.exports = app;