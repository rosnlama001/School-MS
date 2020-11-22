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
            <h3> Dashboard </h3>
            <div class="line">
            <button class="addbtn" id="myBtn"><i class="fas fa-plus"></i> Add Faculty</button>
            </div>
        </div>
        
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
