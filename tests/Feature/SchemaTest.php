<?php

namespace Tests\Feature;

use Apitizer\Support\SchemaValidator;
use Tests\TestCase;

class SchemaTest extends TestCase
{
    /** @test */
    public function it_has_a_valid_schema()
    {
        $validator = (new SchemaValidator)->validateAll();

        $this->assertFalse(
            $validator->hasErrors(),
            'Run ./artisan apitizer:validate-schema to see the errors'
        );
    }
}
