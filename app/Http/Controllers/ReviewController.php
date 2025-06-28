<?php

namespace App\Http\Controllers;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'point' => 'required|integer|min:1|max:5',
            'commment' => 'required|string',
        ]);
        $review = new Review();
        $review->user_id = auth()->user()->id;
        $review->product_id = $request->product_id;
        $review->point = $request->point;
        $revieww->comment = $request->comment;
        $review->save();

        toast('terima kasih atas ulasan anda!','succses');
        return back();
    }
}
