<?php

//this file contains some generic function those would be used as utility
 
/** I needed a way to allow user comments to contain only hyperlinks as the only allowed HTML tags. This is easy enough to accomplish, but I also 
     needed a way to convert full URLs into hyperlinks, and this complicated things a bit. The functions below are not very elegant, but do the job. Function strip_tags_except() works similarly to the strip_selected_tags() function, but instead of allowing the user to specify the tags to strip, s/he can specify the tags to allow and strip all others. The third parameter, $strip, when TRUE removes "<" and ">" from the string and when FALSE converts them to "&lt;" and "&gt;" respectively.Now here are the functions.

	 Function url_to_link() simply converts full URLs into an equivalent hyperlink taking into consideration that users may end a URL with a character that's not actually part of the address.

		When using both, url_to_link() should be called before strip_tags_except(). Here's an example:

		$summary = url_to_link($summary);
		$summary = strip_tags_except($summary, array('a'), FALSE);

 */


 function strip_tags_except($text, $allowed_tags, $strip=TRUE) {
		  if (!is_array($allowed_tags))
			return $text;

		  if (!count($allowed_tags))
			return $text;

		  $open = $strip ? '' : '&lt;';
		  $close = $strip ? '' : '&gt;';

		  preg_match_all('!<\s*(/)?\s*([a-zA-Z]+)[^>]*>!', $text, $all_tags);
		  array_shift($all_tags);
		  $slashes = $all_tags[0];
		  $all_tags = $all_tags[1];
		  foreach ($all_tags as $i => $tag) {
				if (in_array($tag, $allowed_tags))
				  continue;
				$text =  preg_replace('!<(\s*' . $slashes[$i] . '\s*' .	$tag . '[^>]*)>!', $open . '$1' . $close,	$text);
			 }

		 return $text;
	}

//Function url_to_link() simply converts full URLs into an equivalent hyperlink

function url_to_link($text) {
	  $text =	preg_replace('!(^|([^\'"]\s*))' . '([hf][tps]{2,4}:\/\/[^\s<>"\'()]{4,})!mi',  '$2<a href="$3">$3</a>', $text);
	  $text =	preg_replace('!<a href="([^"]+)[\.:,\]]">!',	'<a href="$1">', $text);
	  $text = preg_replace('!([\.:,\]])</a>!', '</a>$1',	$text);
	  return $text;
	}


// this function anything to plain text
function html2text($text){
		$search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript
						'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
						'@<[\\/\\!]*?[^<>]*?>@si',            // Strip out HTML tags
						'@<![\\s\\S]*?--[ \\t\\n\\r]*>@'          // Strip multi-line comments including CDATA
		);
		$text = preg_replace($search, '', $text);
		return $text;
	}

			//example
			// $text =  url_to_link($row[0]);
			// $text = strip_tags_except($text, array('a'), FALSE);
function disp_expr($exp)
{
    switch ($exp){

        case 0: return "Fresher";
        case 2: return "1-2 yrs";
        case 4: return "2-4 yrs";
        case 7: return "4-7 yrs";
        case 10: return "7-10 yrs";
        case 45: return "10+ yrs";

    }
}
//Just to print random lines from text file
function rand_line($fileName, $maxLineLength = 4096) {
    $lines = explode("\n", file_get_contents($fileName));
    return $line = $lines[mt_rand(0, count($lines) - 1)];
    //list($text, $author) = explode('-', $line);
}

// usage
//echo rand_line("myfile.txt");
$base_url = "http://localhost/lportal/";
?>
