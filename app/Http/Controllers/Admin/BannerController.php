<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Takshak\Imager\Facades\Imager;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('banners_access');
        $banners = Banner::latest()->get();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        $this->authorize('banners_create');
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $this->authorize('banners_create');
        $request->validate([
            'image'       =>  'required|image',
            'alt_text'     =>  'required|max:200',
        ]);

        $banner = new Banner;

        if ($request->file('image')) {
            $banner->image    = 'banners/' . Str::of(microtime())->slug('-') . '.';
            $banner->image    .= $request->file('image')->extension();

            Imager::init($request->file('image'))
                ->resizeFit(820, 720)
                ->inCanvas('#fff')
                ->save(Storage::disk('public')->path($banner->image));
        }

        $banner->alt_text     = $request->post('alt_text');
        $banner->save();

        return to_route('admin.banners.index')->withSuccess('SUCCESS !! New Banner is successfully added.');
    }

    public function edit(Banner $banner)
    {
        $this->authorize('banners_update');
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $this->authorize('banners_update');
        $request->validate([
            'image'     =>  'required|image',
            'alt_text'     =>  'required|max:200',
        ]);

        if ($request->file('image')) {
            $banner->image    = 'banners/' . Str::of(microtime())->slug('-') . '.';
            $banner->image    .= $request->file('image')->extension();

            Imager::init($request->file('image'))
                ->resizeFit(820, 720)
                ->inCanvas('#fff')
                ->save(Storage::disk('public')->path($banner->image));
        }

        $banner->alt_text     = $request->post('alt_text');
        $banner->save();

        return to_route('admin.banners.index')->withSuccess('SUCCESS !! Banner is successfully updated.');
    }

    public function destroy(Banner $banner)
    {
        $this->authorize('banners_delete');
        if ($banner->image) {
            Storage::delete([$banner->image]);
        }
        $banner->delete();

        return to_route('admin.banners.index')->withSuccess('SUCCESS !! Banner is successfully deleted.');
    }
}
