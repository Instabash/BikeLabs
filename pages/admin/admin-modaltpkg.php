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
                    <div class="box-header with-border">
                        <h3 class="box-title">Current Modification packages</h3>
                    </div><br>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form>
                            <div class="table-responsive pl-4">
                                <h5 class="box-title"><b>Package 1</b></h5>
                                <br><br>
                                <?php
                                $sql = "SELECT * FROM modaltpackages WHERE map_pkg_1 = 1";
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
                                            <button class="btn btn-outline-danger btn-sm">Remove</button>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                                <div class="box-footer clearfix" style="padding-top: 10px;" style="padding-top: 10px;">
                                    <a href="/BikeLabs/pages/admin/admin-orders.php" class="btn btn-sm btn-outline-danger">Add new part</a>
                                    <input type="button" class="btn btn-outline-danger btn-sm" id="enable" value="Edit" ></input> 
                                    <input type="button" class="btn btn-outline-danger btn-sm" style="display: none;" id="save1" value="Save" ></input>               
                                </div>
                                <br>
                            </div>
                            
                            <div class="table-responsive pl-4 ">
                                <h5 class="box-title"><b>Package 2</b></h5>
                                <br><br>
                                <?php
                                $sql = "SELECT * FROM modaltpackages WHERE map_pkg_2 = 1";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) 
                                    {?>
                                        <div class="row pl-4 pt-1 pb-1 border" style="width: 100%;">
                                            <div class="altright">
                                               <input type="text" value="<?php echo $row['map_name']; ?>" style="background-color: transparent;border: none" class="textfieldToClose2"></input>
                                           </div>
                                           <div class="altright">
                                            <input type="text" value="<?php echo $row['map_price']; ?>" style="background-color: transparent;border: none" class="textfieldToClose2"></input>
                                        </div>
                                        <div class="altright">
                                            <button class="btn btn-outline-danger btn-sm">Remove</button>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                                <div class="box-footer clearfix" style="padding-top: 10px;">
                                    <a href="/BikeLabs/pages/admin/admin-orders.php" class="btn btn-sm btn-outline-danger">Add new part</a>
                                    <input type="button" class="btn btn-outline-danger btn-sm" id="enable2" value="Edit" ></input>        
                                    <input type="button" class="btn btn-outline-danger btn-sm" style="display: none;" id="save2" value="Save" ></input>
                                </div>
                                <br>
                            </div>

                            <div class="table-responsive pl-4">
                                <h5 class="box-title"><b>Package 3</b></h5>
                                <br><br>
                                <?php
                                $sql = "SELECT * FROM modaltpackages WHERE map_pkg_3 = 1";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) 
                                    {?>
                                        <div class="row pl-4 pt-1 pb-1 border" style="width: 100%;">
                                            <div class="altright">
                                               <input type="text" value="<?php echo $row['map_name']; ?>" style="background-color: transparent;border: none" class="textfieldToClose3"></input>
                                           </div>
                                           <div class="altright">
                                            <input type="text" value="<?php echo $row['map_price']; ?>" style="background-color: transparent;border: none" class="textfieldToClose3"></input>
                                        </div>
                                        <div class="altright">
                                            <button class="btn btn-outline-danger btn-sm">Remove</button>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                                <div class="box-footer clearfix" style="padding-top: 10px;">
                                    <a href="/BikeLabs/pages/admin/admin-orders.php" class="btn btn-sm btn-outline-danger">Add new part</a>
                                    <input type="button" class="btn btn-outline-danger btn-sm" id="enable3" value="Edit" ></input>   
                                    <input type="button" class="btn btn-outline-danger btn-sm" style="display: none;" id="save3" value="Save" ></input>     
                                </div>
                                <br>
                            </div>

                            <div class="table-responsive pl-4">
                                <h5 class="box-title">Package 4</h5>
                                <br><br>
                                <?php
                                $sql = "SELECT * FROM modaltpackages WHERE map_pkg_4 = 1";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) 
                                    {?>
                                        <div class="row pl-4 pt-1 pb-1 border" style="width: 100%;">
                                            <div class="altright">
                                               <input type="text" value="<?php echo $row['map_name']; ?>" style="background-color: transparent;border: none" class="textfieldToClose4"></input>
                                           </div>
                                           <div class="altright">
                                            <input type="text" value="<?php echo $row['map_price']; ?>" style="background-color: transparent;border: none" class="textfieldToClose4"></input>
                                        </div>
                                        <div class="altright">
                                            <button class="btn btn-outline-danger btn-sm">Remove</button>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                                <div class="box-footer clearfix" style="padding-top: 10px;">
                                    <a href="/BikeLabs/pages/admin/admin-orders.php" class="btn btn-sm btn-outline-danger">Add new part</a>
                                    <input type="button" class="btn btn-outline-danger btn-sm" id="enable4" value="Edit" ></input>  
                                    <input type="button" class="btn btn-outline-danger btn-sm" style="display: none;" id="save4" value="Save" ></input>      
                                </div>
                                <br>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                    <br>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-sm-6 ">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Current Alteration packages</h3>
                    </div><br>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive pl-4">
                            <h5 class="box-title"><b>Package 1</b></h5>
                            <br><br>
                            <?php
                            $sql = "SELECT * FROM modaltpackages WHERE map_pkg_1 = 1";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) 
                                {?>
                                    <div class="row pl-4 pt-1 pb-1 border" style="width: 100%;">
                                        <div class="altright">
                                           <input type="text" value="<?php echo $row['map_name']; ?>" style="background-color: transparent;border: none" class="textfieldToClose5"></input>
                                       </div>
                                       <div class="altright">
                                        <input type="text" value="<?php echo $row['map_price']; ?>" style="background-color: transparent;border: none" class="textfieldToClose5"></input>
                                    </div>
                                    
                                    <div class="altright">
                                        <button class="btn btn-outline-danger btn-sm">Remove</button>
                                    </div>
                                </div>
                            <?php }
                            ?>
                            <div class="box-footer clearfix" style="padding-top: 10px;">
                                <a href="/BikeLabs/pages/admin/admin-orders.php" class="btn btn-sm btn-outline-danger">Add new part</a>
                                <input type="button" class="btn btn-outline-danger btn-sm" id="enable5" value="Edit" ></input>  
                                <input type="button" class="btn btn-outline-danger btn-sm" style="display: none;" id="save5" value="Save" ></input>      
                            </div>
                            <br>
                        </div>
                        
                        <div class="table-responsive pl-4 ">
                            <h5 class="box-title"><b>Package 2</b></h5>
                            <br><br>
                            <?php
                            $sql = "SELECT * FROM modaltpackages WHERE map_pkg_2 = 1";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) 
                                {?>
                                    <div class="row pl-4 pt-1 pb-1 border" style="width: 100%;">
                                        <div class="altright">
                                           <input type="text" value="<?php echo $row['map_name']; ?>" style="background-color: transparent;border: none" class="textfieldToClose6"></input>
                                       </div>
                                       <div class="altright">
                                        <input type="text" value="<?php echo $row['map_price']; ?>" style="background-color: transparent;border: none" class="textfieldToClose6"></input>
                                    </div>
                                    
                                    <div class="altright">
                                        <button class="btn btn-outline-danger btn-sm">Remove</button>
                                    </div>
                                </div>
                            <?php }
                            ?>
                            <div class="box-footer clearfix" style="padding-top: 10px;">
                                <a href="/BikeLabs/pages/admin/admin-orders.php" class="btn btn-sm btn-outline-danger">Add new part</a>
                                <input type="button" class="btn btn-outline-danger btn-sm" id="enable6" value="Edit" ></input>  
                                <input type="button" class="btn btn-outline-danger btn-sm" style="display: none;" id="save6" value="Save" ></input>      
                            </div>
                            <br>
                        </div>

                        <div class="table-responsive pl-4">
                            <h5 class="box-title"><b>Package 3</b></h5>
                            <br><br>
                            <?php
                            $sql = "SELECT * FROM modaltpackages WHERE map_pkg_3 = 1";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) 
                                {?>
                                    <div class="row pl-4 pt-1 pb-1 border" style="width: 100%;">
                                        <div class="altright">
                                           <input type="text" value="<?php echo $row['map_name']; ?>" style="background-color: transparent;border: none" class="textfieldToClose7"></input>
                                       </div>
                                       <div class="altright">
                                        <input type="text" value="<?php echo $row['map_price']; ?>" style="background-color: transparent;border: none" class="textfieldToClose7"></input>
                                    </div>
                                    
                                    <div class="altright">
                                        <button class="btn btn-outline-danger btn-sm">Remove</button>
                                    </div>
                                </div>
                            <?php }
                            ?>
                            <div class="box-footer clearfix" style="padding-top: 10px;">
                                <a href="/BikeLabs/pages/admin/admin-orders.php" class="btn btn-sm btn-outline-danger">Add new part</a>
                                <input type="button" class="btn btn-outline-danger btn-sm" id="enable7" value="Edit" ></input>   
                                <input type="button" class="btn btn-outline-danger btn-sm" style="display: none;" id="save7" value="Save" ></input>     
                            </div>
                            <br>
                        </div>

                        <div class="table-responsive pl-4">
                            <h5 class="box-title">Package 4</h5>
                            <br><br>
                            <?php
                            $sql = "SELECT * FROM modaltpackages WHERE map_pkg_4 = 1";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) 
                                {?>
                                    <div class="row pl-4 pt-1 pb-1 border" style="width: 100%;">
                                        <div class="altright">
                                           <input type="text" value="<?php echo $row['map_name']; ?>" style="background-color: transparent;border: none" class="textfieldToClose8"></input>
                                       </div>
                                       <div class="altright">
                                        <input type="text" value="<?php echo $row['map_price']; ?>" style="background-color: transparent;border: none" class="textfieldToClose8"></input>
                                    </div>
                                    
                                    <div class="altright">
                                        <button class="btn btn-outline-danger btn-sm">Remove</button>
                                    </div>
                                </div>
                            <?php }
                            ?>
                            <div class="box-footer clearfix" style="padding-top: 10px;">
                                <a href="/BikeLabs/pages/admin/admin-orders.php" class="btn btn-sm btn-outline-danger">Add new part</a>
                                <input type="button" class="btn btn-outline-danger btn-sm" id="enable8" value="Edit" ></input>  
                                <input type="button" class="btn btn-outline-danger btn-sm" style="display: none;" id="save8" value="Save" ></input>      
                            </div>
                            <br>
                        </div>

                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <br>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->


            <!-- /.col -->
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
    $('#enable').click(function(){
        $('.textfieldToClose').attr('enable');
        var collection = document.getElementsByClassName('textfieldToClose');
        for(var i = 0; i < collection.length; ++i) {
            collection[i].style.border = '1px black solid' ? '' : '1px black solid';
        }
        document.getElementById("save1").style.display = "inline-block  ";
    });
    $('#enable2').click(function(){
        $('.textfieldToClose2').attr('enable');
        var collection = document.getElementsByClassName('textfieldToClose2');
        for(var i = 0; i < collection.length; ++i) {
            collection[i].style.border = '1px black solid' ? '' : '1px black solid';
        }
        document.getElementById("save2").style.display = "inline-block  ";
    });
    $('#enable3').click(function(){
        $('.textfieldToClose3').attr('enable');
        var collection = document.getElementsByClassName('textfieldToClose3');
        for(var i = 0; i < collection.length; ++i) {
            collection[i].style.border = '1px black solid' ? '' : '1px black solid';
        }
        document.getElementById("save3").style.display = "inline-block  ";
    });
    $('#enable4').click(function(){
        $('.textfieldToClose4').attr('enable');
        var collection = document.getElementsByClassName('textfieldToClose4');
        for(var i = 0; i < collection.length; ++i) {
            collection[i].style.border = '1px black solid' ? '' : '1px black solid';
        }
        document.getElementById("save4").style.display = "inline-block  ";
    });
    $('#enable5').click(function(){
        $('.textfieldToClose5').attr('enable');
        var collection = document.getElementsByClassName('textfieldToClose5');
        for(var i = 0; i < collection.length; ++i) {
            collection[i].style.border = '1px black solid' ? '' : '1px black solid';
        }
        document.getElementById("save5").style.display = "inline-block  ";
    });
    $('#enable6').click(function(){
        $('.textfieldToClose6').attr('enable');
        var collection = document.getElementsByClassName('textfieldToClose6');
        for(var i = 0; i < collection.length; ++i) {
            collection[i].style.border = '1px black solid' ? '' : '1px black solid';
        }
        document.getElementById("save6").style.display = "inline-block  ";
    });
    $('#enable7').click(function(){
        $('.textfieldToClose7').attr('enable');
        var collection = document.getElementsByClassName('textfieldToClose7');
        for(var i = 0; i < collection.length; ++i) {
            collection[i].style.border = '1px black solid' ? '' : '1px black solid';
        }
        document.getElementById("save7").style.display = "inline-block  ";
    });
    $('#enable8').click(function(){
        $('.textfieldToClose8').attr('enable');
        var collection = document.getElementsByClassName('textfieldToClose8');
        for(var i = 0; i < collection.length; ++i) {
            collection[i].style.border = '1px black solid' ? '' : '1px black solid';
        }
        document.getElementById("save8").style.display = "inline-block  ";
    });
</script>
<?php
include_once '../../includes/footer.php';
?>
