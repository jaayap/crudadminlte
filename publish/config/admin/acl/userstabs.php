<?php

return [

  'heading' => [
    'main' => 'ACL', // required
    'sub' => 'User TABS Management' // optional
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
    [
      'tab' => 'User Details',
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
              'required' => 'required',
              //'readonly' => 'readonly',
              //'disabled' => 'disabled',
              //'maxlength' => '255',
              //'autocomplete' => 'off',
              //'style' => '',
            ],
            'validation' => 'require|alpha_dash|size:10',
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
            'required' => 'required',
            //'readonly' => 'readonly',
            //'disabled' => 'disabled',
            //'maxlength' => '255',
            //'autocomplete' => 'off',
            //'style' => '',
          ],
          'validation' => 'require|email',
          'errormessage' => [

          ],
        ],
      ]
    ],
    [
      'tab' => 'Password',
      'fields' => [
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
      ]
    ],
    [
      'tab' => 'Other Elements',
      'fields' => [
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
          //'list' => [1=>'Option Z'],
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
      ]
    ],
    [
      'tab' => 'Advanced',
      'fields' => [
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
        'toggle' => [
          'label' => 'BOOLEAN SWITCH',
          'type' => 'TOGGLE',
          'defaults' => [
            'type' => 'RADIO', // RADIO/CHECKBOX
            'on' => [
              'text'  => 'True',
              'color' => 'info',      // 'primary', 'info', 'success', 'warning', 'danger', 'default'
            ],
            'off' => [
              'text'  => 'False',
              'color' => 'default',   // 'primary', 'info', 'success', 'warning', 'danger', 'default'
            ],
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

      ]
    ]
  ],

];
