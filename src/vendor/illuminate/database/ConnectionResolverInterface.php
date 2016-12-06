<?php

namespace Illuminate\Database;

interface ConnectionResolverInterface
{
    /**
     * Get a database connection instance.
     *
     * @param  string  $name
     * @return \Illuminate\Database\ConnectionInterface
     */
    public function connection($name = null);

    /**
     * Get the default connection date.
     *
     * @return string
     */
    public function getDefaultConnection();

    /**
     * Set the default connection date.
     *
     * @param  string  $name
     * @return void
     */
    public function setDefaultConnection($name);
}
