<?php

/**
 * @package  MySuperPluginName
 */


class Activate
{
	public static function activate()
	{
		flush_rewrite_rules();
	}
}
