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
                <input type="search" name="" id="search" placeholder="search by names" oninput="filter()">
            </div>
            <h3>Student Details</h3>
            <div class="line">
                <button class="addbtn" id="myBtn"><i class="fas fa-plus"></i> Add Student</button>
            </div>
        </div>
        <!-- The Modal of Add students -->
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
                                    <span id="regnoMsg"></span>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" id="lname" placeholder="Enter Your Last Name">
                                    <span id="lnameMsg"></span>
                                </div>
                                <div class="col-5">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" id="fname" placeholder="Enter Your First Name">
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
                                    <input type="radio" name="Gender" id="male">
                                    <label for="male">Male</label>
                                    <input type="radio" name="Gender" id="female">
                                    <label for="female">female</label>
                                </div>
                                <span id="sexMsg"></span>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">Faculty</label>
                                    <select name="" id="">
                                        <option value="">select Faculty</option>
                                        <?php if (isset($facultyRow[0])) {
                                            for ($i = 0; $i < count($facultyRow); $i++) {
                                        ?>
                                                <option value="<?php echo $facultyRow[$i]['fid'] ?>">
                                                    <?php echo $facultyRow[$i]['fname'] ?></option>
                                        <?php
                                            }
                                        } ?>
                                    </select>
                                    <span id="facultyMsg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">Course</label>
                                    <select name="" id="">
                                        <option value="">select course</option>
                                        <?php if (isset($courseRow[0])) {
                                            for ($i = 0; $i < count($courseRow); $i++) {
                                        ?>
                                                <option value="<?php echo $courseRow[$i]['cid'] ?>">
                                                    <?php echo $courseRow[$i]['cname'] ?></option>
                                        <?php
                                            }
                                        } ?>
                                    </select>
                                    <span id="courseMsg"></span>
                                </div>
                            </div>
                            <div class="form_check">
                                <label for="address">Hobby</label>
                                <div class="form_radio">
                                    <input type="checkbox" name="subject[]" id="PHP" placeholder="Enter Your address">
                                    <label for="PHP">Sports</label>
                                    <input type="checkbox" name="subject[]" id="HTML" placeholder="Enter Your address">
                                    <label for="HTML">Music</label>
                                    <input type="checkbox" name="subject[]" id="CSS" placeholder="Enter Your address">
                                    <label for="CSS">Reading & writting</label>
                                    <input type="checkbox" name="subject[]" id="JAVA" placeholder="Enter Your address">
                                    <label for="JAVA">other</label>
                                </div>
                                <span id="hobbyMsg"></span>
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
        <!-- The Modal of add student end-->
        <!-- The Modal of edit students -->
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
                                    <span id="regnoMsg"></span>
                                    <input type="hidden" name="userid" id="userid" placeholder="Enter user number">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" id="lname" placeholder="Enter Your Last Name">
                                    <span id="lnameMsg"></span>
                                </div>
                                <div class="col-5">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" id="fname" placeholder="Enter Your First Name">
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
                                    <input type="date" data-date-format="DD MMMM YYYY" value="0000-00-00" name="dob" id="dob" disabled>
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
                                    <input type="radio" name="Gender" id="male" value="male" disabled>
                                    <label for="male">Male</label>
                                    <input type="radio" name="Gender" id="female" value="female" disabled>
                                    <label for="female">female</label>
                                </div>
                                <span id="sexMsg"></span>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">Faculty</label>
                                    <select name="" id="facultySelect">
                                        <option value="">select Faculty</option>
                                        <?php if (isset($facultyRow[0])) {
                                            for ($i = 0; $i < count($facultyRow); $i++) {
                                        ?>
                                                <option id="faculty" value="<?php echo $facultyRow[$i]['fid'] ?>">
                                                    <?php echo $facultyRow[$i]['fname'] ?></option>
                                        <?php
                                            }
                                        } ?>
                                    </select>
                                    <span id="facultyMsg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">Course</label>
                                    <select name="faculty" id="courseSelect">
                                        <option value="">select course</option>
                                        <?php if (isset($courseRow[0])) {
                                            for ($i = 0; $i < count($courseRow); $i++) {
                                        ?>
                                                <option id="course" value="<?php echo $courseRow[$i]['cid'] ?>">
                                                    <?php echo $courseRow[$i]['cname'] ?></option>
                                        <?php
                                            }
                                        } ?>
                                    </select>
                                    <span id="courseMsg"></span>
                                </div>
                            </div>
                            <div class="form_check">
                                <label for="address">Hobby</label>
                                <div class="form_radio">
                                    <input type="checkbox" name="hobby" value="sports">
                                    <label for="PHP">Sports</label>
                                    <input type="checkbox" name="hobby" value="music">
                                    <label for="HTML">Music</label>
                                    <input type="checkbox" name="hobby" value="reading&writing">
                                    <label for="CSS">Reading & writting</label>
                                    <input type="checkbox" name="hobby" value="Other">
                                    <label for="JAVA">other</label>
                                </div>
                                <span id="hobbyMsg"></span>
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
        <!-- The Modal of Edit student end-->
        <div class="panel-body">
            <div style='overflow-x:auto;'>
                <table id='mytbl'>
                    <thead>
                        <tr>
                            <th>sn</th>
                            <th>FullName</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>address</th>
                            <th>Faculty</th>
                            <th>Course</th>
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