<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute field must be accepted.',
    'accepted_if' => 'The :attribute field must be accepted when :other is :value.',
    'active_url' => 'The :attribute field must be a valid URL.',
    'after' => 'The :attribute field must be a date after :date.',
    'after_or_equal' => 'The :attribute field must be a date after or equal to :date.',
    'alpha' => 'The :attribute field must only contain letters.',
    'alpha_dash' => 'The :attribute field must only contain letters, numbers, dashes, and underscores.',
    'alpha_num' => 'The :attribute field must only contain letters and numbers.',
    'array' => 'The :attribute field must be an array.',
    'ascii' => 'The :attribute field must only contain single-byte alphanumeric characters and symbols.',
    'before' => 'The :attribute field must be a date before :date.',
    'before_or_equal' => 'The :attribute field must be a date before or equal to :date.',
    'between' => [
        'array' => 'The :attribute field must have between :min and :max items.',
        'file' => 'The :attribute field must be between :min and :max kilobytes.',
        'numeric' => 'The :attribute field must be between :min and :max.',
        'string' => 'The :attribute field must be between :min and :max characters.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute field confirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => 'The :attribute field must be a valid date.',
    'date_equals' => 'The :attribute field must be a date equal to :date.',
    'date_format' => 'The :attribute field must match the format :format.',
    'decimal' => 'The :attribute field must have :decimal decimal places.',
    'declined' => 'The :attribute field must be declined.',
    'declined_if' => 'The :attribute field must be declined when :other is :value.',
    'different' => 'The :attribute field and :other must be different.',
    'digits' => 'The :attribute field must be :digits digits.',
    'digits_between' => 'The :attribute field must be between :min and :max digits.',
    'dimensions' => 'The :attribute field has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'doesnt_end_with' => 'The :attribute field must not end with one of the following: :values.',
    'doesnt_start_with' => 'The :attribute field must not start with one of the following: :values.',
    'email' => 'The :attribute field must be a valid email address.',
    'ends_with' => 'The :attribute field must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute field must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'array' => 'The :attribute field must have more than :value items.',
        'file' => 'The :attribute field must be greater than :value kilobytes.',
        'numeric' => 'The :attribute field must be greater than :value.',
        'string' => 'The :attribute field must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The :attribute field must have :value items or more.',
        'file' => 'The :attribute field must be greater than or equal to :value kilobytes.',
        'numeric' => 'The :attribute field must be greater than or equal to :value.',
        'string' => 'The :attribute field must be greater than or equal to :value characters.',
    ],
    'image' => 'The :attribute field must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field must exist in :other.',
    'integer' => 'The :attribute field must be an integer.',
    'ip' => 'The :attribute field must be a valid IP address.',
    'ipv4' => 'The :attribute field must be a valid IPv4 address.',
    'ipv6' => 'The :attribute field must be a valid IPv6 address.',
    'json' => 'The :attribute field must be a valid JSON string.',
    'lowercase' => 'The :attribute field must be lowercase.',
    'lt' => [
        'array' => 'The :attribute field must have less than :value items.',
        'file' => 'The :attribute field must be less than :value kilobytes.',
        'numeric' => 'The :attribute field must be less than :value.',
        'string' => 'The :attribute field must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attribute field must not have more than :value items.',
        'file' => 'The :attribute field must be less than or equal to :value kilobytes.',
        'numeric' => 'The :attribute field must be less than or equal to :value.',
        'string' => 'The :attribute field must be less than or equal to :value characters.',
    ],
    'mac_address' => 'The :attribute field must be a valid MAC address.',
    'max' => [
        'array' => 'The :attribute field must not have more than :max items.',
        'file' => 'The :attribute field must not be greater than :max kilobytes.',
        'numeric' => 'The :attribute field must not be greater than :max.',
        'string' => 'The :attribute field must not be greater than :max characters.',
    ],
    'max_digits' => 'The :attribute field must not have more than :max digits.',
    'mimes' => 'The :attribute field must be a file of type: :values.',
    'mimetypes' => 'The :attribute field must be a file of type: :values.',
    'min' => [
        'array' => 'The :attribute field must have at least :min items.',
        'file' => 'The :attribute field must be at least :min kilobytes.',
        'numeric' => 'The :attribute field must be at least :min.',
        'string' => 'The :attribute field must be at least :min characters.',
    ],
    'min_digits' => 'The :attribute field must have at least :min digits.',
    'missing' => 'The :attribute field must be missing.',
    'missing_if' => 'The :attribute field must be missing when :other is :value.',
    'missing_unless' => 'The :attribute field must be missing unless :other is :value.',
    'missing_with' => 'The :attribute field must be missing when :values is present.',
    'missing_with_all' => 'The :attribute field must be missing when :values are present.',
    'multiple_of' => 'The :attribute field must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute field format is invalid.',
    'numeric' => 'The :attribute field must be a number.',
    'password' => [
        'letters' => 'The :attribute field must contain at least one letter.',
        'mixed' => 'The :attribute field must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute field must contain at least one number.',
        'symbols' => 'The :attribute field must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'The :attribute field format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute field must match :other.',
    'size' => [
        'array' => 'The :attribute field must contain :size items.',
        'file' => 'The :attribute field must be :size kilobytes.',
        'numeric' => 'The :attribute field must be :size.',
        'string' => 'The :attribute field must be :size characters.',
    ],
    'starts_with' => 'The :attribute field must start with one of the following: :values.',
    'string' => 'The :attribute field must be a string.',
    'timezone' => 'The :attribute field must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'uppercase' => 'The :attribute field must be uppercase.',
    'url' => 'The :attribute field must be a valid URL.',
    'ulid' => 'The :attribute field must be a valid ULID.',
    'uuid' => 'The :attribute field must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'value'=>'Amount',
        'note'=>'Note',
        'replay'=>'Reply',
        'req_date'=>'Request Date',
        'status.en'=>'Status',
        'alert_date'=>'Penality Date',
        'punishment'=>'Penality Value',
        'file'=>'File',
        'user_id'=>'Employee',
        'discount_value'=>'Deduction Value',
        'time_departure'=>'Departure Time',
        'date'=>'Date',
        'english_name' =>'English Name',
        'arabic_name' =>'Arabic Name',
        'location' =>'Location',
        'lat' =>'Latitude',
        'long' =>'Longitude',
        'shifts'=>'Shifts',
        'shifts.*'=>'Shifts List',
        'branch_head' =>'Branch Head',
        'name'=>'Name',
        'email'=>'Email Address',
        'password' =>'Password',
        'image'=>'Image',
        'phone' =>'Phone Number',
        'role_id' =>'Role',
        'english_description'=>'English Description',
        'arabic_description'=>'Arabic Description',
        'employees_count'=>'Employees Count',
        'leaves_count'=>'Departures Count',
        'holidays_count'=>'Holidays Count',
        'sick_leaves'=>'Sick Leaves Count',
        'advances_percentage'=>'Percentage of advances',
        'advances_count'=>'Advances Count',
        'currency'=>'Currency',
        'extra_rate'=>'Overtime rate',
        'subscription_id'=>'Subscription',
        'timezone'=>'Timezone',
        'grace_period'=>'Grace Period',
        'percentage'=>'Percentage',
        'from'=>'From Date',
        'to'=>'To',
        'department_head'=>'Department Head',
        'vacation_balance'=>'Vacation Balance',
        'question_en'=>'English Question',
        'question_ar'=>'Arabic Question',
        'answer_en'=>'English Answer',
        'answer_ar'=>'Arabic Answer',
        'english_body'=>'English Body',
        'arabic_body'=>'Arabic Body',
        'english_title'=>'English Title',
        'arabic_title'=>'Arabic Title',
        'english_note' =>'English Note',
        'arabic_note' =>'Arabic Note',
        'english_content' =>'English Content',
        'arabic_content' =>'Arabic Content',
        'reward_date'=>'Bonus Date',
        'reward_value'=>'Bonus Value',
        'reward_type_id'=>'Bonus Type',
        "permissions"=>'Permissions',
        'net_salary'=>'Net Salary',
        'shift_id'=>'Shift',
        'nationality'=>'Nationality',
        'gender'=>'Gender',
        'marital_status'=>'Marital Status',
        'date_of_birth'=>'Date Of Birth',
        'passport_identity'=>'Passport Identity',
        'national_identity'=>'National Identity',
        'emergency_contact'=>'Emergency Contact',
        'bank_name'=>'Bank Name',
        'account_number'=>"Account Number",
        'bank_branch'=>'Bank Branch',
        'ipan'=>"IPAN",
        'swift_number'=>'Swift Number',
        'career'=>'Career',
        'description'=>'Description',
        'duration_of_contract'=>'Duration of Contract',
        'monthly_salary'=>'Monthly Salary',
        'daily_salary'=>'Daily Salary',
        'hourly_salary'=>'Hourly Salary',
        'insurance_value'=>'Insurance Value',
        'income_tax'=>'Income Tax',
        'retirement_benefits'=>'Retirement Benefits',
        'contract_expire'=>'Contract Expiration Date',
        'department_id'=>'Department',
        'branch_id'=>'Branch',
        'work_start'=>'Work Start Date',
        'last_name'=>'Last Name',
        'active'=>'STATUS',
        'address'=>'Address',
        'job_number'=>'Job Number',
    ],
    'values' => [
        'gender' => [
            'male'=>'Male',
            'female'=>'Female',
        ],

        'active' => [
            '0'=>'Inactive',
            '1'=>'Aactive',
        ],
        'status' => [
            '0'=>'Inactive',
            '1'=>'Aactive',
            'en'=>[
                'waiting' => 'Waiting',
                'approve' => 'Approve',
                'rejected' => 'Rejected',
                'amount'=>'Amount',
                'attention'=>'Attention',
                'vacation days'=>'Vacation Days',
                'Salary number of working days'=>'Salary number of working days',
                'late'=>'Late',
                'absence'=>'Absence',
                'vacation'=>'Vacation',
                'disciplined'=>'Disciplined',
                ''=>'',
            ]
        ],

        'type' => [
            'en'=>[
                'amount'=>'Amount',
                'days'=>'Salary for number of Days',
                'vacation'=>'Vacation days',
                ''=>'',
            ]
        ],
    ],
];
