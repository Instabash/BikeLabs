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
                                            <input type="text" value="<?php echo $row['map_name']; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose"></input>
                                     </div>
                                     <div class="altright">
                                        <input type="text" value="<?php echo $row['map_price']; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose"></input>
                                    </div>
                                </div>
                            <?php }
                            ?>
                            <div class="box-footer clearfix" style="padding-top: 10px;" style="padding-top: 10px;">
                                <form action="admin-edit.php?pkgmod=1" method="post">
                                    <input type="submit" class="btn btn-outline-danger btn-sm" id="edit1" value="Edit" ></input> 
                                </form>
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
                                         <input type="text" value="<?php echo $row['map_name']; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose2"></input>
                                     </div>
                                     <div class="altright">
                                        <input type="text" value="<?php echo $row['map_price']; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose2"></input>
                                    </div>
                                </div>
                            <?php }
                            ?>
                            <div class="box-footer clearfix" style="padding-top: 10px;">
                                <form action="admin-edit.php?pkgmod=2" method="post">
                                    <input type="submit" class="btn btn-outline-danger btn-sm" id="edit2" value="Edit" ></input>        
                                </form>
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
                                         <input type="text" value="<?php echo $row['map_name']; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose3"></input>
                                     </div>
                                     <div class="altright">
                                        <input type="text" value="<?php echo $row['map_price']; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose3"></input>
                                    </div>
                                </div>
                            <?php }
                            ?>
                            <div class="box-footer clearfix" style="padding-top: 10px;">
                                <form action="admin-edit.php?pkgmod=3" method="post">
                                    <input type="submit" class="btn btn-outline-danger btn-sm" id="edit3" value="Edit" ></input>   
                                </form>
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
                                         <input type="text" value="<?php echo $row['map_name']; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose4"></input>
                                     </div>
                                     <div class="altright">
                                        <input type="text" value="<?php echo $row['map_price']; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose4"></input>
                                    </div>
                                </div>
                            <?php }
                            ?>
                            <div class="box-footer clearfix" style="padding-top: 10px;">
                                <form action="admin-edit.php?pkgmod=4" method="post">
                                    <input type="submit" class="btn btn-outline-danger btn-sm" id="edit4" value="Edit" ></input>  
                                </form>
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
                                     <input type="text" value="<?php echo $row['map_name']; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose5"></input>
                                 </div>
                                 <div class="altright">
                                    <input type="text" value="<?php echo $row['map_price']; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose5"></input>
                                </div>
                            </div>
                        <?php }
                        ?>
                        <div class="box-footer clearfix" style="padding-top: 10px;">
                            <form action="admin-edit.php?pkgalt=1" method="post">
                                <input type="submit" class="btn btn-outline-danger btn-sm" id="edit5" value="Edit" ></input>  
                            </form>
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
                                     <input type="text" value="<?php echo $row['map_name']; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose6"></input>
                                 </div>
                                 <div class="altright">
                                    <input type="text" value="<?php echo $row['map_price']; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose6"></input>
                                </div>
                            </div>
                        <?php }
                        ?>
                        <div class="box-footer clearfix" style="padding-top: 10px;">
                            <form action="admin-edit.php?pkgalt=1" method="post">
                                <input type="submit" class="btn btn-outline-danger btn-sm" id="edit6" value="Edit" ></input>  
                            </form>
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
                                     <input type="text" value="<?php echo $row['map_name']; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose7"></input>
                                 </div>
                                 <div class="altright">
                                    <input type="text" value="<?php echo $row['map_price']; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose7"></input>
                                </div>
                            </div>
                        <?php }
                        ?>
                        <div class="box-footer clearfix" style="padding-top: 10px;">
                            <form action="admin-edit.php?pkgalt=3" method="post">
                                <input type="submit" class="btn btn-outline-danger btn-sm" id="edit7" value="Edit" ></input>   
                            </form>
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
                                     <input type="text" value="<?php echo $row['map_name']; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose8"></input>
                                 </div>
                                 <div class="altright">
                                    <input type="text" value="<?php echo $row['map_price']; ?>" disabled style="background-color: transparent;border: none" class="textfieldToClose8"></input>
                                </div>
                            </div>
                        <?php }
                        ?>
                        <div class="box-footer clearfix" style="padding-top: 10px;">
                            <form action="admin-edit.php?pkgalt=4" method="post">
                                <input type="submit" class="btn btn-outline-danger btn-sm" id="edit8" value="Edit" ></input>  
                            </form>
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
            <!-- <div id="table" class="table-editable">
              <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
              <table class="table table-bordered table-responsive-md table-striped text-center">
                <thead>
                  <tr>
                    <th class="text-center">Person Name</th>
                    <th class="text-center">Age</th>
                    <th class="text-center">Company Name</th>
                    <th class="text-center">Country</th>
                    <th class="text-center">City</th>
                    <th class="text-center">Sort</th>
                    <th class="text-center">Remove</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
                    <td class="pt-3-half" contenteditable="true">30</td>
                    <td class="pt-3-half" contenteditable="true">Deepends</td>
                    <td class="pt-3-half" contenteditable="true">Spain</td>
                    <td class="pt-3-half" contenteditable="true">Madrid</td>
                    <td class="pt-3-half">
                      <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
                      <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
                    </td>
                    <td>
                      <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                    </td>
                  </tr>
                  <tr>
                    <td class="pt-3-half" contenteditable="true">Guerra Cortez</td>
                    <td class="pt-3-half" contenteditable="true">45</td>
                    <td class="pt-3-half" contenteditable="true">Insectus</td>
                    <td class="pt-3-half" contenteditable="true">USA</td>
                    <td class="pt-3-half" contenteditable="true">San Francisco</td>
                    <td class="pt-3-half">
                      <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
                      <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
                    </td>
                    <td>
                      <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                    </td>
                  </tr>
                  <tr>
                    <td class="pt-3-half" contenteditable="true">Guadalupe House</td>
                    <td class="pt-3-half" contenteditable="true">26</td>
                    <td class="pt-3-half" contenteditable="true">Isotronic</td>
                    <td class="pt-3-half" contenteditable="true">Germany</td>
                    <td class="pt-3-half" contenteditable="true">Frankfurt am Main</td>
                    <td class="pt-3-half">
                      <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
                      <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
                    </td>
                    <td>
                      <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                    </td>
                  </tr>
                  <tr class="hide">
                    <td class="pt-3-half" contenteditable="true">Elisa Gallagher</td>
                    <td class="pt-3-half" contenteditable="true">31</td>
                    <td class="pt-3-half" contenteditable="true">Portica</td>
                    <td class="pt-3-half" contenteditable="true">United Kingdom</td>
                    <td class="pt-3-half" contenteditable="true">London</td>
                    <td class="pt-3-half">
                      <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
                      <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
                    </td>
                    <td>
                      <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div id="table" class="table-editable">
              <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
              <table class="table table-bordered table-responsive-md table-striped text-center">
                <thead>
                  <tr>
                    <th class="text-center">Person Name</th>
                    <th class="text-center">Age</th>
                    <th class="text-center">Company Name</th>
                    <th class="text-center">Country</th>
                    <th class="text-center">City</th>
                    <th class="text-center">Sort</th>
                    <th class="text-center">Remove</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
                    <td class="pt-3-half" contenteditable="true">30</td>
                    <td class="pt-3-half" contenteditable="true">Deepends</td>
                    <td class="pt-3-half" contenteditable="true">Spain</td>
                    <td class="pt-3-half" contenteditable="true">Madrid</td>
                    <td class="pt-3-half">
                      <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
                      <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
                    </td>
                    <td>
                      <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                    </td>
                  </tr>
                  <tr>
                    <td class="pt-3-half" contenteditable="true">Guerra Cortez</td>
                    <td class="pt-3-half" contenteditable="true">45</td>
                    <td class="pt-3-half" contenteditable="true">Insectus</td>
                    <td class="pt-3-half" contenteditable="true">USA</td>
                    <td class="pt-3-half" contenteditable="true">San Francisco</td>
                    <td class="pt-3-half">
                      <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
                      <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
                    </td>
                    <td>
                      <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                    </td>
                  </tr>
                  <tr>
                    <td class="pt-3-half" contenteditable="true">Guadalupe House</td>
                    <td class="pt-3-half" contenteditable="true">26</td>
                    <td class="pt-3-half" contenteditable="true">Isotronic</td>
                    <td class="pt-3-half" contenteditable="true">Germany</td>
                    <td class="pt-3-half" contenteditable="true">Frankfurt am Main</td>
                    <td class="pt-3-half">
                      <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
                      <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
                    </td>
                    <td>
                      <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                    </td>
                  </tr>
                  <tr class="hide">
                    <td class="pt-3-half" contenteditable="true">Elisa Gallagher</td>
                    <td class="pt-3-half" contenteditable="true">31</td>
                    <td class="pt-3-half" contenteditable="true">Portica</td>
                    <td class="pt-3-half" contenteditable="true">United Kingdom</td>
                    <td class="pt-3-half" contenteditable="true">London</td>
                    <td class="pt-3-half">
                      <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
                      <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
                    </td>
                    <td>
                      <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                    </td>
                  </tr>
                </tbody>
              </table>
          </div> -->
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
    // var collection = document.getElementsByClassName('textfieldToClose');
    // var collection2 = document.getElementsByClassName('textfieldToClose2');
    // var collection3 = document.getElementsByClassName('textfieldToClose3');
    // var collection4 = document.getElementsByClassName('textfieldToClose4');
    // var collection5 = document.getElementsByClassName('textfieldToClose5');
    // var collection6 = document.getElementsByClassName('textfieldToClose6');
    // var collection7 = document.getElementsByClassName('textfieldToClose7');
    // var collection8 = document.getElementsByClassName('textfieldToClose8');
    // $('#edit').click(function(){
    //     $('.textfieldToClose').attr('enable');
    //     $(".textfieldToClose2").prop('disabled', true);

    //     for(var i = 0; i < collection.length; ++i) {
    //         collection[i].style.border = '1px black solid' ? '' : '1px black solid';
    //     }
    //     for(var i = 0; i < collection2.length; ++i) {
    //         collection2[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection3.length; ++i) {
    //         collection3[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection4.length; ++i) {
    //         collection4[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection5.length; ++i) {
    //         collection5[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection6.length; ++i) {
    //         collection6[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection7.length; ++i) {
    //         collection7[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection8.length; ++i) {
    //         collection8[i].style.border = 'none';
    //     }
    //     document.getElementById("save1").style.display = "inline-block  ";
    //     document.getElementById("save2").style.display = "none";
    //     document.getElementById("save3").style.display = "none";
    //     document.getElementById("save4").style.display = "none";
    //     document.getElementById("save5").style.display = "none";
    //     document.getElementById("save6").style.display = "none";
    //     document.getElementById("save7").style.display = "none";
    //     document.getElementById("save8").style.display = "none";
    // });
    // $('#enable2').click(function(){
    //     $('.textfieldToClose2').attr('enable');
    //     for(var i = 0; i < collection2.length; ++i) {
    //         collection2[i].style.border = '1px black solid' ? '' : '1px black solid';
    //     }
    //     for(var i = 0; i < collection.length; ++i) {
    //         collection[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection3.length; ++i) {
    //         collection3[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection4.length; ++i) {
    //         collection4[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection5.length; ++i) {
    //         collection5[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection6.length; ++i) {
    //         collection6[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection7.length; ++i) {
    //         collection7[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection8.length; ++i) {
    //         collection8[i].style.border = 'none';
    //     }
    //     document.getElementById("save2").style.display = "inline-block  ";
    //     document.getElementById("save1").style.display = "none";
    //     document.getElementById("save3").style.display = "none";
    //     document.getElementById("save4").style.display = "none";
    //     document.getElementById("save5").style.display = "none";
    //     document.getElementById("save6").style.display = "none";
    //     document.getElementById("save7").style.display = "none";
    //     document.getElementById("save8").style.display = "none";
    // });
    // $('#enable3').click(function(){
    //     $('.textfieldToClose3').attr('enable');
    //     for(var i = 0; i < collection3.length; ++i) {
    //         collection3[i].style.border = '1px black solid' ? '' : '1px black solid';
    //     }
    //     for(var i = 0; i < collection2.length; ++i) {
    //         collection2[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection.length; ++i) {
    //         collection[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection4.length; ++i) {
    //         collection4[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection5.length; ++i) {
    //         collection5[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection6.length; ++i) {
    //         collection6[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection7.length; ++i) {
    //         collection7[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection8.length; ++i) {
    //         collection8[i].style.border = 'none';
    //     }
    //     document.getElementById("save3").style.display = "inline-block  ";
    //     document.getElementById("save2").style.display = "none";
    //     document.getElementById("save1").style.display = "none";
    //     document.getElementById("save4").style.display = "none";
    //     document.getElementById("save5").style.display = "none";
    //     document.getElementById("save6").style.display = "none";
    //     document.getElementById("save7").style.display = "none";
    //     document.getElementById("save8").style.display = "none";
    // });
    // $('#enable4').click(function(){
    //     $('.textfieldToClose4').attr('enable');
    //     for(var i = 0; i < collection4.length; ++i) {
    //         collection4[i].style.border = '1px black solid' ? '' : '1px black solid';
    //     }
    //     for(var i = 0; i < collection2.length; ++i) {
    //         collection2[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection3.length; ++i) {
    //         collection3[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection.length; ++i) {
    //         collection[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection5.length; ++i) {
    //         collection5[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection6.length; ++i) {
    //         collection6[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection7.length; ++i) {
    //         collection7[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection8.length; ++i) {
    //         collection8[i].style.border = 'none';
    //     }
    //     document.getElementById("save4").style.display = "inline-block  ";
    //     document.getElementById("save2").style.display = "none";
    //     document.getElementById("save3").style.display = "none";
    //     document.getElementById("save1").style.display = "none";
    //     document.getElementById("save5").style.display = "none";
    //     document.getElementById("save6").style.display = "none";
    //     document.getElementById("save7").style.display = "none";
    //     document.getElementById("save8").style.display = "none";
    // });
    // $('#enable5').click(function(){
    //     $('.textfieldToClose5').attr('enable');
    //     for(var i = 0; i < collection5.length; ++i) {
    //         collection5[i].style.border = '1px black solid' ? '' : '1px black solid';
    //     }
    //     for(var i = 0; i < collection2.length; ++i) {
    //         collection2[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection3.length; ++i) {
    //         collection3[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection4.length; ++i) {
    //         collection4[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection.length; ++i) {
    //         collection[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection6.length; ++i) {
    //         collection6[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection7.length; ++i) {
    //         collection7[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection8.length; ++i) {
    //         collection8[i].style.border = 'none';
    //     }
    //     document.getElementById("save5").style.display = "inline-block  ";
    //     document.getElementById("save2").style.display = "none";
    //     document.getElementById("save3").style.display = "none";
    //     document.getElementById("save4").style.display = "none";
    //     document.getElementById("save1").style.display = "none";
    //     document.getElementById("save6").style.display = "none";
    //     document.getElementById("save7").style.display = "none";
    //     document.getElementById("save8").style.display = "none";
    // });
    // $('#enable6').click(function(){
    //     $('.textfieldToClose6').attr('enable');
    //     for(var i = 0; i < collection6.length; ++i) {
    //         collection6[i].style.border = '1px black solid' ? '' : '1px black solid';
    //     }
    //     for(var i = 0; i < collection2.length; ++i) {
    //         collection2[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection3.length; ++i) {
    //         collection3[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection4.length; ++i) {
    //         collection4[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection5.length; ++i) {
    //         collection5[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection.length; ++i) {
    //         collection[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection7.length; ++i) {
    //         collection7[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection8.length; ++i) {
    //         collection8[i].style.border = 'none';
    //     }
    //     document.getElementById("save6").style.display = "inline-block  ";
    //     document.getElementById("save2").style.display = "none";
    //     document.getElementById("save3").style.display = "none";
    //     document.getElementById("save4").style.display = "none";
    //     document.getElementById("save5").style.display = "none";
    //     document.getElementById("save1").style.display = "none";
    //     document.getElementById("save7").style.display = "none";
    //     document.getElementById("save8").style.display = "none";
    // });
    // $('#enable7').click(function(){
    //     $('.textfieldToClose7').attr('enable');
    //     for(var i = 0; i < collection7.length; ++i) {
    //         collection7[i].style.border = '1px black solid' ? '' : '1px black solid';
    //     }
    //     for(var i = 0; i < collection2.length; ++i) {
    //         collection2[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection3.length; ++i) {
    //         collection3[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection4.length; ++i) {
    //         collection4[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection5.length; ++i) {
    //         collection5[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection6.length; ++i) {
    //         collection6[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection.length; ++i) {
    //         collection[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection8.length; ++i) {
    //         collection8[i].style.border = 'none';
    //     }
    //     document.getElementById("save7").style.display = "inline-block  ";
    //     document.getElementById("save2").style.display = "none";
    //     document.getElementById("save3").style.display = "none";
    //     document.getElementById("save4").style.display = "none";
    //     document.getElementById("save5").style.display = "none";
    //     document.getElementById("save6").style.display = "none";
    //     document.getElementById("save1").style.display = "none";
    //     document.getElementById("save8").style.display = "none";
    // });
    // $('#enable8').click(function(){
    //     $('.textfieldToClose8').attr('enable');
    //     for(var i = 0; i < collection8.length; ++i) {
    //         collection8[i].style.border = '1px black solid' ? '' : '1px black solid';
    //     }
    //     for(var i = 0; i < collection2.length; ++i) {
    //         collection2[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection3.length; ++i) {
    //         collection3[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection4.length; ++i) {
    //         collection4[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection5.length; ++i) {
    //         collection5[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection6.length; ++i) {
    //         collection6[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection7.length; ++i) {
    //         collection7[i].style.border = 'none';
    //     }
    //     for(var i = 0; i < collection.length; ++i) {
    //         collection[i].style.border = 'none';
    //     }
    //     document.getElementById("save8").style.display = "inline-block  ";
    //     document.getElementById("save2").style.display = "none";
    //     document.getElementById("save3").style.display = "none";
    //     document.getElementById("save4").style.display = "none";
    //     document.getElementById("save5").style.display = "none";
    //     document.getElementById("save6").style.display = "none";
    //     document.getElementById("save7").style.display = "none";
    //     document.getElementById("save1").style.display = "none";
    // });
</script>
<?php
include_once '../../includes/footer.php';
?>
