<?php

namespace App\Models;

use LaravelArdent\Ardent\Ardent;

class File extends Ardent
{
    public static $relationsData = array(
        'document' => array(self::BELONGS_TO, 'Document'),
    );

    protected $table = 'files';

    /**
     * Возвращает документ, к которому привязан
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Document
     */
    public function document()
    {
        return $this->belongsTo('App\Models\Document');
    }
}
