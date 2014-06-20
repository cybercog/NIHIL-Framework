#MODULES STRUCTURE

##AC
###AC_AUTH_KEYS
```sql
asdf
```
###AC_USERS
```sql
asdf
```
###AC_PASSWORD_CHANGES
```sql
asdf
```
###AC_EMAIL_CHANGES
```sql
asdf
```
###AC_SESSION_LOG
```sql
asdf
```
###AC_AUTH_ASSIGNMENTS
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
###AC_AUTH_ITEM_CHILDREN
```sql
asdf
```
###AC_AUTH_ITEMS
```sql
asdf
```
###AC_AUTH_RULES
```sql
asdf
```
	
##API

##CMS
###POSTS
```sql
asdf
```
###PAGES
```sql
asdf
```
###TAGS
```sql
asdf
```
###CATEGORIES
```sql
asdf
```
###TUTORIALS
```sql
asdf
```
###TUTORIAL_STEPS
```sql
asdf
```
###LINKS
```sql
asdf
```
	
##CORE
###LOGS
```sql
asdf
```
###ERRORS
```sql
asdf
```

##DOMAINS
###TLD
```sql
asdf
```
###DOMAINS
```sql
asdf
```
	
##ECOM

##MEDIA
```*Do I treat images, books, and videos differently than files or are they simply types of files?```
###IMAGES
```sql
asdf
```
###VIDEOS
```sql
asdf
```
###BOOKS
```sql
asdf
```
###FILES
```sql
asdf
```

##SUPPORT
###*CHAT
###FORUM_POSTS
```sql
asdf
```
###FORUM_POST_HISTORIES
```sql
asdf
```
###FORUM_POST_VIEWS
```sql
asdf
```
###FORUM_POST_VOTES
```sql
asdf
```
###FORUM_REPLIES
```sql
asdf
```
###FORUM_REPLY_HISTROIES
```sql
asdf
```
###FORUM_REPLY_VOTES
```sql
asdf
```
###FORUM_THREADS
```sql
asdf
```
###TICKETS
```sql
asdf
```
###TICKET_MAIL_LOGS
```sql
asdf
```
###TICKET_PRIORITIES
```sql
asdf
```
###TICKET_REPLIES
```sql
asdf
```
###TICKET_RESOLUTIONS
```sql
asdf
```
###TICKET_STATUSES
```sql
asdf
```
###TICKET_TYPES
```sql
asdf
```
