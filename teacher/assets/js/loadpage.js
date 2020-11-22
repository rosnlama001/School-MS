$(document).ready(() => {
    /*postal code js start */
    $("#myModalEdit #zipbtn").click(function () {
        var code = $("#myModalEdit #zip").val();
        $("#myModalEdit #zipbtn").val("please wait a second")
        if (code.length == 7 && code != "") {
            $.ajax({
                url: "../ajaxfile/postalcode.php?",
                type: "POST",
                data: { code: code },
                success: function (data) {
                    $("#myModalEdit #address1").val(data);
                    $("#myModalEdit #zipbtn").val("search address")
                }
            });
        }
        else {
            $("#myModalEdit #zipbtn").val("search address")
            $("#myModalEdit .msg").html("Zip code is empty or lenght must be 7 digits");
            $("#myModalEdit #zip").on("input", () => {
                $("#myModalEdit .msg").html("");
            });
        }

    });
    /*postal code js end */
    // ------------------------------table load start--------------------------------------------//
    var page = 1;
    var current_page = 1;
    // var total_page = 0;
    var is_ajax_fire = 0;
    manageData();
    /* manage data list */
    function manageData() {
        $.ajax({
            dataType: 'json',
            url: "../ajaxfile/studentAction.php",
            type: "POST",
            data: { page: page, status: 'fetch' },
            success: function (data) {
                console.log(data);
                if (data.total > 10) {
                    total_page = Math.ceil(data.total / 10);
                } else {
                    total_page = Math.floor(data.total / 10);
                }
                var ancr = "";
                for (i = 1; i <= total_page; i++) {
                    // console.log(i);
                    if (current_page == i) {
                        ancr += '<a href="#" class="pgnbtn active ">' + i + '</a>';
                    } else {
                        ancr += '<a href="#" class="pgnbtn" >' + i + '</a>';
                    }
                }
                $('#pagination').html(ancr);

                $(document).on('click', '#pagination a', function () {
                    var id = $(this).text();
                    page = id;
                    current_page = id;
                    var page_no = $("#pagination a")
                    $(page_no).each(function () {
                        var value = $(this).text();
                        if (value == id) {
                            $(this).addClass("active");
                        } else {
                            $(this).removeClass("active");
                        }
                    })
                    getPageData()
                    // manageData();
                });
                manageRow(data.data);
                // console.log(data);
                // manageRow(data.course); 
                // $("tbody").html(data);
            }
        });
    }
    // getPageData();
    /* Get Page Data*/
    function getPageData() {
        $.ajax({
            dataType: 'json',
            url: "../ajaxfile/studentAction.php",
            type: "post",
            data: { page_no: page, status: 'fetch' },
            success: function (data) {
                manageRow(data.data);
                // $("tbody").html(data);
            }
        });
    }
    //  manage row of table;
    function manageRow(data, meta) {
        //  console.log(data);
        var sn = 1;
        var rows = '';
        $.each(data[0], function (key, value) {
            rows = rows + '<tr>';
            rows = rows + '<td>' + sn + '</td>';
            rows = rows + '<td>' + value.lname + " " + value.fname + '</td>';
            rows = rows + '<td>' + value.eMail + '</td>';
            rows = rows + '<td>' + value.mobile + '</td>';
            rows = rows + '<td>' + value.address + '</td>';
            rows = rows + '<td>' + value.faculty + '</td>';
            rows = rows + '<td>' + value.course + '</td>';
            rows = rows + '<td>';
            rows = rows + "<a href='#' class='tbl-edit smBtn' id='" + value.userId + "'>Edit</a>";
            rows = rows + "<a href='#' class='tbl-delete smBtn-d' id='" + value.userId + "'>Delete</a>";
            rows = rows + '</td>';
            rows = rows + '</tr>';
            sn++;
        });
        $("tbody").html(rows);
        $("tbody td").css("text-transform", "capitalize");
    }

    /* edit the table data form ajax start*/
    $(document).on('click', '.tbl-edit', function (e) {
        e.preventDefault();
        var id = $(this).attr("id");
        $.ajax({
            url: "../ajaxfile/studentAction.php",
            type: "post",
            data: { userId: id, status: 'getData' },
            success: function (data) {
                var val1 = JSON.parse(data);
                var val = val1.data;
                $("#myModalEdit").fadeIn();
                $("#myModalEdit").css("display", "flex");
                $("#myModalEdit #regno").val(val.regno);
                $("#myModalEdit #userid").val(val.userId);
                $("#myModalEdit #lname").val(val.lname);
                $("#myModalEdit #fname").val(val.fname);
                $("#myModalEdit #zip").val(val.postcode);
                $("#myModalEdit #address1").val(val.address);
                $("#myModalEdit #address2").val(val.address1);
                $("#myModalEdit #dob").val(val.birthdate);
                $("#myModalEdit #tel").val(val.mobile);
                var check = "checked";
                if (val.sex == "male") {
                    $("#myModalEdit #male").attr("checked", check);
                } else {
                    $("#myModalEdit #female").attr("checked", check);
                }
                // faculty selected
                var fac = $("#myModalEdit #faculty");
                var selected = "selected";
                $.each(fac, function () {
                    if (this.value == val.faculty) {
                        // console.log(this.value);
                        $(this).attr("selected", selected);
                    }
                });
                // course selected
                var cou = $("#myModalEdit #course");
                var selected = "selected";
                $.each(cou, function () {
                    if (this.value == val.course) {
                        // console.log(this.value);
                        $(this).attr("selected", selected);
                    }
                });

                // ----------------------------  
            }
        });

    });
    /*edit the table data ends*/

    /*update table data starts */
    $("#update_btn").click(function (e) {
        e.preventDefault();
        var id = $("#myModalEdit #userid").val();
        var regno = $("#myModalEdit #regno").val();
        var lname = $("#myModalEdit #lname").val();
        var fname = $("#myModalEdit #fname").val();
        var zip = $("#myModalEdit #zip").val();
        var address1 = $("#myModalEdit #address1").val();
        var address2 = $("#myModalEdit #address2").val();
        var dob = $("#myModalEdit #dob").val();
        var tel = $("#myModalEdit #tel").val();
        var faculty = $("#myModalEdit #facultySelect option:selected").val();
        var course = $("#myModalEdit #courseSelect option:selected").val();
        var gender = $("#myModalEdit [name=Gender]:checked").val()
        var selectedHobby = new Array();
        $('#myModalEdit input[name=hobby]:checked').each(function () {
            selectedHobby.push(this.value);
        });
        if (window.confirm("Following Data will be Submited " + "\n" +
            "-------------------------" + "\n" +
            "UserId :" + id + "\n" +
            "RegisterNo :" + regno + "\n" +
            "LastName :" + lname + "\n" +
            "firstName :" + fname + "\n" +
            "Postalcode :" + zip + "\n" +
            "Address 1 :" + address1 + "\n" +
            "Address 2 :" + address2 + "\n" +
            "Date of birth :" + dob + "\n" +
            "Tele phone :" + tel + "\n" +
            "Faculty :" + faculty + "\n" +
            "Course :" + course + "\n" +
            "Gender :" + gender + "\n" +
            "Hobby :" + selectedHobby + "\n"

        )) {
            $.ajax({
                // dataType: 'json',
                url: "../ajaxfile/studentAction.php",
                type: "post",
                data: {
                    userId: id,
                    regno: regno,
                    lname: lname,
                    fname: fname,
                    zip: zip,
                    address1: address1,
                    address2: address2,
                    dob: dob,
                    tel: tel,
                    faculty: faculty,
                    course: course,
                    gender: gender,
                    hobby: selectedHobby,
                    status: 'update'
                },
                success: function (data) {
                    console.log(data);
                    if (data == 1) {
                        alert("data updated successfully");
                        getPageData();
                        $("#myModalEdit").fadeOut();
                        $("#myModalEdit").hide();
                    } else {
                        alert("data update unsuccessfull");
                    }
                }
            });
        }
    });
    /*update table data ends */
    $("#cancel").click(function () {
        $("#myModalEdit").fadeOut();
        $("#myModalEdit").hide();
    });
    /*delete the data from table */
    $(document).on('click', '.tbl-delete', function (e) {
        e.preventDefault();
        var id = $(this).attr("id");
        var c_obj = $(this).parents("tr");
        if (confirm("Are you sure do you want to delete?")) {
            $.ajax({
                url: "../ajaxfile/studentAction.php",
                type: "post",
                data: { userId: id, status: 'delete' },
                success: function (data) {
                    console.log(data);
                    if (data != 1) {
                        c_obj.remove();
                        alert("data deleted successfully");
                        getPageData();
                    } else {
                        alert("data delete Unsuccessfully");
                    }
                }
            });
        }
    });

});