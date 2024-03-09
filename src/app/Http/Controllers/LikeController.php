<?php

namespace App\Http\Controllers;

use App\Models\Item;

class LikeController extends Controller
{
    public function like(Item $item)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with(
                'flashWarning',
                'この機能を有効にするにはログインが必要です',
            );
        }
        auth()->user()->likes()->attach($item->id);
        return back();
    }

    public function nolike(Item $item)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with(
                'flashWarning',
                'この機能を有効にするにはログインが必要です',
            );
        }
        auth()->user()->likes()->detach($item->id);
        return back();
    }
}
