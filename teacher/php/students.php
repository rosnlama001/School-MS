<?php include("../include/header.php"); ?>

<div class="panel">
    <div class="panel-row">
        <div class="panel-head">
            <h3>Student Details</h3>
            <div class="line">
                <select name="" id="filter">
                    <option value="">Filter</option>
                    <option value="Class">Class</option>
                    <option value="Course">Course</option>
                    <option value="All">All</option>
                </select>
            <a href="" class="addbtn" id="myBtn"><i class="fas fa-plus"></i> Add Students</a>
            </div>
        </div>
        <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content" style="overflow-y:auto;"> 
                <div class="modal-head">
                    <h4>Student Details</h4>
                    <span class="close">&times;</span>
                </div> 
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form_group">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" class="form_control" placeholder="Enter Your Last Name">
                            <label for="name">First Name</label>
                            <input type="text" name="fname" id="fname" class="form_control" placeholder="Enter Your First Name">
                        </div>
                    </form>
                </div> 
                <div class="modal-footer">
                    <input type="button" class="btn-s" value="send">
                </div> 
                
                </div>

            </div>
            <!-- The Modal end-->
        <div class="panel-body">
                <div style="overflow-x:auto;">
                        <table>
                            <tr>
                                <th>sn</th>
                                <th>username</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>address</th>
                                <th>action</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td><a href="">Lama</a></td>
                                <td>abc@gmail.com</td>
                                <td>098123355</td>
                                <td>adjfhadhakhdfjjjjahdkjhakjhdjh</td>
                                <td>
                                    <a href="" class="smBtn">Edit</a>
                                    <a href="" class="smBtn-d">Delete</a>
                                </td>
                            </tr>
                            
                        </table>
             </div>
        </div>
    </div>
</div>

<?php include("../include/footer.php"); ?>