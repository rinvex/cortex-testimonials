<?php

declare(strict_types=1);

use Illuminate\Contracts\Auth\Access\Authorizable;

Broadcast::channel('rinvex.testimonials.testimonials.index', function (Authorizable $user) {
    return $user->can('list', app('rinvex.testimonials.testimonial'));
}, ['guards' => ['admin']]);
