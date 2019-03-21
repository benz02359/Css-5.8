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
.add {
    float: right;    
}
.rightnav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    right: 0;
    background-color: #ffffff;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.rightnav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.rightnav a:hover {
    color: #f1f1f1;
}

.rightnav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
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
firebase.database().ref('solution/').on('value', function(snapshot) {
    var value = snapshot.val();
    var htmls = [];
    $.each(value, function(index, value){
    	if(value) {
    		htmls.push('<tr>\
        		<td>'+ value.title +'</td>\
        		<td>'+ value.des +'</td>\
                <td>'+ value.program +'</td>\
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
    
	var values = $("#addUser").serializeArray();
	var des = values[0].value;
	var program = values[1].value;
    var title = values[2].value;
	var userID = lastIndex+1;

    firebase.database().ref('/solution/' + userID).set({
        title: title,
        des: des,
        program: program,
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
	firebase.database().ref('/solution/' + updateID).on('value', function(snapshot) {
		var values = snapshot.val();
		var updateData = '<div class="form-group">\
		        <label for="title" class="col-md-12 col-form-label">Title</label>\
		        <div class="col-md-12">\
		            <input id="title" type="text" class="form-control" name="title" value="'+values.title+'" required autofocus>\
		        </div>\
		    </div>\
		    <div class="form-group">\
		        <label for="des" class="col-md-12 col-form-label">Description</label>\
		        <div class="col-md-12">\
		            <input id="des" type="text" class="form-control" name="des" value="'+values.des+'" required autofocus>\
		        </div>\
		    </div>\
            <div class="form-group">\
		        <label for="program" class="col-md-12 col-form-label">Program</label>\
		        <div class="col-md-12">\
		            <input id="program" type="text" class="form-control" name="program" value="'+values.program+'" required autofocus>\
		        </div>\
		    </div>';

		    $('#updateBody').html(updateData);
	});
});

$('.updateUserRecord').on('click', function() {
	var values = $(".users-update-record-model").serializeArray();
	var postData = {
	    title : values[0].value,
        des : values[1].value,
        program : values[2].value,
	};

	var updates = {};
	updates['/solution/' + updateID] = postData;

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
	firebase.database().ref('solution/' + id).remove();
    $('body').find('.users-remove-record-model').find( "input" ).remove();
	$("#remove-modal").modal('hide');
});
$('.remove-data-from-delete-form').click(function() {
	$('body').find('.users-remove-record-model').find( "input" ).remove();
});
});

function openNav() {
    document.getElementById("myrightnav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("myrightnav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
</script>	




<div class="main" style="margin-left:120px">
    <div class="">
        <div class="card card-default">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <strong>Helper</strong>
                        <div class="add">
                        <button type="button" aria-hidden="true" onclick="openNav()" >+</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Program</th>
                        <th width="180" class="text-center">Action</th>
                    </tr>
                    <tbody id="tbody">
                        	
                    </tbody>	
                </table>
            </div>
        </div>
    </div>
</div>

<div id="myrightnav" class="rightnav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    		<div class="card card-default">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <strong>Add topic</strong>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form id="addUser" class="" method="POST" action="">
                    	<div class="form-group">
                            <label for="title" class="col-md-12 col-form-label">Title</label>

                            <div class="col-md-12">
                                <input id="title" type="text" class="form-control" name="title" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="des" class="col-md-12 col-form-label">Description</label>

                            <div class="col-md-12">
                                <input id="des" type="text" class="form-des" name="des" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="program" class="col-md-12 col-form-label">Program</label>

                            <div class="col-md-12">
                                <input id="program" type="text" class="form-des" name="program" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-3">
                                <button type="button" class="btn btn-primary btn-block desabled" id="submitUser">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
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
                    <button type="button" class="btn btn-danger waves-effect waves-light deleteMatchRecord" data-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Update Model -->
<form action="" method="POST" class="users-update-record-model form-horizontal">
    <div id="update-modal" class="modal fade" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
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