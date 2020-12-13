$(function(){
    var query = window.location.search.slice(1);
    // {"faculty":"itspecial"}
    var con=query.replace(/=/g,'":"');
    var url='{"'+con+'"}';
    var url=JSON.parse(url);
    //convert into japanese into utf-8
    var faculty =decodeURIComponent(url.faculty);
    console.log(faculty);
     var page = 1;
    var current_page = 1;
    manageData();
    function manageData(){
        $.ajax({   
            datatype:'json',
            url:'../ajaxfile/attendanceAction.php',
            type:'post',
            data: {status:'student',faculty:faculty},
            success:function(data){
                console.log(data);
               var data = JSON.parse(data); 
               if(data.error <1){
                   $(".tbody").html("no data found");
                   alert("No data found");
               }
               var per_page=5;
               if(data.total > per_page){
                   total_page = Math.ceil(data.total/per_page);
               }
               else{
                   total_page = Math.floor(data.total/per_page);
                    var ancr="";
                   for(i=1;i<=total_page;i++){
                       console.log(total_page);
                       if(current_page == i){  
                        ancr+='<a href="#" class="pgnbtn active ">'+i+'</a>';
                       }else{
                        ancr+='<a href="#" class="pgnbtn" >'+i+'</a>';   
                       }
                   }
                   $('#pagination').html(ancr);
               
                   $(document).on('click','#pagination a',function(){
                       var id=$(this).text();
                       page = id;
                       current_page =id;
                       var page_no=$("#pagination a")
                       $(page_no).each(function(){
                           var value= $(this).text();  
                           if(value==id){
                               $(this).addClass("active");
                           }else{
                               $(this).removeClass("active");
                           }
                       })
                       getPageData();
                      
                   });
                   manageRow(data.data); 
               }
            }
        });
    }
    function getPageData() {
        $.ajax({
            dataType: 'json',
            url:"../ajaxfile/attendanceAction.php",
            type:"post",
            data:{page_no:page,status:'student'},
            success:function(data){
               manageRow(data.data,data.profile);
            }
        });
    } 
    function manageRow(data,meta){
                var sn=1;
                var	rows = '';
                    $.each( data, function( key, value ) {
                        rows = rows + '<tr>';
                        rows = rows + '<td>'+sn+'</td>';
                        rows = rows + '<td>'+value.lname+" "+value.fname+'</td>';
                        rows = rows + '<td>'+value.regno+'</td>';
                        if(value.status==='1'){
                            // console.log(value.status);
                            rows = rows + '<td> ◎　Present </td>';
                        }else{
                            rows = rows + '<td> ✘　absence  </td>';
                        }
                        rows = rows + '<td>'+value.time+'</td>';
                        rows = rows + '<td>'+value.date+'</td>';
                        rows = rows + '<td>';
                        rows = rows + "<a href='#' class='tbl-edit smBtn' id='"+value.aid+"'>Edit</a>";
                        rows = rows + "<a href='#' class='tbl-delete smBtn-d' id='"+value.aid+"'>Delete</a>";
                        rows = rows + '</td>';
                        rows = rows + '</tr>';
                        sn++;
                    });
                $("tbody").html(rows);
                $("tbody td").css("text-transform","capitalize");
     }
     /* edit the table data form ajax start*/
$(document).on('click','.tbl-edit',function(e){
    e.preventDefault();
    var id = $(this).attr("id");
    // alert(id);
    $("#myModalEdit").fadeIn();
    $("#myModalEdit").css("display","flex");
});
/*edit the table data ends*/

/*update table data starts */
$("#update_btn").click(function(e){
    e.preventDefault();
                   
});
/*delete the data from table */
    $(document).on('click','.tbl-delete',function(e){
        e.preventDefault();
        var id = $(this).attr("id");
        var c_obj = $(this).parents("tr");
        if(confirm("Are you sure do you want to delete?")){
            
        }
    });
    $("#canclebtn").click(()=>{
       $("#myModal").hide();
    }); 
/**add the new data to the data base  */
        var regno_err=true;
        var time_err=true;
        var date_err=true;
        var status_err=true;
        $("#regcheck").hide();
        $("#timecheck").hide();
        $("#datacheck").hide();
        $("#statuscheck").hide();
        $("#regno").keyup(function(){
            regno_check();
        });
        $("#regno").blur(function(){
            var regval=$("#regno").val().trim();
            var pattn=new RegExp(/^[^\d]{1,}/);
            if(!pattn.test(regval)){
                $("#regcheck").show();
                $("#regcheck").html("**Please enter first 3 Alphabate letter only");
                $("#regcheck").focus();
                $("#regcheck").css("color","red");
                regno_err=false;
                return false;
            }
            else{
                $("#regno").on("input",function(){
                    $("#regcheck").hide(); 
                });    
            }
        });
        function regno_check(){
            var regval=$("#regno").val().trim();
            var pattn=new RegExp(/^[^\d]{1,}/);
            if(regval==""){
                $("#regcheck").show();
                $("#regcheck").html("**Please enter the register Number");
                $("#regcheck").focus();
                $("#regcheck").css("color","red");
                regno_err=false;
                return false;
            }
            else if(!pattn.test(regval)){
                $("#regcheck").show();
                $("#regcheck").html("**Please enter the Alphabate only");
                $("#regcheck").focus();
                $("#regcheck").css("color","red");
                regno_err=false;
                return false;
            }else{
                $("#regno").on("input",function(){
                    $("#regcheck").hide(); 
                });
                 
            }
        }
        function time_check(){
            var timeval=$("#time").val();
            if(timeval==""){
                $("#timecheck").show();
                $("#timecheck").html("**Please enter Time");
                $("#timecheck").focus();
                $("#timecheck").css("color","red");
                time_err=false;
                return false;
            }else{
                $("#time").on("input",function(){
                    $("#timecheck").hide(); 
                });
                 
            }
        }
        function date_check(){
            var dateval=$("#date").val();
            if(dateval==""){
                $("#datecheck").show();
                $("#datecheck").html("**Please enter date");
                $("#datecheck").focus();
                $("#datecheck").css("color","red");
                date_err=false;
                return false;
            }else{
                $("#date").on("change",function(){
                    $("#datecheck").hide(); 
                });
                 
            }
        }
        function status_check(){
            var statusval=$("#status").val();
            if(statusval==""){
                $("#statuscheck").show();
                $("#statuscheck").html("**Please select Status");
                $("#statuscheck").focus();
                $("#statuscheck").css("color","red");
                status_err=false;
                return false;
            }else{
                $("#status").on("change",function(){
                    $("#statuscheck").hide(); 
                });
                 
            }
        }
    $("#addaten").on("submit",(e)=>{
        e.preventDefault();
         regno_err=true;
         time_err=true;
         date_err=true;
         status_err=true;
         regno_check();
         time_check();
         date_check();
         status_check();
         if((regno_err==true) && (time_err==true) && (date_err==true) && (status_err==true)){
            var form=document.getElementById("addaten");
            var fd=new FormData(form);
            fd.append("status","insert")
            $.ajax({
                url:"../ajaxfile/attendanceAction.php",
                type:"post",
                data:fd,
                processData : false,
                processData: false,  // tell jQuery not to process the data
                contentType: false,
                success:function(data){
                    console.log(data);
                }
            });
            // $("#myModal").fadeOut();
            // $("#myModal").hide();
         }else{
             return false;
         }    
    });
});