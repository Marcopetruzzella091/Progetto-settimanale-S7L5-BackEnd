<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
 


use App\Models\Project;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    // gli amministrtori vedranno tutte le prenotazioni, gli utenti invece solo quelle connesse ad essi
    {  if (Auth::user()->role == 'admin') {
        $courses = Course::with('activities')->get();
        
        return view('webapp.homepage', ['courses' => $courses]);
    } else {
        $courses = Course::with('activities')->where('user_id', Auth::user()->id)->get();
        return view('webapp.homepage', ['courses' => $courses]);
    }
        
        
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $selectedcourse = request()->query('selectedcourse');
    return view('webapp.registercourse')->with('selectedcourse', $selectedcourse);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {       
        $data = $request->only(['nome_corso', 'stato_richiesta', 'numero_sala', 'data_prenotazione', 'user_id']);
        $data['fascia_oraria'] = $request->input('fascia_oraria'); 
        $data['user_id'] = Auth::user()->id;
       
        Course::create($data); 
    
        return redirect()->action([CourseController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {   $courses = Course::with('activities')->where('user_id', Auth::user()->id)-> where('id', $course->id)->get();
        return $courses;
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {  // return $course;
        return view('webapp.editcourse', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {  
        $coure['nome_corso'] = $request->nome_corso;
        $course['numero_sala'] = $request->numero_sala;
        $course['data_prenotazione'] = $request->data_prenotazione;
        $course ['fascia_oraria'] = $request->fascia_oraria;
        $course['updated_at'] = Carbon::now();
         if (Auth::user()->role == 'admin'){$course['stato_richiesta'] = $request->stato_richiesta;}
            
        
       
        $course->update();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    { 
        $course->delete();
      
        return redirect('/'); 
        // return redirect('/'); 
    }


    public function approve(Course $course)
    {  return dd ($course);
        $course->update(['stato_richiesta' => 'Approvato']);
        return redirect('/');
    }
}
