<?php

declare(strict_types=1);

namespace Cortex\Testimonials\DataTables\Adminarea;

use Cortex\Testimonials\Models\Testimonial;
use Cortex\Foundation\DataTables\AbstractDataTable;
use Cortex\Testimonials\Transformers\TestimonialTransformer;

class TestimonialsDataTable extends AbstractDataTable
{
    /**
     * {@inheritdoc}
     */
    protected $model = Testimonial::class;

    /**
     * {@inheritdoc}
     */
    protected $transformer = TestimonialTransformer::class;

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        $link = config('cortex.foundation.route.locale_prefix')
            ? '"<a href=\""+routes.route(\'adminarea.cortex.testimonials.testimonials.edit\', {testimonial: full.id, locale: \''.$this->request()->segment(1).'\'})+"\">"+data+"</a>"'
            : '"<a href=\""+routes.route(\'adminarea.cortex.testimonials.testimonials.edit\', {testimonial: full.id})+"\">"+data+"</a>"';

        return [
            'id' => ['checkboxes' => '{"selectRow": true}', 'exportable' => false, 'printable' => false],
            'body' => ['title' => trans('cortex/testimonials::common.body'), 'render' => $link.'+(full.is_approved ? " <i class=\"text-success fa fa-check\"></i>" : " <i class=\"text-danger fa fa-close\"></i>")', 'responsivePriority' => 0],
            'created_at' => ['title' => trans('cortex/testimonials::common.created_at'), 'render' => "moment(data).format('YYYY-MM-DD, hh:mm:ss A')"],
            'updated_at' => ['title' => trans('cortex/testimonials::common.updated_at'), 'render' => "moment(data).format('YYYY-MM-DD, hh:mm:ss A')"],
        ];
    }
}
