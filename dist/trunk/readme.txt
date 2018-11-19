=== Hide Singular ===
Tags: gutenberg,hide,singular,single,post
Donate link: https://waterproof-webdesign.info/donate
Contributors: jhotadhari
Tested up to: 4.9.8
Requires at least: 4.9.6
Requires PHP: 5.6
Stable tag: trunk
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Hide singular view for a specific postHide singular view for a specific post


== Description ==

Adds an option to the gutenberg editor status panel to hide the singular view for the specific post or custom post type.

Visitors trying to access the singular view will be redirected to the home page. If Yoast SEO Plugin and breadcrumbs are activated, redirects to parent item in breadcrumb list.

Currently redirecting with status code 301.

Uses the post meta key ```hisi_hide_singular```. If post is hidden, option is '1', otherwise metakey is removed and setting is empty.

Helper function to check if a post is hidden: ```hisi_post_is_hidden( $post_id )```, returns boolean.

> This Plugin is generated with [generator-pluginboilerplate version 1.2.5](https://github.com/jhotadhari/generator-pluginboilerplate)

== Installation ==
Upload and install this Plugin the same way you'd install any other plugin.

== Screenshots ==

== Upgrade Notice ==

== Changelog ==

0.0.1
tested with gutenberg v4.4.0

