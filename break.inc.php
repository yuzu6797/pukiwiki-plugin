<?php
// PukiWiki - Yet another WikiWikiWeb clone
// $Id: break.inc.php,v 1.0 2025/08/11 $
//
// break plugin

define('PLUGIN_BREAK_USAGE', '&break([px]){text};');

function plugin_break_inline()
{
	$args = func_get_args();
	$body = strip_htmltag(array_pop($args)); // テキスト本文
	$width = $args[0]; // 折り返し幅指定
	
	if ($body == '') return PLUGIN_BREAK_USAGE;
	
	// 折り返し幅指定する場合styleに追加 未記入または数値以外なら無視
	if (preg_match('/^[1-9]\d*$/', $width)) {
		$width_block = ' max-width:' . $width .'px; display: inline-block;';
	}

	return '<span style="white-space: normal; word-break: break-all; overflow-wrap: anywhere;' . $width_block . '">' . $body . '</span>';
}
?>
