<?php

class Twitcon {

	const TWITTER_URL = 'https://twitter.com';
	private static $initialized = FALSE;

	public static function init() {
		if( ! self::$initialized ) self::init_hooks();
	}

	private static function init_hooks() {
		self::$initialized = TRUE;

		add_filter( 'the_content', array( 'Twitcon', 'link_hashtags' ) );
		add_filter( 'the_content', array( 'Twitcon', 'link_usernames' ) );
	}

	public static function link_hashtags( $content ) {
		$link = '$1<a href="' . self::TWITTER_URL . '/$2" class="twitcon twitcon-username" target="_blank">@$2</a>';
		return preg_replace( "/([^a-z])@([a-zA-Z0-9_]{1,15})/", $link, $content );
	}

	public static function link_usernames( $content ) {
		$link = '<a href="' . self::TWITTER_URL . '/search?q=%23$1" class="twitcon twitcon-hashtag" target="_blank">#$1</a>';
		return preg_replace( '/#([a-zA-Z0-9_]{1,15})/', $link, $content );
	}


}