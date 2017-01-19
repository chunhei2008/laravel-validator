<?php
namespace Chunhei2008\Validator\Scenario;

use Validator;

/**
 * AbstractValidator.php
 *
 * Author: wangyi <chunhei2008@qq.com>
 *
 * Date:   2017/1/19 14:45
 * Copyright: (C) 2014, Guangzhou YIDEJIA Network Technology Co., Ltd.
 */
class AbstractValidator
{
    /**
     * rules
     * @var array
     */
    protected $rules = [];
    /**
     * messages
     * @var array
     */
    protected $messages = [];
    /**
     * attributes
     * @var array
     */
    protected $attributes = [];

    /**
     * get rules by scenario
     *
     * @param $scenario
     *
     * @return array
     */

    public function rules($scenario)
    {
        return $this->rules[$scenario] ?: [];
    }

    /**
     * get messages
     * @return array
     */
    public function messages()
    {
        return $this->messages;
    }

    /**
     * get attributes
     * @return array
     */
    public function attributes()
    {
        return $this->attributes;
    }

    /**
     * validate by $scenario
     *
     * @param      $scenario
     * @param null $data
     *
     */
    static public function validate($scenario, $data = null)
    {
        self::scenario($scenario, $data)->validate();
    }

    /**
     * create validator by $scenario
     *
     * @param      $scenario
     * @param null $data
     *
     * @return \Illuminate\Validation\Validator
     */

    static public function scenario($scenario, $data = null)
    {
        if ($data === null) {
            $data = app('request')->all();
        }

        $instance = new static();
        return Validator::make(
            $data,
            $instance->rules($scenario),
            $instance->messages(),
            $instance->attributes()
        );
    }

}