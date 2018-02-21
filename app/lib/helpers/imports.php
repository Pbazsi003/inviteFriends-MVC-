<?php

function importCSS($path)
{
	echo "<link rel=\"stylesheet\" href=\"" . DEFAULT_URL . "/assets/styles/" . $path . ".css?v=" . rand(1, 1000) . "\" />\n";
}

function importJS($path)
{
	echo "<script type=\"text/javascript\" src=\"" . DEFAULT_URL . "/assets/scripts/" . $path . ".js?v=" . rand(1, 1000) ."\"></script>\n";
}

?>