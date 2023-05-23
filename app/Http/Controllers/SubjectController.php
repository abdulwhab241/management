<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SubjectRequest;
use App\Repository\SubjectRepositoryInterface;

class SubjectController extends Controller
{
    protected $Subject;

    public function __construct(SubjectRepositoryInterface $Subject)
    {
        $this->Subject = $Subject;
    }

    public function index()
    {
        return $this->Subject->index();
    }


    public function create()
    {
        return $this->Subject->create();
    }

    public function store(SubjectRequest $request)
    {
        return $this->Subject->store($request);
    }

    public function edit($id)
    {
        return $this->Subject->edit($id);
    }
    
    public function show($id)
    {
        $Subjects = Subject::findOrFail($id);
        $get_id = DB::table('notifications')->where('data->subject_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        return view('pages.Subjects.notification', compact('Subjects'));
    }

    public function update(SubjectRequest $request)
    {
        return $this->Subject->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Subject->destroy($request);
    }
}
