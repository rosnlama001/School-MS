<div class="panel">
    <div class="panel-row">
        <div class="panel-head">
        <div class="search_bar">
            <label for="search"><i class="fas fa-search-plus"></i></label>
            <input type="search" name="" id="search" placeholder="search by names" oninput="filter()">
        </div>
            <h3>Exam Details  </h3>
            <button class="addbtn" id="myBtn"><i class="fas fa-plus"></i> Add Exam Category</button>
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
                                <th>Exam Category</th>
                                <th>Total Questions</th>
                                <th>Marks per question</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td><a href="">Php</a></td>
                                <td>5</td>
                                <td>4</td>
                                <td>
                                    <a href="" class="smBtn-s">Active</a>
                                    <!-- <a href="" class="smBtn-d">Deactive</a> -->
                                </td>
                                <td>
                                    <a href="" class="smBtn-s">Add Questions</a>
                                    <a href="" class="smBtn">Edit</a>
                                    <a href="" class="smBtn-d">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><a href="">HTML</a></td>
                                <td>2</td>
                                <td>4</td>
                                <td>
                                    <!-- <a href="" class="smBtn-s">Active</a> -->
                                    <a href="" class="smBtn-d">Deactive</a>
                                </td>
                                <td>
                                    <a href="" class="smBtn-s">Add Questions</a>
                                    <a href="" class="smBtn">Edit</a>
                                    <a href="" class="smBtn-d">Delete</a>
                                </td>
                            </tr>
                            
                        </table>
             </div>
        </div>
    </div>
</div>