<pre style="padding: 0 60px; white-space: break-spaces">
<?php echo $html; ?>
</pre>

<div>
<?php foreach ($attachments as $att) {
	echo $att->getContent();
} ; ?>
</div>