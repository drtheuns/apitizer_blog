<?php

namespace App\QueryBuilders\Policies;

use Apitizer\Policies\Policy;

class Authenticated implements Policy
{
    public function passes($value, $row, $fieldOrAssociation): bool
    {
        return !!$fieldOrAssociation->getQueryBuilder()->getRequest()->user();
    }
}
