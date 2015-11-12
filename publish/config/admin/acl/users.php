<?php

return [

  'heading' => [
    'main' => 'ACL', // required
    'sub' => 'User Management' // optional
  ],

  // DEFAULTS FOR STANDARD LISTINGS PAGE

  'searchable' => [
    'name','email'
  ],

  'filterables' => [
    //[1],[2],[3],[4]
  ],

  'actions' => [
    [
      'type'=>'ADD',
      'model'=>'user'
    ]
  ],

  'list' => [

    'id'					=> ['label'=>'ID', 'sortable'=>1],
    'name'				=> ['label'=>'Username', 'sortable'=>1],
    'email'				=> ['label'=>'Email', 'sortable'=>1],
    'created_at'	=> ['label'=>'Created', 'sortable'=>1, 'format'=>'formatLongDate'],
    'updated_at'	=> ['label'=>'Updated', 'sortable'=>1, 'format'=>'formatLongDate'],
    '_activate' 	=> ['label'=>'Active', 'sortable'=>1, 'column'=>'active'],

    'actions' => [
      ['label'=>'View/Edit', 'type'=>'EDIT'],
      ['type'=>'ARCHIVE', 'compact'=>1],
      ['type'=>'DESTROY', 'compact'=>1]
    ],

  ],

  // DEFAULTS FOR STANDARD FORMS PAGE [NEW/EDIT]

  'form' => [
    'fields' => [
      'id' => [
        [
          'type' => 'SKIP',
        ],[
          'label' => 'ID',
          'type' => 'INFO',
          'format' => '',
        ]
      ],
      'name' => [
        [
          'label' => 'Username',
          'type' => 'TEXT',
          'class' => '',
          'options' => [
            'placeholder' => 'Alpha-numeric only',
            //'required' => 'required',
            //'readonly' => 'readonly',
            //'disabled' => 'disabled',
            //'maxlength' => '255',
            //'autocomplete' => 'off',
            //'style' => '',
          ],
          'validation' => 'required|unique:users|max:255',
          'errormessage' => [
            'required' => 'XXXXXX',
            'max' => '255',
            'unique' => 'unique NAME... DUDE!',
          ],
        ],[
          'label' => 'Username',
          'type' => 'INFO',
          'format' => '',
        ]
      ],
      'email' => [
        'label' => 'Email',
        'type' => 'EMAIL',
        'class' => '',
        'options' => [
          'placeholder' => 'eg. user@domain.com',
          //'required' => 'required',
          //'readonly' => 'readonly',
          //'disabled' => 'disabled',
          //'maxlength' => '255',
          //'autocomplete' => 'off',
          //'style' => '',
        ],
        'validation' => 'required|email|max:255|unique:users,email,$id',
        // 'validation' => 'required|email|max:255|unique:users',
        'errormessage' => [
          'required' => 'XXXXXX',
          'email' => 'YYYYY',
          'unique' => 'unique DUDE!',
        ],
      ],
      [
        [
          'password' => [
            'label' => 'Password',
            'type' => 'PASSWORD',
            'class' => '',
            'options' => [
              //'placeholder' => '',
              //'required' => 'required',
              //'readonly' => 'readonly',
              //'disabled' => 'disabled',
              //'maxlength' => '255',
              //'autocomplete' => 'off',
              //'style' => '',
            ],
            'validation' => 'onExists|required|confirmed',
            'errormessage' => [
              // 'required' => 'Password required...',
              // 'confirmed' => 'YYYYY',
            ],
          ],
          'password_confirmation' => [
            'label' => 'Password Again',
            'type' => 'PASSWORD',
            'class' => '',
            'options' => [
              //'placeholder' => '',
              //'required' => 'required',
              //'readonly' => 'readonly',
              //'disabled' => 'disabled',
              //'maxlength' => '255',
              //'autocomplete' => 'off',
              //'style' => '',
            ],
            'validation' => '',
            'errormessage' => [
            ],
          ],
        ],
      ],
      'active' => [
        'label' => 'Active',
        'type' => 'SELECT',
        'class' => '',
              'typeahead' => FALSE,
              'list'  => [
                '0' => 'Inactive',
                '1' => 'Active',
              ],
              //'list' => "model:Lab25\CrudAdminLte\Http\Models\User",
        'options' => [
          'placeholder' => '- Select Option -',
          //'required' => 'required',
          //'readonly' => 'readonly',
          //'disabled' => 'disabled',
          'size' => 10,
          // 'multiple' => 'multiple',
          //'style' => '',
        ],
        'validation' => '',
        'errormessage' => [
        ],
      ],
      'break',
      'created_at' => [
        [
          'type' => 'SKIP',
        ],[
          'label' => 'Created',
          'type' => 'INFO',
          'format' => 'formatLongDateTimeFull',
        ]
      ],
      'updated_at' => [
        [
          'type' => 'SKIP',
        ],[
          'label' => 'Updated',
          'type' => 'INFO',
          'format' => 'formatLongDateTimeFull',
        ]
      ],

    ]
  ],

];
