=== Defer CSS Addon for BWP Minify ===
Contributors: blogestudio, pauiglesias
Tags: css, defer, defer css, css delivery, css load, stylesheet, speed, async, asynchronous, asynchronously, footer, optimization, seo, wpo
Requires at least: 3.3.2
Tested up to: 4.2
Stable tag: 1.0
License: GPLv2 or later

An addon for BWP Minify plugin that can defer CSS load dynamically from the footer of the page.

== Description ==

<a href="https://wordpress.org/plugins/bwp-minify/">BWP Minify</a> is a powerful plugin to minify and compact several CSS files into only one.

If the resulting CSS file is too big or large, this addon allows to defer the load of this generated CSS file moving their declaration from header to footer, and put it again using asynchronous javascript and DOM manipulation.

This technique is recommended to use in conjuntion with the "css-above-the-fold" practice, as well introducing early CSS in-page allows proper styling display while the main CSS file is still loading.

There are some options to do the <i>above-the-fold</i> optimization, also we have developed a <a href="https://wordpress.org/plugins/css-above-the-fold/">CSS Above The Fold plugin</a> that reuses the current theme stylesheet extracting chunks of CSS code applying a special markup.

Another plugin that does this solution but providing an administration area to configure it manually is <a href="https://wordpress.org/plugins/autoptimize/">Autoptimize</a>, that allows to define a specific CSS code in a independent way of your theme CSS stylesheet.

== Installation ==

1. Unzip and upload defer-css-addon-for-bwp-minify folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Nothing else, make sure you have also activated the BWP Minify plugin.

== Frequently Asked Questions ==

= I activated this plugin and now there is like a second without styles in my page, why? =

This is because you don't have a css-above-the-fold solution, or if you have one, your selection of critical CSS code is not enough to display properly the top of the page, and you need to redefine it.

== Screenshots ==

1. An example of resulting javascript code of asynchronous CSS file loading.

== Changelog ==

= 1.0 =
Release Date: April 13th, 2015

* First and tested released until WordPress 4.2
* Compatibility whith last and older versions of BWP Minify
* Tested code from WordPress 3.3.2 version.

== Upgrade Notice ==

= 1.0 =
Initial Release.