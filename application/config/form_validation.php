<?php
$config = [

	'admin_login' => [

		[
			'field'=>'name',
			'label'=>'Name',
			'rules'=>'trim|required|alpha'
	    ],
	    [
	    	'field'=>'pwd',
	    	'label'=>'Password',
	    	'rules'=>'trim|required'
	    ]
	],
	'store_employee' => [

		[
			'field'=>'fullname',
			'label'=>'Full Name',
			'rules'=>'required|alpha'
	    ],
	    [
	    	'field'=>'email',
	    	'label'=>'Email',
	    	'rules'=>'trim|required'
	    ],
	    [
	    	'field'=>'password',
	    	'label'=>'Password',
	    	'rules'=>'trim|required'
	    ],
	    [
	    	'field'=>'address',
	    	'label'=>'Address',
	    	'rules'=>''
	    ]
	],
	'add_article' => [
		[
			'field'=>'title',
			'label'=>'Title',
			'rules'=>'required'
		],
		[
			'field'=>'event',
			'label'=>'Event',
			'rules'=>'required'
		],
		[
			'field'=>'description',
			'label'=>'Description',
			'rules'=>'required'
		],
	]
];