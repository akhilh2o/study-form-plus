<?php

namespace App\Http\Controllers\Admin\Ebook;

use App\Http\Controllers\Controller;
use App\Models\Ebook\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Takshak\Imager\Facades\Imager;

class CategoryController extends Controller
{
    // for the ebooks
    public function ebooks(Request $request)
    {
        $categories = Category::query()
            ->where('is_ebook', true)
            ->when($request->has('parent_id'), function ($query) use ($request) {
                $query->where('parent_id', $request->parent_id);
            })
            ->when($request->get('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->get('search') . '%');
            })
            ->paginate(25)
            ->withQueryString();

        return view('admin.ebooks.index')->with('categories', $categories);
    }

    public function ebookCreate()
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('admin.ebooks.create')->with('categories', $categories);
    }

    public function ebookStore(Request $request)
    {
        $request->validate([
            'name'                =>  'required',
            'parent_id'           =>  'required',
            'professor'           =>  'required',
            'short_content'       =>  'nullable',
            'content'             =>  'nullable',
            'status'              =>  'required',
            'image'               =>  'nullable|image',
            'download_file'       =>  'required|file',
            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);

        $category = new Category();
        $category->name                      =  $request->post('name');
        $category->professor                 =  $request->post('professor');
        $category->parent_id                 =  $request->post('parent_id') ?? 0;
        $category->is_ebook                  =  true;
        $category->status                    =  $request->post('status');
        $category->slug                      =  Str::slug($request->post('name'));
        $category->short_content             =  $request->post('short_content');
        $category->content                   =  $request->post('content');
        $category->meta_title                =  $request->post('meta_title');
        $category->meta_keyword              =  $request->post('meta_keyword');
        $category->meta_description          =  $request->post('meta_description');

        if ($request->file('image')) {
            $category->image = 'ebook-categories/' . time() . '.' . $request->file('image')->extension();
            $category->image_thumb = 'ebook-categories/thumb-' . time() . '.' . $request->file('image')->extension();

            Imager::init($request->file('image'))
                ->resizeFit(600, 500)
                ->inCanvas('#fff')
                ->basePath(Storage::disk('public')->path('/'))
                ->save($category->image)
                ->save($category->image_thumb, 300);
        }

        if ($request->file('download_file')) {
            $category->download_file = 'ebook-categories/pdf-' . time() . '.' . $request->file('download_file')->extension();
            $request->download_file->storeAs('public', $category->download_file);
        }

        $category->save();
        return to_route('admin.ebooks.index')->withSuccess('SUCCESS !! New E-Book is successfully created');
    }

    public function ebookEdit(Category $category)
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('admin.ebooks.edit')
            ->with('category', $category)
            ->with('categories', $categories);
    }

    public function ebookShow(Category $category)
    {
        $category->load('parent');
        return view('admin.ebooks.show')->with('category', $category);
    }

    public function ebookUpdate(Request $request, Category $category)
    {
        $request->validate([
            'name'                =>  'required',
            'parent_id'           =>  'required',
            'professor'           =>  'required',
            'short_content'       =>  'nullable',
            'content'             =>  'nullable',
            'status'              =>  'required',
            'image'               =>  'nullable|image',
            'download_file'       =>  'nullable|file',
            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);

        if ($request->post('parent_id')) {
            $category->parent_id             =  $request->post('parent_id');
        }

        $category->name                      =  $request->post('name');
        $category->professor                 =  $request->post('professor');
        $category->status                    =  $request->post('status');
        $category->slug                      =  Str::slug($request->post('name'));
        $category->short_content             =  $request->post('short_content');
        $category->content                   =  $request->post('content');
        $category->meta_title                =  $request->post('meta_title');
        $category->meta_keyword              =  $request->post('meta_keyword');
        $category->meta_description          =  $request->post('meta_description');


        if ($request->file('image')) {
            Storage::disk('public')->delete($category->image);
            Storage::disk('public')->delete($category->image_thumb);

            $category->image = 'ebook-categories/' . time() . '.' . $request->file('image')->extension();
            $category->image_thumb = 'ebook-categories/thumb-' . time() . '.' . $request->file('image')->extension();

            Imager::init($request->file('image'))
                ->resizeFit(600, 500)
                ->inCanvas('#fff')
                ->basePath(Storage::disk('public')->path('/'))
                ->save($category->image)
                ->save($category->image_thumb, 300);
        }

        if ($request->file('download_file')) {
            Storage::disk('public')->delete($category->download_file);
            $category->download_file = 'ebook-categories/pdf-' . time() . '.' . $request->file('download_file')->extension();
            $request->download_file->storeAs('public', $category->download_file);
        }

        $category->save();
        return to_route('admin.ebooks.index')->withSuccess('SUCCESS !! E-Book is successfully updated');
    }

    public function ebookDestroy(Category $category)
    {
        if ($category->image)
            Storage::disk('public')->delete($category->image);
        if ($category->image_thumb)
            Storage::disk('public')->delete($category->image_thumb);
        if ($category->download_file)
            Storage::disk('public')->delete($category->download_file);
        $category->delete();
        return to_route('admin.ebooks.index')->withErrors('E-book has been successfully deleted.');
    }

    // for the categories

    public function index(Request $request)
    {
        $categories = Category::query()
            ->where('is_ebook', false)
            ->when($request->has('parent_id'), function ($query) use ($request) {
                $query->where('parent_id', $request->parent_id);
            }, function ($query) {
                $query->where('parent_id', 0);
            })
            ->when($request->get('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->get('search') . '%');
            })
            ->withCount('childrenCategory')
            ->paginate(25)
            ->withQueryString();

        return view('admin.ebooks.categories.index')->with('categories', $categories);
    }

    public function create()
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('admin.ebooks.categories.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                =>  'required',
            'parent_id'           =>  'nullable',
            'professor'           =>  'nullable',
            'short_content'       =>  'nullable',
            'content'             =>  'nullable',
            'status'              =>  'required',
            'image'               =>  'nullable|image',
            'download_file'       =>  'nullable|file',
            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);

        $category = new Category();
        $category->name                      =  $request->post('name');
        $category->professor                 =  $request->post('professor');
        $category->parent_id                 =  $request->post('parent_id') ?? 0;
        $category->status                    =  $request->post('status');
        $category->slug                      =  Str::slug($request->post('name'));
        $category->short_content             =  $request->post('short_content');
        $category->content                   =  $request->post('content', '');
        $category->meta_title                =  $request->post('meta_title');
        $category->meta_keyword              =  $request->post('meta_keyword');
        $category->meta_description          =  $request->post('meta_description');

        if ($request->file('image')) {
            $category->image = 'ebook-categories/' . time() . '.' . $request->file('image')->extension();
            $category->image_thumb = 'ebook-categories/thumb-' . time() . '.' . $request->file('image')->extension();

            Imager::init($request->file('image'))
                ->resizeFit(600, 500)
                ->inCanvas('#fff')
                ->basePath(Storage::disk('public')->path('/'))
                ->save($category->image)
                ->save($category->image_thumb, 300);
        }

        if ($request->file('download_file')) {
            $category->download_file = 'ebook-categories/pdf-' . time() . '.' . $request->file('download_file')->extension();
            $request->download_file->storeAs('public', $category->download_file);
        }

        $category->save();
        return to_route('admin.ebooks.categories.index')->withSuccess('SUCCESS !! New Category is successfully created');
    }

    public function show(Category $category)
    {
        $category->load('parent');
        return view('admin.ebooks.categories.show')->with('category', $category);
    }

    public function edit(Category $category)
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('admin.ebooks.categories.edit')
            ->with('category', $category)
            ->with('categories', $categories);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'                =>  'required',
            'parent_id'           =>  'nullable',
            'professor'           =>  'nullable',
            'short_content'       =>  'nullable',
            'content'             =>  'nullable',
            'status'              =>  'required',
            'image'               =>  'nullable|image',
            'download_file'       =>  'nullable|file',
            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);
        if ($request->post('parent_id')) {
            $category->parent_id             =  $request->post('parent_id');
        }

        $category->name                      =  $request->post('name');
        $category->professor                 =  $request->post('professor');
        $category->status                    =  $request->post('status');
        $category->slug                      =  Str::slug($request->post('name'));
        $category->short_content             =  $request->post('short_content');
        $category->content                   =  $request->post('content');
        $category->meta_title                =  $request->post('meta_title');
        $category->meta_keyword              =  $request->post('meta_keyword');
        $category->meta_description          =  $request->post('meta_description');


        if ($request->file('image')) {
            Storage::disk('public')->delete($category->image);
            Storage::disk('public')->delete($category->image_thumb);

            $category->image = 'ebook-categories/' . time() . '.' . $request->file('image')->extension();
            $category->image_thumb = 'ebook-categories/thumb-' . time() . '.' . $request->file('image')->extension();

            Imager::init($request->file('image'))
                ->resizeFit(600, 500)
                ->inCanvas('#fff')
                ->basePath(Storage::disk('public')->path('/'))
                ->save($category->image)
                ->save($category->image_thumb, 300);
        }

        if ($request->file('download_file')) {
            Storage::disk('public')->delete($category->download_file);
            $category->download_file = 'ebook-categories/pdf-' . time() . '.' . $request->file('download_file')->extension();
            $request->download_file->storeAs('public', $category->download_file);
        }

        $category->save();
        return to_route('admin.ebooks.categories.index')->withSuccess('SUCCESS !! Category is successfully updated');
    }


    public function destroy(Category $category)
    {
        if ($category->image)
            Storage::disk('public')->delete($category->image);
        if ($category->image_thumb)
            Storage::disk('public')->delete($category->image_thumb);
        if ($category->download_file)
            Storage::disk('public')->delete($category->download_file);
        $category->delete();
        return to_route('admin.ebooks.categories.index')->withErrors('Category has been successfully deleted.');
    }

    public function statusToggle(Category $category)
    {
        $category->update(['status' => $category->status ? false : true]);
        return back()->withSuccess('Status successfully updated');
    }
}
