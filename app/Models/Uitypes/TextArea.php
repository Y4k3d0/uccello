<?php

namespace Uccello\Core\Models\Uitypes;

use Uccello\Core\Contracts\Field\Uitype;

class Textarea extends Text implements Uitype
{
    /**
     * Returns field type used by Form builder.
     *
     * @return string
     */
    public function getFormType(): string
    {
        return 'textarea';
    }
}