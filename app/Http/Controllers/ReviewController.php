<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\UserProfile;
use App\Models\ServiceListing;

class ReviewController extends Controller
{
    // List all reviews
    public function index()
    {
        $reviews = Review::with(['userProfile', 'serviceListing'])->get();
        return view('reviews.index', compact('reviews'));
    }

    // Show a specific review
    public function show($id)
    {
        $review = Review::with(['userProfile', 'serviceListing'])->findOrFail($id);
        return view('reviews.show', compact('review'));
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('reviews.edit', compact('review'));
    }

    public function create()
    {
        $users = UserProfile::all();
        $services = ServiceListing::all();
        return view('reviews.create', compact('users', 'services'));
    }

    // Store a new review
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:user_profiles,id',
            'service_id' => 'required|exists:services_listing,id',
            'ratings' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
        ]);

        $review = Review::create($validated);
        return response()->json($review, 201);
    }

    // Update an existing review
    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $validated = $request->validate([
            'ratings' => 'sometimes|integer|min:1|max:5',
            'review' => 'sometimes|string',
        ]);

        $review->update($validated);
        return response()->json($review);
    }

    // Delete a review
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return response()->json(['message' => 'Review deleted successfully']);
    }
}
