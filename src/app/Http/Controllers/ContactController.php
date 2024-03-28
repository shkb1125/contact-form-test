<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $content = $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'detail']);
        // 電話番号の結合
        $tell = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');
        $content['tell'] = $tell;
        if ($request->has('content')) {
            $content['category'] = Category::find($request->input('content'))->content;
            $content['category_id'] = $request->input('content');
        }
        $categories = Category::all();
        return view('confirm', compact('content', 'categories'));

    }

    public function store(Request $request)
    {
        $contact = $request->only(['category_id', 'first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }
}
