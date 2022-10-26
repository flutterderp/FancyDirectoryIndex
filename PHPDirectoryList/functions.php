<?php
function displayList(array $listing)
{
	if (!empty($listing)) : ?>
		<?php
		// get date format from above
		global $dateFormat;
		?>
		<ul>
			<?php natcasesort($listing); ?>

			<?php foreach($listing as $imgLink) : ?>
				<?php $modDate = date($dateFormat, filemtime($imgLink)); ?>
				<li>
					<a href="<?php echo $imgLink; ?>" title="<?php echo $imgLink . ' &ndash; ' . $modDate; ?>"><?php echo $imgLink; ?></a>
					<br><small><i>last modified: <span class="modDate"><?php echo $modDate; ?></span></i></small>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif;
}
