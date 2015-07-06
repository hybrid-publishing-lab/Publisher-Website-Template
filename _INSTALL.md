* MESON PRESS THEME
* ===================

** GETTING STARTED
** _______________

*** If the links do not work, you probably have no .htaccess file:

Create a .htaccess file in the root of your http Folder with this contents:

<IfModule mod_rewrite.c>
	RewriteEngine On
	RewriteBase /
	RewriteRule ^index\.php$ - [L]
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteRule . /index.php [L]
</IfModule>

*** Your uploads folder must be accesible by Worpress

If not change the permissons:

cd path/to/wp-content/
chmod 777 uploads

*** Edit CSS Files

The CSS Files are processed by less. You will find all the files in the folder /library/less

Edit the less files and run grunt. 

	cd path/to/wp-content/themes/meson-press
	grunt watch

If you see this message:

grunt-cli: The grunt command line interface. (v0.1.13)

Fatal error: Unable to find local grunt.

If you're seeing this message, either a Gruntfile wasn't found or grunt
hasn't been installed locally to your project. For more information about
installing and configuring grunt, please see the Getting Started guide:

You probably have not installed Grunt. To do so do:

	cd path/to/wp-content/themes/meson-press
	npm install

If you do not have the node package manager install it

See: https://www.npmjs.com/

All necessary packages are listed in the file: package.json

** Additional Plugins
** __________________

You will need to install additional plugins
- advanced custom fields
- acf-2way-pr
- better-wp-security
- disqus-comment-system
- google-analytics-dashboard-for-wp
- newsletter
- epub reader
- oai-harvester
- post-types-order


** Standard Menus
** __________________

top menu (The Main Menu)

About				[Page]
	Meson Press 	[Page]
	Advisory Board 	[Page]
	Who we are 		[Page]
	Your Manuscript [Page]
	Peer Review 	[Page]
	Contact			[Page]
	Newsletter 		[Page]
Books				[Page]
Series				[Page]
Authors				[Page]
Blog 				[Page]

footer menu (Footer Links)

twitter				[Custom link]
facebook			[Custom link]
Blog				[Page]
Imprint 			[Page]
Contact				[Page]
newsletter 			[Page]

