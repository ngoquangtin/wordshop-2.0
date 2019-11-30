function post_series_slide(){
	var $a = $('div.series h3 a');
	var $ul = $('div.series ul');
	$a.text('Show');
	$ul.slideUp(0);
	
	$a.click(function(){
		var _text = $(this).text();
		
		if( _text == 'Show' ){
			$a.text('Hide');
			$ul.slideDown(300);
		} else {
			$a.text('Show');
			$ul.slideUp(300);
		}
		return false;
	});
}

function show_reply_comment_form(){
	time = 400;

	$('a.reply-comment').click(function(){
		$form = $(this).parent().prev();
		if($form.is(':visible')){
			$(this).text('Reply');
			$form.slideUp(time);
		} else {
			$('.comment-reply-form').slideUp(time);
			$('button.show-reply-form').text('Reply');

			$form.slideDown(time);
			$(this).text('Cancel');
		}

		return false;
	})
}

$(document).ready(function(){
	post_series_slide();
	show_reply_comment_form();
});