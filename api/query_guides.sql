SELECT curr.subject_id, subj.description, stud_grade.final_grade
FROM curriculum curr, subject subj, student_grade stud_grade, student_portal_account stud_portal_acct, student_course stud_course, course cour
WHERE stud_course.student_id = stud_portal_acct.student_id AND cour.course_id = curr.course_id
AND cour.course_id = stud_course.course_id AND curr.subject_id = stud_grade.subject_id AND subj.subject_id = curr.subject_id
AND stud_grade.student_id = stud_portal_acct.student_id
AND stud_portal_acct.student_id = 'KU-15-0002' AND stud_course.student_id = 'BSCS'

--FOR CURRICULUM DASHBOARD OF STUDENT
SELECT curr.subject_id, subj.description, stud_grade.final_grade 
FROM student stud, curriculum curr, subject subj, student_grade stud_grade, student_portal_account stud_portal_acct
WHERE stud_grade.student_id = 'KU-15-0001'
AND curr.subject_id = subj.subject_id AND stud_grade.subject_id = curr.subject_id
AND stud_grade.student_id = stud_portal_acct.student_id
AND (SELECT CONCAT(stud.id_1, lpad(stud.id_2,4,'0')) AS student_id FROM `student` WHERE id_2 = stud.id_2) = stud_grade.student_id

SELECT curr.semester, curr.subject_id, subj.description, stud_grade.final_grade
FROM curriculum curr
INNER JOIN subject subj ON curr.subject_id = subj.subject_id
INNER JOIN student_grade stud_grade ON subj.subject_id = stud_grade.subject_id
INNER JOIN student_portal_account stud_portal ON stud_grade.student_id = stud_portal.student_id
WHERE stud_portal.student_id = ?
--END

SELECT CONCAT(student.id_1, lpad(student.id_2,4,'0')) AS student_id FROM `student` WHERE id_2 = 2

--FOR LOGIN:
SELECT first_name, last_name FROM `student`
WHERE (CONCAT(id1, lpad(id2,4,'0'))) = 'KU-15-0001';
--FOR LOGIN-- END

SELECT MAX(`student_id`) FROM `student`
WHERE SUBSTR(`id_1`, 4, 2) = SUBSTR(YEAR(CURDATE()), 3, 2);

$sql = SELECT MAX(`student_id`) as student_id FROM `student`
WHERE SUBSTR(`id_1`, 4, 2) = SUBSTR(YEAR(CURDATE()), 3, 2)

$result = mysqli_query($sql);

$numRow = mysqli_num_rows($result);

if($numRow <1) {
	$id = 1;
} else {
	$res = mysql_fetch_assoc($result);
	$id = $res['student_id'] + 1;
}

INSERT INTO `student`(`id1`, `id2`, `first_name`, `last_name`) VALUES (concat('KU-', SUBSTR(YEAR(CURDATE()),3,2),'-' )  ,?,?,?)



