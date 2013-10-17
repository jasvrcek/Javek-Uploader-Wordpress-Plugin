=== Javek Uploader ===
Contributors: javek
Donate link: https://www.javek.com/sign_up.htm
Tags: widget, client portal, file sharing, uploader
Requires at least: 2.8
Tested up to: 3.6.1
Stable tag: 3.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows people to securely send you files with an encrypted upload form on your Wordpress site.

== Description ==

This plugin allows you to embed secure a file upload form on your Wordpress site as a widget. 

The form allows people to securely send you large files using the Public Buckets feature of a Javek client portal. In order
to use the plugin, you must have a Javek subscription. Find out more about Javek here: [http://www.javek.com/wordpress-uploader.htm](http://www.javek.com/wordpress-uploader.htm?utm_source=wordpress-plugin-page&utm_medium=webpage&utm_content=plugin-description&utm_campaign=Wordpress).


== Installation ==

* Upload `javek-uploader` folder to the `/wp-content/plugins/` directory
* Activate the plugin through the 'Plugins' menu in WordPress
* Sign up for Javek by clicking the free trial button on this page: [http://www.javek.com/wordpress-uploader.htm](http://www.javek.com/wordpress-uploader.htm?utm_source=wordpress-plugin-page&utm_medium=webpage&utm_content=plugin-installation&utm_campaign=Wordpress)
* Enter the shortcode into a post or page. The shortcode is `[javek-uploader name="your-company"]`.
* OR - Add the Javek Uploader widget to your template. Go to Appearance > Widgets and drag the Javek Uploader widget into one of the available template slots on the right. Enter the url for your Javek subscription and click Save.

== Frequently Asked Questions ==

= Does a Javek subscription cost anything? =

Yes - however, you can try it for free for 30 days. Details can be found at [http://www.javek.com/pricing.htm](http://www.javek.com/pricing.htm?utm_source=wordpress-plugin-page&utm_medium=webpage&utm_content=plugin-faq&utm_campaign=Wordpress)

= My upload form says "Oops - page not found!" =

This means you entered your portal url incorrectly. If your portal is located at https://www.javek.com/my-portal, you would enter "my-portal" (without the quotes) in the url box of the widget form, or the "name" attribute of the shortcode [javek-uploader name="my-portal"].

= My upload form says "Public uploads are disabled for this Javek subscription." =

You need to enable your upload form. Login to your Javek subscription, go to the Administration tab and click "Buckets" in the right-side menu. Click the "Public Buckets/Uploads" button, check the box in the popup that says "Enable public buckets" and click "Save and Get Code". (You don't need the code - this plugin embeds the code for you) 

== Screenshots ==

1. View of the upload form, step 1.
2. View of upload form, step 2.

== Changelog ==

= 3.2 =
* Added shortcode for uploader - allows you to add an upload form within any post or page

= 3.1 =
* Added css media queries to resize uploader for mobile devices

= 3.0 =
* Switched to v3 uploader, which removes Javek branding from upload form for Enterprise-level subscriptions

= 2.1 =
* Added optional widget border, edited widget background color to help integration with dark-background themes

= 2.0 =
* Updated plugin to use v2 of Javek Uploader

= 1.0 =
* First release

== Upgrade Notice ==

= 3.2 =
Added shortcode for inserting uploader form into Posts and Pages: [javek-uploader name="your-portal-name"]

= 3.1 =
Improves compatibility with mobile devices

= 3.0 =
Removes Javek branding from upload forms for Enterprise-level subscriptions

= 2.1 =
Better integration with dark-background websites, optional widget border

= 2.0 =
Switch to new Javek uploader widget, allows multiple file uplaods

= 1.0 =
First release
