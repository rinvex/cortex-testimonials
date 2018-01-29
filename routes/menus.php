<?php

declare(strict_types=1);

use Rinvex\Menus\Models\MenuItem;
use Rinvex\Menus\Models\MenuGenerator;

Menu::register('adminarea.sidebar', function (MenuGenerator $menu) {
    $menu->findByTitleOrAdd(trans('cortex/foundation::common.crm'), 50, 'fa fa-briefcase', [], function (MenuItem $dropdown) {
        $dropdown->route(['adminarea.testimonials.index'], trans('cortex/testimonials::common.testimonials'), 10, 'fa fa-quote-right')->ifCan('list-testimonials')->activateOnRoute('adminarea.testimonials');
    });
});

Menu::register('managerarea.sidebar', function (MenuGenerator $menu) {
    $menu->findByTitleOrAdd(trans('cortex/foundation::common.crm'), 50, 'fa fa-briefcase', [], function (MenuItem $dropdown) {
        $dropdown->route(['managerarea.testimonials.index'], trans('cortex/testimonials::common.testimonials'), 10, 'fa fa-quote-right')->ifCan('list-testimonials')->activateOnRoute('managerarea.testimonials');
    });
});
