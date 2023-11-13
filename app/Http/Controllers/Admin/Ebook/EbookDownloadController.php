<?php

namespace App\Http\Controllers\Admin\Ebook;

use App\Http\Controllers\Controller;
use App\Models\Ebook\Download;
use Illuminate\Http\Request;

class EbookDownloadController extends Controller
{
    public function index(Request $request)
    {
         $downloads = Download::query()
            ->when($request->has('ebook_category_id'), function ($query) use ($request) {
                $query->where('ebook_category_id', $request->ebook_category_id);
            }, function ($query) {
                $query->whereNotNull('ebook_category_id');
            })
            ->when($request->has('course_id'), function ($query) use ($request) {
                $query->where('course_id', $request->course_id);
            }, function ($query) {
                $query->whereNotNull('course_id');
            })
            ->when($request->get('search'), function ($query) use ($request) {
                $query->where('first_name', 'like', '%' . $request->get('search') . '%');
                $query->orWhere('last_name', 'like', '%' . $request->get('search') . '%');
                $query->orWhere('email', 'like', '%' . $request->get('search') . '%');
                $query->orWhere('mobile', 'like', '%' . $request->get('search') . '%');
            })
            ->with(['course:id,title', 'category:id,name'])
            ->paginate(25)
            ->withQueryString();

        return view('admin.ebooks.downloads.index')->with('downloads', $downloads);
    }

    public function show(Download $download)
    {
        $download->load('course');
        $download->load('category');
        return view('admin.ebooks.downloads.show')->with('download', $download);
    }

    public function destroy(Download $download)
    {
        $download->delete();
        return to_route('admin.ebooks.downloads.index')->withErrors('Downloads has been successfully deleted.');
    }
}
