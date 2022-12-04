<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/headerlinks.php' ?>

    <title>Notes</title>
</head>

<?php include 'includes/connection.php'; ?>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="navbar-brand">
            <img src="images/notes.svg" alt="" style="height: 2rem;">
            <a class="navbar-brand" href="index.php">NOTEBASE</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon" style="margin-top: 0px;"></span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav mr-auto">


            </ul>
            <!-- <form class="form-inline my-lg-0">
                <input class="form-control navbar-search mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-success my-2 my-sm-0" type="button">Search</button>
            </form> -->
        </div>
    </nav>
    <div class="container-fluid heading">
        <?php

        $tid = $_GET['teacherid'];
        $sql = "select * from teacherdata where id='$tid' ";
        $query = mysqli_query($con, $sql);
        $teacher_data = mysqli_fetch_assoc($query);
        $teachername = $teacher_data['user'];
        ?>
        <h3><?php echo $teachername  ?>'s Notes </h3>
        <h6>Subject - <?php echo $teacher_data['subject']  ?> </h6>
        <h6>Subject code - <?php echo $teacher_data['subject_code']  ?> </h6>
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
                    $tablename = "teacher" . $_GET['teacherid'];
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
                                    <a href="<?php echo $datafetch['document']; ?>" target="_blank" class="btn btn-info">View</a>
                                    <a href="php/download.php?file=<?php echo $datafetch['document']; ?>" class="btn btn-success">Download</a>
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

                    $assignTableName = "teacher" . $_GET['teacherid'] . "_assignment";
                    $assignSelectQuery = "select * from $assignTableName";
                    $runAssignQuery = mysqli_query($con, $assignSelectQuery);

                    while ($assignDataFetch = mysqli_fetch_array($runAssignQuery)) {
                    ?>
                        <li>
                            <div class="card">

                                <img class="pdfimage" src="images/assignment.svg" alt="PDF">
                                <div class="title">
                                    <h5> <?php echo $assignDataFetch['title'] ?> </h5>
                                </div>

                                <div>
                                    <a href="#viewdetails<?php echo $assignDataFetch['assign_id'] ?>" class="btn btn-success" data-toggle="modal" title="View">View</a>

                                    <div class="modal" id="viewdetails<?php echo $assignDataFetch['assign_id'] ?>">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
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
                                                        <p> <?php echo $assignDataFetch['description'] ?> </p>
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


                                    <a href="#submithere<?php echo $assignDataFetch['assign_id'] ?>" class="btn btn-success" data-toggle="modal" title="Submit Here">Submit Here</a>

                                    <div class="modal" id="submithere<?php echo $assignDataFetch['assign_id'] ?>">
                                        <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable">
                                            <div class="modal-content">

                                                <div class="modal-header ">
                                                    <h3 class="modal-title w-100 text-center"><?php echo $assignDataFetch['title'] ?></h3>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">

                                                    <div class="login-container">

                                                        <?php
                                                        $today = date("Y-m-d");
                                                        $formatdate = date_create($assignDataFetch['due_date']);
                                                        $duedate = date_format($formatdate, "Y-m-d");

                                                        $today = strtotime($today);
                                                        $duedate = strtotime($duedate);


                                                        if ($duedate >= $today) {
                                                        ?>
                                                            <form action="submitassign.php?teacherid=<?php echo $_GET['teacherid']; ?>&assignid=<?php echo $assignDataFetch['assign_id']; ?>" class="login-form" enctype="multipart/form-data" method="POST">

                                                                <div class="form-group">

                                                                    <label for="name">Name</label><br>
                                                                    <input type="text" name="name" placeholder="Name" class="form-control" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="enroll">Enrollment Number</label><br>
                                                                    <input type="text" name="enroll" placeholder="Enrollment Number" class="form-control" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="class">Class</label><br>
                                                                    <input type="text" name="class" placeholder="Class" class="form-control" required>
                                                                </div>


                                                                <div class="form-group">

                                                                    <div class="row">
                                                                        <div class="col-sm">
                                                                            <label for="subject">Subject</label><br>
                                                                            <input type="text" id="subject" name="subject" placeholder="Subject" class="form-control" required>
                                                                        </div>
                                                                        <div class="col-sm">
                                                                            <label for="subject-code">Subject Code</label><br>
                                                                            <input type="text" id="subjectcode" name="subjectcode" placeholder="Subject Code" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="email">E-mail</label><br>
                                                                    <input type="email" name="email" placeholder="E-mail" class="form-control" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="moblie">Mobile Number</label><br>
                                                                    <input type="text" name="mobile" placeholder="Mobile Number" class="form-control" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <input type="file" name="file">
                                                                </div>

                                                                <button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-off"></span>Submit</button>
                                                            </form>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <img src="images/deadline.svg" style="height: 18rem; width: 10rem; opacity: 0.5; " alt="">

                                                        <?php
                                                        }
                                                        ?>
                                                    </div>



                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
    </div>

    <?php include 'includes/footerlinks.php' ?>

</body>

</html>