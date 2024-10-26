<?php  

function insertStudent($pdo, $username, $first_name, $last_name, 
	$date_of_birth, $section) {

	$sql = "INSERT INTO students (username, first_name, last_name, 
		date_of_birth, section) VALUES(?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$username, $first_name, $last_name, 
		$date_of_birth, $section]);

	if ($executeQuery) {
		return true;
	}
}



function updateStudent($pdo, $first_name, $last_name, 
	$date_of_birth, $section, $student_id) {

	$sql = "UPDATE students
				SET first_name = ?,
					last_name = ?,
					date_of_birth = ?, 
					section = ?
				WHERE student_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, 
		$date_of_birth, $section, $student_id]);
	
	if ($executeQuery) {
		return true;
	}

}


function deleteStudent($pdo, $student_id) {
	$deleteStudentSubj = "DELETE FROM subjects WHERE student_id = ?";
	$deleteStmt = $pdo->prepare($deleteStudentSubj);
	$executeDeleteQuery = $deleteStmt->execute([$student_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM students WHERE student_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$student_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}




function getAllStudents($pdo) {
	$sql = "SELECT * FROM students";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getStudentByID($pdo, $student_id) {
	$sql = "SELECT * FROM students WHERE student_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$student_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}





function getSubjectsByStudent($pdo, $student_id) {
	
	$sql = "SELECT 
				subjects.subject_id AS subject_id,
				subjects.subject_name AS subject_name,
				subjects.instructor AS instructor,
				subjects.date_added AS date_added,
				CONCAT(students.first_name,' ',students.last_name) AS subject_owner
			FROM subjects
			JOIN students ON subjects.student_id = students.student_id
			WHERE subjects.student_id = ? 
			GROUP BY subjects.subject_name;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$student_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}


function insertSubject($pdo, $subject_name, $instructor, $student_id) {
	$sql = "INSERT INTO subjects (subject_name, instructor, student_id) VALUES (?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$subject_name, $instructor, $student_id]);
	if ($executeQuery) {
		return true;
	}

}

function getSubjectByID($pdo, $subject_id) {
	$sql = "SELECT 
				subjects.subject_id AS subject_id,
				subjects.subject_name AS subject_name,
				subjects.instructor AS instructor,
				subjects.date_added AS date_added,
				CONCAT(students.first_name,' ',students.last_name) AS subject_owner
			FROM subjects
			JOIN students ON subjects.student_id = students.student_id
			WHERE subjects.subject_id  = ? 
			GROUP BY subjects.subject_name";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$subject_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateSubject($pdo, $subject_name, $instructor, $subject_id) {
	$sql = "UPDATE subjects
			SET subject_name = ?,
				instructor = ?
			WHERE subject_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$subject_name, $instructor, $subject_id]);

	if ($executeQuery) {
		return true;
	}
}

function deleteSubject($pdo, $subject_id) {
	$sql = "DELETE FROM subjects WHERE subject_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$subject_id]);
	if ($executeQuery) {
		return true;
	}
}




?>