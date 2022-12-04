<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/headerlinks.php' ?>

    <title>Teacher</title>
</head>

<?php

include "logininfo.php";
// session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: index.php");
}

?>

<body class="w3-light-grey">

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <!-- Brand -->
            <div class="navbar-brand">
                <img src="images/notes.svg" alt="" style="height: 2rem;">
                <a class="navbar-brand" href="index.php">NOTEBASE</a>
            </div>

            <!-- Links -->
            <ul class="navbar-nav" style="flex-direction: row;">

                <!-- Dropdown -->
                <!-- <img class="add" src="images/plus.png" alt=""> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle p-0" href="#" id="navbardrop" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-plus upload-icon" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z" />
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                        </svg></a>

                    <div class="dropdown-menu" style=" position: absolute;top: 50px;right: 0%;left: auto;">
                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#noteModal">Add Notes</a>
                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#assignmentModal">Add Assignment</a>
                    </div>

                    <div class="modal fade" id="noteModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header ">
                                    <h3 class="modal-title w-100 text-center">Upload Notes</h3>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <div class="login-container">

                                        <?php $id = $_SESSION['id']  ?>

                                        <form action="<?php echo "upload.php?userid=$id" ?> " class="login-form" enctype="multipart/form-data" method="POST">
                                            <div class="form-group">
                                                <label for="title">Title</label><br>
                                                <input type="text" name="title" placeholder="Title" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <input type="file" name="document">
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-off"></span>Upload</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal fade" id="assignmentModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header ">
                                    <h3 class="modal-title w-100 text-center">Create Assignment</h3>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <div class="login-container">

                                        <?php $id = $_SESSION['id']  ?>

                                        <form action="<?php echo "createassignment.php?userid=$id" ?>" class="login-form" enctype="multipart/form-data" method="POST">

                                            <div class="form-group">
                                                <label for="title">Title</label><br>
                                                <input type="text" name="title" placeholder="Title" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Description</label><br>
                                                <textarea class="form-control" name="description" placeholder="Describe Here.."></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="duedate">Due Date</label><br>
                                                <input type="date" name="duedate" placeholder="Due Date" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <input type="file" name="document">
                                            </div>

                                            <button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-off"></span>Create</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle p-0" href="#" id="navbardrop" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle account-icon" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg></a>
                    <div class="dropdown-menu" style=" position: absolute;top: 50px;right: 0%;left: auto;">
                        <a class="dropdown-item" href="editprofile.php?id=<?php echo $_SESSION['id'] ?>">Profile</a>
                        <a class="dropdown-item" href="php/logout.php">Log Out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid heading">
        <h3>Hello, <?php echo $_SESSION['user'];  ?> </h3>
        <h6>Subject - <?php echo $_SESSION['subjectname']  ?> </h6>
        <h6>Subject code - <?php echo $_SESSION['subjectcode']  ?> </h6>
    </div>

    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item sec-nav-item w-50">
            <a class="nav-link active" data-toggle="tab" href="#notes">Notes</a>
        </li>
        <li class="nav-item sec-nav-item  w-50">
            <a class="nav-link" data-toggle="tab" href="#assignment">Assignment</a>
        </li>

    </ul>

    <div class="tab-content">

        <div id="notes" class="tab-pane active"><br>
            <div class="container-fluid">
                <ol class="card-list">

                    <?php
                    $tablename = "teacher" . $id;
                    $selectquery = "select * from $tablename";
                    $runquery = mysqli_query($con, $selectquery);

                    while ($datafetch = mysqli_fetch_array($runquery)) {
                    ?>
                        <li>
                            <div class="card">
                                <?php

                                $path_info = pathinfo($datafetch['document']);

                                ?>
                                <img class="pdfimage" src="images/<?php echo $path_info['extension'] . ".svg" ?>" alt="PDF">
                                <div class="title">
                                    <h5><?php echo $datafetch['title']; ?></h5>
                                </div>
                                <div>
                                    <a href="<?php echo $datafetch['document']; ?>" target="_blank" class="btn btn-info" title="View">View</a>

                                    <a href="php/download.php?file=<?php echo $datafetch['document']; ?>" class="btn btn-success" title="Download">Download</a>

                                    <a href="#deletenote<?php echo $datafetch['id']; ?>" class="btn btn-danger" data-toggle="modal" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg></a>

                                    <div class="modal" id="deletenote<?php echo $datafetch['id']; ?>">
                                        <div class="modal-dialog modal-dialog-centered modal-sm">
                                            <div class="modal-content">

                                                <!-- Modal body -->
                                                <div class="modal-body delete-modal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle delete-modal-img" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                    </svg>
                                                    <h3>Are you sure?</h3>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <a href="php/delete.php?fileid=<?php echo $datafetch['id']; ?>&tname=<?php echo $tablename ?>&fname=<?php echo $datafetch['document'] ?>" class="btn btn-danger" title="Download">Delete</a>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ol>
            </div>
        </div>

        <div id="assignment" class="tab-pane fade"><br>
            <div class="container-fluid">
                <ol class="card-list">

                    <?php
                    $assignTableName = "teacher" . $id . "_assignment";
                    $assignSelectQuery = "select * from $assignTableName";
                    $runAssignQuery = mysqli_query($con, $assignSelectQuery);

                    while ($assignDataFetch = mysqli_fetch_array($runAssignQuery)) {

                    ?>
                        <li>
                            <div class="card">

                                <img class="pdfimage" src="images/assignment.svg" alt="PDF">
                                <div class="title">
                                    <h5><?php echo $assignDataFetch['title'];  ?></h5>
                                </div>

                                <div>
                                    <a href="#viewdetails<?php echo $assignDataFetch['assign_id'] ?>" class="btn btn-success" data-toggle="modal" title="View">View</a>

                                    <div class="modal" id="viewdetails<?php echo $assignDataFetch['assign_id'] ?>">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <div class="modal-header ">
                                                    <h3 class="modal-title w-100 text-center"><?php echo $assignDataFetch['title'] ?></h3>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div class="duedate text-right">
                                                        <h6>due date :
                                                            <?php
                                                            $date = date_create($assignDataFetch['due_date']);
                                                            echo date_format($date, "d/m/Y");
                                                            ?>
                                                        </h6>
                                                    </div>
                                                    <div>
                                                        <h4>Description</h4>
                                                        <p> <?php echo $assignDataFetch['description']  ?> </p>
                                                    </div>
                                                    <div class="file">
                                                        <?php

                                                        $assignPathInfo = pathinfo($assignDataFetch['file']);

                                                        ?>
                                                        <p> <?php echo $assignPathInfo['basename']; ?> </p>
                                                        <a href="php/download.php?file=<?php echo $assignDataFetch['file']; ?>" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                            </svg></a>
                                                    </div>

                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <a href="#deleteassign<?php echo $assignDataFetch['assign_id']; ?>" class="btn btn-danger" data-toggle="modal" title="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg>
                                    </a>

                                    <div class="modal" id="deleteassign<?php echo $assignDataFetch['assign_id']; ?>">
                                        <div class="modal-dialog modal-dialog-centered modal-sm">
                                            <div class="modal-content">

                                                <!-- Modal body -->
                                                <div class="modal-body delete-modal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle delete-modal-img" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                    </svg>
                                                    <h3>Are you sure?</h3>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <a href="php/deleteassign.php?fileid=<?php echo $assignDataFetch['assign_id']; ?>&tname=<?php echo $assignTableName ?>&fname=<?php echo $assignDataFetch['file']; ?>&teacherid=<?php echo $id; ?>" class="btn btn-danger" title="Delete">Delete</a>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <a href="#" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" title=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                        </svg></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="viewsubmissions.php?teacherid=<?php echo $id; ?>&assignid=<?php echo $assignDataFetch['assign_id']; ?>">View submissions</a>
                                        <!-- <a class="dropdown-item" href="" data-toggle="modal" data-target="#assignmentModal">Add Assignment</a> -->
                                    </div>

                                </div>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ol>
            </div>
        </div>

    </div>

    <?php include 'includes/footerlinks.php' ?>

</body>

</html>