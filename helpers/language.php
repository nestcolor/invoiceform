<?php

// what languages do we support
$available_langs = array('en','nl');


	//get language
	if( isset( $_GET[ 'lang' ] ) ) {
		// get from uri
	    $_SESSION[ 'WPLANG' ] = $_GET[ 'lang' ]; 
	    $locale = $_SESSION[ 'WPLANG' ];
	    $languageMsg = 'based on url parameter';
	} elseif( isset( $_SESSION[ 'WPLANG' ] )) {
		//get from session
		$locale = $_SESSION[ 'WPLANG' ];
		$languageMsg = 'based on session variable';
	}
	else {
		// detect from HTTP_ACCEPT_LANGUAGE
		$browserLang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);
		$_SESSION[ 'WPLANG' ] = $browserLang;
		$locale = $browserLang;
		$languageMsg = 'based on browser language';
	}

	// if not supported language set English
	if(!in_array($locale, $available_langs)) {
		$locale = 'en';
	}

	// load language array
	$languageFile = 'languages/' . $locale .'.php';
	require ($languageFile);

?>	