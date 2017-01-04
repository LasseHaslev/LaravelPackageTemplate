<?php

namespace %namespace%\Categories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Image
 * @author Lasse S. Haslev
 */
class %Model% extends Model {

    use SoftDeletes;

    protected $table = '%instance_plural%';

    protected $fillable = [
        'name',
        'description',
    ];

}
