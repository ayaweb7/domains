<?php

if(!defined('MY_SITE'))
{
	die();
}

class Output
{
	private $siteTitle='';
	private $title='';
	private $html='';
	
	public function put($text)
	{
		$this -> html .=$text;
	}
	public function putParagraph($text)
	{
		$this -> html .="<p>{$text}</p>";
	}
	public function setSiteTitle($st)
	{
		$this -> siteTitle .=$st;
	}
	public function setTitle($t)
	{
		$this ->title .=$t;
	}
	public function get()
	{
		return $this -> html;
	}
	public function getTitle()
	{
		return $this -> title . ' - ' .$this -> siteTitle;
	}
}
?>
