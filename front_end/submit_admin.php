<?php 
include "connection.php";

if (isset($_POST['submit'])) {
    $names = $_POST['fullname'];
    $emails = $_POST['email'];
    $dates = $_POST['date'];
    $typesofExams = $_POST['typeofexam'];
    $timestamps = $_POST['timestamp'];
    $typeoftimes = $_POST['typeoftime'];
    $instructors = $_POST['instructor'];

    // Check if variables are arrays and have a countable length
    if (
        is_array($names) && is_array($emails) && is_array($typesofExams) &&
        is_array($timestamps) && is_array($typeoftimes) && is_array($instructors) &&
        count($names) === count($emails) &&
        count($names) === count($typesofExams) &&
        count($names) === count($timestamps) &&
        count($names) === count($typeoftimes) &&
        count($names) === count($instructors)
    ) {
        $count = count($names);

        for ($i = 0; $i < $count; $i++) {
            $name = $names[$i];
            $email = $emails[$i];
            $typesofExam = $typesofExams[$i];
            $typeoftime = $typeoftimes[$i];
            $instructor = $instructors[$i];

            // Handle single "Dates" value
            $date = is_array($dates) ? $dates[$i] : $dates;

            // Handle single "Timestamps" value
            $timestamp = is_array($timestamps) ? $timestamps[$i] : $timestamps[$i];

            $sql = "INSERT INTO admin_schedule (name, student_id, exam, date, typeoftime, timestamp, instructor, open)
                    VALUES ('$name', '$email', '$typesofExam', '$date', '$typeoftime', '$timestamp', '$instructor', '1')";

            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            else{
                $sql1 = "INSERT INTO client_scheduleonly (name, student_id, typeofexam, date, typeoftime, timestamp, instructor)
                    VALUES ('$name', '$email', '$typesofExam', '$date', '$typeoftime', '$timestamp', '$instructor')";

                $conn->query($sql1);

                $delete = "DELETE FROM client_schedule WHERE typeofexam = 'Theoretical Exam'";
                $conn->query($delete);
                header('location:student_viewing.php');
            }
        }

        $conn->close();
    } else {
        echo "Invalid input data.";
    }
}


?>