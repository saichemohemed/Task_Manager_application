<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tasks;
use App\Models\Progress;
use Illuminate\View\View;
use App\Models\Priorities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {      

        // check if user Auth is admin return all Tasks 
        if(isAdmin()) {
            $tasks = Tasks::paginate(20);

        }else{

        // user Auth is user return Tasks 
            $user = Auth::user();
            $tasks = $user->Tasks()->paginate(20);
        }

        return view('tasks.index',[
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tasks.create',[
            'priorities' => Priorities::get(),
            'progress' => Progress::get(),
            'users'  =>  User::where('role_id',2)->get()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'titel' => ['required', 'string', 'max:255'],
            'priority' => ['required'],
            'progress' => ['required'],
            // 'start_date' => ['after:now'],
            // 'due_date' => ['required','after:start_date'],
            'due_date' => ['required'],
        ]);


        $task = Tasks::create([
            'titel' => strtoupper($request->titel),
            'priority_id' => $request->priority,
            'progress_id' => $request->progress,
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
        ]);


        // check if user Auth is admin 
        if(isAdmin()){

            //The administrator create tasks for many users
            for ($i = 0; $i < count($request->users) ; $i++) {
                $task->users()->attach($request->users[$i]);
            }

        }else{
                //The User create tasks
                $task->users()->attach(Auth::id());
        }

        return redirect()->route('tasks.index')->with('success', 'Tasks created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $task)
    {


        // check if user Auth is admin 
        if(!isAdmin()) {
                        
            // check if Tasks delete is for Auth user 
            if(isUserValid($task->Users[0]->id)) abort(404);
        }

        $priorities = Priorities::get();
        $progress  =  Progress::get();

        return view('tasks.show', compact(['task','priorities','progress']));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $task)
    {

        // check if user Auth is admin 
        if(!isAdmin()) {
                        
            // check if Tasks delete is for Auth user 
            if(isUserValid($task->Users[0]->id)) abort(404);
        }

        $priorities = Priorities::get();
        $progress  =  Progress::get();
        $users  =  User::where('role_id',2)->get();

        return view('tasks.edit', compact(['task','priorities','progress','users']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasks $task)
    {

        // check if user Auth is admin 
        if(!isAdmin()) {
            
            // check if Tasks delete is for Auth user 
            if(isUserValid($task->Users[0]->id)) abort(404);
        }

        $request->validate([
            'titel' => ['required', 'string', 'max:255'],
            'priority' => ['required'],
            'progress' => ['required'],
            // 'due_date' => ['required','after:start_date'],
            'due_date' => ['required'],
        ]);
        

        $task->update([
            'titel' => strtoupper($request->titel),
            'priority_id' => $request->priority,
            'progress_id' => $request->progress,
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tasks update successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $task)
    {
        
        // check if user Auth is admin 
        if(!isAdmin()) {

            // check if Tasks delete is for Auth user 
            if(isUserValid($task->Users[0]->id)) abort(404);
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success','Tasks successfully deleted');


    }
}
