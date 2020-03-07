<?php
declare(strict_types=1);

namespace App\Domain\ConversionLog;

use App\Domain\DomainException\DomainRecordNotFoundException;

class ConversionLogNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The log entry you requested does not exist.';
}
