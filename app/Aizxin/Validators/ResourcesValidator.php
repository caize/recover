<?php
namespace Aizxin\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class ResourcesValidator extends LaravelValidator {

   /**
    *  [$rules 资源规则]
    *  @var [type]
    */
    protected $rules = [
        'type' => ['required'],
        'identity'=>['required'],
        'contact_name'=>['required'],
        'contact_phone'=>['required'],
        'address'=>['required'],
        'name'=>['required'],
        'rc1_id'=>['required'],
        'unit'=>['required'],
        'start_time'=>['required'],
        'end_time'=>['required'],
        'number'=>['required'],
        // 'imgs'=>['required'],
        'content'=>['required'],
    ];
    /**
     *  [$messages 资源错误信息]
     *  @var [type]
     */
    protected $messages = [
        "type.required"=>'服务类型没有选择',
        "identity.required"=>'身份类型没有选择',
        "rc1_id.required"=>'分类没有选择',
        "name.required"=>'资源名称不能为空',
        "contact_name.required"=>'联系人不能为空',
        "contact_phone.required"=>'联系电话不能为空',
        "address.required"=>'联系地址不能为空',
        "number.required"=>'资源数量不能为空',
        "unit.required"=>'资源数量单位不能为空',
        "imgs.required"=>'资源图片没有上传',
        "content.required"=>'资源内容不能为空',
        "start_time.required"=>'资源开始时间没有选择',
        "end_time.required"=>'资源结束时间没有选择'

	];
}