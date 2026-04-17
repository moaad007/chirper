<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Logout extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
       
 
        // Log them in
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();


        // Redirect to home
        return redirect('/login')->with('success', 'logged out successfully');
    }
}
