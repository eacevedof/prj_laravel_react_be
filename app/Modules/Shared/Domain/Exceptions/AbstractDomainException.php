<?php

declare(strict_types=1);

namespace App\Modules\Shared\Domain\Exceptions;

use Exception;
use Throwable;

abstract class AbstractDomainException extends Exception implements Throwable
{
}
