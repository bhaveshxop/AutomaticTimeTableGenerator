<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                        <a class="nav-link" href="./class.php">Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./staff.php">Staff</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="#">Subjects</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-3">
        <div class="head row">
            <h2 class="m-0 col-md-6">Subject List</h2>
        </div>
        <div class="content">
            <form class="row g-0 my-3">
                <!-- Subject name -->
                <div class="col-md-5 pe-2">
                    <input type="text" class="form-control" id="subjectName" placeholder="Subject name">
                </div>

                <!-- Subject Code -->
                <div class="col-md-3 pe-2">
                    <input type="text" class="form-control" id="subjectCode" placeholder="Subject Code">
                </div>

                <!-- Type (Theory or Lab) -->
                <div class="col-md-2 pe-2">
                    <select class="form-select" id="type">
                        <option selected>Type</option>
                        <option value="1">Theory</option>
                        <option value="2">Lab</option>
                    </select>
                </div>

                <button type="submit" name="addDepartment" class="btn col btn-success col-md-2">Add Subject</button>


            </form>

            <div className="table-responsive">
                <table class="table table-bordered text-center table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Subject Code</th>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">CM5201</td>
                            <td scope="row">Software Engineering</td>
                            <td scope="row">Theory</td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">CM5202</td>
                            <td scope="row">Data Science</td>
                            <td scope="row">Theory</td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">CM5203</td>
                            <td scope="row">Machine Learning</td>
                            <td scope="row">Theory</td> 
                            <td>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td  scope="row">CM5204</td>
                            <td scope="row">Artificial Intelligence</td>
                            <td scope="row">Lab</td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>