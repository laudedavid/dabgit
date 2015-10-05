$(document).ready(function() {

	$('.box div').draggable({
		helper: 'clone'		
	});
	
	$('.box').droppable({
		tolerance: 'touch',
		drop: function(event,ui) {
			var id = $(ui.draggable).attr('id');
			var cake = $(ui.draggable).html();
			var box = $(this).attr('id');
			
			$.ajax({
				url: 'ajax/dragndrop.ajax.php',
				type: 'GET',
				data: {
					'id' : id,
					'box' : box
				},
				'success': function() {
					//$(ui.draggable).remove();
					$('#' + box).append('<div id="' + id + '">' + cake + '</div>');
					$('div#' + id).draggable({
						helper: 'clone'
					});
					$(this).css('min-height' , 'auto');
				}
			});
		}
	});

});