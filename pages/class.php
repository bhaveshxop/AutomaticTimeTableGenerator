<?php
// Include the database connection file
include('../utils/dbcon.php');

//fetch departments from the database
$departments = $conn->query("SELECT * FROM departments");
$year = 0;
$sections = 0;
//fetch year from the database
function getYear($dept_id)
{
    global $conn;
    $no_years = $conn->query("SELECT year FROM departments WHERE id = $dept_id");
    return $no_years;
}

if (isset($_POST['dept'])) {

    $id = $_POST['dept'];

    $sql = "SELECT year,sections FROM departments WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // "i" indicates integer type for the parameter
    $stmt->execute();

    // Bind result variable
    $stmt->bind_result($year, $sections);

    // Fetch value
    if ($stmt->fetch()) {
        // Value retrieved successfully
        echo " "; // Output the retrieved year
    } else {
        // No rows matched the query
        echo "No year found for the specified id";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                        <select class="form-select form-select-sm" aria-label="Default select example" id="dept">
                            <option selected>Select department</option>
                            <?php
                            if ($departments->num_rows > 0) {
                                while ($row = $departments->fetch_assoc()) {
                                    // echo "<option onchange= 'fetchYears(".$row['id'].")' >" . $row['dept_name'] . "</option>";
                                    //echo "<option onchange='getYear(".$row['id'].")'value=" . $row['id'] . ">" . $row['dept_name'] . "</option>";
                                    echo "<option onchange='Year(" . $row['id'] . ")' value='" . $row['id'] . "'>" . $row['dept_name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="sel-sem ms-3">
                        <select class="form-select form-select-sm" aria-label="Default select example" id="year">
                            <option selected>Select year</option>
                            <?php
                            for ($i = 1; $i <= $year; $i++)
                                echo "<option>$i</option>";

                            ?>
                        </select>
                    </div>

                    <div class="sel-sec ms-3">
                        <select class="form-select form-select-sm" aria-label="Default select example">
                            <option selected>Select section</option>
                            <?php
                            for ($i = 1; $i <= $sections; $i++) {
                                $ascii = 64 + $i;
                                $alphabet_character = chr($ascii);
                                echo "<option value='$i'>$alphabet_character</option>";
                            }
                            ?>

                        </select>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#assignModal">
                        Assign
                    </button>
                </div>
            </div>

            <div className="table-responsive">
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
                        <tr>
                            <td scope="row">Python Programming</td>
                            <td scope="row">CS101</td>
                            <td scope="row">Theory</td>
                            <td scope="row">Prof. Shilpa S. Jadhav</td>
                            <td scope="row">2</td>
                            <td scope="row">45 min</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">View</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Data Structures</td>
                            <td scope="row">CS102</td>
                            <td scope="row">Theory</td>
                            <td scope="row">Prof. Mahesh P. Rathod</td>
                            <td scope="row">5</td>
                            <td scope="row">45 min</td>

                            <td>
                                <button type="button" class="btn btn-primary btn-sm">View</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td scope="row">Python Programming</td>
                            <td scope="row">CS101</td>
                            <td scope="row">Lab</td>
                            <td scope="row">Dr. Pravin P. Satav</td>
                            <td scope="row">4</td>
                            <td scope="row">120 min</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">View</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td scope="row">Database Management System</td>
                            <td scope="row">CS103</td>
                            <td scope="row">Theory</td>
                            <td scope="row">Prof. Ashivini S. Patil</td>
                            <td scope="row">5</td>
                            <td scope="row">45 min</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">View</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Computer Networks</td>
                            <td scope="row">CS104</td>
                            <td scope="row">Theory</td>
                            <td scope="row">Prof. Archana Jane</td>
                            <td scope="row">4</td>
                            <td scope="row">45 min</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">View</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                

                <div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="assignModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="assignModalLabel"> Assign Class Periods </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                    <!-- Select subject -->
                                    <div class="mb-3">
                                        <select class="form-select" id="subject">
                                            <option selected>Select Subject</option>
                                            <option value="1">FC205 - Data Structures (Theory)</option>
                                            <option value="2">FC206 - Database Management System (Theory)</option>
                                            <option value="4">FC208 - Python Programming (Theory)</option>
                                            <option value="3">FC207 - Computer Networks (Theory)</option>
                                            <option value="4">FC208 - Python Programming (Lab)</option>
                                        </select>
                                    </div>

                                    <!-- Select staff -->
                                    <div class="mb-3">
                                        <select class="form-select" id="staff">
                                            <option selected>Select Staff</option>
                                            <option value="1">Prof. Shilpa S. Jadhav</option>
                                            <option value="2">Prof. Mahesh P. Rathod</option>
                                            <option value="3">Dr. Pravin P. Satav</option>
                                            <option value="4">Prof. Ashivini S. Patil</option>
                                            <option value="5">Prof. Archana Jane</option>
                                        </select>
                                    </div>

                                    <!-- Enter total periods in week-->
                                    <div class="mb-3">
                                        <input type="number" class="form-control" id="totalPeriods" placeholder="Total periods in week" required>
                                    </div>

                                    <!-- Enter duration -->
                                    <div class="mb-3">
                                        <input type="number" class="form-control" id="duration" placeholder="Duration in minutes" required>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        // document.getElementById('dept').addEventListener('change', function() {
        //      var dept_id = this.value;
        //      alert(dept_id);

        //  });
        //  function getYear(deptid){
        //     alert(deptid);
        //  }


        document.getElementById('dept').addEventListener('change', function() {
            var deptId = this.value;
            Year(deptId);
        });

        function Year(deptId) {
         
            var form = document.createElement('form');
            form.method = 'post';
            form.action = '';
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'dept';
            input.value = deptId;
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    </script>
    </>
</body>

</html>