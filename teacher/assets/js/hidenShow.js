function load(){
    $.ajax({
        url: "../ajaxfile/faculty.php",
        success:function(data){
            $("#wrap").html(data);
        }
    });
}
load();
function selectcourse(e){
    // alert(e);
    var data="fid="+e;
    $.ajax({
        url: "../ajaxfile/course.php?",
        type:"post",
        data:data,
        success:function(data){
            $("#faculty").css({"display":"none","transition": "all 0.8s linear"});
            $("#wrap").html(data);
        }
        // $("#wrap1").html(data);
    });
}