<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function incomingIndex(){
        $documents = Document::all();
        $incomingCategory = Category::where('status', 'incoming')->get();
        $category = Category::all();
        $documentCount = [];

        foreach ($category as $category) {
            $count = Document::where('category_id', $category->id)->count();
            $documentCount[$category->id] = $count;
        }
        // dd($incomingCategory, $documentCount, $category);
        return view('incoming.index', compact('incomingCategory', 'documentCount', 'category', 'documents'));
    }

    public function outgoingIndex(){
        $documents = Document::all();
        $outgoingCategory = Category::where('status', 'outgoing')->get();
        $category = Category::all();
        $documentCount = [];

        foreach ($category as $category) {
            $count = Document::where('category_id', $category->id)->count();
            $documentCount[$category->id] = $count;
        }
        
        return view('outgoing.index', compact('outgoingCategory', 'documentCount', 'category', 'documents'));
    }

    public function addCategory(Request $request){
        $data = $request->all();
        Category::create($data);

        return redirect()->back()->with('success', 'Category Added Successfully');
    }

    public function updateCategory(Request $request){
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->save();

        return redirect()->back()->with('successUpdate', 'Record Updated Successfully');
    }

    // =================================================
    

    public function deleteCategory($id)
    {
        // Get the category ID from the request
        $id = $request->id;
    
        // Find the category by its ID
        $category = Category::find($id);
    
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }
    
        // Delete the category
        $category->delete();
    
        return redirect()->route('successUpdate')->with('success', 'Category deleted successfully.');
    }

    
    
    
    

}