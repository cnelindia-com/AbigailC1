$(function() {

    // preventing page from redirecting
    $("#upload_track_in_tracks_library").on("dragover", function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(".drag_area_content").text("Drag here");
    });

    $("#upload_track_in_tracks_library").on("drop", function(e) { e.preventDefault(); e.stopPropagation(); });

    // Drag enter
    $('.upload-area').on('dragenter', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $(".drag_area_content").text("Drop");
    });

    // Drag over
    $('.upload-area').on('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $(".drag_area_content").text("Drop");
    });

    // Drop
    $('.upload-area').on('drop', function (e) {
        e.stopPropagation();
        e.preventDefault();

        $(".drag_area_content").text("Upload");

        var file = e.originalEvent.dataTransfer.files;
        var fd = new FormData();

        fd.append('track', file[0]);
		fd.append('shop_id',shop_id);
        uploadData(fd);
    });

    // Open file selector on div click
    $("#uploadtrack").click(function(){
        $("#track").click();
    });

    // file selected
    $("#track").change(function(){
        var fd = new FormData();
		
		$('.loading_icon').show();

        var files = $('#track')[0].files[0];

        fd.append('track',files);
		fd.append('shop_id',shop_id);
        uploadData(fd);
    });
});

// Sending AJAX request and upload file
function uploadData(formdata){

    $.ajax({
        url: 'upload_track_file.php',
        type: 'post',
        data: formdata,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){
			$('.loading_icon').hide();
			if(response.result == 'success'){
				$( "#track_list_table" ).prepend('<tr class="track_row_'+response.data.id+'" data-id="'+response.data.id+'"><td><img class="" src="">'+response.data.name+'</td><td class="action_td"><a class="delete_track" href="javascript:void(0);" data-id="'+response.data.id+'"><i class="fa fa-trash trash_a_track"></i></a></td></tr>');
        		
                           	
			}
			else{
				alert(response.msg);
			}
        }
    });
}



// Bytes conversion
function convertSize(size) {
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (size == 0) return '0 Byte';
    var i = parseInt(Math.floor(Math.log(size) / Math.log(1024)));
    return Math.round(size / Math.pow(1024, i), 2) + ' ' + sizes[i];
}
