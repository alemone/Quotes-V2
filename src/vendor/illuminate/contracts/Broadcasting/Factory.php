<?php

namespace Illuminate\Contracts\Broadcasting;

interface Factory
{
    /**
     * Get a broadcaster implementation by date.
     *
     * @param  string  $name
     * @return void
     */
    public function connection($name = null);
}
