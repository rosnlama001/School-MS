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
        url: "studentphp.php",
        type: "post",
        data: { data_fetch: 1 },
        success: function (response) {
            var result = $.parseJSON(response);
            var i = 0;
            // var z = 0
            // console.log(result)
            $.each(result.faculty, function () {
                // console.log(faculty[i].fname);
                // $("#faculty").append("<option>").text(faculty[i].fname);
                $("#faculty").append($('<option>', {
                    value: result.faculty[i].fid,
                    text: result.faculty[i].fname
                }));
                i++;
            });
        },
    });

    $("#faculty").on("change", function () {
        var select_val = $(this).val();
        $.ajax({
            url: "studentphp.php",
            type: "post",
            data: { select_val: select_val },
            success: function (response) {
                $("#course option:not(:first)").remove();
                var result = $.parseJSON(response);
                var i = 0;
                // console.log(result)
                $.each(result.course, function () {
                    $("#course").append($('<option>', {
                        value: result.course[i].cid,
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
        } else if ($("#address1").val()) {
            $("#addr1Msg").text("");
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
            clearMsg("#zip")
        }
        if (!$(".sexGroup").is(":checked")) {
            errors[12] = $("#sexMsg").attr("class", "danger").text("性別は空白にしないでください。")
            $(".sexGroup").on("input", function () {
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
        if (!$(".hob").is(":checked")) {
            // if ($(".hob:checked").val() == null) {
            errors[15] = $("#hobbyMsg").attr("class", "danger").text("趣味は空白にしないでください。")
            $(".hob").on("input", function () {
                $("#hobbyMsg").text("");
            })
        }
        // console.log(errors)
        if (errors == "") {
            $("#addForm").submit();
            alert("form submited")
            console.log("OK")
        } else {
            $("#lastMsg").attr("class", "danger").text("まず、すべてのエラーを解決して下さい。").show("slow").fadeOut(3000)
            // setTimeout(() => {
            //     $("#lastMsg").text("")
            // }, 5000);
        }
    })
})