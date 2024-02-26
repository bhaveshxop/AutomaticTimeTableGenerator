<?php
include('../utils/dbcon.php');
/*
CREATE VIEW timetable_view AS
SELECT 
    tt.day AS Day,
    tt.start_time AS Start_Time,
    tt.end_time AS End_Time,
    d.id AS Department_ID,
    d.dept_name AS Department_Name,
    a.year AS Year,
    a.section AS Section,
    s.sub_id AS Subject_ID,
    s.scode AS Subject_Code,
    s.sname AS Subject_Name,
    st.short_name AS Staff_Short_Name,
    st.staff_name AS Staff_Name
FROM 
    time_table tt
    JOIN assigned a ON tt.period_id = a.period_id
    JOIN subjects s ON a.sub_id = s.sub_id
    JOIN staff st ON a.staff_short_name = st.short_name
    JOIN departments d ON a.dept_id = d.id
ORDER BY 
    FIELD(tt.day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'), tt.start_time;
*/

// get those values from post request 

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
// echo "<pre>";
// print_r($timetable);
// echo "</pre>";

/* Samle output
Array
(
    [0] => Array
        (
            [Day] => Monday
            [Start_Time] => 09:00:00
            [End_Time] => 10:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 8
            [Subject_Code] => FC0205
            [Subject_Name] => Programming in C
            [Staff_Short_Name] => ASP
            [Staff_Name] => Prof. Amey S. Pathe
        )

    [1] => Array
        (
            [Day] => Monday
            [Start_Time] => 10:00:00
            [End_Time] => 11:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 8
            [Subject_Code] => FC0205
            [Subject_Name] => Programming in C
            [Staff_Short_Name] => ASP
            [Staff_Name] => Prof. Amey S. Pathe
        )

    [2] => Array
        (
            [Day] => Monday
            [Start_Time] => 11:00:00
            [End_Time] => 12:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [3] => Array
        (
            [Day] => Monday
            [Start_Time] => 12:00:00
            [End_Time] => 13:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [4] => Array
        (
            [Day] => Monday
            [Start_Time] => 14:00:00
            [End_Time] => 15:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [5] => Array
        (
            [Day] => Tuesday
            [Start_Time] => 09:00:00
            [End_Time] => 10:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 8
            [Subject_Code] => FC0205
            [Subject_Name] => Programming in C
            [Staff_Short_Name] => ASP
            [Staff_Name] => Prof. Amey S. Pathe
        )

    [6] => Array
        (
            [Day] => Tuesday
            [Start_Time] => 10:00:00
            [End_Time] => 11:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [7] => Array
        (
            [Day] => Tuesday
            [Start_Time] => 11:00:00
            [End_Time] => 12:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [8] => Array
        (
            [Day] => Tuesday
            [Start_Time] => 12:00:00
            [End_Time] => 13:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [9] => Array
        (
            [Day] => Tuesday
            [Start_Time] => 14:00:00
            [End_Time] => 15:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [10] => Array
        (
            [Day] => Wednesday
            [Start_Time] => 09:00:00
            [End_Time] => 10:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [11] => Array
        (
            [Day] => Wednesday
            [Start_Time] => 10:00:00
            [End_Time] => 11:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [12] => Array
        (
            [Day] => Wednesday
            [Start_Time] => 11:00:00
            [End_Time] => 12:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [13] => Array
        (
            [Day] => Wednesday
            [Start_Time] => 12:00:00
            [End_Time] => 13:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [14] => Array
        (
            [Day] => Wednesday
            [Start_Time] => 14:00:00
            [End_Time] => 15:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [15] => Array
        (
            [Day] => Thursday
            [Start_Time] => 09:00:00
            [End_Time] => 10:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [16] => Array
        (
            [Day] => Thursday
            [Start_Time] => 10:00:00
            [End_Time] => 11:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [17] => Array
        (
            [Day] => Thursday
            [Start_Time] => 11:00:00
            [End_Time] => 12:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [18] => Array
        (
            [Day] => Thursday
            [Start_Time] => 12:00:00
            [End_Time] => 13:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [19] => Array
        (
            [Day] => Thursday
            [Start_Time] => 14:00:00
            [End_Time] => 15:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [20] => Array
        (
            [Day] => Friday
            [Start_Time] => 09:00:00
            [End_Time] => 10:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 8
            [Subject_Code] => FC0205
            [Subject_Name] => Programming in C
            [Staff_Short_Name] => ASP
            [Staff_Name] => Prof. Amey S. Pathe
        )

    [21] => Array
        (
            [Day] => Friday
            [Start_Time] => 10:00:00
            [End_Time] => 11:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [22] => Array
        (
            [Day] => Friday
            [Start_Time] => 11:00:00
            [End_Time] => 12:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [23] => Array
        (
            [Day] => Friday
            [Start_Time] => 12:00:00
            [End_Time] => 13:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [24] => Array
        (
            [Day] => Friday
            [Start_Time] => 14:00:00
            [End_Time] => 15:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [25] => Array
        (
            [Day] => Saturday
            [Start_Time] => 09:00:00
            [End_Time] => 10:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 8
            [Subject_Code] => FC0205
            [Subject_Name] => Programming in C
            [Staff_Short_Name] => ASP
            [Staff_Name] => Prof. Amey S. Pathe
        )

    [26] => Array
        (
            [Day] => Saturday
            [Start_Time] => 10:00:00
            [End_Time] => 11:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 8
            [Subject_Code] => FC0205
            [Subject_Name] => Programming in C
            [Staff_Short_Name] => ASP
            [Staff_Name] => Prof. Amey S. Pathe
        )

    [27] => Array
        (
            [Day] => Saturday
            [Start_Time] => 11:00:00
            [End_Time] => 12:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [28] => Array
        (
            [Day] => Saturday
            [Start_Time] => 12:00:00
            [End_Time] => 13:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

    [29] => Array
        (
            [Day] => Saturday
            [Start_Time] => 14:00:00
            [End_Time] => 15:00:00
            [Department_ID] => 8
            [Department_Name] => Computer Engineering
            [Year] => 1
            [Section] => 1
            [Subject_ID] => 17
            [Subject_Code] => FC6565
            [Subject_Name] => Microprocessor
            [Staff_Short_Name] => HSB
            [Staff_Name] => Prof. Heramb Bhoodhar
        )

)
*/

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

    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered text-center table-hover">
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
                  // check how much hour is there in the period and set the colspan
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
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>