<?php
namespace Aizxin\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class ResourcesCategoryValidator extends LaravelValidator {

   /**
    *  [$rules 角色规则]
    *  @var [type]
    */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => ['required','unique:resources_categories'],
            'thumb' => ['required'],
            'parent_id'=>['required'],
            'type'=>['required'],
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => ['required'],
            'thumb' => ['required'],
            'parent_id'=>['required'],
            'type'=>['required'],
        ],
    ];
    /**
     *  [$messages 角色错误信息]
     *  @var [type]
     */
    protected $messages = [
        'name.required' => '分类名必填项',
        'name.unique' => '分类名已经存在',
        'thumb.required' => '分类背景图必上传',
        'parent_id.required' => '顶级分类必选项',
        'type.required' => '服务类型必选项',
	];
}