$("document").ready(function () {
    function blnkinput(mark) {
        var blk = $(mark).val() == "";
        return blk;
    }
    function clearMsg(mark) {
        var fun = $(mark).on("input", function () {
            $(this).next().text("");
        })
        return fun;
    }

    // Fillter for course and faculty field
    // Data Fetch
    $.ajax({
        url: "../ajaxfile/fetchFacultyCourse.php",
        type: "post",
        data: { data_fetch: 1 },
        success: function (response) {
            var result = $.parseJSON(response);
            var i = 0;
            // console.log(result)
            $.each(result.faculty, function () {
                // console.log(faculty[i].fname);
                // $("#faculty").append("<option>").text(faculty[i].fname);
                $("#faculty").append($('<option>', {
                    value: result.faculty[i].fname,
                    text: result.faculty[i].fname,
                }));
                i++;
            });
        },
    });

    $("#faculty").on("change", function () {
        var select_val = $(this).val();
        $.ajax({
            url: "../ajaxfile/fetchFacultyCourse.php",
            type: "post",
            data: { select_val: select_val },
            success: function (response) {
                $("#course option:not(:first)").remove();
                var result = $.parseJSON(response);
                var i = 0;
                // console.log(result)
                $.each(result.course, function () {
                    $("#course").append($('<option>', {
                        value: result.course[i].cname,
                        text: result.course[i].cname
                    }));
                    i++;
                });
            },
        });
    });

    // Form validation Start
    $("#subtn").on("click", function () {
        //regex patterns
        var namePattr = /^[A-Za-z]{2,}$/;
        var zipPattr = /^[0-9]{7}$/;
        var mobPattr = /^[0-9]{9,}$/;
        var errors = [];
        var lname = $("#lname").val()
        var fname = $("#fname").val()
        var zip = $("#zip").val()
        var tel = $("#tel").val()

        if (blnkinput("#regno")) {
            errors[0] = $("#regnoMsg").attr("class", "danger").text("学籍番号は空白にしないでください。");
            clearMsg("#regno")
        }
        if (blnkinput("#lname")) {
            errors[1] = $("#lnameMsg").attr("class", "danger").text("姓は空白にしないでください。");
            clearMsg("#lname")
        } else if (!namePattr.test(lname)) {
            errors[2] = $("#lnameMsg").attr("class", "danger").text("姓は文字のみにする必要があります。");
            clearMsg("#lname")
        }
        if (blnkinput("#fname")) {
            errors[3] = $("#fnameMsg").attr("class", "danger").text("名は空白にしないでください。");
            clearMsg("#fname")
        } else if (!namePattr.test(fname)) {
            errors[4] = $("#fnameMsg").attr("class", "danger").text("名は文字のみにする必要があります。");
            clearMsg("#fname")
        }
        if (blnkinput("#zip")) {
            errors[5] = $("#zipMsg").text("郵便番号は空白にしないでください。")
            clearMsg("#zip")
        } else if (!zipPattr.test(zip)) {
            errors[6] = $("#zipMsg").text("郵便番号は８桁のみにする必要があります。");
            clearMsg("#zip")
        }
        if (blnkinput("#address1")) {
            errors[7] = $("#addr1Msg").attr("class", "danger").text("住所は空白にしないでください。")
            clearMsg("#address1")
            if ($("#address1").val() != "") {
                $("#addr1Msg").text("");
            }
        }
        if (blnkinput("#address2")) {
            errors[8] = $("#addr2Msg").attr("class", "danger").text("住所は空白にしないでください。")
            clearMsg("#address2")
        }
        if (blnkinput("#dob")) {
            errors[9] = $("#dobMsg").attr("class", "danger").text("誕生日は空白にしないでください。")
            clearMsg("#dob")
        }
        if (blnkinput("#tel")) {
            errors[10] = $("#telMsg").attr("class", "danger").text("電話番号は空白にしないでください。")
            clearMsg("#tel")
        } else if (!mobPattr.test(tel)) {
            errors[11] = $("#telMsg").text("電話番号は数字のみにする必要があります。");
            clearMsg("#tel")
        }
        if (!$('input[name="Gender"]').is(":checked")) {
            errors[12] = $("#sexMsg").attr("class", "danger").text("性別は空白にしないでください。")
            $('input[name="Gender"]').on("input", function () {
                $("#sexMsg").text("");
            })
        }
        if (blnkinput("#faculty")) {
            errors[13] = $("#facultyMsg").attr("class", "danger").text("学科は空白にしないでください。")
            clearMsg("#faculty")
        }
        if (blnkinput("#course")) {
            errors[14] = $("#courseMsg").attr("class", "danger").text("コース名は空白にしないでください。")
            clearMsg("#course")
        }
        if (!$('input[name="hobby"]').is(":checked")) {
            // if ($(".hob:checked").val() == null) {
            errors[15] = $("#hobbyMsg").attr("class", "danger").text("趣味は空白にしないでください。")
            $('input[name="hobby"]').on("input", function () {
                $("#hobbyMsg").text("");
            })
        }
        // console.log(errors)
        if (errors == "") {
            //This is where you're gonna store your form fields
            var fields = {};
            // Making all anme and value in a serial Array
            var x = $("#addForm").serializeArray()
            // console.log(x)
            $.each(x, function (i, field) {
                //Get values, even from multiple-selects
                if (Array.isArray(fields[field.name])) {
                    fields[field.name].push(field.value);
                } else if (typeof fields[field.name] !== 'undefined') {
                    var val = fields[field.name];
                    fields[field.name] = new Array();
                    fields[field.name].push(val);
                    fields[field.name].push(field.value);
                } else {
                    fields[field.name] = field.value;
                }
            })
            var json = JSON.stringify(fields)
            // console.log(json)
            $.ajax({
                url: "../ajaxfile/studentAction.php",
                type: "post",
                data: { status: "insert", json: json },
                success: function (response) {
                    console.log(response)
                },
                // error: function (response) {
                //     alert("Error! I won't tell you what it is.But, I'll give you a clue: 21");
                //     console.log(response)
                // }
            })
        } else {
            $("#lastMsg").attr("class", "danger").text("まず、すべてのエラーを解決して下さい。").show("slow").fadeOut(4000)
            // setTimeout(() => {
            //     $("#lastMsg").text("")
            // }, 5000);
        }
    })
})