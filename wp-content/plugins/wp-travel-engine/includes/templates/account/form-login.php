<?php
/**
 * Login / Register Form template.
 *
 * @package WP_Travel_Engine
 */

// Print Errors / Notices.
wp_travel_engine_print_notices();

$nonce_value = isset( $_POST['_wpnonce'] ) ? wte_clean( wp_unslash( $_POST['_wpnonce'] ) ) : ''; // phpcs:ignore
$nonce_value = isset( $_POST['wp-travel-engine-register-nonce'] ) ? wte_clean( wp_unslash( $_POST['wp-travel-engine-register-nonce'] ) ) : $nonce_value; // phpcs:ignore

if ( ! empty( $_POST['register'] ) && wp_verify_nonce( $nonce_value, 'wp-travel-engine-register' ) ) {
	$login_form_toogle = 'style="display:none"';
	$reg_form_toogle   = 'style="display:block"';
} else {
	$login_form_toogle = '';
	$reg_form_toogle   = 'style="display:none"';
}

$settings = wp_travel_engine_get_settings();

$disable_my_account_customer_registration = isset( $settings['disable_my_account_customer_registration'] ) ? $settings['disable_my_account_customer_registration'] : 'no';

$generate_username_from_email = isset( $settings['generate_username_from_email'] ) ? $settings['generate_username_from_email'] : 'no';
$generate_user_password       = isset( $settings['generate_user_password'] ) ? $settings['generate_user_password'] : 'no';
?>
<div class="wpte-lrf-wrap wpte-login" <?php echo esc_html( $login_form_toogle ); ?>>
	<div class="wpte-lrf-top">
		<div class="wpte-lrf-head">
			<?php if ( has_custom_logo() ) : ?>
				<div class="wpte-lrf-logo">
					<?php the_custom_logo(); ?>
				</div>
			<?php endif; ?>
			<div class="wpte-lrf-desc">
				<p><?php esc_html_e( 'Login to see your latest bookings, manage and edit your user profile and billing addresses', 'wp-travel-engine' ); ?></p>
			</div>
		</div>
		<form method="post" class="wpte-lrf">
			<div class="wpte-lrf-field lrf-text">
				<input required data-parsley-required-message="<?php esc_attr_e( 'Please enter your valid email or username', 'wp-travel-engine' ); ?>" type="text" name="username" value="" placeholder="<?php esc_attr_e( 'Email or username', 'wp-travel-engine' ); ?>">
			</div>
			<div class="wpte-lrf-field lrf-password">
				<input required data-parsley-required-message="<?php esc_attr_e( 'Please enter your password', 'wp-travel-engine' ); ?>" type="password" name="password" value="" placeholder="<?php esc_attr_e( 'Password', 'wp-travel-engine' ); ?>">
			</div>
			<div class="wpte-lrf-field lrf-rememberme">
				<input class="" name="rememberme" type="checkbox" id="rememberme" value="forever" />
				<?php wp_nonce_field( 'wp-travel-engine-login', 'wp-travel-engine-login-nonce' ); ?>
				<label for="rememberme"><?php esc_html_e( 'remember me', 'wp-travel-engine' ); ?></label>
			</div>
			<div class="wpte-lrf-field lrf-submit">
				<input type="submit" name="login" value="<?php esc_attr_e( 'Log In', 'wp-travel-engine' ); ?>">
			</div>
		</form>
		<?php
			// Social Login hook support
			do_action( 'wp_travel_engine_social_login' );
		?>
		<div class="wpte-lrf-footer">
			<a href="<?php echo esc_url( wp_travel_engine_lostpassword_url() ); ?>"><?php echo esc_html__( 'Forgot Password ?', 'wp-travel-engine' ); ?></a>
		</div>
	</div>
	<?php if ( 'yes' !== $disable_my_account_customer_registration ) : ?>
		<div class="wpte-lrf-bottom">
			<?php esc_html_e( "Don't have an account?", 'wp-travel-engine' ); ?> <a id="wpte-show-register-form" href="#"><?php esc_html_e( 'Sign up', 'wp-travel-engine' ); ?></a>
		</div>
	<?php endif; ?>
</div>
<?php if ( 'yes' !== $disable_my_account_customer_registration ) : ?>
	<div class="wpte-lrf-wrap wpte-register" <?php echo wte_esc_attr( $reg_form_toogle ); ?>>
		<div class="wpte-lrf-top">
			<div class="wpte-lrf-head">
				<?php if ( has_custom_logo() ) : ?>
					<div class="wpte-lrf-logo">
						<?php the_custom_logo(); ?>
					</div>
				<?php endif; ?>
				<div class="wpte-lrf-desc">
					<p><?php esc_html_e( 'Sign up to get insights, view and manage your bookings, payments, preferences and billing address on our website.', 'wp-travel-engine' ); ?></p>
				</div>
			</div>
			<?php
				// Hook for social registeration
				do_action( 'wp_travel_engine_social_registration' );
			?>
			<form method="post" class="wpte-lrf">
				<?php if ( 'no' === $generate_username_from_email ) : ?>
					<div class="wpte-lrf-field lrf-text">
						<input required data-parsley-required-message="<?php esc_attr_e( 'Please enter your desired username', 'wp-travel-engine' ); ?>" name="username" type="text" placeholder="<?php echo esc_attr__( 'Username', 'wp-travel-engine' ); ?>"/>
					</div>
				<?php endif; ?>
				<div class="wpte-lrf-field lrf-email">
					<input required data-parsley-required-message="<?php esc_attr_e( 'Please enter a valid email address', 'wp-travel-engine' ); ?>" name="email" type="email" placeholder="<?php echo esc_attr__( 'Email Address', 'wp-travel-engine' ); ?>"/>
				</div>
				<?php if ( 'no' === $generate_user_password ) : ?>
					<div class="wpte-lrf-field lrf-text">
						<input required data-parsley-required-message="<?php esc_attr_e( 'Please enter a valid password', 'wp-travel-engine' ); ?>" name="password" type="password" placeholder="<?php echo esc_attr__( 'Password', 'wp-travel-engine' ); ?>"/>
					</div>
					<?php
				endif;
				// After password field hook
				do_action( 'wp_travel_engine_after_registration_form_password', $settings );
				// Nonce security.
				wp_nonce_field( 'wp-travel-engine-register', 'wp-travel-engine-register-nonce' );
				?>
				<div class="wpte-lrf-field lrf-submit">
					<input type="submit" name="register" value="<?php esc_attr_e( 'Sign Up', 'wp-travel-engine' ); ?>">
				</div>
			</form>
			<?php
			if ( function_exists( 'get_privacy_policy_url' ) && get_privacy_policy_url() ) {

				$options                           = get_option( 'wp_travel_engine_settings', true );
				$wp_travel_engine_terms_conditions = isset( $options['pages']['wp_travel_engine_terms_and_conditions'] ) ? esc_attr( $options['pages']['wp_travel_engine_terms_and_conditions'] ) : '';
				?>
					<div class="wpte-lrf-footer">
					<?php
						printf( __( 'By signing up, you agree to our <a href="%1$s" id="terms-and-conditions" target="_blank"> Terms and Conditions</a> and <a href="%2$s" id="privacy-policy" target="_blank">Privacy Policy</a>.', 'wp-travel-engine' ), esc_url( get_permalink( $wp_travel_engine_terms_conditions ) ), esc_url( get_privacy_policy_url() ) ); // phpcs:ignore
					?>
					</div>
				<?php
			}
			?>
		</div>

		<div class="wpte-lrf-bottom">
			<?php esc_html_e( 'Have An Account?', 'wp-travel-engine' ); ?> <a id="wpte-show-login-form" href="#"><?php esc_html_e( 'Log In', 'wp-travel-engine' ); ?></a>
		</div>
	</div>
	<?php
endif;
