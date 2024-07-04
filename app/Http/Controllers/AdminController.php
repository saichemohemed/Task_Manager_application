<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        $User = User::query();

        /**  Search by email. */

        if ($request->has('search') && !is_null($request->search) ) {

            $User->where('email','like', '%' . $request->search . '%');

        }

        /**  Search by User status . */

        if($request->has('status') && !is_null($request->status) ) {

            $User->where('active',$request->status);
        }


        /**  Limit page Length. */

        $pages = ($request->pages) ? $request->pages : 20;


        return view('admin.index',[
            'users' => $User->where('role_id', 2)->paginate($pages),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        
        $request->validate([
            'first_name' => ['required', 'string', 'max:30'],
            'last_name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required','min:6',],
        ]);


        user::create([
            'first_name' => ucfirst($request->first_name),
            'last_name' => ucfirst($request->last_name),
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role_id' => 2,
            'img_path' => 'assets/images/user/',
            'img_name' => 'user.png',
        ]);

        return redirect()->route('user.create')->with('success', 'User created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        $tasks = $user->Tasks()->paginate(20);
        return view('admin.show', compact(['user','tasks']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $request->validate([
            'first_name' => ['required', 'string', 'max:30'],
            'last_name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // check if user  insert image   
        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('public/images', $imageName);
        }else{
            
            // Get image  from database
            $imageName = $user->img_name;
        }


        $user->update([
            'first_name' => ucfirst($request->first_name),
            'last_name' => ucfirst($request->last_name),
            'email' => $request->email,
            'phone' => $request->phone,
            'img_path' => 'storage/images/',
            'img_name' => $imageName,
        ]);

        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
           
        return redirect()->route('user.index')->with('success','User deleted successfully');
    }
}
