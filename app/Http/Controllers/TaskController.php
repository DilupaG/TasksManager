<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function exportTask(Request $request){
        
        //dd($request->all());//diedum = echo

        $task = new Task; //creat task(modal) object

        //task is a modal. so he can access the tasks table in the db
        
        //validation
        $this->validate($request,[
            'task'=> 'required|max:100|min:5',
            'date'=>'required',
            'status'=>'required',
        ]);

        $task->task = $request->task;
        $task->date = $request->date;
        $task->priority = $request->prioroty;
        $task->status = $request->status;
        $task->save();       //saving the data in database

        //getting all data to a variable
        $allTasks = Task::all();   //Task modal have the connection with the tasks table. all() method fetch the all the tasks in the table
        

        //after adding data redirecting to back
        return redirect()->back();

        //after adding data redirecting to home page with the new data
        // return view('/home')->with('tasks',$allTasks);


    }

    // to update task status to On going(start task)
    public function updateTask($id){
        
        $task = Task::find($id);

        $task->status="On Going";
        $task->save(); 

        return redirect()->back();
    }

    // to update task status to competed
    public function completed($id){
        
        $task = Task::find($id);

        $task->status="Completed";
        $task->save(); 

        return redirect()->back();
    }

    // to update task status to competed
    public function delete($id){
        
        $task = Task::find($id);

        $task->delete(); 

        return redirect()->back();
    }
}
