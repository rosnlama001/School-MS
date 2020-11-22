$(document).ready(()=>{
    var page = 1;
    var current_page = 1;
    // var total_page = 0;
    var is_ajax_fire = 0;
    // manageData();
    /* manage data list */
    function manageData() {
        $.ajax({
            dataType: 'json',
            url: "../ajaxfile/courseNfaculty.php",
            type:"POST",
            data: {page:page,status:'fetch'},
            success:  function(data){
            console.log(data);
            if(data.total > 10){
                total_page = Math.ceil(data.total/10);
            }else{
                total_page = Math.floor(data.total/10);
            }
                var ancr="";
                for(i=1;i<=total_page;i++){
                    // console.log(i);
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
    getPageData();
        /* Get Page Data*/
            function getPageData() {
                $.ajax({
                    dataType: 'json',
                    url:"../ajaxfile/courseNfaculty.php",
                    type:"post",
                    data:{page_no:page,status:'fetch'},
                    success:function(data){
                       manageRow(data.data);
                    // $("tbody").html(data);
                    console.log(data);
                    }
                });
            } 
     //  manage row of table;
     function manageRow(data,meta){
        //  console.log(data);
                var sn=1;
                var	rows = '';
                    $.each( data, function( key, value ) {
                        rows = rows + '<tr>';
                        rows = rows + '<td>'+sn+'</td>';
                        rows = rows + '<td><a href="#">'+value.fname+'</a></td>';
                        rows = rows + '<td>'+value.eMail+'</td>';
                        rows = rows + '<td>'+value.eMail+'</td>';
                        rows = rows + '<td>';
                        rows = rows + "<a href='#' class='tbl-edit smBtn' id='"+value.userId+"'>Edit</a>";
                        rows = rows + "<a href='#' class='tbl-delete smBtn-d' id='"+value.userId+"'>Delete</a>";
                        rows = rows + '</td>';
                        rows = rows + '</tr>';
                        sn++;
                    });
                $("tbody").html(rows);
                $("tbody td").css("text-transform","capitalize");
     }    
    
});