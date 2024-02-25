<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Time Table Generator</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="">
                <img src="./Images/logo.webp"  width="34" height="36">

                TimeTable</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pages/department.php">Departments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pages/class.php">Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pages/subjects.php">Subjects</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

     <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        .timetable-container {
            max-width: 800px;
            margin: 20px auto;
        }

        .dropdown {
            margin-bottom: 10px;
        }

        #timetable {
            display: none;
            margin-top: 20px;
        }

        @media (max-width: 575.98px) {
            .timetable-container {
                margin: 20px 0;
            }
        }
    </style>
</head>

<body>

    <h1>Timetable Display</h1>

    <div class="timetable-container">
        <div class="dropdown">
            <!-- Department Dropdown -->
            <label for="department" class="form-label">Department:</label>
            <select id="department" name="department" class="form-select">
                <option value="dept1">Department 1</option>
                <option value="dept2">Department 2</option>
                <!-- Add more departments as needed -->
            </select>
        </div>

        <div class="dropdown">
            <!-- Year Dropdown -->
            <label for="year" class="form-label">Year:</label>
            <select id="year" name="year" class="form-select">
                <option value="year1">Year 1</option>
                <option value="year2">Year 2</option>
                <!-- Add more years as needed -->
            </select>
        </div>

        <div class="dropdown">
            <!-- Section Dropdown -->
            <label for="section" class="form-label">Section:</label>
            <select id="section" name="section" class="form-select">
                <option value="section1">Section A</option>
                <option value="section2">Section B</option>
                <!-- Add more sections as needed -->
            </select>
        </div>

        <!-- Display Timetable Button -->
        <button onclick="displayTimetable()" class="btn btn-primary">Display Timetable</button>

        <!-- Timetable Table -->
        <div id="timetable">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Time</th>
                        <th scope="col">Monday</th>
                        <th scope="col">Tuesday</th>
                        <th scope="col">Wednesday</th>
                        <th scope="col">Thursday</th>
                        <th scope="col">Friday</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Timetable rows will be dynamically added here -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function displayTimetable() {
            // You can fetch and display the timetable data here
            // For now, let's add a sample timetable row

            var timetableTable = document.querySelector('#timetable table tbody');

            // Sample data (replace with actual data)
            var timetableData = [
                { time: '9:00 AM', mon: 'Class A', tue: 'Class B', wed: 'Class C', thu: 'Class D', fri: 'Class E' },
                // Add more rows as needed
            ];

            // Clear existing rows
            timetableTable.innerHTML = '';

            // Add rows based on data
            timetableData.forEach(function (row) {
                var newRow = document.createElement('tr');
                newRow.innerHTML = `<td>${row.time}</td>
                                    <td>${row.mon}</td>
                                    <td>${row.tue}</td>
                                    <td>${row.wed}</td>
                                    <td>${row.thu}</td>
                                    <td>${row.fri}</td>`;
                timetableTable.appendChild(newRow);
            });

            // Show the timetable
            document.getElementById('timetable').style.display = 'block';
        }
    </script>

</body>
</body>

</html>