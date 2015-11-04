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
          'validation' => 'required|alpha_dash|size:10',
          'errormessage' => [
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
        'validation' => 'required|email',
        'errormessage' => [
          'required' => 'XXXXXX',
          'email' => 'YYYYY',
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
            'validation' => 'required|confirmed',
            'errormessage' => [
              'required' => 'XXXXXX',
              'confirmed' => 'YYYYY',
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
      [
        [
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
        ],
      ],

      'remember_token' => [
        'type' => 'HIDDEN',
      ],

      'textlimit' => [
        'label' => 'TEXTLIMIT',
        'type' => 'TEXTLIMIT',
        'limit' => 5000,
        'class' => '',
        'options' => [
          'placeholder' => 'Alpha-numeric only',
          //'required' => 'required',
          //'readonly' => 'readonly',
          //'disabled' => 'disabled',
          // 'rows' => 5,
          //'autocomplete' => 'off',
          //'style' => 'width:400px;',
        ],
        'validation' => '',
        'errormessage' => [
        ],
      ],
      'textarea' => [
        'label' => 'TEXTAREA',
        'type' => 'TEXTAREA',
        'class' => '',
        'options' => [
          //'required' => 'required',
          //'readonly' => 'readonly',
          //'disabled' => 'disabled',
          //'maxlength' => '255',
          'rows' => 5,
          //'autocomplete' => 'off',
          //'style' => '',
        ],
        'validation' => '',
        'errormessage' => [
        ],
      ],

      'number' => [
        'label' => 'NUMBER',
        'type' => 'NUMBER',
        'class' => '',
        'options' => [
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
      'telephone' => [
        'label' => 'TELEPHONE',
        'type' => 'TELEPHONE',
        'class' => '',
        'mask' => '+99 9 9999 9999', // international
        // 'mask' => '(99) 9999 9999', // local
        // 'mask' => '9999 999 999', // mobile
        'options' => [
          //'required' => 'required',
          //'readonly' => 'readonly',
          //'disabled' => 'disabled',
          //'maxlength' => '255',
          //'autocomplete' => 'off',
          'style' => 'width:120px;',
        ],
        'validation' => '',
        'errormessage' => [
        ],
      ],
      'ipaddress' => [
        'label' => 'IP ADDRESS',
        'type' => 'IPADDRESS',
        'class' => '',
        'options' => [
          //'required' => 'required',
          //'readonly' => 'readonly',
          //'disabled' => 'disabled',
          //'maxlength' => '255',
          //'autocomplete' => 'off',
          'style' => 'width:120px;',
        ],
        'validation' => '',
        'errormessage' => [
        ],
      ],

      'colour' => [
        'label' => 'COLOUR',
        'type' => 'COLOUR',
        'class' => '',
        'options' => [
          'placeholder' => '#000000',
          //'required' => 'required',
          //'readonly' => 'readonly',
          //'disabled' => 'disabled',
          //'style' => '',
        ],
        'validation' => '',
        'errormessage' => [
        ],
      ],

      'file' => [
        'label' => 'FILE',
        'type' => 'FILE',
        'class' => '',
        'options' => [
          //'required' => 'required',
          //'disabled' => 'disabled',
          //'autocomplete' => 'off',
        ],
        'validation' => '',
        'errormessage' => [
        ],
      ],
      'select' => [
        'label' => 'SELECT',
        'type' => 'SELECT',
        'class' => '',
        'typeahead' => true,
        'list'  => [
          'a' => 'A',
          'b' => 'B',
          'c' => 'C',
          'd' => 'D',
          'e' => 'E',
          'f' => 'F',
          'g' => 'G',
        ],
        //'list'  => "model:User",
        'options' => [
          'placeholder' => '- Select Option -',
          //'required' => 'required',
          //'readonly' => 'readonly',
          //'disabled' => 'disabled',
          'size' => 10,
          'multiple' => 'multiple',
          //'style' => '',
        ],
        'validation' => '',
        'errormessage' => [
        ],
      ],
      'selectrange' => [
        'label' => 'SELECTRANGE',
        'type' => 'SELECTRANGE',
        'class' => '',
        'range' => [1977,2015],
        'options' => [
          //'required' => 'required',
          //'readonly' => 'readonly',
          //'disabled' => 'disabled',
          //'autocomplete' => 'off',
          'style' => 'width:150px;',
        ],
        'validation' => '',
        'errormessage' => [
        ],
      ],
      'selectmonth' => [
        'label' => 'SELECTMONTH',
        'type' => 'SELECTMONTH',
        'class' => '',
        'options' => [
          //'required' => 'required',
          //'readonly' => 'readonly',
          //'disabled' => 'disabled',
          //'autocomplete' => 'off',
          'style' => 'width:150px;',
        ],
        'validation' => '',
        'errormessage' => [
        ],
      ],

      'date' => [
        'label' => 'DATE',
        'type' => 'DATE',
        'class' => '',
        'format' => 'dd-mm-yyyy', // dd = Day, mm = Month, yyyy = Year
        'options' => [
          //'required' => 'required',
          //'readonly' => 'readonly',
          //'disabled' => 'disabled',
          //'maxlength' => '255',
          //'autocomplete' => 'off',
          'style' => 'width:120px;',
        ],
        'validation' => '',
        'errormessage' => [
        ],
      ],
      'time' => [
        'label' => 'TIME',
        'type' => 'TIME',
        'class' => '',
        'showseconds' => true,
        'format' => '24HR', // 12HR/24HR
        'options' => [
          //'required' => 'required',
          //'readonly' => 'readonly',
          //'disabled' => 'disabled',
          //'maxlength' => '255',
          //'autocomplete' => 'off',
          'style' => 'width:120px;',
        ],
        'validation' => '',
        'errormessage' => [
        ],
      ],

      'daterange' => [
        'label' => 'DATERANGE',
        'type' => 'DATERANGE',
        'class' => '',
        //'dateformat' => 'dd-mm-yyyy', // dd = Day, mm = Month, yyyy = Year
        'showtime' => true,
        'timeformat' => '24HR', // 12HR/24HR
        'position' => 'LEFT', // left/right
        'options' => [
          //'required' => 'required',
          //'readonly' => 'readonly',
          //'disabled' => 'disabled',
          //'maxlength' => '255',
          //'autocomplete' => 'off',
          'style' => 'width:400px;',
        ],
        'validation' => '',
        'errormessage' => [
        ],
      ],

      'wysiwyg' => [
        'label' => 'WYSIWYG',
        'type' => 'WYSIWYG',
        'class' => '',
        'options' => [
          //'required' => 'required',
          //'readonly' => 'readonly',
          //'disabled' => 'disabled',
        ],
        'validation' => '',
        'errormessage' => [
        ],
      ],
      'codeblock' => [
        'label' => 'CODEBLOCK',
        'type' => 'CODEBLOCK',
        'lang'  => 'PHP',
        'class' => '',
        'options' => [
          //'required' => 'required',
          //'readonly' => 'readonly',
          'style' => 'height:150px;',
        ],
        'validation' => '',
        'errormessage' => [
        ],
      ],

      'checkbox' => [
        'label' => 'CHECKBOX',
        'type' => 'CHECKBOX',
        'list' => [1=>'Option Z'],
        // 'list' => [
        //   'a' => 'Option A',
        //   'b' => 'Option B',
        //   'c' => 'Option C',
        // ],
        // 'list' => "model:User",
        'options' => [
          //'required' => 'required',
          //'readonly' => 'readonly',
          //'disabled' => 'disabled',
          //'autocomplete' => 'off',
          //'style' => '',
        ],
        'validation' => '',
        'errormessage' => [
        ],
      ],
      'radio' => [
        'label' => 'RADIO',
        'type' => 'RADIO',
        // 'list' => [1=>'Option Z'],
        'list' => [
          'a' => 'Option A',
          'b' => 'Option B',
          'c' => 'Option C',
        ],
        // 'list' => "model:User",
        'options' => [
          //'required' => 'required',
          //'readonly' => 'readonly',
          //'disabled' => 'disabled',
          //'autocomplete' => 'off',
          //'style' => '',
        ],
        'validation' => '',
        'errormessage' => [
        ],
      ],
      'toggle' => [
        'label' => 'BOOLEAN SWITCH',
        'type' => 'TOGGLE',
        'defaults' => [
          'type' => 'CHECKBOX',     // RADIO/CHECKBOX
          // 'on' => [
          //   'text'  => 'ACTIVE',
          //   'color' => 'success',      // 'primary', 'info', 'success', 'warning', 'danger', 'default'
          // ],
          // 'off' => [
          //   'text'  => 'INACTIVE',
          //   'color' => 'danger',   // 'primary', 'info', 'success', 'warning', 'danger', 'default'
          // ],
        ],
        // 'list' => [1=>'Option Z'],
        'list' => [
          'a' => 'Option A',
          'b' => 'Option B',
          'c' => 'Option C',
        ],
        // 'list' => "model:User",
        'options' => [
          //'required' => 'required',
          //'readonly' => 'readonly',
          //'disabled' => 'disabled',
          //'autocomplete' => 'off',
          //'style' => '',
        ],
        'validation' => '',
        'errormessage' => [
        ],
      ],


      //  ---------------------------------------------------------------------
      //
      //  TODO : add more form elements... hence functions.. YAY!!!
      //

      //  - PLUPLOAD (AJAX UPLOADER) : MAYBE
      //  - jCrop
      //  - Multi-select Pick List (Flip flop)

      //  - Error states...

    ]
  ],

];
