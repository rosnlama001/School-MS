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
                    <?php for($i=0; $i<count($row1); $i++){ ?>       
                            <tr>
                                <td><?php echo ($i+1); ?></td>
                                <td>
                                        <a href="#" onclick="selectCourse()" data="<?php echo $row1[$i]['fid']; ?>" id="faculty_btn">
                                    <?php echo $row1[$i]['fname']; ?>
                                    </a>
                                </td>
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
                    <?php } ?>
                        </table>
             </div>
        </div>
    </div>
    <!-- faculty end -->
</div>
