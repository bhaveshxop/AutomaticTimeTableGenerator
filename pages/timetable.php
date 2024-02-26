<?php
include('../utils/dbcon.php');
$department_id = $_POST['department_id'];
$year = $_POST['year'];
$section = $_POST['section'];

$query = "SELECT * FROM timetable_view WHERE year = '$year' AND section = '$section' AND Department_ID = '$department_id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $timetable = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $timetable = [];
}

mysqli_close($conn);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Time Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-3">
        <div class="head">
            <h2> Time Table </h2>
        </div>

        <div class="table-responsive">
                <table class="table table-bordered text-center table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>9:00-10:00</th>
                            <th>10:00-11:00</th>
                            <th>11:00-12:00</th>
                            <th>12:00-13:00</th>
                            <th>13:00-14:00</th>
                            <th>14:00-15:00</th>
                            <th>15:00-16:00</th>
                            <th>16:00-17:00</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Monday</td>
                            <?php
                            foreach ($timetable as $period) {
                                if ($period['Day'] == "Monday") {
                                    if ($period['recess'] > "0") {
                                        // display a break
                                        echo "<td > Break </td>";
                                        continue;
                                    }
                                    $start = date('H:i', strtotime($period['Start_Time']));
                                    $end = date('H:i', strtotime($period['End_Time']));
                                    $colspan = (strtotime($end) - strtotime($start)) / 3600;
                                    // echo the subject code and short name of the staff
                                    echo "<td colspan='$colspan'>" . $period['Subject_Code'] . " - " . $period['Subject_Name'] . "<br>" . $period['Staff_Short_Name'] . " - " . $period['Staff_Name'] . "</td>";
                                }
                            }
                            ?>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <?php
                            foreach ($timetable as $period) {
                                if ($period['Day'] == "Tuesday") {
                                    if ($period['recess'] > "0") {
                                        // display a break
                                        echo "<td > Break </td>";
                                        continue;
                                    }
                                    $start = date('H:i', strtotime($period['Start_Time']));
                                    $end = date('H:i', strtotime($period['End_Time']));
                                    $colspan = (strtotime($end) - strtotime($start)) / 3600;
                                    echo "<td colspan='$colspan'>" . $period['Subject_Code'] . " - " . $period['Subject_Name'] . "<br>" . $period['Staff_Short_Name'] . " - " . $period['Staff_Name'] . "</td>";
                                }
                            }
                            ?>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <?php
                            foreach ($timetable as $period) {
                                if ($period['Day'] == "Wednesday") {
                                    if ($period['recess'] > "0") {
                                        // display a break
                                        echo "<td > Break </td>";
                                        continue;
                                    }
                                    $start = date('H:i', strtotime($period['Start_Time']));
                                    $end = date('H:i', strtotime($period['End_Time']));
                                    $colspan = (strtotime($end) - strtotime($start)) / 3600;
                                    // echo the subject code and short name of the staff
                                    echo "<td colspan='$colspan'>" . $period['Subject_Code'] . " - " . $period['Subject_Name'] . "<br>" . $period['Staff_Short_Name'] . " - " . $period['Staff_Name'] . "</td>";
                                }
                            }
                            ?>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <?php
                            foreach ($timetable as $period) {
                                if ($period['Day'] == "Thursday") {
                                    if ($period['recess'] > "0") {
                                        // display a break
                                        echo "<td > Break </td>";
                                        continue;
                                    }
                                    $start = date('H:i', strtotime($period['Start_Time']));
                                    $end = date('H:i', strtotime($period['End_Time']));
                                    $colspan = (strtotime($end) - strtotime($start)) / 3600;
                                    // echo the subject code and short name of the staff
                                    echo "<td colspan='$colspan'>" . $period['Subject_Code'] . " - " . $period['Subject_Name'] . "<br>" . $period['Staff_Short_Name'] . " - " . $period['Staff_Name'] . "</td>";
                                }
                            }
                            ?>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <?php
                            foreach ($timetable as $period) {
                                if ($period['Day'] == "Friday") {
                                    if ($period['recess'] > "0") {
                                        // display a break
                                        echo "<td > Break </td>";
                                        continue;
                                    }
                                    $start = date('H:i', strtotime($period['Start_Time']));
                                    $end = date('H:i', strtotime($period['End_Time']));
                                    $colspan = (strtotime($end) - strtotime($start)) / 3600;
                                    // echo the subject code and short name of the staff
                                    echo "<td colspan='$colspan'>" . $period['Subject_Code'] . " - " . $period['Subject_Name'] . "<br>" . $period['Staff_Short_Name'] . " - " . $period['Staff_Name'] . "</td>";
                                }
                            }
                            ?>
                        </tr>
                        <tr>
                            <td>Saturday</td>
                            <?php
                            foreach ($timetable as $period) {
                                if ($period['Day'] == "Saturday") {
                                    if ($period['recess'] > "0") {
                                        // display a break
                                        echo "<td > Break </td>";
                                        continue;
                                    }
                                    $start = date('H:i', strtotime($period['Start_Time']));
                                    $end = date('H:i', strtotime($period['End_Time']));
                                    $colspan = (strtotime($end) - strtotime($start)) / 3600;
                                    // echo the subject code and short name of the staff
                                    echo "<td colspan='$colspan'>" . $period['Subject_Code'] . " - " . $period['Subject_Name'] . "<br>" . $period['Staff_Short_Name'] . " - " . $period['Staff_Name'] . "</td>";
                                }
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
                <!-- Print button -->
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success" onclick="window.print()">Print</button>
                </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>