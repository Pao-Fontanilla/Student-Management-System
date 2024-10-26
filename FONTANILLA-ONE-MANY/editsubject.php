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
	
	<h1>Edit the Subject!</h1>
	<?php $getProjectByID = getSubjectByID($pdo, $_GET['subject_id']); ?>
	<form action="core/handleForms.php?subject_id=<?php echo $_GET['subject_id']; ?>
	&student_id=<?php echo $_GET['student_id']; ?>" method="POST">
		<p>
			<label for="firstName">Subject Name</label> 
			<input type="text" name="subjectName" 
			value="<?php echo $getProjectByID['subject_name']; ?>">
		</p>
		<p>
			<label for="firstName">Instructor</label> 
			<input type="text" name="instructor" 
			value="<?php echo $getProjectByID['instructor']; ?>">
		</p>
		<input type="submit" name="editSubjectBtn" value="submit">
	</form>
	<div class="return"><a href="viewsubjects.php?student_id=<?php echo $_GET['student_id']; ?>">View The Subjects</a></div>
</body>
</html>