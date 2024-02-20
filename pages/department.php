<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="../Images/logo.webp"  width="34" height="36">

            
            TimeTable</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="navaria-item">
                        <a class="nav-link" -current="page" href="/index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Departments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/class.html">Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Staff</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="head">
            <h2>Department List</h2>
        </div>
        <div class="content">
            <div class="d-flex justify-content-end mb-2"><button type="button" class="btn btn-success">Add department</button></div>

            <div className="table-responsive">
                <table class="table table-bordered text-center table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Department name</th>
                            <th scope="col">Code</th>
                            <th scope="col"> Semesters</th>
                            <th scope="col"> Sections</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td scope="row">Computer Science</td>
                            <td scope="row">CS</td>
                            <td scope="row">6</td>
                            <td scope="row">4</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">View</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td scope="row">Electrical Engineering</td>
                            <td scope="row">EE</td>
                            <td scope="row">6</td>
                            <td scope="row">2</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">View</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td scope="row">Mechanical Engineering</td>
                            <td scope="row">ME</td>
                            <td scope="row">6</td>
                            <td scope="row">2</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">View</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td scope="row">Civil Engineering</td>
                            <td scope="row">CE</td>
                            <td scope="row">6</td>
                            <td scope="row">1</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">View</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>