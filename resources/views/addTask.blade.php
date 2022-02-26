<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>My panel</title>
    <!-- calander script -->
    <script src="../js/calander.js"></script>
</head>

<body>

    <!-- nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- side bar button -->
            <button class="btn btn-dark mx-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                < </button>
                    <a class="navbar-brand" href="#">DG Tasks</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Task</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/calander">Calander</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Plans</a>
                            </li>
                        </ul>
                        <span class="navbar-text">
                            How is the day Sir?
                        </span>
                    </div>
        </div>
    </nav>

    <!-- side bar content -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
            </div>
            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                    Dropdown button
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- add task form -->

    <!-- validation -: if we sbmit without values it alert the error -->
    <!-- reqiured part done in the taskcontroller class -->
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert"> 
            {{$error}}
        </div>
    @endforeach

    
    <div class="container mt-5">
        <form method="post" class="row g-3" action="/exporttask">
            {{csrf_field()}} <!-- for security --> 
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Task</label>
                <input type="textarea" name="task" class="form-control" id="task">
            </div>
            <div class="col-md-6">
                <label for="inputPriority" class="form-label">Priority</label>
                <select id="priority" name="prioroty" class="form-select">
                    <option selected>Choose...</option>
                    <option>High</option>
                    <option>Average</option>
                    <option>Low</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputPriority" class="form-label">Status</label>
                <select id="status" name="status" class="form-select">
                    <option selected>Choose...</option>
                    <option>On Going</option>
                    <option>To Start</option>
                </select>
            </div>
            <div class="col-12">
                <label for="inputDate" class="form-label">Date</label>
                <input type="date" name="date" class="form-control" id="date" placeholder="1234 Main St">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-secondary">+ Add</button>
            </div>
        </form>
    </div>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>