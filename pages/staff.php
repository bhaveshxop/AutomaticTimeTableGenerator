<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff</title>
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
                        <a class="nav-link active" href="#">Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./subjects.php">Subjects</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="head row">
            <h2 class="m-0 col-md-6">Staff List</h2>
            <!--
            <div class="col-md-6">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div> -->
        </div>
        <div class="content">
            <form class="row g-0 my-3">
                <!-- Staff name -->
                <div class="col-md-6 pe-2">
                    <input type="text" class="form-control" id="staffName" placeholder="Staff name">
                </div>

                <!-- Short name -->
                <div class="col-md-4 pe-2">
                    <input type="text" class="form-control" id="shortName" placeholder="Short name">
                </div>

                <button type="submit" name="addDepartment" class="btn col btn-success col-md-2">Add Staff</button>

            </form>

            <div className="table-responsive">
                <table class="table table-bordered text-center table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Sr. no</th>
                            <th scope="col">Staff name</th>
                            <th scope="col">Short name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td scope="row">Prof. Shilpa S. Jadhav</td>
                            <td scope="row">SSJ</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">Update</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td scope="row">Prof. Mahesh P. Rathod</td>
                            <td scope="row">MPR</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">Update</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td scope="row">Dr. Pravin P. Satav</td>
                            <td scope="row">DPPS</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">Update</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td scope="row">Prof. Ashivini S. Patil</td>
                            <td scope="row">ASP</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">Update</button>
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