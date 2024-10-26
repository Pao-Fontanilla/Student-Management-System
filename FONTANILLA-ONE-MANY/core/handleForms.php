<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertStudentBtn'])) {

	$query = insertStudent($pdo, $_POST['username'], $_POST['firstName'], 
		$_POST['lastName'], $_POST['dateOfBirth'], $_POST['section']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}


if (isset($_POST['editStudentBtn'])) {
	$query = updateStudent($pdo, $_POST['firstName'], $_POST['lastName'], 
		$_POST['dateOfBirth'], $_POST['section'], $_GET['student_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";;
	}

}




if (isset($_POST['deleteStudentBtn'])) {
	$query = deleteStudent($pdo, $_GET['student_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}




if (isset($_POST['insertNewSubjectBtn'])) {
	$query = insertSubject($pdo, $_POST['subjectName'], $_POST['instructor'], $_GET['student_id']);

	if ($query) {
		header("Location: ../viewsubjects.php?student_id=" .$_GET['student_id']);
	}
	else {
		echo "Insertion failed";
	}
}




if (isset($_POST['editSubjectBtn'])) {
	$query = updateSubject($pdo, $_POST['subjectName'], $_POST['instructor'], $_GET['student_id']);

	if ($query) {
		header("Location: ../viewsubjects.php?student_id=" .$_GET['student_id']);
	}
	else {
		echo "Update failed";
	}

}




if (isset($_POST['deleteSubjectBtn'])) {
	$query = deleteSubject($pdo, $_GET['subject_id']);

	if ($query) {
		header("Location: ../viewsubjects.php?student_id=" .$_GET['student_id']);
	}
	else {
		echo "Deletion failed";
	}
}




?>