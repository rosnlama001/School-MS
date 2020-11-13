$(document).ready(()=>{
    if(sessionStorage.page){
        var btn=$("span");
        setInterval(function(){
            for(var i=1;i<=btn.length;i++){
                 if(sessionStorage.getItem("page")==i){
                    loadtable(i);  
                    }
                }   
        },5000);
    }else{
        loadtable();
    }        
    function loadtable(page){
        // alert(sessionStorage.getItem("page"));
        $.ajax({
            url:"../ajaxfile/student.php?",
            type:"POST",
            data:{page_no:page},
            success:function(data){
                $(".panel-body").html(data);   
            }  
        });
    }  
   $(document).on('click','.pagenition span',function(e){
       e.preventDefault();
            var page=$(this).attr("id");
            sessionStorage.setItem("page", page);
            var pageNo=sessionStorage.getItem("page");
            loadtable(pageNo);
   });


    
});