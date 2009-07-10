<?php
// redMine-CI - project management software in codeigniter
// Copyright (C) 2009  MugilTech - mugiltech.com
// Created by: Kathir
//
// Created on 10-Mar-09
//
// Modifications by:
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title><?php print TITLE ?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<!--<meta name="description" content="Redmine" /> -->
<meta name="keywords" content="issue,bug,tracker" />
<link href="<?php print WEB_URL ?>css/style.css" media="all" rel="stylesheet" type="text/css" />

<!--[if IE]>
    <style type="text/css">
      * html body{ width: expression( document.documentElement.clientWidth < 900 ? '900px' : '100%' ); }

    </style>
<![endif]-->
</head>
<body>
<div id="wrapper">
  <div id="top-menu">
    <?php if (isset($user)) { if ($user != "") { ?>
    <div id="default-menu">
      <ul>
        <li><a href="<?php print WEB_URL ?>">Home</a></li>
        <li><a href="">My Page</a></li>
        <li><a href="<?php print WEB_URL ?>projects">Projects</a></li>
        <?php if ($user->type == "Admin" && $user->admin == 1) { ?>
           <li><a href="<?php print WEB_URL ?>admin">Administration</a></li>
        <?php } ?>
        <li><a href="http://www.redmine.org/guide">Help</a></li>
      </ul>
    </div>
    <div id="loggedas">Logged in as <b><?php echo $user->login; ?></b></div>
    <div id="account">
      <ul>
        <li><a href="<?php print WEB_URL ?>my/account" class="my-account">My Account</a></li>
        <li><a href="<?php print WEB_URL ?>logout" class="logout">Sign out</a></li>
      </ul>
    </div>
    <?php } else { ?>
    <div id="default-menu">
      <ul>
        <li><a href="<?php print WEB_URL ?>">Home</a></li>
        <li><a href="">Projects</a></li>
        <li><a href="http://www.redmine.org/guide">Help</a></li>
      </ul>
    </div>
    <div id="loggedas">&nbsp;</div>
    <div id="account">
      <ul>
        <li><a href="<?php print WEB_URL ?>login" class="my-account">Sign in</a></li>
        <li><a href="<?php print WEB_URL ?>account/register" class="logout">Register</a></li>
      </ul>
    </div>
    <?php }} ?>

  </div>

  <div id="header">
    <div id="heading">
      <h1>Redmine-CI</h1>
    </div>
    <div id="quick-search">
      <form action="" method="post">
        <a href="">Search</a>:
        <input class="small" id="search" name="search" size="20" type="text" />
      </form>
    </div>
     </div>



