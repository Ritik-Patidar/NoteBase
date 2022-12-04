<!DOCTYPE html>
<html lang="en">

<?php include 'includes/connection.php'; ?>

<head>

    <?php include 'includes/headerlinks.php' ?>

    <title>Submissions</title>

</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
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
                <form class="form-inline my-lg-0">
                    <input class="form-control navbar-search mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="button">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="table-box">

            <?php
            try{
                
                $teacherid = $_GET['teacherid'];
                $assignid = $_GET['assignid'];

                $viewtablename = "teacher" . $teacherid . "_assignment" . $assignid . "_submission";
                // echo $tablename ;
                $viewquery = "select * from $viewtablename";
                // echo "    ".$selectquery ;
                $viewrunquery = mysqli_query($con, $viewquery) ;
                // $viewrunquery = mysqli_query($con, $viewquery) or die(mysqli_error($con));
                
                if (!$viewrunquery) {
                    throw new Exception("Data not found");
                }
                ?>
                <table class="table table-responsive table-hover">
                    <thead>
                        <tr class="cell">
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Enrollment Number</th>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>Subject-code</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <!-- <th>Date/Time</th> -->
                            <th>File</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    while ($row = mysqli_fetch_array($viewrunquery)) {
                    ?>
                        <tr class="cell">
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['enrollment_number'] ?></td>
                            <td><?php echo $row['class'] ?></td>
                            <td><?php echo $row['subject'] ?></td>
                            <td><?php echo $row['subject_code'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['mobile_number'] ?></td>

                            <?php

                            $filePathInfo = pathinfo($row['file']);

                            ?>

                            <td><?php echo $filePathInfo['basename'] ?></td>
                            <td>
                                <div class="row" style="width: 6rem; justify-content: space-around;">
                                    
                                    <a href="<?php echo $row['file']; ?>" target="_blank" class="btn btn-info" title="View"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                        </svg></a>

                                    <a href="php/download.php?file=<?php echo $row['file']; ?>" class="btn btn-success" title="Download"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                        </svg></a>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>

            <?php
            }catch( Exception $e){
            ?>

            No One submitted yet


            <?php } ?>
        </div>
    </div>


    <?php include 'includes/footerlinks.php' ?>

</body>

</html>