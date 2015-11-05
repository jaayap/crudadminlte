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
        'step' => 3, //TODO
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
      'duallist' => [
        'label' => 'DUAL LIST/FLIP FLOP',
        'type' => 'DUALLIST',
        'defaults' => [

          'filterTextClear' =>	'Clear Filter', // the text for the "Show All" button.
          'filterPlaceHolder' => 'Filter', // the placeholder for the input element for filtering elements.
          'moveSelectedLabel' => 'Add selected', // the label for the "Move Selected" button.
          'moveAllLabel' => 'Add all', // the label for the "Move All" button.
          'removeSelectedLabel' => 'Remove selected', // the label for the "Remove Selected" button.
          'removeAllLabel' => 'Remove all', // the label for the "Remove All" button.
          'moveOnSelect' => FALSE, // determines whether to move options upon selection. This option is forced to true on the Android browser.
          'preserveSelectionOnMove' => 'all', // can be 'all' (for selecting both moved elements and the already selected ones in the target list) or 'moved' (for selecting moved elements only)
          'selectedListLabel'	=> 'SELECTED', // can be a string specifying the name of the selected list.
          'nonSelectedListLabel' => 'AVAILABLE', // can be a string specifying the name of the non selected list.
          // 'helperSelectNamePostfix' => '_helper', // The added selects will have the same name as the original one, concatenated with this string and 1 (for the non selected list, e.g. element_helper1) or 2 (for the selected list, e.g. element_helper2).
          'selectorMinimalHeight' =>	115, // represents the minimal height of the generated dual listbox.
          // 'showFilterInputs' => TRUE, // whether to show filter inputs.
          // 'nonSelectedFilter' => '', // initializes the dual listbox with a filter for the non selected elements. This is applied only if showFilterInputs is set to true.
          // 'selectedFilter' => '', // initializes the dual listbox with a filter for the selected elements. This is applied only if showFilterInputs is set to true.
          // 'infoText' => 'Showing all {0}', // determines which string format to use when all options are visible. Set this to false to hide this information. Remember to insert the {0} placeholder.
          // 'infoTextFiltered' => '<span class="label label-warning">Filtered</span> {0} from {1}', // determines which element format to use when some element is filtered. Remember to insert the {0} and {1} placeholders.
          // 'infoTextEmpty' => 'Empty list', // determines the string to use when there are no options in the list.
          // 'filterOnValues' => FALSE, // set this to true to filter the options according to their values and not their HTML contents.

        ],
        // 'list' => [1=>'Option Z'],
        // 'list' => [
        //   'a' => 'Option A',
        //   'b' => 'Option B',
        //   'c' => 'Option C',
        // ],
        'list' => "model:User",
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
