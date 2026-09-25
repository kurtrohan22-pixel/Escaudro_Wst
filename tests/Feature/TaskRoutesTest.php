<?php

namespace Tests\Feature;

use Tests\TestCase;

class TaskRoutesTest extends TestCase
{
    public function test_create_task_page_loads()
    {
        $response = $this->get(route('tasks.create'));

        $response->assertOk();
    }
}
