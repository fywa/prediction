<?php
return 
[
	'menu' => 
	[
        [
            'title' => '推荐位管理',
            'list' =>
                [
                    [
                        'controller' => 'Featured',
                        'icon' => 'glyphicon glyphicon-film',
                        'title' => '轮播图管理',
                        'href' => '#',
                        'list' =>
                            [
                                [
                                    'action' => 'index',
                                    'name' => '轮播图列表',
                                    'href' => 'Featured/index'
                                ],
                                [
                                    'action' => 'add',
                                    'name' => '添加图片',
                                    'href' => 'Featured/add',
                                ]
                            ]
                    ]
                ]
        ],
		[
			'title' => '权限管理',
			'list' => 
			[
				[
					'controller' => 'Admin',
					'icon' => 'glyphicon glyphicon-exclamation-sign',
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
							'action' => 'apply',
							'name' => '申请列表',
							'href' => 'Admin/apply'
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
					'icon' => 'glyphicon glyphicon-lock',
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
					'icon' => 'glyphicon glyphicon-flag',
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
			'title' => '内容管理',
			'list' => 
			[
				[
					'controller' => 'Prediction',
					'icon' => 'glyphicon glyphicon-leaf',
					'title' => '预测话题管理',
					'href' => '#',
					'list' => 
					[
						[
							'action' => 'index',
							'name' => '预测话题列表',
							'href' => 'Prediction/index'							
						],
						[
							'action' => 'apply',
							'name' => '审核列表',
							'href' => 'Prediction/apply'
						],
					]					
				],
				[
					'controller' => 'Experience',
					'icon' => 'glyphicon glyphicon-grain',
					'title' => '经验分享管理',
					'href' =>	'#',
					'list' => 
					[
						[
							'action' => 'index',
							'name' => '经验分享管理',
							'href' => 'Experience/index',
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
					'icon' => 'glyphicon glyphicon-tag',
					'title' => '标签列表',
					'href' => 'UserExpert/add',
					'list' => []
				]
			]
		],
	]
];