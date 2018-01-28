<?php
/**
 * @author :  SAIFUL ISLAM
 * @Coauthor : ASHIK SHAFAYTE
 * @Coauthor : NURUL HASAN
 * @batch  :SUST CSE 2013-14
 * @contact : saiful.sust.cse@gmail.com
 * @facebook : https://www.facebook.com/SaifulIslamLitonSust
 * @facebook : https://www.facebook.com/ashik.shafayet.5
 * @facebook : https://www.facebook.com/hasan.sust.cse
 * @package SUST SCHOOL WEB SITE
 * @version CVS: $Id: reader.php 19 2007-03-13 12:42:41Z shangxiao $
 * please ,contact with me .i will be pleasure if you contact with me for your important suggestions and opions for improving my coding or my coding skill
 **/
/**
 * @package using packege
 **/

namespace App\Http\Services;
define('SIZE', 100);
class StringProcessor {
	public static function passageReform($passage) {
		$temp = "";
/***
| = bold
< = link
 **/
		$startB = "&nbsp<b>";
		$endB = "</b>&nbsp";
		$startLink = "&nbsp  <a href='";
		$endLink = "'> Link Here </a>&nbsp";
		$test = False;
		for ($in = 0; $in < strlen($passage); $in++) {
			if ($passage[$in] == '|' && $test == False) {
				$temp .= $startB;
				$test = True;
			} else {
				if ($passage[$in] == '|' && $test == True) {
					$temp .= $endB;
					$test = False;
				} else {
					if ($passage[$in] == '<' && $test == False) {
						$temp .= $startLink;
						$test = True;
					} elseif ($passage[$in] == '>' && $test == True) {
						$temp .= $endLink;
						$test = False;
					} else {
						$temp .= $passage[$in];
					}
				}
			}
		}
		return $temp;
	}
	public static function descriptionProcess($description) {
		$temp = "";
		for ($i = 0; $i < strlen($description); $i++) {
			if ($description[$i] == '"' || $description[$i] == '\'') {
				$temp .= '\\';
				$temp .= $description[$i];
			} else {
				$temp .= $description[$i];
			}
		}
		return $temp;
	}
	public static function stringCutting($description) {
		$temp = "";
		$count = True;
		$found = False;
		for ($i = 0; $i < SIZE && $i < strlen($description); $i++) {
			if ($description[$i] == '<' && $found == False) {
				$count = False;
				$found = True;
				continue;
			} elseif ($description[$i] == '>' && $found == True) {
				$count = True;
				$found = False;
				continue;
			}
			if ($count == True) {
				$temp .= $description[$i];
			}
		}
		return $temp;
	}
	public static function youtubeLinkFormation($link) {
		$temp = "https://www.youtube.com/embed/";
		$add = False;
		$stop = False;
		for ($i = 0; $i < strlen($link); $i++) {

			if ($link[$i] == '&') {
				break;
			}

			if ($add == True) {
				$temp .= $link[$i];
			}
			if ($link[$i] == 'v' && $stop == False) {
				$add = True;
				$stop = True;
				$i++;
			}

		}
		$temp .= '?rel=1';
		return $temp;
	}

}