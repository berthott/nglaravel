<?php

namespace berthott\NgLaravel\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class NgBuildServiceException extends Exception
{
  protected $message = 'There was a problem with NgBuilderService. Please run `npm start` or `npm run build` first.';
}