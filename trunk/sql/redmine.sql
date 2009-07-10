-- phpMyAdmin SQL Dump
-- version 2.11.3deb1ubuntu1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2009 at 05:40 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.4-2ubuntu5.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `redmine`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(11) NOT NULL auto_increment,
  `container_id` int(11) NOT NULL default '0',
  `container_type` varchar(30) collate utf8_bin NOT NULL default '',
  `filename` varchar(255) collate utf8_bin NOT NULL default '',
  `disk_filename` varchar(255) collate utf8_bin NOT NULL default '',
  `filesize` int(11) NOT NULL default '0',
  `content_type` varchar(255) collate utf8_bin default '',
  `digest` varchar(40) collate utf8_bin NOT NULL default '',
  `downloads` int(11) NOT NULL default '0',
  `author_id` int(11) NOT NULL default '0',
  `created_on` datetime default NULL,
  `description` varchar(255) collate utf8_bin default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `attachments`
--


-- --------------------------------------------------------

--
-- Table structure for table `auth_sources`
--

CREATE TABLE IF NOT EXISTS `auth_sources` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(30) collate utf8_bin NOT NULL default '',
  `name` varchar(60) collate utf8_bin NOT NULL default '',
  `host` varchar(60) collate utf8_bin default NULL,
  `port` int(11) default NULL,
  `account` varchar(255) collate utf8_bin default NULL,
  `account_password` varchar(60) collate utf8_bin default NULL,
  `base_dn` varchar(255) collate utf8_bin default NULL,
  `attr_login` varchar(30) collate utf8_bin default NULL,
  `attr_firstname` varchar(30) collate utf8_bin default NULL,
  `attr_lastname` varchar(30) collate utf8_bin default NULL,
  `attr_mail` varchar(30) collate utf8_bin default NULL,
  `onthefly_register` tinyint(1) NOT NULL default '0',
  `tls` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `auth_sources`
--


-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE IF NOT EXISTS `boards` (
  `id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL,
  `name` varchar(255) collate utf8_bin NOT NULL default '',
  `description` varchar(255) collate utf8_bin default NULL,
  `position` int(11) default '1',
  `topics_count` int(11) NOT NULL default '0',
  `messages_count` int(11) NOT NULL default '0',
  `last_message_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `boards_project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `boards`
--


-- --------------------------------------------------------

--
-- Table structure for table `changes`
--

CREATE TABLE IF NOT EXISTS `changes` (
  `id` int(11) NOT NULL auto_increment,
  `changeset_id` int(11) NOT NULL,
  `action` varchar(1) collate utf8_bin NOT NULL default '',
  `path` varchar(255) collate utf8_bin NOT NULL default '',
  `from_path` varchar(255) collate utf8_bin default NULL,
  `from_revision` varchar(255) collate utf8_bin default NULL,
  `revision` varchar(255) collate utf8_bin default NULL,
  `branch` varchar(255) collate utf8_bin default NULL,
  PRIMARY KEY  (`id`),
  KEY `changesets_changeset_id` (`changeset_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `changes`
--


-- --------------------------------------------------------

--
-- Table structure for table `changesets`
--

CREATE TABLE IF NOT EXISTS `changesets` (
  `id` int(11) NOT NULL auto_increment,
  `repository_id` int(11) NOT NULL,
  `revision` varchar(255) collate utf8_bin NOT NULL,
  `committer` varchar(255) collate utf8_bin default NULL,
  `committed_on` datetime NOT NULL,
  `comments` text collate utf8_bin,
  `commit_date` date default NULL,
  `scmid` varchar(255) collate utf8_bin default NULL,
  `user_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `changesets_repos_rev` (`repository_id`,`revision`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `changesets`
--


-- --------------------------------------------------------

--
-- Table structure for table `changesets_issues`
--

CREATE TABLE IF NOT EXISTS `changesets_issues` (
  `changeset_id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  UNIQUE KEY `changesets_issues_ids` (`changeset_id`,`issue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `changesets_issues`
--


-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL auto_increment,
  `commented_type` varchar(30) collate utf8_bin NOT NULL default '',
  `commented_id` int(11) NOT NULL default '0',
  `author_id` int(11) NOT NULL default '0',
  `comments` text collate utf8_bin,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE IF NOT EXISTS `custom_fields` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(30) collate utf8_bin NOT NULL default '',
  `name` varchar(30) collate utf8_bin NOT NULL default '',
  `field_format` varchar(30) collate utf8_bin NOT NULL default '',
  `possible_values` text collate utf8_bin,
  `regexp` varchar(255) collate utf8_bin default '',
  `min_length` int(11) NOT NULL default '0',
  `max_length` int(11) NOT NULL default '0',
  `is_required` tinyint(1) NOT NULL default '0',
  `is_for_all` tinyint(1) NOT NULL default '0',
  `is_filter` tinyint(1) NOT NULL default '0',
  `position` int(11) default '1',
  `searchable` tinyint(1) default '0',
  `default_value` text collate utf8_bin,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `custom_fields`
--


-- --------------------------------------------------------

--
-- Table structure for table `custom_fields_projects`
--

CREATE TABLE IF NOT EXISTS `custom_fields_projects` (
  `custom_field_id` int(11) NOT NULL default '0',
  `project_id` int(11) NOT NULL default '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `custom_fields_projects`
--


-- --------------------------------------------------------

--
-- Table structure for table `custom_fields_trackers`
--

CREATE TABLE IF NOT EXISTS `custom_fields_trackers` (
  `custom_field_id` int(11) NOT NULL default '0',
  `tracker_id` int(11) NOT NULL default '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `custom_fields_trackers`
--


-- --------------------------------------------------------

--
-- Table structure for table `custom_values`
--

CREATE TABLE IF NOT EXISTS `custom_values` (
  `id` int(11) NOT NULL auto_increment,
  `customized_type` varchar(30) collate utf8_bin NOT NULL default '',
  `customized_id` int(11) NOT NULL default '0',
  `custom_field_id` int(11) NOT NULL default '0',
  `value` text collate utf8_bin,
  PRIMARY KEY  (`id`),
  KEY `custom_values_customized` (`customized_type`,`customized_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `custom_values`
--


-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL default '0',
  `category_id` int(11) NOT NULL default '0',
  `title` varchar(60) collate utf8_bin NOT NULL default '',
  `description` text collate utf8_bin,
  `created_on` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `documents_project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `documents`
--


-- --------------------------------------------------------

--
-- Table structure for table `enabled_modules`
--

CREATE TABLE IF NOT EXISTS `enabled_modules` (
  `id` int(11) NOT NULL auto_increment,
  `project_id` int(11) default NULL,
  `name` varchar(255) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `enabled_modules_project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `enabled_modules`
--


-- --------------------------------------------------------

--
-- Table structure for table `enumerations`
--

CREATE TABLE IF NOT EXISTS `enumerations` (
  `id` int(11) NOT NULL auto_increment,
  `opt` varchar(4) collate utf8_bin NOT NULL default '',
  `name` varchar(30) collate utf8_bin NOT NULL default '',
  `position` int(11) default '1',
  `is_default` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Dumping data for table `enumerations`
--

INSERT INTO `enumerations` (`id`, `opt`, `name`, `position`, `is_default`) VALUES
(1, 'DCAT', 'User documentation', 1, 0),
(2, 'DCAT', 'Technical documentation', 2, 0),
(3, 'IPRI', 'Low', 1, 0),
(4, 'IPRI', 'Normal', 2, 1),
(5, 'IPRI', 'High', 3, 0),
(6, 'IPRI', 'Urgent', 4, 0),
(7, 'IPRI', 'Immediate', 5, 0),
(8, 'ACTI', 'Design', 1, 0),
(9, 'ACTI', 'Development', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE IF NOT EXISTS `issues` (
  `id` int(11) NOT NULL auto_increment,
  `tracker_id` int(11) NOT NULL default '0',
  `project_id` int(11) NOT NULL default '0',
  `subject` varchar(255) collate utf8_bin NOT NULL default '',
  `description` text collate utf8_bin,
  `due_date` date default NULL,
  `category_id` int(11) default NULL,
  `status_id` int(11) NOT NULL default '0',
  `assigned_to_id` int(11) default NULL,
  `priority_id` int(11) NOT NULL default '0',
  `fixed_version_id` int(11) default NULL,
  `author_id` int(11) NOT NULL default '0',
  `lock_version` int(11) NOT NULL default '0',
  `created_on` datetime default NULL,
  `updated_on` datetime default NULL,
  `start_date` date default NULL,
  `done_ratio` int(11) NOT NULL default '0',
  `estimated_hours` float default NULL,
  PRIMARY KEY  (`id`),
  KEY `issues_project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `issues`
--


-- --------------------------------------------------------

--
-- Table structure for table `issue_categories`
--

CREATE TABLE IF NOT EXISTS `issue_categories` (
  `id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL default '0',
  `name` varchar(30) collate utf8_bin NOT NULL default '',
  `assigned_to_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `issue_categories_project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `issue_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `issue_relations`
--

CREATE TABLE IF NOT EXISTS `issue_relations` (
  `id` int(11) NOT NULL auto_increment,
  `issue_from_id` int(11) NOT NULL,
  `issue_to_id` int(11) NOT NULL,
  `relation_type` varchar(255) collate utf8_bin NOT NULL default '',
  `delay` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `issue_relations`
--


-- --------------------------------------------------------

--
-- Table structure for table `issue_statuses`
--

CREATE TABLE IF NOT EXISTS `issue_statuses` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) collate utf8_bin NOT NULL default '',
  `is_closed` tinyint(1) NOT NULL default '0',
  `is_default` tinyint(1) NOT NULL default '0',
  `position` int(11) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `issue_statuses`
--

INSERT INTO `issue_statuses` (`id`, `name`, `is_closed`, `is_default`, `position`) VALUES
(1, 'New', 0, 1, 1),
(2, 'Assigned', 0, 0, 2),
(3, 'Resolved', 0, 0, 3),
(4, 'Feedback', 0, 0, 4),
(5, 'Closed', 1, 0, 5),
(6, 'Rejected', 1, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE IF NOT EXISTS `journals` (
  `id` int(11) NOT NULL auto_increment,
  `journalized_id` int(11) NOT NULL default '0',
  `journalized_type` varchar(30) collate utf8_bin NOT NULL default '',
  `user_id` int(11) NOT NULL default '0',
  `notes` text collate utf8_bin,
  `created_on` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `journals_journalized_id` (`journalized_id`,`journalized_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `journals`
--


-- --------------------------------------------------------

--
-- Table structure for table `journal_details`
--

CREATE TABLE IF NOT EXISTS `journal_details` (
  `id` int(11) NOT NULL auto_increment,
  `journal_id` int(11) NOT NULL default '0',
  `property` varchar(30) collate utf8_bin NOT NULL default '',
  `prop_key` varchar(30) collate utf8_bin NOT NULL default '',
  `old_value` varchar(255) collate utf8_bin default NULL,
  `value` varchar(255) collate utf8_bin default NULL,
  PRIMARY KEY  (`id`),
  KEY `journal_details_journal_id` (`journal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `journal_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `project_id` int(11) NOT NULL default '0',
  `role_id` int(11) NOT NULL default '0',
  `created_on` datetime default NULL,
  `mail_notification` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `members`
--


-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL auto_increment,
  `board_id` int(11) NOT NULL,
  `parent_id` int(11) default NULL,
  `subject` varchar(255) collate utf8_bin NOT NULL default '',
  `content` text collate utf8_bin,
  `author_id` int(11) default NULL,
  `replies_count` int(11) NOT NULL default '0',
  `last_reply_id` int(11) default NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `locked` tinyint(1) default '0',
  `sticky` int(11) default '0',
  PRIMARY KEY  (`id`),
  KEY `messages_board_id` (`board_id`),
  KEY `messages_parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL auto_increment,
  `project_id` int(11) default NULL,
  `title` varchar(60) collate utf8_bin NOT NULL default '',
  `summary` varchar(255) collate utf8_bin default '',
  `description` text collate utf8_bin,
  `author_id` int(11) NOT NULL default '0',
  `created_on` datetime default NULL,
  `comments_count` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `news_project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `news`
--


-- --------------------------------------------------------

--
-- Table structure for table `plugin_schema_info`
--

CREATE TABLE IF NOT EXISTS `plugin_schema_info` (
  `plugin_name` varchar(255) collate utf8_bin default NULL,
  `version` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `plugin_schema_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) collate utf8_bin NOT NULL default '',
  `description` text collate utf8_bin,
  `homepage` varchar(255) collate utf8_bin default '',
  `is_public` tinyint(1) NOT NULL default '1',
  `parent_id` int(11) default NULL,
  `projects_count` int(11) default '0',
  `created_on` datetime default NULL,
  `updated_on` datetime default NULL,
  `identifier` varchar(20) collate utf8_bin default NULL,
  `status` int(11) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `projects`
--


-- --------------------------------------------------------

--
-- Table structure for table `projects_trackers`
--

CREATE TABLE IF NOT EXISTS `projects_trackers` (
  `project_id` int(11) NOT NULL default '0',
  `tracker_id` int(11) NOT NULL default '0',
  KEY `projects_trackers_project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `projects_trackers`
--


-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE IF NOT EXISTS `queries` (
  `id` int(11) NOT NULL auto_increment,
  `project_id` int(11) default NULL,
  `name` varchar(255) collate utf8_bin NOT NULL default '',
  `filters` text collate utf8_bin,
  `user_id` int(11) NOT NULL default '0',
  `is_public` tinyint(1) NOT NULL default '0',
  `column_names` text collate utf8_bin,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `queries`
--


-- --------------------------------------------------------

--
-- Table structure for table `repositories`
--

CREATE TABLE IF NOT EXISTS `repositories` (
  `id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL default '0',
  `url` varchar(255) collate utf8_bin NOT NULL default '',
  `login` varchar(60) collate utf8_bin default '',
  `password` varchar(60) collate utf8_bin default '',
  `root_url` varchar(255) collate utf8_bin default '',
  `type` varchar(255) collate utf8_bin default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `repositories`
--


-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) collate utf8_bin NOT NULL default '',
  `position` int(11) default '1',
  `assignable` tinyint(1) default '1',
  `builtin` int(11) NOT NULL default '0',
  `permissions` text collate utf8_bin,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `position`, `assignable`, `builtin`, `permissions`) VALUES
(1, 'Non member', 1, 1, 1, 0x2d2d2d200a2d203a6164645f6973737565730a2d203a6164645f69737375655f6e6f7465730a2d203a736176655f717565726965730a2d203a766965775f67616e74740a2d203a766965775f63616c656e6461720a2d203a766965775f74696d655f656e74726965730a2d203a636f6d6d656e745f6e6577730a2d203a766965775f646f63756d656e74730a2d203a766965775f77696b695f70616765730a2d203a766965775f77696b695f65646974730a2d203a6164645f6d657373616765730a2d203a766965775f66696c65730a2d203a62726f7773655f7265706f7369746f72790a2d203a766965775f6368616e6765736574730a),
(2, 'Anonymous', 2, 1, 2, 0x2d2d2d200a2d203a766965775f67616e74740a2d203a766965775f63616c656e6461720a2d203a766965775f74696d655f656e74726965730a2d203a766965775f646f63756d656e74730a2d203a766965775f77696b695f70616765730a2d203a766965775f77696b695f65646974730a2d203a766965775f66696c65730a2d203a62726f7773655f7265706f7369746f72790a2d203a766965775f6368616e6765736574730a),
(3, 'Manager', 3, 1, 0, 0x2d2d2d200a2d203a656469745f70726f6a6563740a2d203a73656c6563745f70726f6a6563745f6d6f64756c65730a2d203a6d616e6167655f6d656d626572730a2d203a6d616e6167655f76657273696f6e730a2d203a6d616e6167655f63617465676f726965730a2d203a6164645f6973737565730a2d203a656469745f6973737565730a2d203a6d616e6167655f69737375655f72656c6174696f6e730a2d203a6164645f69737375655f6e6f7465730a2d203a656469745f69737375655f6e6f7465730a2d203a656469745f6f776e5f69737375655f6e6f7465730a2d203a6d6f76655f6973737565730a2d203a64656c6574655f6973737565730a2d203a6d616e6167655f7075626c69635f717565726965730a2d203a736176655f717565726965730a2d203a766965775f67616e74740a2d203a766965775f63616c656e6461720a2d203a766965775f69737375655f77617463686572730a2d203a6164645f69737375655f77617463686572730a2d203a6c6f675f74696d650a2d203a766965775f74696d655f656e74726965730a2d203a656469745f74696d655f656e74726965730a2d203a656469745f6f776e5f74696d655f656e74726965730a2d203a6d616e6167655f6e6577730a2d203a636f6d6d656e745f6e6577730a2d203a6d616e6167655f646f63756d656e74730a2d203a766965775f646f63756d656e74730a2d203a6d616e6167655f66696c65730a2d203a766965775f66696c65730a2d203a6d616e6167655f77696b690a2d203a72656e616d655f77696b695f70616765730a2d203a64656c6574655f77696b695f70616765730a2d203a766965775f77696b695f70616765730a2d203a766965775f77696b695f65646974730a2d203a656469745f77696b695f70616765730a2d203a64656c6574655f77696b695f70616765735f6174746163686d656e74730a2d203a70726f746563745f77696b695f70616765730a2d203a6d616e6167655f7265706f7369746f72790a2d203a62726f7773655f7265706f7369746f72790a2d203a766965775f6368616e6765736574730a2d203a636f6d6d69745f6163636573730a2d203a6d616e6167655f626f617264730a2d203a6164645f6d657373616765730a2d203a656469745f6d657373616765730a2d203a656469745f6f776e5f6d657373616765730a2d203a64656c6574655f6d657373616765730a2d203a64656c6574655f6f776e5f6d657373616765730a),
(4, 'Developer', 4, 1, 0, 0x2d2d2d200a2d203a6d616e6167655f76657273696f6e730a2d203a6d616e6167655f63617465676f726965730a2d203a6164645f6973737565730a2d203a656469745f6973737565730a2d203a6d616e6167655f69737375655f72656c6174696f6e730a2d203a6164645f69737375655f6e6f7465730a2d203a736176655f717565726965730a2d203a766965775f67616e74740a2d203a766965775f63616c656e6461720a2d203a6c6f675f74696d650a2d203a766965775f74696d655f656e74726965730a2d203a636f6d6d656e745f6e6577730a2d203a766965775f646f63756d656e74730a2d203a766965775f77696b695f70616765730a2d203a766965775f77696b695f65646974730a2d203a656469745f77696b695f70616765730a2d203a64656c6574655f77696b695f70616765730a2d203a6164645f6d657373616765730a2d203a656469745f6f776e5f6d657373616765730a2d203a766965775f66696c65730a2d203a6d616e6167655f66696c65730a2d203a62726f7773655f7265706f7369746f72790a2d203a766965775f6368616e6765736574730a2d203a636f6d6d69745f6163636573730a),
(5, 'Reporter', 5, 1, 0, 0x2d2d2d200a2d203a6164645f6973737565730a2d203a6164645f69737375655f6e6f7465730a2d203a736176655f717565726965730a2d203a766965775f67616e74740a2d203a766965775f63616c656e6461720a2d203a6c6f675f74696d650a2d203a766965775f74696d655f656e74726965730a2d203a636f6d6d656e745f6e6577730a2d203a766965775f646f63756d656e74730a2d203a766965775f77696b695f70616765730a2d203a766965775f77696b695f65646974730a2d203a6164645f6d657373616765730a2d203a656469745f6f776e5f6d657373616765730a2d203a766965775f66696c65730a2d203a62726f7773655f7265706f7369746f72790a2d203a766965775f6368616e6765736574730a);

-- --------------------------------------------------------

--
-- Table structure for table `schema_migrations`
--

CREATE TABLE IF NOT EXISTS `schema_migrations` (
  `version` varchar(255) collate utf8_bin NOT NULL,
  UNIQUE KEY `unique_schema_migrations` (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `schema_migrations`
--

INSERT INTO `schema_migrations` (`version`) VALUES
('1'),
('10'),
('100'),
('101'),
('11'),
('12'),
('13'),
('14'),
('15'),
('16'),
('17'),
('18'),
('19'),
('2'),
('20'),
('21'),
('22'),
('23'),
('24'),
('25'),
('26'),
('27'),
('28'),
('29'),
('3'),
('30'),
('31'),
('32'),
('33'),
('34'),
('35'),
('36'),
('37'),
('38'),
('39'),
('4'),
('40'),
('41'),
('42'),
('43'),
('44'),
('45'),
('46'),
('47'),
('48'),
('49'),
('5'),
('50'),
('51'),
('52'),
('53'),
('54'),
('55'),
('56'),
('57'),
('58'),
('59'),
('6'),
('60'),
('61'),
('62'),
('63'),
('64'),
('65'),
('66'),
('67'),
('68'),
('69'),
('7'),
('70'),
('71'),
('72'),
('73'),
('74'),
('75'),
('76'),
('77'),
('78'),
('79'),
('8'),
('80'),
('81'),
('82'),
('83'),
('84'),
('85'),
('86'),
('87'),
('88'),
('89'),
('9'),
('90'),
('91'),
('92'),
('93'),
('94'),
('95'),
('96'),
('97'),
('98'),
('99');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) collate utf8_bin NOT NULL default '',
  `value` text collate utf8_bin,
  `updated_on` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `settings`
--


-- --------------------------------------------------------

--
-- Table structure for table `time_entries`
--

CREATE TABLE IF NOT EXISTS `time_entries` (
  `id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `issue_id` int(11) default NULL,
  `hours` float NOT NULL,
  `comments` varchar(255) collate utf8_bin default NULL,
  `activity_id` int(11) NOT NULL,
  `spent_on` date NOT NULL,
  `tyear` int(11) NOT NULL,
  `tmonth` int(11) NOT NULL,
  `tweek` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `time_entries_project_id` (`project_id`),
  KEY `time_entries_issue_id` (`issue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `time_entries`
--


-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `action` varchar(30) collate utf8_bin NOT NULL default '',
  `value` varchar(40) collate utf8_bin NOT NULL default '',
  `created_on` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `user_id`, `action`, `value`, `created_on`) VALUES
(1, 1, 'feeds', 'GymRIsHoJCctYvslNVuDFIir2P083HFQi52TKyPO', '2009-03-10 16:44:22'),
(2, 1, 'feeds', 'qQFK1rMcxyZB7pWKYdoT5tREAxvFAq5Crrg8rFBi', '2009-03-10 16:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `trackers`
--

CREATE TABLE IF NOT EXISTS `trackers` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) collate utf8_bin NOT NULL default '',
  `is_in_chlog` tinyint(1) NOT NULL default '0',
  `position` int(11) default '1',
  `is_in_roadmap` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `trackers`
--

INSERT INTO `trackers` (`id`, `name`, `is_in_chlog`, `position`, `is_in_roadmap`) VALUES
(1, 'Bug', 1, 1, 0),
(2, 'Feature', 1, 2, 1),
(3, 'Support', 0, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` double NOT NULL auto_increment,
  `login` varchar(30) collate utf8_bin NOT NULL default '',
  `password` varchar(40) collate utf8_bin NOT NULL,
  `firstname` varchar(30) collate utf8_bin NOT NULL default '',
  `lastname` varchar(30) collate utf8_bin NOT NULL default '',
  `mail` varchar(60) collate utf8_bin NOT NULL default '',
  `mail_notification` tinyint(1) NOT NULL default '1',
  `admin` tinyint(1) NOT NULL default '0',
  `hide_email` int(11) NOT NULL default '1',
  `last_login_on` datetime default NULL,
  `language` varchar(200) collate utf8_bin default NULL,
  `auth_source_id` int(11) default NULL,
  `created_on` datetime default NULL,
  `updated_on` datetime default NULL,
  `type` varchar(255) collate utf8_bin default NULL,
  `notification_option` varchar(40) collate utf8_bin NOT NULL,
  `timezone` int(30) NOT NULL,
  `display_comments` varchar(40) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `login`, `password`, `firstname`, `lastname`, `mail`, `mail_notification`, `admin`, `hide_email`, `last_login_on`, `language`, `auth_source_id`, `created_on`, `updated_on`, `type`, `notification_option`, `timezone`, `display_comments`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Redmine', 'Admin', 'admin@example.net', 1, 1, 1, '2009-03-10 20:23:08', 'en', NULL, '2009-03-10 16:38:24', '2009-03-10 20:23:08', 'Admin', '', 0, ''),
(2, '', '', '', 'Anonymous', '', 0, 0, 0, NULL, '', NULL, '2009-03-10 16:44:02', '2009-03-10 16:44:02', 'AnonymousUser', '', 0, ''),

-- --------------------------------------------------------

--
-- Table structure for table `user_preferences`
--

CREATE TABLE IF NOT EXISTS `user_preferences` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `others` text collate utf8_bin,
  `hide_mail` tinyint(1) default '0',
  `time_zone` varchar(255) collate utf8_bin default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_preferences`
--

INSERT INTO `user_preferences` (`id`, `user_id`, `others`, `hide_mail`, `time_zone`) VALUES
(1, 1, 0x2d2d2d200a3a6e6f5f73656c665f6e6f7469666965643a2066616c73650a3a636f6d6d656e74735f736f7274696e673a206173630a, 0, 'Chennai');

-- --------------------------------------------------------

--
-- Table structure for table `versions`
--

CREATE TABLE IF NOT EXISTS `versions` (
  `id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL default '0',
  `name` varchar(255) collate utf8_bin NOT NULL default '',
  `description` varchar(255) collate utf8_bin default '',
  `effective_date` date default NULL,
  `created_on` datetime default NULL,
  `updated_on` datetime default NULL,
  `wiki_page_title` varchar(255) collate utf8_bin default NULL,
  PRIMARY KEY  (`id`),
  KEY `versions_project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `versions`
--


-- --------------------------------------------------------

--
-- Table structure for table `watchers`
--

CREATE TABLE IF NOT EXISTS `watchers` (
  `id` int(11) NOT NULL auto_increment,
  `watchable_type` varchar(255) collate utf8_bin NOT NULL default '',
  `watchable_id` int(11) NOT NULL default '0',
  `user_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `watchers`
--


-- --------------------------------------------------------

--
-- Table structure for table `wikis`
--

CREATE TABLE IF NOT EXISTS `wikis` (
  `id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL,
  `start_page` varchar(255) collate utf8_bin NOT NULL,
  `status` int(11) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `wikis_project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wikis`
--


-- --------------------------------------------------------

--
-- Table structure for table `wiki_contents`
--

CREATE TABLE IF NOT EXISTS `wiki_contents` (
  `id` int(11) NOT NULL auto_increment,
  `page_id` int(11) NOT NULL,
  `author_id` int(11) default NULL,
  `text` text collate utf8_bin,
  `comments` varchar(255) collate utf8_bin default '',
  `updated_on` datetime NOT NULL,
  `version` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `wiki_contents_page_id` (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wiki_contents`
--


-- --------------------------------------------------------

--
-- Table structure for table `wiki_content_versions`
--

CREATE TABLE IF NOT EXISTS `wiki_content_versions` (
  `id` int(11) NOT NULL auto_increment,
  `wiki_content_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `author_id` int(11) default NULL,
  `data` blob,
  `compression` varchar(6) collate utf8_bin default '',
  `comments` varchar(255) collate utf8_bin default '',
  `updated_on` datetime NOT NULL,
  `version` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `wiki_content_versions_wcid` (`wiki_content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wiki_content_versions`
--


-- --------------------------------------------------------

--
-- Table structure for table `wiki_pages`
--

CREATE TABLE IF NOT EXISTS `wiki_pages` (
  `id` int(11) NOT NULL auto_increment,
  `wiki_id` int(11) NOT NULL,
  `title` varchar(255) collate utf8_bin NOT NULL,
  `created_on` datetime NOT NULL,
  `protected` tinyint(1) NOT NULL default '0',
  `parent_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `wiki_pages_wiki_id_title` (`wiki_id`,`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wiki_pages`
--


-- --------------------------------------------------------

--
-- Table structure for table `wiki_redirects`
--

CREATE TABLE IF NOT EXISTS `wiki_redirects` (
  `id` int(11) NOT NULL auto_increment,
  `wiki_id` int(11) NOT NULL,
  `title` varchar(255) collate utf8_bin default NULL,
  `redirects_to` varchar(255) collate utf8_bin default NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `wiki_redirects_wiki_id_title` (`wiki_id`,`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wiki_redirects`
--


-- --------------------------------------------------------

--
-- Table structure for table `workflows`
--

CREATE TABLE IF NOT EXISTS `workflows` (
  `id` int(11) NOT NULL auto_increment,
  `tracker_id` int(11) NOT NULL default '0',
  `old_status_id` int(11) NOT NULL default '0',
  `new_status_id` int(11) NOT NULL default '0',
  `role_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `wkfs_role_tracker_old_status` (`role_id`,`tracker_id`,`old_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=145 ;

--
-- Dumping data for table `workflows`
--

INSERT INTO `workflows` (`id`, `tracker_id`, `old_status_id`, `new_status_id`, `role_id`) VALUES
(1, 1, 1, 2, 3),
(2, 1, 1, 3, 3),
(3, 1, 1, 4, 3),
(4, 1, 1, 5, 3),
(5, 1, 1, 6, 3),
(6, 1, 2, 1, 3),
(7, 1, 2, 3, 3),
(8, 1, 2, 4, 3),
(9, 1, 2, 5, 3),
(10, 1, 2, 6, 3),
(11, 1, 3, 1, 3),
(12, 1, 3, 2, 3),
(13, 1, 3, 4, 3),
(14, 1, 3, 5, 3),
(15, 1, 3, 6, 3),
(16, 1, 4, 1, 3),
(17, 1, 4, 2, 3),
(18, 1, 4, 3, 3),
(19, 1, 4, 5, 3),
(20, 1, 4, 6, 3),
(21, 1, 5, 1, 3),
(22, 1, 5, 2, 3),
(23, 1, 5, 3, 3),
(24, 1, 5, 4, 3),
(25, 1, 5, 6, 3),
(26, 1, 6, 1, 3),
(27, 1, 6, 2, 3),
(28, 1, 6, 3, 3),
(29, 1, 6, 4, 3),
(30, 1, 6, 5, 3),
(31, 2, 1, 2, 3),
(32, 2, 1, 3, 3),
(33, 2, 1, 4, 3),
(34, 2, 1, 5, 3),
(35, 2, 1, 6, 3),
(36, 2, 2, 1, 3),
(37, 2, 2, 3, 3),
(38, 2, 2, 4, 3),
(39, 2, 2, 5, 3),
(40, 2, 2, 6, 3),
(41, 2, 3, 1, 3),
(42, 2, 3, 2, 3),
(43, 2, 3, 4, 3),
(44, 2, 3, 5, 3),
(45, 2, 3, 6, 3),
(46, 2, 4, 1, 3),
(47, 2, 4, 2, 3),
(48, 2, 4, 3, 3),
(49, 2, 4, 5, 3),
(50, 2, 4, 6, 3),
(51, 2, 5, 1, 3),
(52, 2, 5, 2, 3),
(53, 2, 5, 3, 3),
(54, 2, 5, 4, 3),
(55, 2, 5, 6, 3),
(56, 2, 6, 1, 3),
(57, 2, 6, 2, 3),
(58, 2, 6, 3, 3),
(59, 2, 6, 4, 3),
(60, 2, 6, 5, 3),
(61, 3, 1, 2, 3),
(62, 3, 1, 3, 3),
(63, 3, 1, 4, 3),
(64, 3, 1, 5, 3),
(65, 3, 1, 6, 3),
(66, 3, 2, 1, 3),
(67, 3, 2, 3, 3),
(68, 3, 2, 4, 3),
(69, 3, 2, 5, 3),
(70, 3, 2, 6, 3),
(71, 3, 3, 1, 3),
(72, 3, 3, 2, 3),
(73, 3, 3, 4, 3),
(74, 3, 3, 5, 3),
(75, 3, 3, 6, 3),
(76, 3, 4, 1, 3),
(77, 3, 4, 2, 3),
(78, 3, 4, 3, 3),
(79, 3, 4, 5, 3),
(80, 3, 4, 6, 3),
(81, 3, 5, 1, 3),
(82, 3, 5, 2, 3),
(83, 3, 5, 3, 3),
(84, 3, 5, 4, 3),
(85, 3, 5, 6, 3),
(86, 3, 6, 1, 3),
(87, 3, 6, 2, 3),
(88, 3, 6, 3, 3),
(89, 3, 6, 4, 3),
(90, 3, 6, 5, 3),
(91, 1, 1, 2, 4),
(92, 1, 1, 3, 4),
(93, 1, 1, 4, 4),
(94, 1, 1, 5, 4),
(95, 1, 2, 3, 4),
(96, 1, 2, 4, 4),
(97, 1, 2, 5, 4),
(98, 1, 3, 2, 4),
(99, 1, 3, 4, 4),
(100, 1, 3, 5, 4),
(101, 1, 4, 2, 4),
(102, 1, 4, 3, 4),
(103, 1, 4, 5, 4),
(104, 2, 1, 2, 4),
(105, 2, 1, 3, 4),
(106, 2, 1, 4, 4),
(107, 2, 1, 5, 4),
(108, 2, 2, 3, 4),
(109, 2, 2, 4, 4),
(110, 2, 2, 5, 4),
(111, 2, 3, 2, 4),
(112, 2, 3, 4, 4),
(113, 2, 3, 5, 4),
(114, 2, 4, 2, 4),
(115, 2, 4, 3, 4),
(116, 2, 4, 5, 4),
(117, 3, 1, 2, 4),
(118, 3, 1, 3, 4),
(119, 3, 1, 4, 4),
(120, 3, 1, 5, 4),
(121, 3, 2, 3, 4),
(122, 3, 2, 4, 4),
(123, 3, 2, 5, 4),
(124, 3, 3, 2, 4),
(125, 3, 3, 4, 4),
(126, 3, 3, 5, 4),
(127, 3, 4, 2, 4),
(128, 3, 4, 3, 4),
(129, 3, 4, 5, 4),
(130, 1, 1, 5, 5),
(131, 1, 2, 5, 5),
(132, 1, 3, 5, 5),
(133, 1, 4, 5, 5),
(134, 1, 3, 4, 5),
(135, 2, 1, 5, 5),
(136, 2, 2, 5, 5),
(137, 2, 3, 5, 5),
(138, 2, 4, 5, 5),
(139, 2, 3, 4, 5),
(140, 3, 1, 5, 5),
(141, 3, 2, 5, 5),
(142, 3, 3, 5, 5),
(143, 3, 4, 5, 5),
(144, 3, 3, 4, 5);
