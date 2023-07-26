<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo esc_html( $form['title'] ); ?></title>
<style type="text/css">
body {
	padding: 0;
	font-family: sans-serif;
	font-size: 13px;
}
</style>

<?php
// Check for "site" querystring and assign to variable
$site = ( isset( $_GET['site'] ) ) ? $_GET['site'] : 'seattlegood';

if ( $site != '' ):

	// Check whether site is being served locally or from a public server
	$is_local_server = ( $_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_NAME'] === '127.0.0.1' || strpos($_SERVER['HTTP_HOST'], '.local') !== false );

	switch($site):

		// Northwest Sewn
		case 'northwestsewn':
			if ( $is_local_server ) {
				$domain = 'https://northwest-sewn.local';
			} else {
				$domain = 'https://northwestsewn.org';
			}
			$form_style = $domain . '/wp-content/themes/northwestsewn/css/gravity-forms.css';	?>
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
			
			<link rel="stylesheet" href="https://use.typekit.net/bkb6fpl.css">
			<?php
			break;

	endswitch;

endif;
?>

<link rel="stylesheet" href="<?php echo $form_style; ?>" type="text/css" media="all" />

<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/iframeResizer.contentWindow.min.js' id='iframeResizer'></script>

<?php do_action( 'gfiframe_head', $form_id, $form ); ?>
</head>
<body>
<?php GFFormDisplay::print_form_scripts( $form, false ); // ajax = false ?>
<?php gravity_form( $form_id, $display_title, $display_description ); ?>
<?php wp_footer(); ?>
</body>
</html>
