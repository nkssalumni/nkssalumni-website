// read 
function read(){
	var search = $('#search').val();
	var data_view = $('#data_view_ip').text();
	$.get(
		"/api-meals-read",
		{
			search:search,
			data_view:data_view
		},
		function (data, status) {
			console.log(data);
        	$("#data_container").html(data);
    	}
    );
} 

function clear_add_field() {

	$("#add_title").val("");
	$("#add_price").val("");
	$("#file").val("");
	$("#add_description").val("");
	$("#add_category").val("");
	
}

// add
function add_submit(){

	// pull in values/variables
	var title = $("#add_title").val();
	var price = $("#add_price").val();
	var image = $("#file").val();
	var description = $("#add_description").val();
	var category = $("#add_category").val();
	var form_data = new FormData();
	
	

	if (!title || !image || !description || !category) {
		$('.add_op').html('<div class="alert alert-danger" role="alert"><i class="fa fa-warning"></i> Please fill out all sections</div>');
	} else {
		var name = document.getElementById("file").files[0].name;
	    var ext = name.split('.').pop().toLowerCase();
	    var extensions_arr = ["png","jpg","jpeg","PNG","JPG", "JPEG"];

		if(jQuery.inArray(ext, extensions_arr) !== -1){
          var oFReader = new FileReader();
          oFReader.readAsDataURL(document.getElementById("file").files[0]);
          var f = document.getElementById("file").files[0];
          var fsize = f.size||f.fileSize;
          if(fsize > 5242880)
          {
          alert("File Size is too big");
          }
          else
          {
          	form_data.append("file", document.getElementById('file').files[0]);
          	form_data.append("title", title);
          	form_data.append("description", description);
          	form_data.append("category", category);

		    $.ajax({  
		        url:"/api-meal-add",  
		        method:"POST",  
		        data: form_data,
		        processData: false,
   				contentType: false,
		        
		        success:function(data)  
		        {  
		        	// refresh data
		            read();  
		
		            // check result from database
		            //console.log(data);
		            var result = JSON.parse(data);
		            if (result.message == 'success') {
		            	read();
		            	$("#add_modal").modal("hide");
					    $('#op').html('<div class="alert alert-success animated bounce" role="alert"><i class="fa fa-check"></i> Device Added Succesfully.</div>');
		            } else {
		            	$('.add_op').html('<div class="alert alert-danger" role="alert"><i class="fa fa-warning"></i> Error ' + result.message + '</div>');
		            }
		            setInterval(function(){
					          $('#op').html('');
					 }, 5000);
		
		            // clear the fields
		            clear_add_field();
		        },
		        error: function (jqXhr, textStatus, errorThrown) {
		            //$('#_op').html(jqXhr + textStatus + errorThrown);
		            alert("Error!");
		        } 
		    }); 

			} 
		}
	}

}


// update
// get details
function getDetails(id){
	// Add User ID to the hidden field for future usage
    $("#edit_id").val(id);
    $.post("/api-meals-getDetails", {
            id: id
        },
        function (data, status) {
        	//console.log(data);
            // PARSE json data
            var meal = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#edit_title").val(meal.title);
            $("#edit_image").val(meal.image);
            $("#edit_description").val(meal.description);
            $("#edit_category").val(meal.category);			        
        }
	);
	
	
    // Open modal popup
    $("#edit_modal").modal("show");
    // document.getElementById('_update_modal').style.display='block';
}


function more(id){
	// Add User ID to the hidden field for future usage
    $.post("/api-meals-getDetails", {
            id: id
        },
        function (data, status) {
        	console.log(data);
            // PARSE json data
            var meal = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#more_title").val(meal.title);
            $("#more_image").val(meal.image);
            $("#more_description").val(meal.description);
            $("#more_category").val(meal.category);	
            $("#more_updated_at").val(meal.updated_at);
            $("#more_created_at").val(meal.created_at);	


            $('#more_content_injector').html(`
            	<ul class="list-group list-group-flush bg-black">
                  <li class="list-group-item bg-black bg-black"><b>Title: </b> `+meal.title+`</li>
                  <li class="list-group-item bg-black"><b>Description: </b> `+meal.description+`</li>
                  <li class="list-group-item bg-black"> <b>Category: </b> `+meal.category+`</li>
                  <li class="list-group-item bg-black"><b>Hidden: </b> `+meal.hidden+`</li>
                  <li class="list-group-item bg-black"><i class="fa fa-calendar"></i> <b>Last Update: </b> `+meal.updated_at+`</li>
                  <li class="list-group-item bg-black"><i class="fa fa-calendar"></i> <b>Created at: </b> `+meal.created_at+`</li>                      
                 </ul>`);	        
        }
	);
	
	
    // Open modal popup
    $("#more_modal").modal("show");
    // document.getElementById('_update_modal').style.display='block';
}


// edit
function edit_submit(){

	// pull in values/variables
	var id = $("#edit_id").val();
    var title  = $("#edit_title").val();
    var price = $("#edit_price").val();
    var image = $("#edit_file").val();
    var description = $("#edit_description").val();
    var category = $("#edit_category").val();
	var form_data = new FormData();
	
	

	if (!title || !image || !description || !category) {
		$('.add_op').html('<div class="alert alert-danger" role="alert"><i class="fa fa-warning"></i> Please fill out all sections</div>');
	} else {
		var name = document.getElementById("edit_file").files[0].name;
	    var ext = name.split('.').pop().toLowerCase();
	    var extensions_arr = ["png","jpg","jpeg","PNG","JPG", "JPEG"];

		if(jQuery.inArray(ext, extensions_arr) !== -1){
          var oFReader = new FileReader();
          oFReader.readAsDataURL(document.getElementById("edit_file").files[0]);
          var f = document.getElementById("edit_file").files[0];
          var fsize = f.size||f.fileSize;
          if(fsize > 5242880)
          {
          alert("File Size is too big");
          }
          else
          {
          	form_data.append("file", document.getElementById('edit_file').files[0]);
          	form_data.append("id", id);
          	form_data.append("title", title);
          	form_data.append("price", price);
          	form_data.append("description", description);
          	form_data.append("category", category);

		    $.ajax({  
		        url:"/api-meals-updateDetails",  
		        method:"POST",  
		        data: form_data,
		        processData: false,
   				contentType: false,
		        
		        success:function(data)  
		        {  
		        	// refresh data
		            read();  
		
		            // check result from database
		            //console.log(data);
		            var result = JSON.parse(data);
		            if (result.message == 'success') {
		            	read();
		            	$("#edit_modal").modal("hide");
					    $('#op').html('<div class="alert alert-success animated bounce" role="alert"><i class="fa fa-check"></i> Device Added Succesfully.</div>');
		            } else {
		            	$('.edit_op').html('<div class="alert alert-danger" role="alert"><i class="fa fa-warning"></i> Error ' + result.message + '</div>');
		            }
		            setInterval(function(){
					          $('#op').html('');
					 }, 5000);
		
		            // clear the fields
		            clear_add_field();
		        },
		        error: function (jqXhr, textStatus, errorThrown) {
		            //$('#_op').html(jqXhr + textStatus + errorThrown);
		            alert("Error!");
		        } 
		    }); 

			} 
		}
	}

}

function hide_toggle(id){
	var conf = confirm("Do you really want to hide/un-hide this device?");
	if (conf == true) {
        $.post("/api-meals-hide-toggle", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                read();
                $('#op').html('<div class=" mt-3 alert alert-success animated bounce" role="alert"><i class="fa fa-check"></i>Record updated</div>');
                setInterval(function(){
					$('#op').html('');
				}, 5000);
            }
        );
    }
}

// delete
function deleteDetails(id){
	var conf = confirm("Do you really want to delete this device?");
    if (conf == true) {
        $.post("/api-meals-delete", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                read();
                $('#op').html('<div class="mt-3 alert alert-success animated bounce" role="alert"><i class="fa fa-check"></i>Record Deleted</div>');
                setInterval(function(){
					$('#op').html('');
				}, 5000);
            }
        );
    }
}



// doc ready
$( document ).ready(function() {

	$(document).ajaxStart(function(){
	    $("#jq_loader").css("display", "block");
	});
	$(document).ajaxComplete(function(){
	    $("#jq_loader").css("display", "none");
	});

// datatables
	/*$('.table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });*/

// main crud
   read(); 

// search
   $('#search').on('keyup', function(){
    	read();
    	// console.log("data");
    });

// add
	$('#add_btn').click(function(){
		// getCategories("#add_type");
		$("#add_modal").modal("show");
		return false;
	});

	$('#add_submit').click(function(){
		add_submit();
		return false;
	});

	

// edit
	$('#edit_submit').click(function(){
		edit_submit();
		return false;
	});

   $('#close_edit_modal').click(function(){
   		$("#edit_id").val("");
		$("#edit_title").val("");
		$("#edit_price").val("");
		$("#edit_image").val("");
		$("#edit_description").val("");
		$("#edit_category").val("");
	    // alert("cleared");
	    $("#edit_modal").modal("hide");
   	return false;
   });


// reports
	$('#reports_btn').click(function(){
		$("#reports_modal").modal("show");
		return false;
	});

	
// table view / card view
	$('#data_view_btn').click(function(){
		var data_view = $('#data_view_ip').text();
		
		if (data_view == 'table') {
			$('#data_view_ip').text("card");
			$('#data_view_btn').html('<i class="fa fa-table"></i> Table View');
		} else if (data_view == 'card') {
			$('#data_view_ip').text("table");
			$('#data_view_btn').html('<i class="fa fa-id-card"></i> Card View');
		}
		read();
		//console.log('view changed');
		return false;
	});

});