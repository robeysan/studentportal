<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('dumpthis')) {
	function dumpthis(&$vInput, $depth = 0) {
		$bgs = array ('#DDDDDD', '#C4F0FF', '#BDE9FF', '#FFF1CA');
	
		$bg = &$bgs[$depth % sizeof($bgs)];
	
		$s = "<table border='0' cellpadding='4' cellspacing='1'><tr><td style='color:black; background: none $bg; text-align: left; ";
		if (is_int($vInput)) {
			$s .= "'>";
			$s .= sprintf('int (<b>%d</b>)', intval($vInput));
		} else if (is_float($vInput)) {
			$s .= "'>";
			$s .= sprintf('float (<b>%f</b>)', doubleval($vInput));
		} else if (is_string($vInput)) {
			$s .= "'>";
			$s .= sprintf('string[%d] (<b>"%s"</b>)', strlen($vInput), $vInput);
		} else if (is_bool($vInput)) {
			$s .= "'>";
			$s .= sprintf('bool (<b>%s</b>)', ($vInput === true ? 'true' : 'false'));
		} else if (is_resource($vInput)) {
			$s .= "'>";
			$s .= sprintf('resource (<b>%s</b>)', get_resource_type($vInput));
		} else if (is_null($vInput)) {
			$s .= "'>";
			$s .= sprintf('null');
		} else if (is_array($vInput)) {
			$s .= "border-bottom: solid 2px black;'>";
			$s .= sprintf('array[%d]', count($vInput));
			$s .= "</td></tr><tr><td style='color:black; background: none $bg; text-align: left;'>" .
				  "<table border='0' cellpadding='4' cellspacing='1'>";
			foreach ($vInput as $vKey => $vVal) {
				$s .= '<tr>';
				$s .= "<td style='color:black; background-color: $bg; text-align: left;'>" .
					  sprintf('<b>%s%s%s</b>', ((is_int($vKey)) ? '' : '"'), $vKey, ((is_int($vKey)) ? '' : '"')) .
					  '</td>';
				$s .= "<td style='color:black; background-color: $bg; text-align: left;'>=></td>";
				$s .= "<td style='color:black; background-color: $bg; text-align: left;'>" .
					  dumpthis($vVal, $depth+1) .
					  '</td>';
				$s .= '</tr>';
			}
			$s .= '</table>';
		} else if (is_object($vInput)) {
			$s .= "border-bottom: solid 2px black;'>";
			$s .= sprintf('object (<b>%s</b>)', get_class($vInput));
			$s .= "</td></tr><tr><td style='color:black; background: none $bg; text-align: left;'>" .
				  "<table border='0' cellpadding='4' cellspacing='1'>";
			foreach (get_object_vars($vInput) as $vKey => $vVal) {
				$s .= '<tr>';
				$s .= "<td style='color:black; background-color: $bg; text-align: left;'>" .
					  sprintf('<b>%s%s%s</b>', ((is_int($vKey)) ? '' : '"'), $vKey, ((is_int($vKey)) ? '' : '"')) .
					  '</td>';
				$s .= "<td style='color:black; background-color: $bg; text-align: left;'>=></td>";
				$s .= "<td style='color:black; background-color: $bg; text-align: left;'>" .
					  dumpthis($vVal, $depth+1) .
					  '</td>';
				$s .= '</tr>';
			}
			$s .= '</table>';
		} else {
			$s .= "'>";
			$s .= sprintf('<b>unhandled (gettype() reports "%s")', gettype($vInput));
		}
		$s .= '</td></tr></table>';
	
		return $s;
	}
}

?>