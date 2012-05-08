=== Javek Uploader ===
Contributors: javek
Donate link: https://www.javek.com/sign_up.htm
Tags: widget, client portal, file sharing, uploader
Requires at least: 2.8
Tested up to: 3.3.2
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows people to securely send you files with an encrypted upload form on your Wordpress site.

== Description ==

This plugin allows you to embed a file upload form on your Wordpress site as a widget. 

The form allows people to securely send you large files using the Public Buckets feature of a Javek client portal. In order
to use the plugin, you must have a Javek subscription. You can sign up for Javek here: [https://www.javek.com/sign_up.htm](https://www.javek.com/sign_up.htm).

For information on Javek, please visit http://www.javek.com


== Installation ==

* Upload `javek-uploader` folder to the `/wp-content/plugins/` directory
* Activate the plugin through the 'Plugins' menu in WordPress
* Add the Javek Uploader widget to your template. Go to Appearance > Widgets and drag the Javek Uploader widget into one of the available template slots on the right. Enter the url for your Javek subscription and click Save.

== Frequently Asked Questions ==

= Does a Javek subscription cost anything? =

There is a free subscription plan with limited file storage space, as well as paid plans with more features and storage. Details can be read at [http://www.javek.com/pricing.htm](http://www.javek.com/pricing.htm)

= My upload form says "Oops - page not found!" =

This means you entered your portal url incorrectly. If your portal is located at https://www.javek.com/my-portal, you would enter "my-portal" (without the quotes) in the url box of the widget form.

= My upload form says "Public uploads are disabled for this Javek subscription." =

You need to enable your upload form. Login to your Javek subscription, go to the Administration tab and click "Buckets" in the right-side menu. Click the "Public Buckets/Uploads" button, check the box in the popup that says "Enable public buckets" and click "Save and Get Code". (You don't need the code - this plugin embeds the code for you) 

== Screenshots ==

1. View of the upload form.

== Changelog ==

= 1.0 =
* First release

== Upgrade Notice ==

= 1.0 =
First release