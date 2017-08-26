<?php 


// Token functions --
// Check Anti-CSRF token
// checkToken( $_REQUEST[ 'usr_token' ], $_SESSION[ 'session_token' ], 'index.php' );
function checkToken( $user_token, $session_token, $returnURL ) {  # Validate the given (CSRF) token
	if( $user_token !== $session_token || !isset( $session_token ) ) {
		// header("Location: CSRF.php");
		// exit();
		die( 'CSRF token is incorrect' );
		//dvwaRedirect( $returnURL );
	}
	if( stripos( $_SERVER[ 'HTTP_REFERER' ] ,$_SERVER[ 'SERVER_NAME' ]) === false ) {
		die('CSRF detected!');
	}
}

function generateSessionToken() {  # Generate a brand new (CSRF) token
	if( isset( $_SESSION[ 'session_token' ] ) ) {
		destroySessionToken();
	}
	$_SESSION[ 'session_token' ] = md5( uniqid() );
}

function destroySessionToken() {  # Destroy any session with the name 'session_token'
	unset( $_SESSION[ 'session_token' ] );
}

function getTokenField() {  # Return a field for the (CSRF) token
	return "<input type='hidden' name='user_token' value='{$_SESSION[ 'session_token' ]}' />";
}
// -- END (Token functions)

?>