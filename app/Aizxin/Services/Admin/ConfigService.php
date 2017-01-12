<?php
namespace Aizxin\Services\Admin;

use Aizxin\Services\CommonService;
use Aizxin\Repositories\Eloquent\Admin\ConfigRepository;
use Aizxin\Validators\ConfigValidator;

use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;

class ConfigService extends CommonService
{
    /**
     * @var ConfigRepository
     */
    protected $repository;
    /**
     * @var ConfigValidator
     */
    protected $validator;
    /**
     *  [__construct description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T10:33:33+0800
     *  @param    ConfigRepository           $repository [description]
     *  @param    ConfigValidator            $validator  [description]
     */
    public function __construct(ConfigRepository $repository, ConfigValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
}