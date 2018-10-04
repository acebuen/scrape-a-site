<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller
{
	private $list_profiles = array(
			array(
				"userName" => "unumdesign",
				"fullName" => "Jack Beanstalk",
				"imageUrl" => "profileimage.orsomething.com",
				"followers" => 123,
				"following" => 12345,
				"private_account" => false
			),
			array(
				"userName" => "acebuen",
				"fullName" => "Patrick Ace Buen",
				"imageUrl" => "www.facebook.com/acebuen",
				"followers" => 13,
				"following" => 1313,
				"private_account" => true
			)
		);

	function __construct() 
	{
		parent::__construct();

		$this->load->helper('url');
	}
	
	function index()
	{
		$this->load->view('welcome_message');
	}

	function user_profile($username = null)
	{
		// print_r($username); die();
		if (!empty($username))
		{
			if ($username == 'user_profile_continue')
			{
				$response = array('error' => 'parameter is required');
			}
			else
			{
				foreach ($this->list_profiles as $key => $value)
				{
					if ($username == $value['userName'])
					{
						$array_key = $key;
						break;
					}
				}

				if (isset($array_key))
				{
					if ($this->list_profiles[$array_key]['private_account'] === TRUE)
					{
						$response = array('error' => 'account is private');
					}
					else
					{
						$response = array(
							"data" => $this->list_profiles[$array_key]
						);
					}
				}
				else 		// not found ..
				{
					$response = array('error' => 'user doesnt exist');
				}
			}
		}
		else
		{
			$response = array('error' => 'parameter is required');
		}
		
		echo json_encode($response);
	}

	function user_profile_continue($username = null)
	{
		$this->load->view('user_profile_continue');
	}
}
