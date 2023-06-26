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
            else {
                $sql1 = "INSERT INTO client_scheduleonly (name, student_id, typeofexam, date, typeoftime, timestamp, instructor)
                    VALUES ('$name', '$email', '$typesofExam', '$date', '$typeoftime', '$timestamp', '$instructor')";

                if ($conn->query($sql1) !== TRUE) {
                    echo "Error: " . $sql1 . "<br>" . $conn->error;
                }

                $delete = "DELETE FROM client_schedule WHERE typeofexam = 'Practical Exam'";
                if ($conn->query($delete) !== TRUE) {
                    echo "Error: " . $delete . "<br>" . $conn->error;
                }
                
                header('location:student_viewingP.php');
            }
        }
    } else {
        echo "Invalid input data.";
    }

    // Process payment information
    if (isset($_FILES['image'])) {
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            // File upload was successful
            $student_id = $_POST['student_id'];
            $name = $_POST['name'];
            $amount = $_POST['payment'];
            $image_proof = basename($_FILES['image']['name']); // Get the filename only

            // Specify the directory where you want to store the uploaded images
            $targetDirectory = "../payment_proof/";
            if (!is_dir($targetDirectory)) {
                mkdir($targetDirectory);
            }
            
            // Check if the target directory is writable
            if (!is_writable($targetDirectory)) {
                echo "Error: Target directory is not writable.";
                exit;
            }

            // Move the uploaded image to the target directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], "$targetDirectory/$image_proof")) {
                // Insert the data into the database
                $sql = "INSERT INTO schedule_proof_of_payment (student_id, name, amount, image_proof)
                        VALUES ('$student_id', '$name', '$amount', '$targetDirectory/$image_proof')";

                if ($conn->query($sql) === TRUE) {
                    // Data inserted successfully
                    echo "Payment information saved successfully!";
                } else {
                    // Error occurred while inserting data
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Failed to move uploaded file to target directory.";
            }
        } else {
            // File upload failed
            echo "File upload error: " . $_FILES['image']['error'];
        }
    } else {
        echo "No file was uploaded.";
    }

    $conn->close();
}
?>