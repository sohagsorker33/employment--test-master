<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('home');
    }

    public function products()
    {
        return view('products');
    }

    public function update_profile_picture(Request $request)

    {

    {

            $user      = Auth::user();
            $image     = $request->file('');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            //* Use the Helper class to handle the file upload
            $imagePath = Helper::fileUpload($image, 'profile', $imageName);

            // Update user's avatar with the new image path
            $user->avatar = $imagePath;
            $user->save();

            return response()->json([
                'success'   => true,
                'image_url' => asset($imagePath),
            ]);
        }
}
}

