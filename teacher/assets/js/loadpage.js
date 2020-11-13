$(document).ready(()=>{
/*postal code js start */
$("#myModalEdit #zipbtn").click(function(){
    var code=$("#myModalEdit #zip").val();
    $("#myModalEdit #zipbtn").val("please wait a second")
    if(code.length==7 && code !=""){
        $.ajax({
            url:"../ajaxfile/postalcode.php?",
            type:"POST",
            data:{code:code},
            success:function(data){
                $("#myModalEdit #address1").val(data); 
                $("#myModalEdit #zipbtn").val("search address") 
            }  
        });
    }
    else{
        $("#myModalEdit #zipbtn").val("search address")
        $("#myModalEdit .msg").html("Zip code is empty or lenght must be 7 digits");
        $("#myModalEdit #zip").on("input",()=>{
            $("#myModalEdit .msg").html("");
        });
    }
    
});
/*postal code js end */
// ------------------------------table load start--------------------------------------------//
var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;
// manageData();
/* manage data list */
function manageData() {
    $.ajax({
        dataType: 'json',
        url: "../ajaxfile/studentAction.php",
        type:"POST",
        data: {page:page,status:'fetch'},
        success:  function(data){
        // console.log(data);
    	total_page = Math.ceil(data.total/10);
    	current_page = page;
    	$('#pagination').twbsPagination({
	        totalPages: total_page,
	        visiblePages: current_page,
	        onPageClick: function (event, pageL) {
	        	page = pageL;
                if(is_ajax_fire != 0){
	        	  getPageData();
                }
	        }
	    });
    	manageRow(data.data);
        is_ajax_fire = 1;
        }
    });
}
getPageData();
    /* Get Page Data*/
        function getPageData() {
            $.ajax({
                dataType: 'json',
                url:"../ajaxfile/studentAction.php?",
                type:"POST",
                data:{page_no:page,status:'fetch'},
                success:function(data){
                   manageRow(data.data);
                // $("tbody").html(data);
                }
            });
        } 
 //  manage row 
 function manageRow(data){
    //  console.log(data);
            var sn=1;
            var	rows = '';
                $.each( data[0], function( key, value ) {
                    rows = rows + '<tr>';
                    rows = rows + '<td>'+sn+'</td>';
                    rows = rows + '<td>'+value.userName+'</td>';
                    rows = rows + '<td>'+value.eMail+'</td>';
                    rows = rows + '<td>'+value.mobile+'</td>';
                    rows = rows + '<td>'+value.address+'</td>';
                    rows = rows + '<td>'+value.faculty+'</td>';
                    rows = rows + '<td>'+value.course+'</td>';
                    rows = rows + '<td>';
                    rows = rows + "<a href='#' class='tbl-edit smBtn' id='"+value.userId+"'>Edit</a>";
                    rows = rows + "<a href='#' class='tbl-delete smBtn-d' id='"+value.userId+"'>Delete</a>";
                    rows = rows + '</td>';
                    rows = rows + '</tr>';
                    sn++;
                });
            $("tbody").html(rows);
 }

/* Update the table data form ajax start*/
$(document).on('click','.tbl-edit',function(e){
    e.preventDefault();
    var id = $(this).attr("id");
    $.ajax({
        url : "../ajaxfile/studentAction.php",
        type :"post",
        data: {userId:id,status:'getData'},
        success:function(data){
            var val=JSON.parse(data);
            console.log(val.sex);
            $("#myModalEdit").css("display","flex");
            $("#myModalEdit #regno").val(val.regno);
            $("#myModalEdit #lname").val(val.lname);
            $("#myModalEdit #fname").val(val.fname);
            $("#myModalEdit #zip").val(val.postcode);
            $("#myModalEdit #address1").val(val.address);
            $("#myModalEdit #address2").val(val.address1);
            $("#myModalEdit #dob").val(val.birthdate);
            $("#myModalEdit #tel").val(val.mobile);
            var check="checked";
            if(val.sex=="male"){
             $("#myModalEdit #male").attr("checked",check);  
            }else{
             $("#myModalEdit #female").attr("checked",check); 
            }
        }
    });
    
});
/*update the table data ends*/


    
});