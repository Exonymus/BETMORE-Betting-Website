<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index()
    {
        return view('home.index');
    }

    public function about()
    {
        return view('home.about');
    }

    public function profile($id)
    {
        $user = User::find($id)->first();
        if (Auth::user() and
            (Auth::user()->id == $id or Auth::user()->role->name != 'user'))
            return view('home.profile', compact('user'));
        else
            return view('404');
    }

    public function debt(Request $request)
    {
        $amountToTake = $request->input('amount');
        $user = auth()->user();

        $request->validate([
            'amount' => 'required|numeric|min:1|max:' . ((int)($user->exp / 5000) * 1000),
        ]);

        $user->coins += $amountToTake;
        $user->save();

        $loan = new Loan();
        $loan->amount = $amountToTake;
        $loan->user_id = $user->id;
        $loan->save();

        return response()->json(['success' => true, 'message' => 'Credit taken successfully']);
    }

    public function debt_pay(Request $request)
    {
        $amountToPay= $request->input('amount');
        $user = auth()->user();

        if ($user->coins < $amountToPay)
            return response()->json(['error' => true, 'message' => 'Not enough coins']);

        $user->coins -= $amountToPay;
        $user->save();

        $loan = new Loan();
        $loan->amount = $amountToPay;
        $loan->user_id = $user->id;
        $loan->action = 'return';
        $loan->save();

        return response()->json(['success' => true, 'message' => 'Credit taken successfully']);
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|min:5',
            'inp_email' => 'required|email',
            'inp_pass--cur' => 'required',
            'inp_pass--new' => 'nullable|min:8',
        ]);

        // Check if the current password is correct
        if (!Hash::check($request->input('inp_pass--cur'), auth()->user()->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        // Update user details
        $user = auth()->user();
        $user->name = $request->input('username');
        $user->email = $request->input('inp_email');

        // Update password if a new one is provided
        if ($request->filled('inp_pass--new') && $request->input('inp_pass--new') !== $request->input('inp_pass--cur')) {
            $user->password = Hash::make($request->input('inp_pass--new'));
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function update_avatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
        ]);

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');

            // Update the user's avatar path in the database
            auth()->user()->update(['avatar' => $avatarPath]);

            return response()->json(['avatarUrl' => asset('storage/' . $avatarPath)]);
        }

        return response()->json(['error' => 'File not found'], 404);
    }
}
