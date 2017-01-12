<?php
namespace Aizxin\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class CategoryValidator extends LaravelValidator {

   /**
    *  [$rules 角色规则]
    *  @var [type]
    */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => ['required','unique:categories'],
            'sort' => ['required'],
            'status' => ['required'],
            'engineName'=>['required'],
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => ['required'],
            'sort' => ['required'],
            'status' => ['required'],
            'engineName'=>['required'],
        ],
    ];
    /**
     *  [$messages 角色错误信息]
     *  @var [type]
     */
    protected $messages = [
        'name.required' => '分类必填项',
        'name.unique' => '分类已经存在',
        'sort.required' => '排序必填项',
        'status.required' => '状态必选项',
        'engineName.required' =>'分类英文名必填项',
	];
}