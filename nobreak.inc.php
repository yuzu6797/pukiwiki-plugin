<?php
// PukiWiki - Yet another WikiWikiWeb clone
// $Id: nobreak.inc.php,v 1.0 2025/08/11 $
//
// nobreak plugin

define('PLUGIN_NOBREAK_USAGE', '&nobreak{text};');

function plugin_nobreak_inline()
{
	$args = func_get_args();
	$body = strip_htmltag(array_pop($args)); // テキスト本文

	if ($body == '') return PLUGIN_NOBREAK_USAGE;

	return '<span style="white-space: nowrap; word-break: keep-all;">' . $body . '</span>';
}

?>
