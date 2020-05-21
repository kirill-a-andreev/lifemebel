$(document).ready(function(){
	$('#workarea').on('click', '.change', function(){
		$('#change'+$(this).attr('attr_id')).show();
		return false;
	});
	
	$('#workarea').on('click', '.change_form input[type="submit"]', function(){
		$.ajax({
			url: '',
			data: $(this).parent().serialize(),
			dataType : "json",
			success: function (data) {
				if(data['ERROR']){
					$('.information').html(data['ERROR_TEXT']);
					$('.information').addClass('error');
				}
				else{
					$('.information').html(data['TEXT']);
					$('.information').removeClass('error');
				}
				$('.information').show();
			}
		});
		return false;
	});
	
	$('#workarea').on('click', '.del', function(){
		$.ajax({
			url: '',
			data: 'ACTION=del&is_ajax=y&id='+$(this).attr('attr_id'),
			dataType : "json",
			success: function (data) {
				if(data['ERROR']){
					$('.information').html(data['ERROR_TEXT']);
					$('.information').addClass('error');
				}
				else{
					$('.information').html(data['TEXT']);
					$('.information').removeClass('error');
				}
				$('.information').show();
			}
		});
		return false;
	});
	
	
	$('#workarea').on('click', '.add_form input[type="submit"]', function(){
		$.ajax({
			url: '',
			data: $(this).parent().serialize(),
			dataType : "json",
			success: function (data) {
				if(data['ERROR']){
					$('.information').html(data['ERROR_TEXT']);
					$('.information').addClass('error');
				}
				else{
					$('.information').html(data['TEXT']);
					$('.information').removeClass('error');
				}
				$('.information').show();
			}
		});
		return false;
	});
	
});