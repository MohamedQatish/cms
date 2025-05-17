<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\UploadFileTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    use UploadFileTrait;
    public function index()
    {
        $story = Story::all();

        return view(
            'admin.settings.stories',
            [
                'stories' => $story,
                'catName' => 'dashboard',
                'title' => 'Bootstrap Tables',
                "breadcrumbs" => ["Tables", "Bootstrap"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    }

    public function create()
    {
        return view(
            'admin.settings.storiesCreate',
            [
                'catName' => 'dashboard',
                'title' => 'Bootstrap Tables',
                "breadcrumbs" => ["Tables", "Bootstrap"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:1000',
            'spec' => 'required|string|max:1000',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'spec', 'content']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('stories', 'public');
            $data['image'] = $path;
        }

        Story::create($data);

        return redirect()->route('admin.stories.index')
            ->with('success', 'تم إضافة الرأي بنجاح');
    }
    public function edit($id)
    {
        $story = Story::findOrFail($id);
        return view(
            'admin.settings.storiesEdit',
            [
                'story' => $story,
                'catName' => 'dashboard',
                'title' => 'Bootstrap Tables',
                "breadcrumbs" => ["Tables", "Bootstrap"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:1000',
            'spec' => 'required|string|max:1000',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $story = Story::findOrFail($id);
        $data = $request->only(['name', 'spec', 'content']);

        if ($request->hasFile('image')) {
            if ($story->image) {
                Storage::disk('public')->delete($story->image);
            }

            $path = $request->file('image')->store('stories', 'public');
            $data['image'] = $path;
        }

        $story->update($data);

        return redirect()->route('admin.stories.index')
            ->with('success', 'تم تحديث الرأي بنجاح');
    }



    public function destroy($id)
    {
        $story = Story::findOrFail($id);

        if ($story->image) {
            Storage::delete('stories/' . $story->image);
        }

        $story->delete();

        return redirect()->route('admin.stories.index')
            ->with('success', ' تم حذف الرأي بنجاح');
    }
}
