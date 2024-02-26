<?php
// Include the database connection file
include('../utils/dbcon.php');

// ittrate through the assigned table in the database 
// query to fetch the assigned table from the database
$query = "SELECT * FROM assigned";

// execute the query
$result = mysqli_query($conn, $query);
$collage_start_time = "09:00:00";
$collage_end_time = "17:00:00";
$recess_start_time = "13:00:00";
$recessDuration = 1; // in hours

// clear the time table
$query = "TRUNCATE TABLE time_table";

if ($conn->query($query) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

// check if the query was executed successfully
if ($result) {
    // fetch the result as an associative array
    $assigned = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $currentDay = "Monday";
    $currentTime = $collage_start_time;

    foreach ($assigned as $assign) {
        $period_id = $assign['period_id'];
        $dept_id = $assign['dept_id'];
        $year = $assign['year'];
        $section = $assign['section'];
        $sub_id = $assign['sub_id'];
        $staff_short_name = $assign['staff_short_name'];
        $duration = $assign['duration'];
        $total_in_week = $assign['total_in_week'];

        while ($total_in_week > 0) {
            $total_in_week--;

            $query = "SELECT * FROM timetable_view WHERE day = '$currentDay' AND year = '$year' AND section = '$section' AND Department_ID = '$dept_id'";

            // get the last period end time
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                // go to the last row
                $lastPeriodEndTime = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $lastPeriodEndTime = end($lastPeriodEndTime);
                $lastPeriodEndTime = $lastPeriodEndTime['End_Time'];
                echo $lastPeriodEndTime . "<br> <br>";
            } else {
                $lastPeriodEndTime = $collage_start_time;
            }

            // check if the last period end time is greater than the current time
            if ($lastPeriodEndTime > $currentTime) {
                $currentTime = $lastPeriodEndTime;
            }

            // check if the current time is greater than the recess start time
            if ($currentTime >= $recess_start_time) {
                $currentTime = date('H:i:s', strtotime($currentTime) + $recessDuration * 60 * 60);
            }

            $temp = date('H:i:s', strtotime($currentTime) + $duration * 60 * 60);

            if ($temp < $collage_end_time) {

                $query = "INSERT INTO time_table ( day, period_id, start_time, end_time) VALUES ('$currentDay', '$period_id', '$currentTime', '$temp')";
                $result = mysqli_query($conn, $query);

                $currentTime = $temp;

                if ($result) {
                    echo "Data inserted successfully";
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }                
            }

            if ($currentDay == "Monday") {
                $currentDay = "Tuesday";
                $currentTime = $collage_start_time;
            } else if ($currentDay == "Tuesday") {
                $currentDay = "Wednesday";
                $currentTime = $collage_start_time;
            } else if ($currentDay == "Wednesday") {
                $currentDay = "Thursday";
                $currentTime = $collage_start_time;
            } else if ($currentDay == "Thursday") {
                $currentDay = "Friday";
                $currentTime = $collage_start_time;
            } else if ($currentDay == "Friday") {
                $currentDay = "Saturday";
                $currentTime = $collage_start_time;
            } else if ($currentDay == "Saturday") {
                $currentDay = "Monday";
                $currentTime = $collage_start_time;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="../Images/logo.webp" type="image/x-icon">
</head>

<body>
    <?php foreach ($assigned as $assign) : ?>
        <p><?php echo $assign['period_id'] ?></p>
        <p><?php echo $assign['dept_id'] ?></p>
        <p><?php echo $assign['year'] ?></p>
        <p><?php echo $assign['section'] ?></p>
        <p><?php echo $assign['sub_id'] ?></p>
        <p><?php echo $assign['staff_short_name'] ?></p>
        <p><?php echo $assign['duration'] ?></p>
        <p><?php echo $assign['total_in_week'] ?></p>
    <?php endforeach; ?>

</body>

</html>