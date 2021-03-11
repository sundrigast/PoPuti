<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Review;

class ReviewObserver
{
    /**
     * Handle the review "created" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function created(Review $review)
    {
        $user = User::find($review->to_id);
        $count = Review::with('addressee')->where('to_id', $user->id)->count();

        if (($count >= 15) && ( $count < 40))
        {
            $reviews = Review::with('addressee')
                ->where('to_id', $user->id)
                    ->sum('rating');
            $user->rating = round($reviews / $count, 2);
            $user->save();
        } elseif ($count >= 40)
        {
            $reviews = Review::with('addressee')
                ->where('to_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->take(40)->get();
            $reviews = $reviews->sum('rating');
            $user->rating = round($reviews / 40, 2);
            $user->save();
        }
    }
}
