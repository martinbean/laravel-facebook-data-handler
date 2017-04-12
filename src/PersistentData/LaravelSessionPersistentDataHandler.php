<?php

namespace MartinBean\Facebook\PersistentData;

use Facebook\PersistentData\PersistentDataInterface;

class LaravelSessionPersistentDataHandler implements PersistentDataInterface
{
    /**
     * {@inheritdoc}
     */
    public function get($key)
    {
        return session()->get($key);
    }

    /**
     * {@inheritdoc}
     */
    public function set($key, $value)
    {
        return session()->put($key, $value);
    }
}
