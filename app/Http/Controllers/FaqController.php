<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // List FAQs
    public function index()
    {
        $faqs = Faq::all();
        return view('faqs.index', compact('faqs'));
    }

    // Show the form for creating a new FAQ
    public function create()
    {
        return view('faqs.create');
    }

    // Store a new FAQ
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ created successfully.');
    }

    // Show the form for editing an FAQ
    public function edit(Faq $faq)
    {
        return view('faqs.edit', compact('faq'));
    }

    // Update an FAQ
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq->update($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully.');
    }

    // Delete an FAQ
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
