=== Sync media with AWS S3 CloudFront ===
Tags: wp-content, media, uploads, S3, AWS, CloudFront, link, image, sync
Requires at least: 5.3
Tested up to: 6.1.1
Requires PHP: 7.1
Contributors: softsprint
Stable tag: 1.0.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Donate link: https://softsprint.net

Plugin uploads the files from WordPress media upload directory to AWS S3 bucket and replaces their initial URLs with the new URLs of AWS S3 bucket (changes src attribute).

== Description ==
Plugin scans the media upload directory of your WordPress site and pushes media files from there to AWS S3 bucket. Thus files from wordpress upload directory (default it is wp-content/uploads) are moved to AWS S3 bucket. Besides it is possible to change your images files sources URLs to AWS ones - their src attribute in the HTML will have URLs of AWS bucket CloudFront. Finally you site performance will grow

== Installation ==
1. Log in to your WordPress dashboard, navigate to the Plugins menu, click on \"Add New\"
2. Click on \"Upload Plugin\" and upload the archive \"Add-To-Cart-redirect-for-WooCommerce.zip\" then click on \"Install\".
3. Activate the plugin through the \"Plugins\" menu in WordPress.

== Frequently Asked Questions ==
= How can I know that my AWS bucket credentials and keys are valid? =
There is a test link button to validate your data in advance

= Which images will change their source URLs if CloudFront option is used? =
Images that are initially called by wordpress methods from the media library will change their URLs to AWS CloudFront domain. CloudFront option will not work in case you have hardcoded content URLs in your template, etc.

= Is there any conflicts with the plugin? =
It can work wrong if there is already installed any other plugin which uses SDK AWS classes

= Which types of images can I upload with this plugin? =
Plugin uploads the next file types: gif, png, jpg, jpeg, svg, webp

== Screenshots ==
1. Configuration tab allows you to enter your AWS S3 "Bucket name", "Access key" "Secret key", "Location" and select the directories and file types, which you want to upload to S3.
2. If you want to use CloudFront service, just select "yes" for "Use Cloudfront" option and enter your CloudFront ID in the appropriate field.
3. You can test your AWS S3 credentials by clicking on the "Test link to AWS" button. An appropirate message will be shown.
4. General tab contains the "Upload file to S3" button, which starts the process of the file upload. Besides you can see observe the process thanks to progress bar with the list of the already uploaded files.
5. You will see the message about your invalidation ID if you have saved a configuration "Use Cloudfront" > "yes" and have indicated your CloudFront ID.
6. Src attribute of your images and the other media files depends on the "Use Cloudfront" settings in plugin. In case you do not activate this option, your images sources URLs will stay without changes.
7. In case you have activated "Use Cloudfront" > "yes" and have indicated the CloudFront ID, then the images sources URLs will be changed to the new ones, provided by AWS.

== Changelog ==
= 1.0 =
* Stable tested version with the latest WordPress

== Upgrade Notice ==
No upgrades are required - plugin is free for use without limitations.