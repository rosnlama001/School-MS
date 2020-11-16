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
                <form action="studendphp.php" method="post" id="addForm">
                    <div class="modal-body">
                        <div class="cont_nr">
                            <div class="row">
                                <div class="col">
                                    <label for="regno">Register No:</label>
                                    <input type="text" name="regno" id="regno" placeholder="Enter Register number">
                                    <span id="regnoMsg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" id="lname" value="" placeholder="姓">
                                    <span id="lnameMsg"></span>
                                </div>
                                <div class="col-5">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" id="fname" value="" placeholder="名">
                                    <span id="fnameMsg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <label for="zip">Postal Code</label>
                                    <input type="text" name="zip" id="zip" placeholder="5330011" value="">
                                    <span class="msg danger" id="zipMsg"></span>
                                </div>
                                <div class="col-5">
                                    <input type="button" name="zipbtn" id="zipbtn" value="search address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="address1">Address1</label>
                                    <input type="text" name="address1" id="address1" placeholder="大阪市東淀川区大桐" value="">
                                    <span id="addr1Msg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="address2">Address2</label>
                                    <input type="text" name="address2" id="address2" placeholder="５－１４－８７ダイドーファイブ　４０３号">
                                    <span id="addr2Msg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" name="dob" id="dob">
                                    <span id="dobMsg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="tel">Mobile</label>
                                    <input type="tel" name="tel" id="tel" value="">
                                    <span id="telMsg"></span>
                                </div>
                            </div>
                            <div class="form_check">
                                <label for="address">Gender</label>
                                <div class="form_radio">
                                    <input type="radio" name="Gender" class="sexGroup" id="male">
                                    <label for="male">Male</label>
                                    <input type="radio" name="Gender" class="sexGroup" id="female">
                                    <label for="female">Female</label>
                                    <input type="radio" name="Gender" class="sexGroup" id="other">
                                    <label for="other">Other</label>
                                </div>
                                <span id="sexMsg"></span>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="faculty">Faculty</label>
                                    <select name="" id="faculty" required>
                                        <option value="">Select Faculty</option>
                                    </select>
                                    <span id="facultyMsg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="course">Course</label>
                                    <select name="" id="course">
                                        <option value="">select course</option>
                                    </select>
                                    <span id="courseMsg"></span>
                                </div>
                            </div>
                            <div class="form_check">
                                <label for="address">Hobby</label>
                                <div class="form_radio">
                                    <input type="checkbox" name="hobby" class="hob" id="sports" value="Sports">
                                    <label for="sports">Sports</label>
                                    <input type="checkbox" name="hobby" class="hob" id="music" value="Music">
                                    <label for="music">Music</label>
                                    <input type="checkbox" name="hobby" class="hob" id="rw" value="Reading and Writing">
                                    <label for="rw">Reading & writting</label>
                                    <input type="checkbox" name="hobby" class="hob" id="others" value="Others">
                                    <label for="others">Other</label>
                                </div>
                                <span id="hobbyMsg"></span>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <span id="lastMsg"></span>
                                    <input type="button" id="subtn" class="btn_success" value="Submit">
                                </div>
                                <div class="col-5"><input type="button" class="btn_danger " value="cancel"></div>
                            </div>

                        </div>

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
<script src="../assets/js/studntFormValidation.js"></script>
<script src="../assets/js/loadpage.js"></script>