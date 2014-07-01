<?php

/*
	Question2Answer (c) ZHENG Yidan

	http://www.question2answer.org/

	
	File: qa-plugin/cas-login/qa-cas-login-page.php
	Version: See define()s at top of qa-include/qa-base.php
	Description: Page which performs cas login action


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

class qa_cas_login_page {

    var $directory;
    var $urltoroot;

    function load_module($directory, $urltoroot)
    {
        $this->directory=$directory;
        $this->urltoroot=$urltoroot;
    }

    function match_request($request)
    {
        return ($request=='cas-login');
    }

    function process_request($request)
    {
        if ($request=='cas-login') {

            $tourl=qa_get('to');
            if (!strlen($tourl))
                $tourl=qa_path_absolute('');

            if (!function_exists('json_decode')) { // work around fact that PHP might not have JSON extension installed
                require_once $this->directory.'JSON.php';

                function json_decode($json)
                {
                    $decoder=new Services_JSON(SERVICES_JSON_LOOSE_TYPE);
                    return $decoder->decode($json);
                }
            }


            try {
                /*
                 * call cas api to get user credentials
                 * Uncomment the following block in production server
                 */
                /*
                require_once('CAS.php');

                $identifier = phpCAS::getUser();

                $user = phpCAS::getAttributes();
                */

                $user=array(
                    'email' => 'Test@mydomain.com',
                    'fullname' => 'Test User',
                );

                $cas_userid = @$user['puid'];

                if (is_array($user))
                    qa_log_in_external_user('cas', $cas_userid, array(
                        'email' => @$user['email'],
                        'handle' => @$user['fullname'],
                        'confirmed' => @$user['email'],
                        'name' => @$user['fullname'],
                        'location' => '',
                        'website' =>'',
                        'about' => '',
                        'avatar' => null,
                    ));

            } catch (Exception $e) {
            }
        }

        qa_redirect_raw($tourl);
    }

}


/*
	Omit PHP closing tag to help avoid accidental output
*/