<?php

namespace App\Http\Controllers\Dashboard\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Commission;
use App\Repositories\Teacher\TeacherRepository;

class TeacherController extends Controller
{
    private $teachers;

    /**
     * TeacherController constructor.
     * @param Teacher $teachers
     */
    public function __construct(TeacherRepository $teachers)
    {
        $this->teachers = $teachers;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teachers = $this->teachers->paginate($perPage = 10, $request->search);
       // dd($teachers);
        return view('dashboard.teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commissions = Commission::all();
        return view('dashboard.teacher.create', compact('commissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $this->teachers->create($request->all());
        toastr()->success(trans('message.success.create'));
        return redirect()->route('dashboard.teachers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = $this->teachers->find($id);
        return view('dashboard.teacher.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->teachers->update($request->id,$request->all());
        toastr()->success(trans('message.success.update'));
        return redirect()->route('dashboard.teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->teachers->delete($request->id);
        toastr()->success(trans('message.success.delete'));
        return redirect()->route('dashboard.teachers.index');
    }
}
