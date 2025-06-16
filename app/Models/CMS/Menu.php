<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['title', 'type', 'url', 'page_id', 'parent_id', 'sort_order'];

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('sort_order');
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function getFullUrlAttribute()
    {
        return match ($this->type) {
            'home' => '/',
            'blog' => '/blog',
            'page' => $this->page ? '/' . $this->page->slug : '#',
            'custom' => $this->url,
            default => '#',
        };
    }
}
