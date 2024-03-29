<?php

namespace Zevitagem\LaravelSaasTemplateCore\Exceptions;

use Zevitagem\LaravelSaasTemplateCore\Helpers\Helper;

class CrudException extends \Exception
{
    public function __construct(
        string $message = "", int $code = 0, \Throwable $previous = null
    )
    {
        $message = Helper::view(
            'components.validator-messages', ['messages' => [$message]], true
        )->render();

        parent::__construct($message, $code, $previous);
    }
}