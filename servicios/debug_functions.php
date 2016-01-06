/*
*
*	Debug Functions
*
*/
<?php

function DisplayArrayVariables(&$FormVariables, &$HTMLVariables)
{
    $HTMLVariables = "";
    foreach ($FormVariables as $Name => $Value) {
	echo "Tipo de Name : " . gettype($Value) . "<br>";
    if (is_array($Value)) {
            foreach ($Value as $SubName => $SubValue) {
                $HTMLVariables .= "<i>$Name $SubName</i> = $SubValue<br>";
				echo "<pre>";
				print_r($FormVariables);
				echo "<br></pre>";
            }
		}
    } # End of foreach ($FormVariables as $Name=>$Value)
} # End of function DisplayArrayVariables
?>
