<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Welcome To Student Management System. Add new Students!</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">Username</label> 
			<input type="text" name="username">
		</p>
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName">
		</p>
		<p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="lastName">
		</p>
		<p>
			<label for="firstName">Date of Birth</label> 
			<input type="date" name="dateOfBirth">
		</p>
		<p>
			<label for="firstName">Section</label> 
			<input type="text" name="section">
		</p>
		<input type="submit" name="insertStudentBtn">
	</form>
	<?php $getAllStudents = getAllStudents($pdo); ?>
	<?php foreach ($getAllStudents as $row) { ?>
	<div class="container">
		<h3>Username: <?php echo $row['username']; ?></h3>
		<h3>FirstName: <?php echo $row['first_name']; ?></h3>
		<h3>LastName: <?php echo $row['last_name']; ?></h3>
		<h3>Date Of Birth: <?php echo $row['date_of_birth']; ?></h3>
		<h3>Section: <?php echo $row['section']; ?></h3>
		<h3>Date Added: <?php echo $row['date_added']; ?></h3>


		<div class="editAndDelete">
			<a href="viewsubjects.php?student_id=<?php echo $row['student_id']; ?>">View Subjects</a>
			<a href="editstudent.php?student_id=<?php echo $row['student_id']; ?>">Edit</a>
			<a href="deletestudent.php?student_id=<?php echo $row['student_id']; ?>">Delete</a>
		</div>


	</div> 
	<?php } ?>
</body>
</html>