function filter(){
    var input,value,table,tr,td,i,tdval;
    input=document.getElementById('search');
    value=input.value.toUpperCase();

    table=document.getElementById('mytbl');
    tr=table.getElementsByTagName('tr');
    
    for(i=1;i<tr.length;i++){
        td=tr[i].getElementsByTagName('td')[1];
        console.log(td);
        if(td){
            tdval=td.textContent || td.innerText;
            // console.log(tdval);
            if(tdval.toUpperCase().indexOf(value) > -1){
                tr[i].style.display="";
            }else{
                tr[i].style.display="none";
            }
        }
    }

}
function filter1(){
    var input,value,table,tr,td,i,tdval;
    input=document.getElementById('search1');
    value=input.value.toUpperCase();

    table=document.getElementById('mytbl1');
    tr=table.getElementsByTagName('tr');
    
    for(i=1;i<tr.length;i++){
        td=tr[i].getElementsByTagName('td')[1];
        // console.log(td);
        if(td){
            tdval=td.textContent || td.innerText;
            // console.log(tdval);
            if(tdval.toUpperCase().indexOf(value) > -1){
                tr[i].style.display="";
            }else{
                tr[i].style.display="none";
            }
        }
    }

}