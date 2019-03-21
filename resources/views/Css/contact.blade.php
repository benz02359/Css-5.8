@extends('css.master')

@section('style')
<style type="text/css">
.desabled {
	pointer-events: none;
}
card-body {
    border-style: solid;
    border-color: #ffff00;
}
</style>
@endsection

@section('content')
<script>
	
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDiaUDP4dhP_FUbTXOFa-g7ugATxi9lmdI",
    authDomain: "hdpj-632ed.firebaseapp.com",
    databaseURL: "https://hdpj-632ed.firebaseio.com",
    projectId: "hdpj-632ed",
    storageBucket: "hdpj-632ed.appspot.com",
    messagingSenderId: "120261714092"
  };
  firebase.initializeApp(config);
  var database = firebase.database();

var lastIndex = 0;

// Get Data
firebase.database().ref('contact/').on('value', function(snapshot) {
    var value = snapshot.val();
    var htmls = [];
    $.each(value, function(index, value){
    	if(value) {
    		htmls.push('<tr>\
        		<td>'+ value.name +'</td>\
        		<td>'+ value.company +'</td>\
                <td>'+ value.email +'</td>\
        		<td><a data-toggle="modal" data-target="#update-modal" class="btn btn-outline-success updateData" data-id="'+index+'">Update</a>\
        		<a data-toggle="modal" data-target="#remove-modal" class="btn btn-outline-danger removeData" data-id="'+index+'">Delete</a></td>\
        	</tr>');
    	}    	
    	lastIndex = index;
    });
    $('#tbody').html(htmls);
    $("#submitUser").removeClass('desabled');
});


// Add Data
$(document).ready(function(){
$("#submitUser").on('click', function(){
    alert("The paragraph was clicked.");
	var values = $("#addUser").serializeArray();
	var company = values[0].value;
	var email = values[1].value;
    var name = values[2].value;
	var userID = lastIndex+1;

    firebase.database().ref('/contact/' + userID).set({
        company: company,
        email: email,
        name: name,
    });

    // Reassign lastID value
    lastIndex = userID;
	$("#addUser input").val("");
});
});
// Update Data
var updateID = 0;
$(document).ready(function(){
$('body').on('click', '.updateData', function() {
	updateID = $(this).attr('data-id');
	firebase.database().ref('/contact/' + updateID).on('value', function(snapshot) {
		var values = snapshot.val();
		var updateData = '<div class="form-group">\
		        <label for="name" class="col-md-12 col-form-label">Name</label>\
		        <div class="col-md-12">\
		            <input id="name" type="text" class="form-control" name="name" value="'+values.name+'" required autofocus>\
		        </div>\
		    </div>\
		    <div class="form-group">\
		        <label for="company" class="col-md-12 col-form-label">Company</label>\
		        <div class="col-md-12">\
		            <input id="company" type="text" class="form-control" name="company" value="'+values.company+'" required autofocus>\
		        </div>\
		    </div>\
            <div class="form-group">\
		        <label for="email" class="col-md-12 col-form-label">Email</label>\
		        <div class="col-md-12">\
		            <input id="email" type="text" class="form-control" name="email" value="'+values.email+'" required autofocus>\
		        </div>\
		    </div>';

		    $('#updateBody').html(updateData);
	});
});

$('.updateUserRecord').on('click', function() {
	var values = $(".users-update-record-model").serializeArray();
	var postData = {
	    name : values[0].value,
        company : values[1].value,
        email : values[2].value,
	};

	var updates = {};
	updates['/contact/' + updateID] = postData;

	firebase.database().ref().update(updates);

	$("#update-modal").modal('hide');
});


// Remove Data
$("body").on('click', '.removeData', function() {
	var id = $(this).attr('data-id');
	$('body').find('.users-remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
});

$('.deleteMatchRecord').on('click', function(){
	var values = $(".users-remove-record-model").serializeArray();
	var id = values[0].value;
	firebase.database().ref('contact/' + id).remove();
    $('body').find('.users-remove-record-model').find( "input" ).remove();
	$("#remove-modal").modal('hide');
});
$('.remove-data-from-delete-form').click(function() {
	$('body').find('.users-remove-record-model').find( "input" ).remove();
});
});
</script>	




<div class="main" style="margin-left:120px">
    <div class="">
        <div class="card card-default">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <strong>Contact</strong>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>company</th>
                        <th>Email</th>
                        <th width="180" class="text-center">Action</th>
                    </tr>
                    <tbody id="tbody">
                        	
                    </tbody>	
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Delete Model -->
<form action="" method="POST" class="users-remove-record-model">
    <div id="remove-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Delete Record</h4>
                    <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h4>You Want You Sure Delete This Solution?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light deleteMatchRecord">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Update Model -->
<form action="" method="POST" class="users-update-record-model form-horizontal">
    <div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Update Record</h4>
                    <button type="button" class="close update-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" id="updateBody">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect update-data-from-delete-form" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success waves-effect waves-light updateUserRecord" data-dismiss="modal">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection