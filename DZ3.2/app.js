var express = require('express');
var app = express();
var bodyParser = require('body-parser');
var mysql = require('mysql');
var cors = require('cors')
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
	extended: true
}));
app.use(cors(
	{
		origin: '*'
	}
))
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

// ==================================================== EMPLOYEE ROUTES ====================================================

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
			return res.send({ error: false, data: results[0], message: 'Single employee list.' });
		});
});
//Search employees
app.get('/search/employees', function (req, res) {
	let search = req.query.search

	dbConn.query(
		`SELECT * FROM employees WHERE LOWER(first_name) LIKE LOWER(?) OR LOWER(last_name) LIKE LOWER(?)`,
		['%' + search + '%', '%' + search + '%'],
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results, message: 'Searched employee list.' });
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



// ==================================================== DEPARTMENT ROUTES ====================================================

// Retrieve all departments 
app.get('/departments', function (req, res) {
	dbConn.query('SELECT * FROM departments',
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results, message: 'All departments list.' });
		});
});
// Retrieve department with department_id 
app.get('/department/:id', function (req, res) {
	let department_id = req.params.id;
	if (!department_id) {
		return res.status(400).send({ error: true, message: 'Please provide department_id' });
	}
	dbConn.query(
		`SELECT * FROM departments WHERE department_id = ?`,
		department_id,
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results[0], message: 'Single department list.' });
		});
});
//Search departments
app.get('/search/departments', function (req, res) {
	let search = req.query.search

	dbConn.query(
		`SELECT * FROM departments WHERE LOWER(department_name) LIKE LOWER(?)`,
		['%' + search + '%'],
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results, message: 'Searched department list.' });
		});
});
// Add a new department  
app.post('/department', function (req, res) {
	let department = req.body.department;
	let department_id = department.department_id;
	let department_name = department.department_name;
	let manager_id = department.manager_id;
	let location_id = department.location_id;

	if (!department) {
		return res.status(400).send({ error: true, message: 'Please provide department' });
	}
	dbConn.query(
		`INSERT INTO departments 
		(department_id, department_name, manager_id, location_id)
		VALUES(?, ?, ?, ?)`,
		[department_id, department_name, manager_id, location_id],
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results, message: 'New Department has been created successfully.' });
		});
});
//  Update department with department_id in body
app.put('/department', function (req, res) {
	console.log('body :', req.body.department);
	let department = req.body.department;
	let department_id = department.department_id;
	let department_name = department.department_name;
	let manager_id = department.manager_id;
	let location_id = department.location_id;

	if (department_id == null || department == null) {
		return res.status(400).send({ error: department, message: 'Please provide department and department_id' });
	}
	dbConn.query(
		`UPDATE departments 
		SET department_name = ?, 
		manager_id = ?, 
		location_id = ?
		WHERE department_id = ?`,
		[department_name, manager_id, location_id, department_id],
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results, message: 'Department has been updated successfully.' });
		});
});
//  Update department with department_id in params
app.put('/department/:id', function (req, res) {
	let department_id = req.params.id;
	if (department_id == null) {
		return res.status(400).send({ error: department, message: 'Please provide department_id in url' });
	}

	console.log('body :', req.body.department);
	let department = req.body.department;
	let department_name = department.department_name;
	let manager_id = department.manager_id;
	let location_id = department.location_id;

	if (department == null) {
		return res.status(400).send({ error: department, message: 'Please provide department' });
	}
	dbConn.query(
		`UPDATE departments 
		SET department_name = ?, 
		manager_id = ?, 
		location_id = ?
		WHERE department_id = ?`,
		[department_name, manager_id, location_id, department_id],
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results, message: 'Department has been updated successfully.' });
		});
});
//  Delete department
app.delete('/department/:id', function (req, res) {
	let department_id = req.params.id;
	if (department_id == null) {
		return res.status(400).send({ error: true, message: 'Please provide department_id' });
	}
	dbConn.query(
		`DELETE FROM departments WHERE department_id = ?`,
		[department_id],
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results, message: 'Department  has been deleted successfully.' });
		});
});



// ==================================================== JOB ROUTES ====================================================

// Retrieve all jobs 
app.get('/jobs', function (req, res) {
	dbConn.query('SELECT * FROM jobs',
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results, message: 'All jobs list.' });
		});
});
// Retrieve job with job_id 
app.get('/job/:id', function (req, res) {
	let job_id = req.params.id;
	if (!job_id) {
		return res.status(400).send({ error: true, message: 'Please provide job_id' });
	}
	dbConn.query(
		`SELECT * FROM jobs WHERE job_id = ?`,
		job_id,
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results[0], message: 'Single job list.' });
		});
});
//Search jobs
app.get('/search/jobs', function (req, res) {
	let search = req.query.search

	dbConn.query(
		`SELECT * FROM jobs WHERE LOWER(job_title) LIKE LOWER(?)`,
		['%' + search + '%'],
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results, message: 'Searched job list.' });
		});
});
// Add a new job  
app.post('/job', function (req, res) {
	let job = req.body.job;
	let job_id = job.job_id;
	let job_title = job.job_title;
	let min_salary = job.min_salary;
	let max_salary = job.max_salary;

	if (!job) {
		return res.status(400).send({ error: true, message: 'Please provide job' });
	}
	dbConn.query(
		`INSERT INTO jobs 
		(job_id, job_title, min_salary, max_salary)
		VALUES(?, ?, ?, ?)`,
		[job_id, job_title, min_salary, max_salary],
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results, message: 'New Job has been created successfully.' });
		});
});
//  Update job with job_id in body
app.put('/job', function (req, res) {
	console.log('body :', req.body.job);
	let job = req.body.job;
	let job_id = job.job_id;
	let job_title = job.job_title;
	let min_salary = job.min_salary;
	let max_salary = job.max_salary;

	if (job_id == null || job == null) {
		return res.status(400).send({ error: job, message: 'Please provide job and job_id' });
	}
	dbConn.query(
		`UPDATE jobs 
		SET job_title = ?, 
		min_salary = ?, 
		max_salary = ?
		WHERE job_id = ?`,
		[job_title, min_salary, max_salary, job_id],
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results, message: 'Job has been updated successfully.' });
		});
});
//  Update job with job_id in params
app.put('/job/:id', function (req, res) {
	let job_id = req.params.id;
	if (job_id == null) {
		return res.status(400).send({ error: job, message: 'Please provide job_id in url' });
	}

	console.log('body :', req.body.job);
	let job = req.body.job;
	let job_title = job.job_title;
	let min_salary = job.min_salary;
	let max_salary = job.max_salary;

	if (job == null) {
		return res.status(400).send({ error: job, message: 'Please provide job' });
	}
	dbConn.query(
		`UPDATE jobs 
		SET job_title = ?, 
		min_salary = ?, 
		max_salary = ?
		WHERE job_id = ?`,
		[job_title, min_salary, max_salary, job_id],
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results, message: 'Job has been updated successfully.' });
		});
});
//  Delete job
app.delete('/job/:id', function (req, res) {
	let job_id = req.params.id;
	if (job_id == null) {
		return res.status(400).send({ error: true, message: 'Please provide job_id' });
	}
	dbConn.query(
		`DELETE FROM jobs WHERE job_id = ?`,
		[job_id],
		function (error, results, fields) {
			if (error) throw error;
			return res.send({ error: false, data: results, message: 'Job  has been deleted successfully.' });
		});
});


// set port
app.listen(3001, function () {
	console.log('Node MySQL REST API app is running on port 3001');
});
module.exports = app;