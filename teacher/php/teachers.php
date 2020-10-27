<?php include("../include/header.php"); ?>

<div class="panel">
    <div class="panel-row">
        <div class="panel-head">
            <h3>Teachers Details</h3>
            <div class="line">
                <select name="" id="filter">
                    <option value="">Filter</option>
                    <option value="Class">Class</option>
                    <option value="Course">Course</option>
                    <option value="All">All</option>
                </select>
            <a href="" class="addbtn" id="myBtn"><i class="fas fa-plus"></i> Add Teacher</a>
            </div>
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