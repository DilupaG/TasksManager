<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hello, world!</title>
    <!-- calander script -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" />
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
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Take me to</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

            <div class="mt-2">
                Add new task
            </div>
            <a class="btn btn-secondary mt-3" type="button" href="/addTask"> + Add Task </a>

            <div class="mt-5">
                Your tasks tracker
            </div>
            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                    Tasks
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Comleted tasks</a></li>
                    <li><a class="dropdown-item" href="#">Uncompleted tasks</a></li>
                </ul>
            </div>


        </div>
    </div>


    <!-- table -->
    <div class="container my-5">
        <table class="table" id="tbl">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Priority</th>
                    <th scope="col" style="padding-left: 80px;"> whats now</th>
                </tr>
            </thead>
            <tbody>
                <!-- getting values from controller witch was passed under t key. get those values into $task -->
                @foreach($tasks as $task)
                <tr>
                    <th scope="row">{{$task->id}}</th>
                    <td>{{$task->task}}</td>
                    <td>{{$task->date}}</td>
                    <td>
                        <!-- if status is To statrt, give the change to status to On going -->
                        @if($task->status=="To Start")
                            <td class="bg-warning">{{$task->status}}</td>
                        @elseif($task->status=="On Going")
                            <td class="bg-secondary">{{$task->status}}</td>
                        @else    
                            <!-- els status should be Onging, so no need to change to status and no update button -->
                            <td class="bg-success">{{$task->status}}</td>
                        @endif
                    </td>
                    <td>{{$task->priority}}</td>
                    <td>
                        @if($task->status=="On Going")
                            <!--if status is ongoing, no need update the status. just give the completed button -->
                            <a type="button" class="btn btn-success" href="/completedTask/{{$task->id}}">Completed</a>
                            {{csrf_field()}}
                            <a type="button" class="btn btn-danger" href="/deleteTask/{{$task->id}}">Delete</a>
                            {{csrf_field()}}
                        @elseif($task->status=="Completed")
                            <a type="button" class="btn btn-danger" href="/deleteTask/{{$task->id}}">Delete</a>
                            {{csrf_field()}}
                        @else
                            <a type="button" class="btn btn-warning" href="/updateTask/{{$task->id}}">Start Now</a>
                            {{csrf_field()}}
                            <a type="button" class="btn btn-danger" href="/deleteTask/{{$task->id}}">Delete</a>
                            {{csrf_field()}}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>



<script type="text/javascript">
    $(document).ready(function() {
        $('#tbl').DataTable();
    });
</script>