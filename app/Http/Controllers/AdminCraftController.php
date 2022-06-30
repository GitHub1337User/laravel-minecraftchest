<?php

namespace App\Http\Controllers;

use App\Models\Craft;
use App\Models\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCraftController extends Controller
{
    //
    public function index()
    {
        $crafts = Craft::all()->sortByDesc('created_at');
        return view('pages.admin.allCrafts', compact('crafts'));
    }

    public function deleteCraft($id)
    {
        $craft = Craft::find($id);
        if ($craft) {
            Storage::delete($craft->preview);
            $craft->delete();
        }
        return back()->with('message', 'Удалено');
    }

    public function addCraft()
    {
        $versions = Version::all();
        return view('pages.admin.add-craft',compact('versions'));

    }
    public function editCraft(Request $request,$craft_id){
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'version_id' => ['required'],
        ]);
            $current = Craft::find($craft_id);
        if($request->hasFile('preview')){
            $path = $request->file('preview')->store('images');
            Storage::delete($current->preview);
        }
        else{
            $path = $current->preview;
        }
        $updatedCraft = Craft::where('id',$craft_id)->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'version_id' => $request['version_id'],
            'preview' => $path,
        ]);
        return back()->with('message', 'Крафт обновлен');
    }
    public function toEditCraft($craft_id){
        $craft = Craft::find($craft_id);
        $versions = Version::all();
        return view('pages.admin.edit-craft',compact('craft','versions'));
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'version_id' => ['required'],
            'preview' => ['required'],
        ]);

        $path = $request->file('preview')->store('images');
        $newCraft = Craft::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'version_id' => $request['version_id'],
            'preview' => $path,
        ]);
        return back()->with('message', 'Крафт добавлен');
    }
}
