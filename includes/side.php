<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse" >
                <ul class="nav navbar-nav side-nav">
                    <div class="img-wrapper">
                        <img class="img-rounded" src="../assets/profile.png"><br>
                        <label class="label"><strong><?php echo $_SESSION['username']; ?></strong></label>
                    </div><br>

                    <li class="mouse">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <!-- <li>
                        <a href="rooms.php"><i class="fa fa-fw fa-edit"></i> Tables</a>
                    </li> -->
                    <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#Patient"><i class="fa fa-fw fa-wheelchair"></i>patient <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="Patient" class="collapse">
                        <li>
                            <a href="patient.php">Patient</a>
                        </li>
                        <li>
                            <a href="assign.php">Assign</a>
                        </li>
                        <li>
                            <a href="history.php">History</a>
                        </li>
                    </ul>
                </li>
                    <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#staff"><i class="fa fa-fw fa-user"></i> staff <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="staff" class="collapse">
                        <li>
                            <a href="doctors.php">Doctors</a>
                        </li>
                        <li>
                            <a href="nurses.php">Nurses</a>
                        </li>
                    </ul>
                </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#rooms"><i class="fa fa-fw fa-home"></i> Asset <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="rooms" class="collapse">
                            <li>
                                <a href="floor.php">Floor</a>
                            </li>
                            <li>
                                <a href="rooms.php">Rooms</a>
                            </li>
                            <li>
                                <a href="beds.php">Beds</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="forms.php"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li> -->
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Reports <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="nursereport.php">Report Nurses</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">

            <div class="container-fluid">
