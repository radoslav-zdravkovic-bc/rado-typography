<?php
function rado_help_page() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	} ?>

	<div class="wrap">
    <div class="jumbotron">
      <h1>Help and FAQ</h1>
      <p>You don't know how to use Rado Typography plugin? Well...<br>
      ...you'll never find out!</p>
    </div>

	</div>

<?php }
