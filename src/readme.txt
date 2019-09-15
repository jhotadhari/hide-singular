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

