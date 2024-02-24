<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Takshak\Imager\Facades\Imager;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::query()
            ->when($request->has('parent_id'), function ($query) use ($request) {
                $query->where('parent_id', $request->parent_id);
            }, function ($query) {
                $query->where('parent_id', 0);
            })
            ->when($request->get('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->get('search') . '%');
            })
            ->withCount('children')
            ->paginate(25)
            ->withQueryString();

        return view('admin.categories.index')->with('categories', $categories);
    }

    public function create(Request $request)
    {
         $categories = Category::query()
            ->when($request->get('parent_id'), function ($query) {
                $query->where('id', request('parent_id'));
            })
            ->when(!$request->get('parent_id'), function ($query) {
                $query->where('parent_id', 0);
            })
            ->get();

        return view('admin.categories.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                =>  'required',
            'parent_id'           =>  'nullable',
            'content'             =>  'nullable',
            'status'              =>  'required',
            'image'               =>  'nullable|image',
            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);

        $category = new Category();
        $category->name                      =  $request->post('name');
        $category->parent_id                 =  $request->post('parent_id') ?? 0;
        $category->status                    =  $request->post('status');
        $category->slug                      =  str()->of($request->post('name'))->append(time());
        $category->content                   =  $request->post('content');
        $category->meta_title                =  $request->post('meta_title');
        $category->meta_keyword              =  $request->post('meta_keyword');
        $category->meta_description          =  $request->post('meta_description');

        if ($request->file('image')) {
            $category->image = 'categories/' . time() . '.' . $request->file('image')->extension();
            $category->image_thumb = 'categories/thumb-' . time() . '.' . $request->file('image')->extension();

            Imager::init($request->file('image'))
                ->resizeFit(600, 500)
                ->inCanvas('#fff')
                ->basePath(Storage::disk('public')->path('/'))
                ->save($category->image)
                ->save($category->image_thumb, 300);
        }

        $category->save();
        cache()->flush();
        return to_route('admin.categories.index')->withSuccess('SUCCESS !! New Category is successfully created');
    }


    public function show(Category $category)
    {
        $category->load('parent');
        return view('admin.categories.show')->with('category', $category);
    }

    public function edit(Category $category)
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('admin.categories.edit')->with('category', $category)->with('categories', $categories);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'                =>  'required',
            'parent_id'           =>  'nullable',
            'content'             =>  'nullable',
            'status'              =>  'required',
            'image'               =>  'nullable|image',
            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);

        $category->name                      =  $request->post('name');
        $category->parent_id                 =  $request->post('parent_id') ?? 0;
        $category->status                    =  $request->post('status');
        $category->content                   =  $request->post('content');
        $category->meta_title                =  $request->post('meta_title');
        $category->meta_keyword              =  $request->post('meta_keyword');
        $category->meta_description          =  $request->post('meta_description');


        if ($request->file('image')) {
            Storage::disk('public')->delete($category->image);
            Storage::disk('public')->delete($category->image_thumb);

            $category->image = 'categories/' . time() . '.' . $request->file('image')->extension();
            $category->image_thumb = 'categories/thumb-' . time() . '.' . $request->file('image')->extension();

            Imager::init($request->file('image'))
                ->resizeFit(600, 500)
                ->inCanvas('#fff')
                ->basePath(Storage::disk('public')->path('/'))
                ->save($category->image)
                ->save($category->image_thumb, 300);
        }

        $category->save();
        cache()->flush();
        return to_route('admin.categories.index')->withSuccess('SUCCESS !! Category is successfully updated');
    }


    public function destroy(Category $category)
    {
        if ($category->children->count()) {
            return back()->withErrors('SORRY !! Cannot delete parent category, please delete the subcategories first.');
        }
        if ($category->image) {
            Storage::disk('public')->delete([$category->image]);
        }
        if ($category->image_thumb) {
            Storage::disk('public')->delete($category->image_thumb);
        }
        $category->courses()->delete();
        $category->delete();
        cache()->flush();
        return back()->withErrors('Category has been successfully deleted.');
    }

    public function statusToggle(Category $category)
    {
        $category->update(['status' => $category->status ? false : true]);
        cache()->flush();
        return back()->withSuccess('Status successfully updated');
    }
}
