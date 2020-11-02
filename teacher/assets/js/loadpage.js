$(document).ready(()=>{
    loadtable();
    function loadtable(page){
        $.ajax({
            url:"../ajaxfile/student.php?",
            type:"POST",
            data:{page_no:page},
            success:function(data){
                $(".panel-body").html(data);   
            }  
        });
    }
   $(document).on('click','.pagenition span',function(){
    // alert("hello");
    var page=$(this).attr("id");
    // alert(page);
    loadtable(page);
   });
   
    
});