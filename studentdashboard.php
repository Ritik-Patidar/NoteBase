<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/headerlinks.php' ?>

    <title>Dashboard</title>
</head>

<?php include 'includes/connection.php'; ?>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="navbar-brand">
            <img src="images/notes.svg" alt="" style="height: 2rem;">
            <a class="navbar-brand" href="index.php">NOTEBASE</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon" style="margin-top: 0px;" ></span>
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
        <div><h3>Hello, Students </h3></div>   
        <hr>                                                                                                                                                     
    </div>
    <div class="container-fluid">
        <ol class="card-list">
            <?php  
            
                $selectquery = "select * from teacherdata" ;
                $runquery = mysqli_query($con,$selectquery);

                while($datafetch = mysqli_fetch_array($runquery) ){
                ?>  
                <li>
                    <div class="card">
                        <!-- <div class="profile">
                            
                        </div> -->
                        <div class="teachername">
                            <h3><?php  echo $datafetch['user'];  ?></h3>
                        </div>
                        <div class="subject">
                            <h5><?php  echo $datafetch['subject'];  ?></h5>
                            <h6><?php  echo $datafetch['subject_code'];  ?></h6>
                        </div>
                        <?php $id = $datafetch['id'] ?>
                        <!-- <button type="button" class="btn btn-success"><a  href="">View Notes</a></button> -->
                        <a  href="<?php echo "teachernotes.php?teacherid=$id"?>" class="btn btn-success" >View Notes</a>
                    </div>
                </li>
               
            
                <?php
                }
            ?>
        </ol>
    </div>


<?php include 'includes/footerlinks.php' ?>

</body>

</html>