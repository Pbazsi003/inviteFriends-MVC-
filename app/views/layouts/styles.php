<?php 

$cssFile = Router::getCSSFiles(); 

foreach ($cssFile as $item => $value)
{
	echo "<link rel=\"stylesheet\" href=\"" . $value . "\" />\n";
}

?>