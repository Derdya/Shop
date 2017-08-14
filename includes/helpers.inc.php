<?
	function html($text)
	{
		return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
	}
	htmlout($text)
	{
		echo html($text);
	}
?>
