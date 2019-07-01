<?php
session_start();
include '../../includes/restrictions.inc.php';
admin_protect();
include '../../includes/header.php';
include '../../includes/dbh.inc.php';
?>
<!-- Sidebar -->
<label href="#" class="list-group-item" style="width: auto;">Admin Panel
    <button class="btn" id="menu-toggle"><i class="fas fa-bars"></i></button>
</label>
<div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
            <a href="/BikeLabs/pages/admin/admindash.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
            <a href="/BikeLabs/pages/admin/admin-jobs.php" class="list-group-item list-group-item-action bg-light">Pending Jobs</a>
            <a href="/BikeLabs/pages/admin/admin-orders.php" class="list-group-item list-group-item-action bg-light">Pending Orders</a>
            <a href="/BikeLabs/pages/admin/admin-vendor.php" class="list-group-item list-group-item-action bg-light">Vendor management</a>
            <a href="/BikeLabs/pages/admin/admin-sales.php" class="list-group-item list-group-item-action bg-light">Sales</a>
            <a href="/BikeLabs/pages/admin/admin-bikes.php" class="list-group-item list-group-item-action bg-light">Add new Bikes</a>
            <a href="/BikeLabs/pages/admin/admin-parts.php" class="list-group-item list-group-item-action bg-light">Add new Parts</a>
            <a href="/BikeLabs/pages/admin/admin-bike-parts.php" class="list-group-item list-group-item-action bg-light">Bikes/Parts Posted</a>
            <a href="/BikeLabs/pages/admin/admin-modaltpkg.php" class="list-group-item list-group-item-action bg-light">Edit Mod/Alt packages</a>
        </div>
    </div>
    <section class="section modsection content content2" style="width: 100%;">
        <div class="container">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit Mod/Alt Packages</h3>
                </div>
            </div>
        </div>

        <div class="row pt-4" style="width: 100%;padding-left:5%">
            <!-- Left col -->
            <div class="col-sm-6 ">
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
                                if ($pkgget == 2) {
                                    $queryrow = "map_pkg_2";
                                }
                                if ($pkgget == 3) {
                                    $queryrow = "map_pkg_3";
                                }
                                if ($pkgget == 4) {
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
                                        while ($row = mysqli_fetch_assoc($result)) 
                                            {?>

                                                <div class="row pl-4 pt-1 pb-1 border" id="" style="width: 100%;">
                                                    <div class="altright">
                                                       <input type="text" value="<?php echo $row['map_name']; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose" name="pkgname<?php echo $row['map_id'] ?>"></input>
                                                   </div>
                                                   <div class="altright">
                                                    <input type="text" value="<?php echo $row['map_price'] ." Rs."; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose" name="pkgprice<?php echo $row['map_id'] ?>"></input>
                                                </div>
                                                <div class="altright">
                                                    <input type="hidden" name="pkg" value="<?php echo $pkgget?>">
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" name="remove<?php echo $pkgget ?>" value="<?php echo $row['map_id'] ?>" class="remove" >Remove</button> 
                                                </div>

                                            </div>
                                        <?php }
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
                                                    <input type="text" name="txtPrice" class="textfieldToClose form-control ml-2" style="width: 200px;" ></input>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit" name="save<?php echo $pkgget ?>" class="btn btn-outline-danger btn-sm mt-2">Save</button> -->
                                            </div>  
                                        </div>
                                        <div class="box-footer clearfix" style="padding-top: 10px;" style="padding-top: 10px;">
                                            <!-- <input type="hidden" name="count" value="<?php echo $rowcount; ?>"> -->
                                            <!-- <input type="submit" class="btn btn-outline-danger btn-sm" id="add<?php echo $pkgget ?>" name="add<?php echo $pkgget ?>" value="Add new part" ></input>  -->
                                            <button class="btn btn-outline-danger btn-sm" id="add" >Add new part</button>
                                        <!-- <button class="btn btn-outline-danger btn-sm" id="edit" >Edit</button>
                                            <button type="submit" class="btn btn-outline-danger btn-sm" id="save1" name="save" value="<?php echo $row['map_id'] ?>" style="display: none" class="remove" >Save</button> -->

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
                                <h5 class="box-title"><b>Package <?php echo $pkgget; ?></b></h5>
                                <br><br>
                                <?php
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) 
                                    {?>
                                        <div class="row pl-4 pt-1 pb-1 border" style="width: 100%;">
                                            <div class="altright">
                                               <input type="text" value="<?php echo $row['map_name']; ?>" style="background-color: transparent;border: none" class="textfieldToClose"></input>
                                           </div>
                                           <div class="altright">
                                            <input type="text" value="<?php echo $row['map_price']; ?>" style="background-color: transparent;border: none" class="textfieldToClose"></input>
                                        </div>
                                        <div class="altright">
                                            <input type="submit" class="btn btn-outline-danger btn-sm" id="remove<?php echo $pkgget ?>" value="Remove" ></input> 
                                        </div>
                                    </div>
                                <?php }
                                ?>
                                <div class="box-footer clearfix" style="padding-top: 10px;" style="padding-top: 10px;">
                                    <form action="/BikeLabs/includes/admin-pkg-process.inc.php" method="post">
                                        <input type="submit" class="btn btn-outline-danger btn-sm" id="add<?php echo $pkgget ?>" value="Add new part" ></input> 
                                        <input type="submit" class="btn btn-outline-danger btn-sm" id="edit<?php echo $pkgget ?>" value="Edit" ></input> 
                                    </form>
                                </div>
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
        // var mydiv = document.getElementById("fillDiv");
        // var newcontent = document.createElement('div');
        
        // newcontent.innerHTML = ["<br>"+
        // "<div>"+
        // "<div class='row pl-4 pt-1 pb-1 border' style='width: 100%;'>"+
        //                                         '<div class="altright">'+
        //                                          '<input type="text"  style="background-color: transparent;" class="textfieldToClose" name="pkgname14">'+
        //                                      '</div>'+
        //                                      '<div class="altright">'+
        //                                         '<input type="text"  style="background-color: transparent;" class="textfieldToClose" name="pkgprice14">'+
        //                                     '</div>'+
        //                                     '<div class="altright">'+
        //                                         '<input type="hidden" name="pkg" value="1">'+
        //                                         '<button type="submit" class="btn btn-outline-danger btn-sm" name="remove1" value="14">Remove</button> '+
        //                                     '</div>'+
        //                                 '</div>'];
        //     while (newcontent.firstChild) {
        //         mydiv.appendChild(newcontent.firstChild);
        //     }
        // event.preventDefault()
        
        // for(var i = 0; i < collection.length; i++) {
        //     collection[i].style.border = '1px black solid' ? '' : '1px black solid';
        //     collection[i].disabled = false
        // }
        // document.getElementById("save1").style.display = "inline-block";
        // document.getElementById('edit').setAttribute("disabled","disabled");
    });
</script>
<?php
include_once '../../includes/footer.php';
?>
<!-- <input type="button" class="btn btn-outline-danger btn-sm" id="add1" value="Add new part" ></input>  -->
