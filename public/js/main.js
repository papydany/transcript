$("#department_id").change( function() {
    //$("#myModal").modal(); 
   var id =$(this).val();
     $.getJSON("/programme/"+id, function(data, status){   
     var $d = $("#programme_id"); 
     $d.empty();
     $d.append('<option value=""> ---- Select ----</option>');
       $.each(data, function(index, value) {
                       $d.append('<option value="' +value.id +'">' + value.name + '</option>');
                   });
                 //  $("#myModal").modal("hide");
                      });
   
   
   });

   $("#faculty_id").change( function() {
    //$("#myModal").modal(); 
   var id =$(this).val();
     $.getJSON("/department/"+id, function(data, status){   
     var $d = $("#depart_id"); 
     $d.empty();
     $d.append('<option value=""> ---- Select department----</option>');
       $.each(data, function(index, value) {
                       $d.append('<option value="' +value.id +'">' + value.name + '</option>');
                   });
                 //  $("#myModal").modal("hide");
                      });
   
   
   });

   $("#state_id").change( function() {
 
   // $("#myModal").modal();  
  var id =$(this).val();
  
     $.getJSON("/getlga/"+id, function(data, status){
      var $lga = $("#lga");
      $lga.empty();
      $lga.append('<option value="">Select LGA</option>');
     $.each(data, function(index, value) {
     $lga.append('<option value="' +value.id +'">' + value.lga_name + '</option>');
    });
   // $("#myModal").modal("hide");
      });
  
  
  });