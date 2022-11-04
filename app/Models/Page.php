<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kalnoy\Nestedset\NodeTrait;
use Laracasts\Presenter\PresentableTrait;

class Page extends Model
{
    use HasFactory;

    Use NodeTrait;
    use PresentableTrait;

    protected $presenter = 'App\Presenters\PagePresenter';

    // Asa
    protected $fillable = [
        'title',
        'url',
        'content'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function updateOrder($order, $orderPage) {
        $relative = Page::findOrFail($orderPage);

        if($order = 'before') {
            $this->beforeNode($relative)->save();
        } else if($order = 'after') {
            $this->afterNode($relative)->save();
        } else {
            $relative->appendNode($this);
        }

        Page::fixTree();
    }

}
