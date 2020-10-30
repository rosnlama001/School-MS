<?php include("../include/header.php"); ?>

<div class="panel" id="faculty">
    <!-- faculty start -->
<div class="panel-row">
        <div class="panel-head">
        <div class="search_bar">
            
            <label for="search"><i class="fas fa-search-plus"></i></label>
            <input type="search" name="" id="search" placeholder="search by names" oninput="filter()">
        </div>  
            <h3>faculty Details  </h3>
            <a href="" class="addbtn" id="myBtn"><i class="fas fa-plus"></i> Add faculty</a>
        </div>
         <!-- The Modal -->
         <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
            <span class="close">&times;</span>
            <p>Some text in the Modal..</p>
            </div>

            </div>
            <!-- The Modal end-->
        <div class="panel-body">
        <div style="overflow-x:auto;">
                        <table id="mytbl">
                            <tr>
                                <th>sn</th>
                                <th>Faculty</th>
                                <th> Total courses</th>
                                <th>total students</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                            
                            <tr>
                                <td>1</td>
                                <td><a href="#" onclick="selectCourse(<?php echo 1 ?>)">IT info</a></td>
                                <td>2</td>
                                <td>6</td>
                                <td>
                                    <a href="" class="smBtn-s">Active</a>
                                    <!-- <a href="" class="smBtn-d">Deactive</a> -->
                                </td>
                                <td>
                                    <a href="" class="smBtn">Edit</a>
                                    <a href="" class="smBtn-d">Delete</a>
                                </td>
                            </tr>
                        </table>
             </div>
        </div>
    </div>
    <!-- faculty end -->
</div>

<div class="panel" id="courses">
    <!-- course started -->
    <a href="course.php" id="back"><i class="fas fa-arrow-left"></i></a>
    <div class="panel-row">
        <div class="panel-head">
        <div class="search_bar">
            <label for="search"><i class="fas fa-search-plus"></i></label>
            <input type="search" name="" id="search1" placeholder="search by names" oninput="filter1()">
        </div>  
            <h3>Course Details  </h3>
            <a href="" class="addbtn" id="myBtn"><i class="fas fa-plus"></i> Add Course</a>
        </div>
         <!-- The Modal -->
         <div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
<span class="close">&times;</span>
<p>Some text in the Modal..</p>
</div>

</div>
<!-- The Modal end-->
        <div class="panel-body">
        <div style="overflow-x:auto;">
                        <table id="mytbl1">
                            <tr>
                                <th>sn</th>
                                <th>Course</th>
                                <th>total books</th>
                                <th>total students</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td><a href="">Network</a></td>
                                <td>5</td>
                                <td>2</td>
                                <td>
                                    <a href="" class="smBtn-s">Active</a>
                                    <!-- <a href="" class="smBtn-d">Deactive</a> -->
                                </td>
                                <td>
                                    <a href="" class="smBtn">Edit</a>
                                    <a href="" class="smBtn-d">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><a href="">IOT</a></td>
                                <td>2</td>
                                <td>4</td>
                                <td>
                                    <!-- <a href="" class="smBtn-s">Active</a> -->
                                    <a href="" class="smBtn-d">Deactive</a>
                                </td>
                                <td>
                                    <a href="" class="smBtn">Edit</a>
                                    <a href="" class="smBtn-d">Delete</a>
                                </td>
                            </tr>
                            
                        </table>
             </div>
        </div>
    </div>
    <!-- course end  -->
</div>

<?php include("../include/footer.php"); ?>