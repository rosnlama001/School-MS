<div class="panel" id="courses">
    <!-- course started -->
    <a href="facultyncourse.php" id="back"><i class="fas fa-arrow-left"></i></a>
    <div class="panel-row">
        <div class="panel-head">
        <div class="search_bar">
            <label for="search"><i class="fas fa-search-plus"></i></label>
            <input type="search" name="" id="search1" placeholder="search by names" oninput="filter1()">
        </div>  
            <h3>Course Details  </h3>
            <button class="addbtn" id="myBtn"><i class="fas fa-plus"></i> Add Course</button>
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
                        <?php for($i=0; $i<count($row); $i++){ ?>
                            <tr>
                                <td><?php echo ($i+1); ?></td>
                                <td><p class="faculty_btn"><?php echo $row[$i]['cname']; ?></p></td>
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
                        <?php } ?>
                            
                    </table>
             </div>
        </div>
    </div>
    <!-- course end  -->
</div>