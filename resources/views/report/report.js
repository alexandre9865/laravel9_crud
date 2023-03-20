$(document).ready(function() {
    $("#add-profile").click(function(){
        addProfile();
    }); 
});

$(document).on('click','.delete-profile',function(){
    deleteProfile($(this).data('id'));
});

function addProfile(){
    let idProfile = $('#profiles-select').val();
    if($('#profile-'+idProfile).length==0 && idProfile!=0){
        $('#profiles-table').append(
            '<tr id="profile-'+idProfile+'">'+
                '<td>'+
                    $('#profiles-select').children(':selected').text()+
                    '<input type="hidden" name="profiles[]" value="'+idProfile+'">'+
                '</td>'+
                '<td>'+
                    '<button type="button" data-id="'+idProfile+'" class="delete-profile btn btn-danger">Delete</button>'+
                '</td>'+
            '</tr>'
        );
    }
}

function deleteProfile(idProfile){
    $('#profile-'+idProfile).remove();
}
