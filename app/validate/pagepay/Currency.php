<?php

namespace app\validate\pagepay;

use think\Validate;

class Currency extends Validate
{
    protected $rule = [
        'payOrderId'       =>  'number|max:20',
    ];

    public function scenePay()
    {
        return $this->only(['payOrderId'])
            ->append('payOrderId', 'require');
    }
}
