<?php
/**
 * This file is a PHPScoper configuration file used to add custom namespace to Stripe SDK.
 *
 * @since 1.0.0
 *
 * @package stripe-sdk-customiser/stripe-php
 */

declare(strict_types=1);

use Isolated\Symfony\Component\Finder\Finder;

return [
	'prefix'                     => 'WP', // Add your custom namespace here.
	'finders'                    => [
		Finder::create()->files()->in( 'vendor/stripe' ),
		Finder::create()
			->files()
			->ignoreVCS( true )
			->notName( '/LICENSE|.*\\.md|.*\\.dist|Makefile|composer\\.json|composer\\.lock/' )
			->exclude(
				[
					'doc',
					'test',
					'test_old',
					'tests',
					'Tests',
					'vendor-bin',
				]
			)
			->in( 'vendor/stripe' ),
	],
	'patchers'                   => [
		function( string $filePath, string $prefix, string $contents ): string {
			preg_match_all( '/use[[:blank:]].Stripe.[^\r\n]*/m', $contents, $matches );

			foreach ( $matches as $match ) {
				$newstr   = substr_replace( $match, '\\' . $prefix, 4, 0 );
				$contents = str_replace( $match, $newstr, $contents );
			}

			return $contents;
		},
	],
	'whitelist-global-constants' => true,
	'whitelist-global-constants' => true,
	'whitelist-global-functions' => true,
];
