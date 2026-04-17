<?php
/**
 * Shared helpers for Aide :: PHP Info.
 *
 * Keep this file free of side effects (no hooks/constants) so it can be safely included.
 *
 * @package aidephpinfo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether the current user is allowed to view the PHP Info screen.
 *
 * We intentionally restrict this to site admins because `phpinfo()` can expose sensitive server details.
 *
 * @return bool
 */
function aide_phpinfo_user_can_view(): bool {
	return current_user_can( 'manage_options' );
}

/**
 * Debug helper (admin-only).
 *
 * @param mixed $data Data to dump.
 * @return void
 */
function aide_phpinfo_dbg( $data = null ): void {
	if ( ! aide_phpinfo_user_can_view() ) {
		return;
	}

	ob_start();
	var_dump( $data );
	$dump = (string) ob_get_clean();

	echo '<div class="clr"></div>';
	echo '<pre style="' . esc_attr(
		'background:#1d2327;padding:20px;border-radius:5px;width:100%;color:#fff;font-size:15px;white-space:pre-wrap;word-break:break-all;max-width:100%;'
	) . '">';
	echo esc_html( $dump );
	echo '</pre>';
	echo '<div class="clr"></div>';
}