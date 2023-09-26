<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Document;
use App\Models\Category;

class DocumentController extends Controller
{
    public function display(Request $request){
        $allCategories = Category::all();
        $category_id = $request->id;
        $category = Category::find($category_id);
        $documents = Document::where('category_id', $category_id)->get();

        return view('incoming.documents.index', compact('category', 'documents', 'allCategories'));
    }

    public function view($id){
        $document = Document::findOrFail($id);

        return view('incoming.documents.viewDocument', compact('document'));
    }

    public function create(Request $request){
        $data = $request->all(); 
        $userId = auth()->users()->id;

        if($request->hasFile('image')){
            $category = Category::findOrFail($data['category_id']);
            $imageName = $category->name.' '.date('m-d-y').' '.date('His').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('images/documents'), $imageName);
            $imagePath = '/images/documents/' . $imageName;
            $data['image'] = $imagePath;
        }

        $data['user_id'] = $userId;
        Document::create($data);

        return redirect()->back()->with('successAdd', 'File Added Successfully');
    }

    public function update(Request $request){
        $document = Document::find($request->id);
        $data = $request->all();
        $date = $request->input('date') ?? $document->date;
        $dateReceived = $request->input('date_received') ?? $document->date_received;
        $imagePath = public_path($document->image);
        
        if($request->hasFile('image')){
            if (File::exists($imagePath)) {
                // Delete the image from the file system
                File::delete($imagePath);
            }
            $category = Category::findOrFail($data['category_id']);
            $imageName = $category->name.' '.date('m-d-y').' '.date('His').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('images/documents'), $imageName);
            $imagePath = '/images/documents/' . $imageName;

            Document::where('id', $request->input('id'))->update([
                'title' => $request->input('title'),
                'to' => $request->input('to'),
                'thru' => $request->input('thru'),
                'from' => $request->input('from'),
                'subject' => $request->input('subject'),
                'date' => $date,
                'date_received' => $dateReceived,
                'remarks' => $request->input('remarks'),
                'image' => $imagePath,
            ]);
        }
        else{
            Document::where('id', $request->input('id'))->update([
                'title' => $request->input('title'),
                'to' => $request->input('to'),
                'thru' => $request->input('thru'),
                'from' => $request->input('from'),
                'subject' => $request->input('subject'),
                'date' => $date,
                'date_received' => $dateReceived,
                'remarks' => $request->input('remarks'),
            ]);
        }
        return redirect()->back()->with('successUpdate', 'Record updated successfully');
    }

    public function delete($id){
        $document = Document::findOrFail($id); //retrieves the record from the database with the specified ID using the findOrFail() method of the AdministrativeOrder model. If the record with the given ID does not exist in the database, an exception will be thrown
        $imagePath = public_path($document->image);
        if (File::exists($imagePath)) {
            // Delete the image from the file system
            File::delete($imagePath);
        }
    
        $document->delete(); //deletes the retrieved record from the database by calling the delete() method on the $adminOrder object

        return redirect()->back()->with('successDelete', 'File Deleted Successfully');
    }

    // DISPLAY OUTGOING TABLE
    public function displayOutgoing(Request $request){
        $allCategories = Category::all();
        $category_id = $request->id;
        $category = Category::find($category_id);
        $documents = Document::where('category_id', $category_id)->get();

        return view('outgoing.documents.index', compact('category', 'documents', 'allCategories'));
    }
    // VIEW OUTGOING DOCUMENT
    public function viewOutgoing($id){
        $document = Document::findOrFail($id);

        return view('outgoing.documents.viewDocument', compact('document'));
    }
}
