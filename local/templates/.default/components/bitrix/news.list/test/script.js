$( document ).ready(function() {
	$('#workarea').on('click', '.news-list .change', function(){
		$('.news-list #form'+$(this).attr('attr_id')).show();
	});
	
	$('#workarea').on('click', '.news-list .del', function(){
		$('.news-list #del'+$(this).attr('attr_id')+' input').click();
	});
});