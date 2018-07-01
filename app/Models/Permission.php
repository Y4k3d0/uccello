<?php

namespace Uccello\Core\Models;

use Uccello\Core\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permissions';

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function capability()
    {
        return $this->belongsTo(Capability::class);
    }
}
