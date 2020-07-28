######   ########    #######   ########    ######       ####       ########   ##   ##
##   ##     ##     ###            ##     ###    ###    ##  ##     ###     ##  ##   ##
######      ##    ###     #####   ##    ###      ###  ########   ###          #######
##   ##     ##     ###     ###    ##     ###    ###  ##      ##   ###     ##  ##   ##
######   ########    #######      ##       ######    ##      ##    ########   ##   ##
support at http://www.bigtoach.com/forum/
all this is free change it do whatever you want with it. however i hold no responsibility for it whatsoever.
GNU license
this is a !!flat-file!! news posting system.

##Installation##
1. insert name and pass into member.php in this format name||pass||
	each admin on a new line
2. ftp the files.
3. the news page is now www.yoursite.com/path/to/btnews/news.php
4. you can use an include to include the news in another page by placing this-
	<?php include 'path/to/btnews/realnews.php'; ?> - in any .php file
5. after that you can change newstemplate.tpl. The words between {}'s will-
	be replaced with dynamic data also change the css file around if you would like.
6. contacts: 
	www.bigtoach.com/forum
	scott@bigtoach.com
	AIM: m3ferlife
	MSN: bigtoach@hotmail.com
	Yahoo: big_toach
	ICQ: 194913346


##Features##
1. admin panel.
	a. multiple admins
	b. editing
	c. vb code and smilies
2. commenting
	a. vb code and smilies
	b. comments for each post
3. Templates / css
	a. actual news posting controlled by newstemplate.tpl
	b. just reconfig the file to fit your site.
	c. along with css the main news page is completely customizeable.
		Note: the words inbetween {} will be replaced with the actual values
			  when displayed on the news page.
4. Does Not Need Any Type of database!!!!!!!
5. Very easy to install.
	a. ftp
	b. set .txt permissions high
	c. then use nothing else.
6. Images
	a. place any images that u want for
       your posts in the avatars folder.
	b. the admin.php will grab all the 
       images from this folder and let you use
       whichever image that you would like.
## files included ##

admin.php -- admin panel to post, edit news.

comment.php -- file that shows comments that have been posted and where to post comments

commenter.php -- file that places the comments

comments.txt -- file that holds the comments posted

general.css -- css file 

login.php -- file to login to get into admin.php

redirect.php -- file that redirects you and starts sessions for admin panel.

member.php -- file that holds admin names and passwords

news.txt -- file that holds all the posted news

newsconfig.php -- edit this to the settings that u want

news.php -- file that you see all the news on. (actually just an include of realnews.php that looks good.)

realnews.php -- the actual file that shows the news. include this in another file to look right.

example.php -- just an example of included realnews.php

newstemplate.tpl -- template file to edit to make if fit your site design

/images -- just all the images and crap