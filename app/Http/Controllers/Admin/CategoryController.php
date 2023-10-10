<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Takshak\Imager\Facades\Imager;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $query = Category::query();
        $query->when($request->has('parent_id'), function ($query) use ($request) {
            $query->where('parent_id', $request->parent_id);
        }, function ($query) {
            $query->where('parent_id', 0);
        });

        $query->when($request->get('search'), function ($query)  use ($request) {
            $query->where('name', 'like', '%' . $request->get('search') . '%');
        });
        $categories = $query->withCount('children')
            ->paginate(25)
            ->withQueryString();

        return view('admin.categories.index')->with('categories', $categories);
    }

    public function create(Request $request)
    {
        $categories = Category::where('parent_id', 0)->get();
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
        $category->slug                      =  Str::slug($request->post('name'));
        $category->content                   =  $request->post('content');
        $category->meta_title                =  $request->post('meta_title');
        $category->meta_keyword              =  $request->post('meta_keyword');
        $category->meta_description          =  $request->post('meta_description');

        if ($request->file('image')) {
            $category->image = 'categories/' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            Imager::init($request->file('image'))
                ->resizeFit(1920, 1080)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($category->image);

            $category->image_thumb = 'categories/thumb-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            Imager::init($request->file('image'))
                ->resizeFit(600, 400)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($category->image_thumb);
        }

        $category->save();
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
        $category->slug                      =  Str::slug($request->post('name'));
        $category->content                   =  $request->post('content');
        $category->meta_title                =  $request->post('meta_title');
        $category->meta_keyword              =  $request->post('meta_keyword');
        $category->meta_description          =  $request->post('meta_description');


        if ($request->file('image')) {
            $image = public_path('storage/' . $category->image);
            if (File::exists($image)) {
                File::delete($image);
            }

            $category->image = 'categories/' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            Imager::init($request->file('image'))
                ->resizeFit(1920, 1080)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($category->image);

            $image_thumb = public_path('storage/' . $category->image_thumb);
            if (File::exists($image_thumb)) {
                File::delete($image_thumb);
            }

            $category->image_thumb = 'categories/thumb-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            Imager::init($request->file('image'))
                ->resizeFit(600, 400)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($category->image_thumb);
        }

        $category->save();
        return to_route('admin.categories.index')->withSuccess('SUCCESS !! Category is successfully updated');
    }


    public function destroy(Category $category)
    {
        $image_thumb = public_path('storage/' . $category->image_thumb);
        if (File::exists($image_thumb)) {
            File::delete($image_thumb);
        }
        $image = public_path('storage/' . $category->image);
        if (File::exists($image)) {
            File::delete($image);
        }
        $category->courses()->delete();
        $category->delete();
        return to_route('admin.categories.index')->withErrors('Category has been successfully deleted.');
    }

    public function statusToggle(Category $category)
    {
        $category->update(['status' => $category->status ? false : true]);
        return back()->withSuccess('Status successfully updated');
    }
}
