<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use backend\models\MailFile;
use yii\widgets\LinkPager;

$this->title = 'Mail Outbox';

$this->registerJs('
	$(document).on(\'click\', \'.div-wrap-mail\', function(){
		if ($(this).hasClass(\'open\')) {
			$(this).removeClass(\'open\');
			$(this).animate({scrollTop: 0}, 600);
		} else {
			$(\'.div-wrap-mail.open\').removeClass(\'open\').animate({scrollTop: 0}, 600);
			$(this).addClass(\'open\');
		}
	});
');

?>

<style type="text/css">
.wrap {
	background: #f5f5f5;
}
h1 {
	/*color: #09d;*/
}
.div-wrap-mail {
	position: relative;
	height: 45px;
	transition: height .3s;
	line-height: 1;
	cursor: pointer;
	padding-top: 38px;
	padding-bottom: 0;
	font-size: 14px;
	overflow: hidden;
	border-radius: 0;
	border-color: #eaeaea;
	background: #fff;
	margin-bottom: 2px;
}	
pre.pre-mail {
	line-height: 1;
	background: transparent;
	width: 100%;
	border: none;
	border-radius: 0;
	padding: 30px 60px 60px;
	margin: 0;
	overflow: auto;
	height: auto;
	white-space: pre-line;
}
pre.pre-mail i:not(.fa) {
	color: #08e;
}
.div-wrap-mail.open {
	height: auto;
}
.span-dots {
	color: #08d;
	position: absolute;
	font-size: 14px;
	right: 20px;
	top: 16px;
}
.span-dots:hover {
	text-decoration: underline;
}
.open .span-dots, .div-wrap-mail:hover .span-dots {
	color: #08d;
}
.span-counter {
	position: absolute;
	right: 2px;
	top: 8px;
	text-transform: none;
	font-size: 14px;
	font-weight: 400;
	color: #08d;
}
.span-plot {
	position: absolute;
	top: 0;
	height: 40px;
	padding: 16px;
	/*background: #f5f5f5;*/
	/*font-family: monospace;*/
	font-weight: 400;
	transition: color .3s;
	font-size: 14px;
	color: #555;
	width: 100%;
}
.span-plot.bold > span {
	font-weight: 600;
}
.span-plot:hover {
	color: #08d;
}
.span-plot > span {
	float: left;
}
.span-plot > span > span {
	/*color: #08d;*/
}
.open .span-plot {
	color: #08d;
}
*:not(html):not(body)::-webkit-scrollbar {
    background-color: #f5f5f5;
}
.fa-envelope-o {
	font-weight: 100!important;
}
.fa-envelope-o, .fa-envelope-open-o {
	position: relative;
	top: -2px;
}
.fa-envelope-o {
	top: -1px;
}
</style>

<div class="site-contact">

    <h1 style="position: relative; text-transform: none">
        <span>Outbound Letters</span>
        <span class="span-counter" style="right: 200px"><i class="fa fa-inbox"></i> &nbsp; <a href="/mail/inbox">Inbox</a></span>
        <span class="span-counter"><?php echo $dataProvider->getTotalCount() ?> letters</span>
    </h1><br/>

    <?php foreach ($dataProvider->getModels() as $mail) : ?>
    	<div class="div-wrap-mail">
    		<span class="span-plot <?php if ($mail->status == MailFile::STATUS_NEW) echo 'bold'; ?>">
    			<span class="fa <?= $mail->status == MailFile::STATUS_NEW ? 'fa-envelope-o' : 'fa-envelope-open-o' ?>" style="margin-right: 20px"></span> &nbsp; 
    			<span style="width: 260px"><?= date('Y, M d - H:i', $mail->epoch_recorded) ?></span> &nbsp; 
    			<span style="width: 300px"><span>to</span>: <span><?= $mail->address_to ?></span></span> &nbsp;
    			<span><span>subject</span>: <span><?= $mail->subject ?></span></span> &nbsp;
    		</span>
	        <!-- <span class="span-dots">&middot;&middot;&middot;</span> -->
	        <span class="span-dots pull-right"><?php echo Html::a('view html-version', ['view', 'id' => $mail->id], ['target' => '_blank']); ?></span>
	        <pre class="pre-mail">
	        	<div style="width: 300px"><i>FROM:</i> <?= $mail->address_from ?></div><br/>
	        	<div><i>TEXT-version:</i><br/><br/><?= $mail->content_text ?? '(no text-version)' ?></div><br/>
	        	<div><i>HTML-version:</i> <?php echo Html::a('view (new tab)', ['view', 'id' => $mail->id], ['target' => '_blank', 'style' => 'color: #444']); ?></div>
        	</pre>
    	</div>
    <?php endforeach; ?>

    <?php echo LinkPager::widget([
        'pagination'=> $dataProvider->getPagination(),
    ]); ?>

</div>



