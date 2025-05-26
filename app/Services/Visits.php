<?php

namespace App\Services;

use App\Models\Visit;

class Visits
{
    protected $query;
    protected $method = 'GET';

    public function __construct()
    {
        $this->query = Visit::query()
            ->where('method', $this->method);
    }

    public function url($url)
    {
        $this->query->where('url', $url);
        return $this;
    }

    public function page($url) {
        return $this->url($url);
    }

    public function ip($ip)
    {
        $this->query->where('ip', $ip);
        return $this;
    }

    public function methods(array $methods = [])
    {
        $this->query->whereIn('method', $methods);
        return $this;
    }

    public function visiters()
    {
        $this->query->distinct();
        return $this;
    }

    public function count()
    {
        return $this->query->count('ip');
    }
}
