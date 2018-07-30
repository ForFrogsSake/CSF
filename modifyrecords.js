function edit_row(id){
         
         var status=document.getElementById("status"+id).innerHTML;
         var acctype=document.getElementById("acctype"+id).innerHTML;
    
         document.getElementById("status"+id).innerHTML="<select><option>active</option><option>inactive</option></select>";
         document.getElementById("acctype"+id).innerHTML="<select><option>user</option><option>admin</option><option>superAdmin</option></select>";

         document.getElementById("edit_button"+id).style.display="none";
         document.getElementById("save_button"+id).style.display="block";
}
        

function save_row(id){
             
             var status=document.getElementById("status"+id).value;
             var acctype=document.getElementById("acctype"+id).value;

             $.ajax({
              type:'post',
              url:'modify_records.php',
              data:{
                   edit_row:'edit_row',
                   row_id:id,
                   status:status,
                   acctype:acctype
                  },
              success:function(response) {
               if(response=="success")
               {
               
                document.getElementById("status"+id).innerHTML=status;
                document.getElementById("acctype"+id).innerHTML=acctype;
            
                   document.getElementById("edit_button"+id).style.display="block";
                document.getElementById("save_button"+id).style.display="none";
               }
              }
             });
}


function delete_row(id){
     $.ajax
     ({
      type:'post',
      url:'modify_records.php',
      data:{
       delete_row:'delete_row',
       row_id:id,
      },
      success:function(response) {
       if(response=="success")
       {
        var row=document.getElementById("row"+id);
        row.parentNode.removeChild(row);
       }
      }
     });
}
