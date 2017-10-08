<?php

namespace Services\Facades\Request;

use \Exception\ConflictingHeadersException;

class BaseRequest extends ConflictingHeadersException
{

}