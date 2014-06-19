#MODULES STRUCTURE

##AC
###AUTH_KEYS
###USERS
###PASSWORD_CHANGES
###EMAIL_CHANGES
###SESSION_LOG
###AUTH_ASSIGNMENTS
```sql
CREATE TABLE IF NOT EXISTS `ac_auth_assignments` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `ac_auth_assignments`
  ADD CONSTRAINT `ac_auth_assignments_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `ac_auth_items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
```
###AUTH_ITEM_CHILDREN
```sql
asdf
```
###AUTH_ITEMS
```sql
asdf
```
###AUTH_RULES
```sql
asdf
```
	
##API

##CMS
###POSTS
###PAGES
###TAGS
###CATEGORIES
###TUTORIALS
###TUTORIAL_STEPS
###LINKS
	
##CORE
###LOGS
###ERRORS

##DOMAINS
###TLD
###DOMAINS
	
##ECOM

##MEDIA
```*Do I treat images, books, and videos differently than files or are they simply types of files?```
###IMAGES
###VIDEOS
###BOOKS
###FILES

##SUPPORT
###*CHAT
###FORUM_POSTS
###FORUM_POST_HISTORIES
###FORUM_POST_VIEWS
###FORUM_POST_VOTES
###FORUM_REPLIES
###FORUM_REPLY_HISTROIES
###FORUM_REPLY_VOTES
###FORUM_THREADS
###TICKETS
###TICKET_MAIL_LOGS
###TICKET_PRIORITIES
###TICKET_REPLIES
###TICKET_RESOLUTIONS
###TICKET_STATUSES
###TICKET_TYPES
