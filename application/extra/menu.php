<?php
return 
[
	'menu' => 
	[
		[
			'title' => '权限管理',
			'list' => 
			[
				[
					'controller' => 'Admin',
					'icon' => 'glyphicon glyphicon-user',
					'title' => '管理员管理',
					'href' => '#',
					'list' => 
					[
						[
							'action' => 'index',
							'name' => '管理员列表',
							'href' => 'Admin/index',
						],
						[
							'action' => 'add',
							'name' => '添加管理员',
							'href' => 'Admin/add'
						]
					]
				],
				[
					'controller' => 'Role',
					'icon' => 'glyphicon glyphicon-user',
					'title' => '角色管理',
					'href' => '#',
					'list' => 
					[
						[
							'action' => 'index',
							'name' => '角色列表',
							'href' => 'Role/index',
						],
						[
							'action' => 'add',
							'name' => '添加角色',
							'href' => 'Role/add'
						]
					]			
				],
				[
					'controller' => 'Rule',
					'icon' => 'glyphicon glyphicon-user',
					'title' => '规则管理',
					'href' => '#',
					'list' => 
					[
						[
							'action' => 'index',
							'name' => '规则列表',
							'href' => 'Rule/index',
						],
						[
							'action' => 'add',
							'name' => '添加规则',
							'href' => 'Rule/add'
						]
					]			
				]
			]
		],
		[
			'title' => '会员管理',
			'list' => 
			[
				[
					'controller' => 'User',
					'icon' => 'glyphicon glyphicon-user',
					'title' => '会员列表',
					'href' => 'User/index',
					'list' => []
				],
				[
					'controller' => 'UserExpert',
					'icon' => 'glyphicon glyphicon-user',
					'title' => '标签列表',
					'href' => 'UserExpert/add',
					'list' => []
				]
			]
		]
	]
];