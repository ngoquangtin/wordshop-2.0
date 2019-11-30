<?php
$sql = "
SELECT  m.message_id,m.comment_id, m.post_id,m.seen,
		u.display_name, u.avatar_url,
		p.title,
		c.content
FROM 	   messages AS m
INNER JOIN users 	AS u USING(user_id)
INNER JOIN posts 	AS p USING(post_id)
INNER JOIN comments AS c USING(comment_id)

WHERE author_user_id=1
ORDER BY message_id DESC
";
$new_items = 0;

if( $items = $wsdb->get_result( $sql ) ){
	foreach( $items as $item ){
		if( $item['seen'] == 0 ) ++$new_items;
	}
}

?>
<li id="mail_notificatoin_bar" class="dropdown">
	<a data-toggle="dropdown" class="dropdown-toggle" href="#">
		<i class="icon-envelope-l"></i>

		<span class="badge bg-important"><?php echo $new_items; ?></span>
	</a>
	
	<ul class="dropdown-menu extended inbox">
		<div class="notify-arrow notify-arrow-blue"></div>
		<li>
			<p class="blue">You have <?php echo $new_items; ?> new <?php echo ($new_items==1) ? 'message' : 'messages'; ?></p>
		</li>
		
		<?php if( !empty($items) ) : foreach( $items as $i ) : ?>
			
		<li>
		<?php $link = get_the_permalink( $i['post_id'] ). '#div-comment-'.$i['comment_id'];?>
			<a data-id="<?php echo $i['message_id']; ?>" class="message-item" <?php if($i['seen']==0) echo 'style="background-color:#bdbdbd;"'; ?> target="_blank" href="<?php echo $link; ?>">
				<span class="photo"><img alt="avatar" src="<?php echo (!is_null($i['avatar_url'])) ? $i['avatar_url'] : DEFAULT_USER_AVATAR_URL; ?>" /></span>
				<span class="subject">
					<span class="from"><?php echo $i['display_name']; ?> on <?php echo $i['title']; ?></span>
					<span class="time">1 min</span>
				</span>
				<span class="message">asdas</span>
			</a>
			<a class="delete-message" data-id="<?php echo $i['message_id']; ?>" href="#">Delete</a>
		</li>
		<?php endforeach; ?>
		
		<li><a class="delete-all-messages" href="#">Delete All Messages</a></li>
		<?php endif; ?>
	</ul>
</li>