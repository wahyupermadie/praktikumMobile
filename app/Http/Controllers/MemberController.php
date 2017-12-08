<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Sex;
use DB;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = DB::table('members')
                    ->join('tb_kelamin', 'tb_kelamin.id' , '=', 'members.sex_id')
                    ->select('members.*','tb_kelamin.name_sex')
                    ->get();
        return response()->json($member);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {$member = Member::all();
        return view('index')->with("member",$member);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->all();
        $nama=$data['Nama'];
        $email=$data['Email'];
        $sex=$data['Sex'];
        $image=base64_decode($data['Picture']) ;
        $fileName = $nama.'.jpg';
        $path=public_path().'/images/'.$fileName;
        file_put_contents($path,$image);
        $member = new Member;
        $member->Picture = $fileName;
        $member->Nama=$nama;
        $member->Email=$email;
        if($sex = 'Laki - Laki'){
            $member->sex_id=1;
        }else{
            $member->sex_id=2;
        }
        $member->save();

        return response()->json([
            'success' => 'Data Berhasil Diinput'
        ]);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        return response()->json($member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $data= $request->all();
        $member = Member::find($id);
        $member->Nama=$data['Nama'];
        $member->Email=$data['Email'];
        if($data['Sex'] = 'Laki - Laki'){
            $member->sex_id=1;
        }else{
            $member->sex_id=2;
        }
        if(isset($data['Picture'])){
            $image=base64_decode($data['Picture']) ;
            $fileName = $data['Nama'].'.jpg';
            $path=public_path().'/images/'.$fileName;
            file_put_contents($path,$image);
            $member->Picture = $fileName;
        }
        $member->save();
        return response()->json([
            'success' => 'Data Berhasil Di Update'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id)->delete();
        return response()->json([
            'success' => 'Data Berhasil Di Hapus'
        ]);
    }
}
