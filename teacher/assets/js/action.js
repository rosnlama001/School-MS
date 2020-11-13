function edit(e){
    // e.preventDefault();
    var userId= e;
    $.ajax({
        url:"../ajaxfile/update.php?",
        type:"POST",
        data:{userId:userId},
        success:function(data){
         document.getElementById("myModal").style.display = "flex";
         console.log(data['mobile']); 
        }  
    });   
}
function remove(e){
    // e.preventDefault();
    var userId= e;
     
    
}