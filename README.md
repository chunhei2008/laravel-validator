# laravel-validator

# how to use

## define a validator

```

<?php
/**
 * LoginValidator.php
 *
 * Author: wangyi <chunhei2008@qq.com>
 *
 * Date:   2017/1/19 23:35
 * Copyright: (C) 2014, Guangzhou YIDEJIA Network Technology Co., Ltd.
 */

namespace App\Validators;


use Chunhei2008\Validator\Scenario\AbstractValidator;

class LoginValidator extends AbstractValidator
{

    protected $rules = [
        'login' => [
            'name' => 'required',
        ],
    ];

    protected $messages = [

    ];

    protected $attributes = [
        'name' => '姓名111111',
    ];

}
```

## use validator in scenario
```
    public function index(Request $request)
    {
        $validate = LoginValidator::scenario('login', [
            'name' => 'baicai',

        ]);

        if ($validate->fails()) {
            throw new ValidationException($validate);
        }
        return 'success';
    }

    public function index2(Request $request)
    {
        LoginValidator::validate('login', [
            'name' => 'wangyi',
        ]);

        return 'success';
    }

    public function index3()
    {

        LoginValidator::validate('login');

        return 'success';
    }

    public function index4()
    {
        $validate = LoginValidator::scenario('login');

        if ($validate->fails()) {
            throw new ValidationException($validate);
        }
        return 'success';
    }


```