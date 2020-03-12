<?php

namespace App\Schemas\Policies;

use Apitizer\Policies\Policy;

class Authenticated implements Policy
{
    public function passes($value, $row, $fieldOrAssociation): bool
    {
        return !!$fieldOrAssociation->getSchema()->getRequest()->user();
    }
}
