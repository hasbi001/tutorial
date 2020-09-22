<?php

namespace App\Helpers;

use App\Models\Shortcode;
/**
* generate shortcode
*/
class Post 
{
	protected $content;

	function __construct($content)
	{
		$this->content = $content;
	}

	public function getHtmlContent()
    {
        $pattern = "\\[(\\[?)($shortcodeNames)(?![\\w-])([^\\]\\/]*(?:\\/(?!\\])[^\\]\\/]*)*?)(?:(\\/)\\]|\\](?:([^\\[]*+(?:\\[(?!\\/\\2\\])[^\\[]*+)*+)\\[\\/\\2\\])?)(\\]?)";
         return preg_replace_callback("/{$pattern}/s", 'nameCode', $value);
    }

    public function nameCode($data)
    {
    	echo "<pre>";
    	print_r($data);
    	die();
    }
}

?>