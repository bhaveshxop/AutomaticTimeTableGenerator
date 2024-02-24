<?php
// Include the database connection file
include('../utils/dbcon.php');

// Fetch departments from the database
$departments = $conn->query("SELECT * FROM departments");

// Fetch data from the assigned table
$assignedResult = $conn->query("SELECT a.*, s.scode, s.sname, s.stype FROM assigned a
                                JOIN subjects s ON a.sub_id = s.sub_id");

// Fetch years for the selected department
function getYears($dept_id)
{
    global $conn;
    $yearsResult = $conn->query("SELECT year FROM departments WHERE id = $dept_id");
    if ($yearsResult && $yearsResult->num_rows > 0) {
        $row = $yearsResult->fetch_assoc();
        return $row['year'];
    }
    return 0;
}

function getSections($dept_id)
{
    global $conn;
    $sectionsResult = $conn->query("SELECT sections FROM departments WHERE id = $dept_id");
    if ($sectionsResult && $sectionsResult->num_rows > 0) {
        $row = $sectionsResult->fetch_assoc();
        return $row['sections'];
    }
    return 0;
}

if (isset($_POST['save'])) {
    $subject = $_POST['subject'];
    $staff = $_POST['staff'];
    $totalPeriods = $_POST['totalPeriods'];
    $duration = $_POST['duration'];
    $dept = $_POST['dept_hidden'];
    $year = $_POST['year_hidden'];
    $section = $_POST['section_hidden'];
    echo "Subject: $subject, Staff: $staff, Total Periods: $totalPeriods, Duration: $duration, Department: $dept, Year: $year, Section: $section<br>";
    $query = "INSERT INTO assigned(dept_id, year, section, sub_id, staff_short_name, duration,total_in_week) VALUES ('$dept', '$year', '$section', '$subject', '$staff', '$duration', '$totalPeriods')";
    $conn->query($query);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();

    echo "<script> alert('Data saved successfully!'); </script>";
    
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">

    <title>Class Information</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../">
                <img src="../Images/logo.webp" width="34" height="36">
                TimeTable</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./department.php">Departments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./staff.php">Staff</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./subjects.php">Subjects</a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>

    <div class="container mt-3">
        <div class="head">
            <h2>Class Information</h2>
        </div>
        <div class="content mt-4">
            <div class="d-flex justify-content-between mb-3">
                <div class="d-flex  ">
                    <div class="sel-dept">
                        <select class="form-select form-select-sm" aria-label="Default select example" id="dept" onchange="departmentChange()" name="dept">
                            <option selected>Select department</option>
                            <?php
                            if ($departments->num_rows > 0) {
                                while ($row = $departments->fetch_assoc()) {
                                    echo "<option value=" . $row['id'] . ">" . $row['dept_name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="sel-sem ms-3">
                        <select class="form-select form-select-sm" aria-label="Default select example" id="year" name="year"
                        onChange="document.getElementsByName('dept_hidden')[0].value = document.getElementById('dept').value;
                        document.getElementsByName('year_hidden')[0].value = document.getElementById('year').value;"
                        >
                            <option selected>Select year</option>
                        </select>
                    </div>

                    <div class="sel-sec ms-3">
                        <select class="form-select form-select-sm" aria-label="Default select example" id="section" name="section" onChange="document.getElementsByName('section_hidden')[0].value = document.getElementById('section').value;"
                        >
                            <option selected>Select section</option>
                        </select>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#assignModal">Assign</button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered text-center table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">Subject code</th>
                            <th scope="col">Type</th>
                            <th scope="col">Staff name</th>
                            <th scope="col">Total in week</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Display rows from the assigned table
                        while ($row = $assignedResult->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['sname'] . "</td>";
                            echo "<td>" . $row['scode'] . "</td>";
                            echo "<td>" . $row['stype'] . "</td>";
                            echo "<td>" . $row['staff_short_name'] . "</td>";
                            echo "<td>" . $row['total_in_week'] . "</td>";
                            echo "<td>" . $row['duration'] . "</td>";
                            echo "<td><a href='#' class='btn btn-danger'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="assignModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="assignModalLabel"> Assign Class Periods </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Select subject -->
                    <div class="mb-3">
                        <select class="form-select" id="subject" name="subject">
                            <option selected>Select Subject</option>
                            <?php
                            $subjects = $conn->query("SELECT sub_id, scode, sname, stype FROM subjects");
                            if ($subjects->num_rows > 0) {
                                while ($row = $subjects->fetch_assoc()) {
                                    echo "<option value='" . $row['sub_id'] . "'>" . $row['scode'] . " - " . $row['sname'] . " (" . $row['stype'] . ")</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Select staff -->
                    <div class="mb-3">
                        <select class="form-select" id="staff" name="staff">
                            <option selected>Select Staff</option>
                            <?php
                            $staff = $conn->query("SELECT staff_name, short_name FROM staff");
                            if ($staff->num_rows > 0) {
                                while ($row = $staff->fetch_assoc()) {
                                    echo "<option value='" . $row['short_name'] . "'>" . $row['staff_name'] . " (" . $row['short_name'] . ")</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Enter total periods in the week -->
                    <div class="mb-3">
                        <input type="number" class="form-control" id="totalPeriods" name="totalPeriods" placeholder="Total periods in the week" required>
                    </div>

                    <!-- Enter duration -->
                    <div class="mb-3">
                        <input type="number" class="form-control" id="duration" name="duration" placeholder="Duration in hours" required>
                    </div>
                </div>

                <input type="hidden" name="dept_hidden" name="dept_hidden" value="">
                <input type="hidden" name="year_hidden" name="year_hidden" value="">
                <input type="hidden" name="section_hidden" name="section_hidden" value="">  
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="save" name="save" onclick="saveData()">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

<script>
    // When the department dropdown changes
    function departmentChange() {
        // Get the selected department ID
        var deptId = document.getElementById('dept').value;

        // Get the select element for years and sections
        var yearSelect = document.getElementById('year');
        var sectionSelect = document.getElementById('section');

       

        // Remove existing options
        yearSelect.options.length = 0;
        sectionSelect.options.length = 0;

        // Fetch years for the selected department using PHP
        <?php
        if ($departments->num_rows > 0) {
            $departments->data_seek(0); // Reset the pointer to the beginning
            while ($row = $departments->fetch_assoc()) {
                $currentDeptId = $row['id'];
                $years = getYears($currentDeptId);
                echo "if (deptId == $currentDeptId) {";
                echo "yearSelect.options.add(new Option('Select year', ''));";
                for ($i = 1; $i <= $years; $i++) {
                    echo "yearSelect.options.add(new Option('$i', '$i'));";
                }
                echo "}";
            }
        }

        // Fetch sections for the selected department using PHP
        if ($departments->num_rows > 0) {
            $departments->data_seek(0);
            while ($row = $departments->fetch_assoc()) {
                $currentDeptId = $row['id'];
                $sections = getSections($currentDeptId);
                echo "if(deptId == $currentDeptId){";
                echo "sectionSelect.options.add(new Option('Select section', ''));";
                for ($i = 1; $i <= $sections; $i++) {
                    $alpha = chr(64 + $i);
                    echo "sectionSelect.options.add(new Option('$alpha', '$i'));";
                }
                echo "}";
            }
        }


        
        ?>

        //display the record for the particular department
        

    }

    function saveData() {
        // Reset the form
        document.getElementById('assignForm').reset();

        // Hide the modal
        $('#assignModal').modal('hide');
    }

    // Initialize year options on page load
    window.onload = function () {
        departmentChange();
    };
</script>
</body>
</html>

