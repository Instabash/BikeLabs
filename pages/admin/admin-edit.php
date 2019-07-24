<?php
session_start();
include '../../includes/restrictions.inc.php';
admin_protect();

include '../../includes/dbh.inc.php';
include '../../includes/sidebar.inc.php';
if (isset($_GET['pkgmod']) && isset($_GET['pkgalt'])){
    $pkggetmodnew = $_GET['pkgmod'];
    $pkggetaltnew = $_GET['pkgalt'];

    if ($pkggetmodnew == 1 || $pkggetaltnew == 1) {
        $queryrownew = "map_pkg_1";
    }
    elseif ($pkggetmodnew == 2 || $pkggetaltnew == 2) {
        $queryrownew = "map_pkg_2";
    }
    elseif ($pkggetmodnew == 3 || $pkggetaltnew == 3) {
        $queryrownew = "map_pkg_3";
    }
    elseif ($pkggetmodnew == 4 || $pkggetaltnew == 4) {
        $queryrownew = "map_pkg_4";
    }
    else{
        header("Location: /BikeLabs/404-page.php");
    }
}
$title = 'Edit packages';
include '../../includes/header.php';
?>
<!-- Sidebar -->
<label href="#" class="list-group-item" style="width: auto;">Admin Panel
   <button class="btn" id="menu-toggle"><img style="width: 10px;" src="../../images/bars-solid.svg"></button>
</label>
<div class="d-flex" id="wrapper">
    <?php
    adminsidebar();
    ?>
    <section class="section modsection content content2" style="width: 100%;">
        <div class="container">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit Mod/Alt Packages</h3>
                </div>
                <?php
                if (isset($_GET['error'])) 
                {
                    if ($_GET['error'] == "empty") 
                    {
                        echo '<p style="color:red !important;padding:5px;";>Fill in all the fields.</p>';
                    }
                    elseif ($_GET['error'] == "price") 
                    {
                        echo '<p style="color:red !important;padding:5px;";>Please enter a price within range of 100 to 50000 Rs.</p>';
                    }
                }
                ?>
            </div>
        </div>

        <div class="row pt-4" style="width: 100%;padding-left:5%">
            <!-- Left col -->
            <div class="col-sm-6 editpkgdiv">
                <div class="box box-info">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="table-responsive pl-4">

                            <?php
                            if (isset($_GET['pkgmod'])) {
                                $pkgget = $_GET['pkgmod'];
                                if ($pkgget == 1) {
                                    $queryrow = "map_pkg_1";
                                }
                                elseif ($pkgget == 2) {
                                    $queryrow = "map_pkg_2";
                                }
                                elseif ($pkgget == 3) {
                                    $queryrow = "map_pkg_3";
                                }
                                elseif ($pkgget == 4) {
                                    $queryrow = "map_pkg_4";
                                }
                                $sql = "SELECT * FROM modaltpackages WHERE $queryrow = 1 AND map_type = 'modification';";
                                ?>
                                <form action="/BikeLabs/includes/admin-pkg-process.inc.php" method="post">
                                    <div id="fillDiv">
                                        <h5 class="box-title"><b>Package <?php echo $pkgget; ?></b></h5>
                                        <br><br>
                                        <?php
                                        $result = mysqli_query($conn, $sql);
                                        $rowcount=mysqli_num_rows($result);
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($result)) 
                                            {?>

                                                <div class="row pl-4 pb-2 border" id="" style="width: 100%;">
                                                    <div class="altright pt-2">
                                                     <input type="text" value="<?php echo $row['map_name']; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose" name="pkgname<?php echo $row['map_id'] ?>"></input>
                                                 </div>
                                                 <div class="altright pt-2">
                                                    <input type="text" value="<?php echo $row['map_price'] ." Rs."; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose" name="pkgprice<?php echo $row['map_id'] ?>"></input>
                                                </div>
                                                <div class="altright pt-2">
                                                    <input type="hidden" name="pkg" value="<?php echo $pkgget?>">
                                                    <div id="remMod<?php echo $i; ?>" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Confirm</h4>
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Please press the button below to Confirm.</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-outline-danger btn-sm" name="remove<?php echo $pkgget ?>" value="<?php echo $row['map_id'] ?>" class="remove" >Remove</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#remMod<?php echo $i; ?>">Remove</button>
                                                    <!-- <button type="submit" class="btn btn-outline-danger btn-sm" name="remove<?php echo $pkgget ?>" value="<?php echo $row['map_id'] ?>" class="remove" >Remove</button>  -->
                                                </div>

                                            </div>
                                        <?php 
                                        $i++;
                                    }
                                        ?>
                                        <div class="row pl-4 pt-1 pb-1 border" id="hiddenDiv" style="width: 100%;display: none">
                                            <div style="float: left;">
                                                <div class="altright">
                                                    <label>Part name</label>
                                                </div>
                                                <div>
                                                    <input type="text" name="txtName" class="textfieldToClose form-control mr-2" style="width: 200px;" ></input>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="altright">
                                                    <label>Part price</label>
                                                </div>
                                                <div>
                                                    <input type="number" name="txtPrice" class="textfieldToClose form-control ml-2" style="width: 200px;" ></input>
                                                </div>
                                            </div>
                                            <div>
                                                <div id="saveMod" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Confirm</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Please press the button below to Confirm.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="save<?php echo $pkgget ?>" class="btn btn-outline-danger btn-sm mt-2">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-outline-danger btn-sm mt-2" data-toggle="modal" data-target="#saveMod">Save</button>
                                                <!-- <button type="submit" name="save<?php echo $pkgget ?>" class="btn btn-outline-danger btn-sm mt-2">Save</button> -->
                                                <button type="submit" name="cancel" id="cancel" class="btn btn-outline-danger btn-sm mt-2">Cancel</button> 
                                            </div>  
                                        </div>
                                        <div class="box-footer clearfix" style="padding-top: 10px;" style="padding-top: 10px;">
                                            <button class="btn btn-outline-danger btn-sm" id="add" >Add new part</button>
                                        </div>
                                    </div>
                                </form>

                                <?php
                            }
                            elseif (isset($_GET['pkgalt'])) {
                                $pkgget = $_GET['pkgalt'];
                                if ($pkgget == 1) {
                                    $queryrow = "map_pkg_1";
                                }
                                if ($pkgget == 2) {
                                    $queryrow = "map_pkg_2";
                                }
                                if ($pkgget == 3) {
                                    $queryrow = "map_pkg_3";
                                }
                                if ($pkgget == 4) {
                                    $queryrow = "map_pkg_4";
                                }
                                $sql = "SELECT * FROM modaltpackages WHERE $queryrow = 1 AND map_type = 'alteration';";
                                ?>
                                <form action="/BikeLabs/includes/admin-pkg-process.inc.php" method="post">
                                    <div id="fillDiv">
                                        <h5 class="box-title"><b>Package <?php echo $pkgget; ?></b></h5>
                                        <br><br>
                                        <?php
                                        $result = mysqli_query($conn, $sql);
                                        $rowcount=mysqli_num_rows($result);
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($result)) 
                                            {?>

                                                <div class="row pl-4 pb-2 border" id="" style="width: 100%;">
                                                    <div class="altright pt-2">
                                                     <input type="text" value="<?php echo $row['map_name']; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose" name="pkgname<?php echo $row['map_id'] ?>"></input>
                                                 </div>
                                                 <div class="altright pt-2  ">
                                                    <input type="text" value="<?php echo $row['map_price'] ." Rs."; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose" name="pkgprice<?php echo $row['map_id'] ?>"></input>
                                                </div>
                                                <div class="altright pt-2">
                                                    <input type="hidden" name="pkg" value="<?php echo $pkgget?>">
                                                    <div id="remAlt<?php echo $i; ?>" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Confirm</h4>
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Please press the button below to Confirm.</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-outline-danger btn-sm" name="removealt<?php echo $pkgget ?>" value="<?php echo $row['map_id'] ?>" class="remove" >Confirm</button> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#remAlt<?php echo $i; ?>">Remove</button>
                                                    <!-- <button type="submit" class="btn btn-outline-danger btn-sm" name="removealt<?php echo $pkgget ?>" value="<?php echo $row['map_id'] ?>" class="remove" >Remove</button>  -->
                                                </div>

                                            </div>
                                        <?php 
                                        $i++;
                                    }
                                        ?>
                                        <div class="row pl-4 pt-1 pb-1 border" id="hiddenDiv" style="width: 100%;display: none">
                                            <div style="float: left;">
                                                <div class="altright">
                                                    <label>Part name</label>
                                                </div>
                                                <div>
                                                    <input type="text" name="txtName" class="textfieldToClose form-control mr-2" style="width: 200px;" ></input>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="altright">
                                                    <label>Part price</label>
                                                </div>
                                                <div>
                                                    <input type="number" name="txtPrice" class="textfieldToClose form-control ml-2" style="width: 200px;" ></input>
                                                </div>
                                            </div>
                                            <div>
                                                <div id="saveAlt" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Confirm</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Please press the button below to Confirm.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="savealt<?php echo $pkgget ?>" class="btn btn-outline-danger btn-sm mt-2">Confirm</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-outline-danger btn-sm mt-2" data-toggle="modal" data-target="#saveAlt">Save</button>
                                                <!-- <button type="submit" name="savealt<?php echo $pkgget ?>" class="btn btn-outline-danger btn-sm mt-2">Save</button> -->
                                                <button type="submit" name="cancel" id="cancel" class="btn btn-outline-danger btn-sm mt-2">Cancel</button>
                                            </div>  
                                        </div>
                                        <div class="box-footer clearfix" style="padding-top: 10px;" style="padding-top: 10px;">
                                            <button class="btn btn-outline-danger btn-sm" id="add" >Add new part</button>
                                        </div>
                                    </div>
                                </form>
                                <?php
                            }
                            else{
                                    // header("Location: admin-modaltpkg.php?error");
                                echo "Error";
                            }
                            ?>
                            <br>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <br>
                </div>
                <!-- /.box -->
            </div>


        </div>


    </section>
</div>

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<script>
    var collection = document.getElementsByClassName('textfieldToClose');
    $('#add').click(function(){
        event.preventDefault();

        
        document.getElementById("hiddenDiv").style.display = "inline-block";
    });
    $('#cancel').click(function(){
        event.preventDefault();

        
        document.getElementById("hiddenDiv").style.display = "none";
    });
</script>
<?php
include_once '../../includes/footer.php';
?>
<!-- <input type="button" class="btn btn-outline-danger btn-sm" id="add1" value="Add new part" ></input>  -->
