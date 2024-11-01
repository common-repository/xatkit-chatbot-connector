=== Blog Navigator Chatbot by Xatkit ===
Contributors: softmodeling, xatkit, gwendaldaniel, joangi
Tags: chatbot, bot, assistant, conversation, chat-bot, nlp, ai, xatkit
Requires at least: 4.3
Tested up to: 6.0
Requires PHP: 5.6
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add a [Xatkit](https://xatkit.com/) chatbot to your WordPress site. Xatkit is an [open source bot development framework](https://github.com/xatkit-bot-platform).

== Description ==

Make sure you provide the best experience to your site visitors by adding a chatbot that helps them to navigate your site. Or answer the questions they may have. Or...

By combining the power of Xatkit with the power of WordPress, you're free to create and embed bots as complex as you are able to imagine.

== What if I don't want to create and deploy the bots myself ==

We'll be happy to create a custom bot completely designed to fit your needs. We can also help you deploy, host and monitor any bot you create. [Let us know what you need](https://xatkit.com/contact-us/) for more information.

And if you're looking for a bot to help you sell more doing less, you can install our fully automated premium [expert WooCommerce chatbot](https://wordpress.org/plugins/xatkit-chatbot-for-woocommerce/) that comes with plenty of built-in conversations to help your visitors and sell more doing less.

== Configuration ==

You can configure some aspects of the chatbot widget visualization and the pages where the bot should be displayed. Additional customization are possible by directly modifying the plugin's CSS styles.

== Installation ==

Install and Activate the plugin through the 'Plugins' menu in WordPress. During the activation, feel free to opt-in to get notifications and updates about the plugin development.

== Frequently Asked Questions ==

= But, why do I need a chatbot? =

In short, chatbots give a better experience to visitors of your site. Exactly, what you want!. We recommend you to watch this video as well:

https://www.youtube.com/watch?v=P8ieU0dleUE

= Why doesn't it work on my theme / with my WP configuration?

We have tested the chatbot in several themes and with diverse plugin configurations but it could still be the case that there are some conflicts between Xatkit and your WordPress.
You may want to try with another theme or locate the problematic plugin. Start with cache plugins that could be affecting our js and CSS files.

= Can I customize the style of the widget?

Yes, for instance, the following CSS example changes the color of the widget to blue. The plugin includes in a non-minimized xatkit.css file that you can look at to find the relevant CSS classes. Note that this file is only available for documentation purposes (the plugin enqueues the min version).

    .xatkit-header {
      background-color: blue !important;
    }

= The widget is not showing up =

Make sure you checked the setting *Activate the bot*. And provided the URL where you have deployed your Xatkit bot.

= Can I try it on a staging side? =

Yes. You cannot though use it on a localhost environment (well, you can but the answer it will default to the content of our own xatkit site as the bot is unable to access your localhost data).

= I have more questions =

We'll be happy to answer them. Please [contact us](https://xatkit.com/contact-us/).

== Changelog ==

= 3.0.1 =
* Avoids showing in public pages bots to help in the administration of the site.

= 3.0.0 =
* Transformed the plugin into a generic Xatkit connector useful to embed any Xatkit bot in your website
* Deprecated the default simple navigation bots
* Tested with WP 6.0

= 2.1.4 =
* Removed Freemius SDK from the plugin, making the plugin much simpler and smaller
* Tested with WP 5.9.1

= 2.1.3 =
* Added some clarifications to the readme on the features of this free version

= 2.1.2 =
* Improvement: New versions of the js and CSS for the chatbot widget
* Enhancement: Color picker for the chatbot widget

= 2.1.1 =
* Fix: Updated the version of the Freemius library

= 2.1.0 =
* Enhancement: Adding multi-lingual options to the bot
* Improvement: New versions of the js and CSS for the chatbot widget
* Fix: Simplified and removed some unnecessary files in the bot code

= 2.0.1 =
* Removing the enqueue of scripts part of tests for the future bot dashboard

= 2.0.0 =
* You can now get a chatbot without having to install your own server
* Added configuration options to control what information the bot can provide

= 1.1.1 =
* Clarify the placeholder text when bot buttons are used

= 1.1 =
* Reduced the number of js files for displaying the widget
* Added an option to display the bot only on the front page
* Improved the communication of parameters between WP and the react component

= 1.0 =
* Initial release

== Upgrade Notice ==

= 3.0.1 =
* Avoids showing in public pages bots to help in the administration of the site.

= 3.0.0 =
* Transformed the plugin into a generic Xatkit connector useful to embed any Xatkit bot in your website

= 2.1.4 =
* Simplified the plugin code by removing Freemius SDK

= 2.1.3 =
* Added some clarifications to the readme on the features of this free version

= 2.1.0 =
* Enhancement: The chatbot is now able to speak English, French and Spanish
* Improvement: New versions of the js and css files for the chatbot widget

= 2.0.1 =
* Fix: Avoiding enqueuing scripts in admin pages not related to the plugin

= 2.0.0 =
* Enhancement: You can now get a chatbot without having to install your own server

= 1.1 =
* Improvement: better placeholder text when buttons are displayed to avoid confusing the user

= 1.1 =
* Enhancement: added a settings to display the bot only on the front page
