<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="return"><a href="index.php">Return to home</a></div>
	<?php $getStudentByID = getStudentByID($pdo, $_GET['student_id']); ?>
	<h1>Username: <?php echo $getStudentByID['username']; ?>
	<h1>Add New Subject</h1>
	<form action="core/handleForms.php?student_id=<?php echo $_GET['student_id']; ?>" method="POST">
		<p>
			<label for="firstName">Subject Name</label> 
			<input type="text" name="subjectName">
		</p>
		<p>
			<label for="firstName">Instructor</label> 
			<input type="text" name="instructor">
		</p>
		<input type="submit" name="insertNewSubjectBtn">
	</form>

	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Subject ID</th>
	    <th>Subject Name</th>
	    <th>Instructor</th>
	    <th>Subject Owner</th>
	    <th>Date Added</th>
	    <th>Action</th>
	  </tr>
	  <?php $getSubjectsByStudent = getSubjectsByStudent($pdo, $_GET['student_id']); ?>
	  <?php foreach ($getSubjectsByStudent as $row) { ?>
	  <tr>
	  	<td><?php echo $row['subject_id']; ?></td>	  	
	  	<td><?php echo $row['subject_name']; ?></td>	  	
	  	<td><?php echo $row['instructor']; ?></td>	  	
	  	<td><?php echo $row['subject_owner']; ?></td>	  	
	  	<td><?php echo $row['date_added']; ?></td>
	  	<td>
	  		<a href="editsubject.php?subject_id=<?php echo $row['subject_id']; ?>&student_id=<?php 
                echo $_GET['student_id']; ?>">Edit</a>

	  		<a href="deletesubject.php?subject_id=<?php echo $row['subject_id']; ?>&student_id=<?php 
                echo $_GET['student_id']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>