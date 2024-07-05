<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function form()
    {
        return view('form');
    }

    public function store_data(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'skill' => 'required|array|min:1',
            'gender' => 'required|in:Male,Female',
            'country' => 'required|string',
        ]);

        $data = new Form();

        $data->name = $request->input('name');
        $data->gender = $request->input('gender');
        $data->country = $request->input('country');

        // Save CheckBox
        $checkbox_data = $request->input('skill');
        $data->skill = implode(',', $checkbox_data);

        // Save image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $image_name = time() . "." . $ext;
            $image->move('storage/images', $image_name);
            $data->image = $image_name;
        }

        // Save the data
        $data->save();

        return redirect()->back()->with('success', 'Data stored successfully!');
    }

    public function show()
    {
        
        $data = Form::all();
        return view('show', compact('data'));
    }

    public function delete($id)
    {
        $form = Form::find($id);
        if (!$form) {
            return redirect()->back()->with('error', 'Form not found');
        }

        // Soft delete the record
        $form->delete();

        return redirect()->back()->with('success', 'Form deleted successfully');
    }
        // Form::destroy($id);
        // return redirect()->back();
    

    public function edit($id)
    {
        
        $data = Form::find($id);
        return view('edit_form', compact('data'));
    }

    public function update_data(Request $request, $id)
    {
     
        $data = Form::find($id);

        // Update fields with new values
        $data->name = $request->input('name');
        $data->gender = $request->input('gender');
        $data->country = $request->input('country');

        // Save CheckBox
        $checkbox_data = $request->input('skill');
        $data->skill = implode(',', $checkbox_data);

        // Save image if a new one is uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $image_name = time() . "." . $ext;
            $image->move('storage/images', $image_name);
            $data->image = $image_name;
        }

        $data->save();

    
        return redirect('/show');
    }
}

?>
