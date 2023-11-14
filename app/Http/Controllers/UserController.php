<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;
use Takshak\Imager\Facades\Imager;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function orders()
    {
        $orders = Order::where('user_id', auth()->id())->paginate(30)
            ->withQueryString();
        return view('user.order_list')->with('orders', $orders);
    }

    public function profile()
    {
        return view('user.profile');
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $request->user()->id],
            'mobile' => ['required'],
            'avatar' =>  'nullable|image',
        ]);
        
        $profile_img = $request->user()->profile_img;

        if ($request->file('avatar')) {
            Storage::disk('public')->delete($profile_img);
            $profile_img    = 'users/' . Str::of(microtime())->slug('-') . '.';
            $profile_img    .= $request->file('avatar')->extension();

            Imager::init($request->file('avatar'))
                ->resizeFit(300, 300)
                ->inCanvas('#fff')
                ->save(Storage::disk('public')->path($profile_img));
        }

        $request->user()->update([
            'name'        => $request->name,
            'email'       => $request->email,
            'mobile'      => $request->mobile,
            'profile_img' => $profile_img,
        ]);

        return back()->withSuccess('Profile has been updated!');
    }

    public function password()
    {
        return view('user.password');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->withSuccess('Password has been changed!');
    }
}
