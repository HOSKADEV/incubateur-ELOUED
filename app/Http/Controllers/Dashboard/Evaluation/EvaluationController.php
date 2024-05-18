<?php

namespace App\Http\Controllers\Dashboard\Evaluation;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Repositories\Student\StudentRepository;
use App\Repositories\Subject\SubjectRepository;
use App\Repositories\Evaluation\EvaluationRepository;

class EvaluationController extends Controller
{
    private $students;
    private $subjects;
    private $evaluations;

    /**
     * EvaluationController constructor.
     * @param StudentRepository $students
     * @param SubjectRepository $subjects
     * @param EvaluationRepository $evaluations
     */
    public function __construct(StudentRepository $students, SubjectRepository $subjects, EvaluationRepository $evaluations)
    {
        $this->students = $students;
        $this->subjects = $subjects;
        $this->evaluations = $evaluations;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $students = $this->students->paginate($request->perPage ? $request->perPage : PAGINATE_COUNT, $request->year,$request->start_date,$request->end_date, $request->search, $request->registration_number,$request->batch, $request->group,$request->rank,$request->passport);
        return view('dashboard.evaluation.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $student = $this->students->find($id);
        $subjects = $this->subjects->all();
        return view('dashboard.evaluation.create', compact('student', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
        for ($item = 0; $item < count($request->rate); $item++) {
            $data = [
                'student_id' => $request->student_id[$item],
                'subject_id' => $request->subject_id[$item],
                'rate' => $request->rate[$item],
                'created_by' => auth('admin')->id(),
            ];
            $this->evaluations->create($data);
        }
        // $this->su
        $this->students->update($request->student_id[1],[
            'moyenFinal' => $this->students->find($request->student_id[1])->moyen
        ]);
        if ($request->rank || $request->golden_passport) {
            Evaluation::create([
                'student_id' => $request->student_id[1],
                'rank' => $request->rank != null ? $request->rank : null,
                'golden_passport' => $request->golden_passport != null ? $request->golden_passport : null,
                'created_by' => auth('admin')->id(),
            ]);
        }
        toastr()->success(trans('message.success.create'));
        return redirect()->route('dashboard.evaluations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = $this->students->find($id);
        $evaluations = $this->evaluations->getByStudent($id);
        $evaluationExists = Evaluation::whereStudentId($id)->first();
        return view('dashboard.evaluation.single', compact('student','evaluationExists'));

        // findNotes
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = $this->students->find($id);
        $subjects = $this->subjects->all();
        $evaluationExists = Evaluation::whereStudentId($id)->first();
        $evaluations = $this->evaluations->getByStudent($id);
        return view('dashboard.evaluation.edit', compact('student', 'subjects','evaluations','evaluationExists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $deleted = Test::whereStudentId($request->student)->delete();
        if (!$deleted) {
            toastr()->error('حدث خطأ أثناء تعديل');
            return redirect() ->back();

        }
        $data = [];
        for ($item = 0; $item < count($request->rate); $item++) {
            $data = [
                'student_id' => $request->student_id[$item],
                'subject_id' => $request->subject_id[$item],
                'rate' => $request->rate[$item],
                'created_by' => auth('admin')->id(),
            ];
            $this->evaluations->create($data);
        }
        // $this->su
        $this->students->update($request->student_id[1],[
            'moyenFinal' => $this->students->find($request->student_id[1])->moyen
        ]);
        if (!is_null($request->rank) || !is_null($request->golden_passport)) {
            $evaluations = Evaluation::whereStudentId($request->student)->first();
            // dd($evaluations);
            if ($evaluations) {
                $evaluations->rank = $request->rank;
                $evaluations->golden_passport = $request->golden_passport;
                $evaluations->created_by = auth('admin')->id();
                $evaluations->save();
            } else {
                Evaluation::create([
                  'student_id' => $request->student_id[1],
                  'rank' => $request->rank != null ? $request->rank : null,
                  'golden_passport' => $request->golden_passport != null ? $request->golden_passport : null,
                  'created_by' => auth('admin')->id(),
                ]);
            }
        }

        toastr()->success(trans('message.success.update'));
        return redirect()->route('dashboard.evaluations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
