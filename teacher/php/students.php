<?php include("../include/header.php"); ?>
<div class="panel">
    <div class="panel-row">
        <div class="panel-head">
        <div class="search_bar">
            <label for="search"><i class="fas fa-search-plus"></i></label>
            <input type="search" name="" id="search" placeholder="search by names" oninput="filter()">
        </div> 
            <h3>Student Details</h3>
            <div class="line">
            <button class="addbtn" id="myBtn"><i class="fas fa-plus"></i> Add Student</button>
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
                       <div class="cont">
                           <div class="line">
                               <div class="form_group">
                                   <label for="name">Last Name</label>
                                   <input type="text" name="name" id="name" class="form_control">
                               </div>
                               <div class="form_group">
                                   <label for="name">Last Name</label>
                                   <input type="text" name="name" id="name" class="form_control">
                               </div>
                           </div>
                           <div class="line">
                               <div class="form_group">
                                   <label for="name">Last Name</label>
                                   <input type="text" name="name" id="name" class="form_control">
                               </div>
                            </div>
                            <div class="line">
                               <div class="form_group">
                                   <label for="name">Last Name</label>
                                   <input type="text" name="name" id="name" class="form_control">
                               </div>
                            </div>
                            <div class="line">
                               <div class="form_group">
                                   <label for="zip">Postal Code</label>
                                   <input type="text" name="zip" id="zip" class="form_control">
                               </div>
                               <input type="button" value="search address">
                            </div>
                            <div class="line">
                               <div class="form_group">
                                   <label for="name">Last Name</label>
                                   <input type="text" name="name" id="name" class="form_control">
                               </div>
                            </div>
                            <div class="line">
                               <div class="form_group">
                                   <label for="radio">Gender</label>
                                   <input type="radio" name="sex" id="radio" class="form_radio">
                                   <input type="radio" name="sex" id="radio" class="form_radio">
                               </div>
                            </div>
                            <div class="line">
                               <div class="form_group">
                                   <label for="radio">faaculty</label>
                                   <select name="select" id="select" class="select">
                                   <option value="">select one</option>
                                   <option value="">1</option>
                                   <option value="">2</option>
                                   <option value="">2</option>
                                   <option value="">3</option>
                                   </select>
                               </div>
                            </div>
                            <div class="line">
                               <div class="form_group">
                                   <label for="radio">faaculty</label>
                                   <select name="select" id="select" class="select">
                                   <option value="">select one</option>
                                   <option value="">1</option>
                                   <option value="">2</option>
                                   <option value="">2</option>
                                   <option value="">3</option>
                                   </select>
                               </div>
                            </div>
                            <div class="line">
                               <div class="form_group">
                                   <label for="course">course</label>
                                  <input type="checkbox" name="course" id="course">it
                                  <input type="checkbox" name="course" id="course">it
                                  <input type="checkbox" name="course" id="course">it
                                  <input type="checkbox" name="course" id="course">it

                               </div>
                            </div>
                           
                           
                       </div>
                    
                </div> 
                <div class="modal-footer">
                    <input type="submit" class="btn-s" value="send">
                </div> 
                </form>
                
                </div>

            </div>
            <!-- The Modal end-->
            <div class="panel-body">
            </div>
    </div>
</div>

<?php include("../include/footer.php"); ?>
<script src="../assets/js/loadpage.js"></script>