=== Croox Hide Singular ===
Tags: gutenberg,hide,singular,single,post
Donate link: https://waterproof-webdesign.info/donate
Contributors: jhotadhari
Tested up to: 5.2.3
Requires at least: 5.0.0
Requires PHP: 7.0.0
Stable tag: trunk
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Hide singular view for a specific post


== Description ==

Adds an option to the block-editor status panel to hide the singular view for the specific post or custom post type.

Visitors trying to access the singular view will be redirected to the home page. If Yoast SEO Plugin and breadcrumbs are activated, redirects to parent item in breadcrumb list.

Currently redirecting with status code 301.

Uses the post meta key ```hisi_hide_singular```. If post is hidden, setting is '1', otherwise metakey is removed and setting is empty.

Helper function to check if a post is hidden: ```hisi_post_is_hidden( $post_id )```, returns boolean.

== Installation ==
Upload and install this Theme the same way you'd install any other Theme.


== Screenshots ==


== Upgrade Notice ==



# 

== Changelog ==

## 0.1.8 - 2020-08-22
Updated to generator-wp-dev-env#0.16.0 ( wp-dev-env-grunt#0.11.1 wp-dev-env-frame#0.11.0 )

### Changed
- Updated to generator-wp-dev-env#0.16.0 ( wp-dev-env-grunt#0.11.1 wp-dev-env-frame#0.11.0 )

## 0.1.7 - 2020-07-27
Update deps

### Changed
- Updated to generator-wp-dev-env#0.15.0 ( wp-dev-env-grunt#0.9.10 wp-dev-env-frame#0.9.0 )

## 0.1.6 - 2020-04-12
Update dependencies

### Changed
- Updated to generator-wp-dev-env#0.14.1 ( wp-dev-env-grunt#0.9.6 wp-dev-env-frame#0.8.0 )

### Fixed
- Warning 'Each child in a list should have a unique "key" prop.'

## 0.1.5 - 2020-02-05
Update dependencies

### Changed
- Updated to generator-wp-dev-env#0.12.0 ( wp-dev-env-grunt#0.9.5 wp-dev-env-frame#0.7.6 )

## 0.1.4 - 2019-11-29
Updated to generator-wp-dev-env#0.10.10

### Changed
- Updated to generator-wp-dev-env#0.10.10 ( wp-dev-env-grunt#0.8.9 wp-dev-env-frame#0.7.6 )

## 0.1.3 - 2019-09-27
Fixes

### Fixed
- filter `hisi_post_types`

## 0.1.2 - 2019-09-16
Fix project_kind in project init args

## 0.1.1 - 2019-09-16
Update wp-dev-env-frame#0.7.2

## 0.1.0 - 2019-09-15
Updated to generator-wp-dev-env#0.10.3 ( wp-dev-env-grunt#0.8.5 wp-dev-env-frame#0.7.1 )

### Added
- Remove link from yoast breadcrumbs

### Changed
- Updated to generator-wp-dev-env#0.10.3 ( wp-dev-env-grunt#0.8.5 wp-dev-env-frame#0.7.1 )

### Removed
- function `hisi_get_post_types` use `croox\\wde\\utils\\Post_Type::get_all` instead
