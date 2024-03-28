<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }

    // 検索機能
    public function search(Request $request)
    {
        $search = $request->input('search');
        $gender = $request->input('gender');
        $category = $request->input('category');
        $data = $request->input('data');

        $contacts = Contact::ContactSearch($search, $gender, $category, $data)
            ->Paginate(7);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    // 検索のリセット
    public function reset()
    {
        return redirect('admin');
    }

    // エクスポート
    // public function export()
    // {
    //     return response()->download($filePath);
    // }
}
