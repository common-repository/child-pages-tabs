=== Child Pages Tabs ===
Contributors: rushijagani
Tags: child pages, child pages shortcode, child pages design
Tested up to: 4.9.5
Stable tag: 1.0.0
Requires at least: 4.4

Add all the child pages Title and Content in the tabs layout to the parent page.

== Description ==

Now its easy to add all the child pages in tabs(Horizontal & Vertical) format using Shortcode.
Add shortcode to the parent pages and it will display all the child pages title as tabs title and content as tabs content.

Basic Usage

Activate the Child Pages Tabs plugin
Add the shortcode [child_pages_tabs] to a page.


Here’s a list of shortcodes currently available in the Child Pages Tabs plugin.

1.`tabs="horizontal"` |  `tabs="vertical"`

	Based on the tabs layout requirement you can add either horizontal or verticle tabs of the child pages title.

2. `border="true" | `border="false"`

	Whether you want overall border style or just the tabs without any border.
	The default value is "true".

3. `bg-color="true" | `bg-color="false"`

	Whether you want the overall background color for tabs or just the tabs without any background color.
	Default value is "true".
	
4. `read-more-link="true" | `read-more-link="false"`

	Whether you want to add the Read More link after the tabs content or not.
	The default value is "true".


--
Example:

`[child_pages_tabs tabs="horizontal" border="true" bg-color="true" read-more-link="true"]`

== Screenshots ==

1. Vertical tabs of all the child pages.
2. Horizontal tabs of all the child pages.

== Changelog ==

= 1.0.0 =
* Initial release.

== Installation ==

1. Install the Child Pages tabs plugin either via the WordPress plugin directory or by uploading the files to your server at wp-content/plugins.
2. After activating, you can use shortcode to the pages which has a child pages.

== Frequently Asked Questions ==

1. How it works? =
It's a shortcode. Add [child_pages_tabs tabs="horizontal"] to a page/post. See above for some options.