<?php 

$jsFile = Router::getJSFiles(); 

foreach ($jsFile as $item => $value)
{
	echo "<script type=\"text/javascript\" href=\"" . $value . "\"></script>\n";
}

?>