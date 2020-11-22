<?php 
// session_start();
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
// query object end--------------
$facultyRow = $obj->get_data('faculty');
$courseRow = $obj->get_data('course');
// print_r($courseRow);
?>
<div class="panel">
    <div class="panel-row">
        <div class="panel-head">
        <div class="search_bar">
            <label for="search"><i class="fas fa-search-plus"></i></label>
            <input type="search" name="" id="search" placeholder="search by Faculty names" oninput="filter()">
        </div> 
            <h3>Faculty Details</h3>
            <div class="line">
            <button class="addbtn" id="myBtn"><i class="fas fa-plus"></i> Add Faculty</button>
            </div>
        </div>
        <!-- The Modal of exam category -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content" style="overflow-y:auto;"> 
                <div class="modal-head">
                    <h4>Student Details</h4>
                    <span class="close">&times;</span>
                </div> 
                <form action="#" method="post" id="addForm">
                    <div class="modal-body">
                    <div class="cont_nr">
                            <div class="row">
                                        <div class="col">
                                        <label for="lname">Register No:</label>
                                        <input type="text" name="regno" id="regno" placeholder="Enter Register number">
                                        </div>
                                        
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <input type="submit" class="btn_success" value="Submit">
                                </div>
                                <div class="col-5"><input type="button" class="btn_danger " value="cancel"></div>
                            </div>
                            
                        </div>
    
                    </div>
                        
                    
                </form>
                
                </div>

            </div>
            <!-- The Modal of exam category end-->
         <!-- The Modal of exam category  -->
            <div id="myModalEdit" class="modal">

<!-- Modal content -->
<div class="modal-content" style="overflow-y:auto;"> 
<div class="modal-head">
    <h4>Update Student Details</h4>
    <span class="close">&times;</span>
</div> 
<form action="#" method="post" id="addForm">
    <div class="modal-body">
    <div class="cont_nr">

            <div class="row">
                        <div class="col">
                        <label for="lname">Register No:</label>
                        <input type="text" name="regno" id="regno" placeholder="Enter Register number" disabled>
                        <input type="hidden" name="userid" id="userid" placeholder="Enter user number">
                        </div>
                        
            </div>
            
            <div class="row">
                <div class="col-5">
                    <input type="submit" class="btn_success" value="Update" id="update_btn">
                </div>
                <div class="col-5"><input type="button" class="btn_danger" id="cancel" value="cancel"></div>
            </div>
            
        </div>

    </div>
        
    
</form>

</div>

</div>
<!-- The Modal of exam category end-->
            <div class="panel-body">
                    <div style='overflow-x:auto;'>
                            <table id='mytbl'>
                            <thead>
                                    <tr>
                                        <th>sn</th>
                                        <th>Faculty Name</th>
                                        <th>Total Course</th>
                                        <th>Status</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>
                            <div class='pagenition' id="pagination">
                            
                            </div>
                     </div>
            </div>
    </div>
</div>
