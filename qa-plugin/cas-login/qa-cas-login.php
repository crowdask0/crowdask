<?php

/*
	Crowdask further on Question2Answer 1.6.2

	http://www.question2answer.org/

	
	File: qa-plugin/cas-login/qa-cas-login.php
	Version: See define()s at top of qa-include/qa-base.php
	Description: Login module class for cas login plugin


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

	class qa_cas_login {
		
		function match_source($source)
		{
			return $source=='cas';
		}

		
		function login_html($tourl, $context)
		{				
			$this->cas_html(qa_path_absolute('cas-login', array('to' => $tourl)), false, $context);
		}

		
		function logout_html($tourl)
		{				
			$this->cas_html($tourl, true, 'menu');
		}
		

		function cas_html($tourl, $logout, $context)
		{
			if (($context=='login') || ($context=='register'))
				$size='large';
			else
				$size='medium';
			
			if(!$logout){
				if($context=='menu'){

		?>
				<a class="qa-nav-user-link context-login" href="<?php echo $tourl;?>">Your School Account Login</a>
		<?php
				}else 
				{
		?>
				<a class="open-login-button context-login openid_large_btn" style="background: #fff url(qa-theme/School/images/school.png); background-size: 100% 100%; background-position: -1px -1px" href="<?php echo $tourl;?>" title="log in with Your School Account"></a>
		<?php
				}
			}else{
		?>
				<a href="<?php echo $tourl;?>">Logout</a>
		<?php 
		
			}
		}
		
		
		function admin_form()
		{
			$saved=false;
			
			if (qa_clicked('cas_save_button')) {				
				qa_opt('cas_option', (bool) qa_post_text('cas_option'));
				$saved=true;
			}
			
			return array(
				'ok' => $saved ? 'CAS option changed' : null,
				
				'fields' => array(
					array(
						'label' => 'Enable CAS Login:',
						'type'  => 'checkbox',
						'value' => qa_opt('cas_option'),
						'tags' => 'name="cas_option"',
					),
				),
				
				'buttons' => array(
					array(
						'label' => 'Save Changes',
						'tags' => 'name="cas_save_button"',
					),
				),
			);
		}
		
	}
	

/*
	Omit PHP closing tag to help avoid accidental output
*/