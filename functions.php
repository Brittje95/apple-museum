<?php
/**
 * Theme bootstrap file for Apple Museum.
 *
 * This file intentionally keeps only the include loading logic so that
 * theme-specific behavior is kept in the modular inc/ files.
 */

// phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingVariable
require_once __DIR__ . '/inc/theme-setup.php';
require_once __DIR__ . '/inc/enqueue.php';
require_once __DIR__ . '/inc/custom-post-types.php';
require_once __DIR__ . '/inc/taxonomies.php';
require_once __DIR__ . '/inc/custom-fields.php';
require_once __DIR__ . '/inc/theme-json-support.php';
