<?php

/*
	Crowdask further on Question2Answer 1.6.2

	http://www.question2answer.org/

	
	File: qa-plugin/cas-login/qa-plugin.php
	Version: See define()s at top of qa-include/qa-base.php
	Description: Initiates cas login plugin


	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	More about this license: http://www.question2answer.org/license.php
*/

/*
	Plugin Name: CAS Login
	Plugin URI: 
	Plugin Description: Allows users to log in via CAS (Centralized Authentication System)
	Plugin Version: 1.0.0
	Plugin Date: 2013-11-21
	Plugin Author: lindelof
	Plugin Author URI: https://github.com/lindelof
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.5
	Plugin Minimum PHP Version: 5
	Plugin Update Check URI:
*/


	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}


	if (!QA_FINAL_EXTERNAL_USERS) { // login modules don't work with external user integration
		qa_register_plugin_module('login', 'qa-cas-login.php', 'qa_cas_login', 'CAS Login');
		qa_register_plugin_module('page', 'qa-cas-login-page.php', 'qa_cas_login_page', 'CAS Login Page');
		qa_register_plugin_layer('qa-cas-layer.php', 'CAS Login Layer');
	}
	

/*
	Omit PHP closing tag to help avoid accidental output
*/