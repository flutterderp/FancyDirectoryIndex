<?php
/**
 * Directory index script
 *
 * Add extensions by inserting them into the $extList array, separated by commas.
 * Ex: array("jpg","png")
 *
 * @author herdyderp (flutterderp)
 * @version 1.01
 */

require_once('functions.php');
include_once('index_header.html');

$extList    = array('jpg','png','bmp','gif','log','txt');
$imgExt     = array('jpg','png','bmp','gif'); // be sure to add these to $extList if necessary
$dateFormat = 'Y-m-d, H:i:s';

if ($dir = opendir('.'))
{
	$fileList;

	while (false !== ($file = readdir($dir)))
	{
		$fileInfo = pathinfo($file);

		if (!isset($fileInfo['extension']))
		{
			$fileInfo['extension'] = '';
		}

		if (($fileInfo['basename'] != '.' && $fileInfo['basename'] != '..') && in_array($fileInfo['extension'], $extList) )
		{
			//split images from other files
			if (in_array($fileInfo['extension'], $imgExt))
			{
				$imgList[] = $fileInfo['basename'];
			}
			else
			{
				$fileList[] = $fileInfo['basename'];
			}
		}
	}

	closedir($dir);

	// display our lists
	if (isset($imgList))
	{
		displayList($imgList);
	}
	if (isset($fileList))
	{
		displayList($fileList);
	}

}

include_once('index_footer.html');
