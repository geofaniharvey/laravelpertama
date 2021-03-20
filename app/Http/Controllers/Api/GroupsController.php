<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Friends;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groups::orderby('id', 'desc')->paginate(3);

        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:groups|max:255|',
            'description' => 'required'
        ]);

        $groups = new groups;

        $groups->name = $request->name;
        $groups->description = $request->description;

        $groups->save();

        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Groups::where('id', $id)->first();
       
        return view('groups.show', ['group' => $group]);

        $group = Groups::where('id', $id)->first();
    
        return response()->json([
            'success' => true,
            'message' => 'Group Description',
            'data'    => $group
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Groups::where('id', $id)->first();
       
        return view('groups.edit', ['group' => $group]);
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
        $request->validate([
            'name' => 'required|unique:groups|max:255|',
            'description' => 'required'
        ]);

        Groups::find($id)->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        $groupupdt = Groups::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $groupupdt
        ], 200);

        return redirect('/groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Groups::find($id)->delete();
        return redirect('/groups');

        $groupdel = Groups::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Group Deleted',
            'data'    => $groupdel
        ], 200);
    }

    public function addmember($id)
    {
        $friend = Friends::where('groups_id' , '=' , 0)->get();
        $group = Groups::where('id', $id)->first();
        return view('groups.addmember', ['group' => $group, 'friend' => $friend]);
    }

    public function updatemember(Request $request, $id)
    {
        $friend = Friends::where('id', $request->friend_id)->first();
        Friends::find($friend->id)->update([
            'groups_id'  => $id
        ]);
            return redirect('/groups');
    }

    public function deletemember(Request $request, $id)
    {
        Friends::find($id)->update([
            'groups_id'  => 0
        ]);
            return redirect('/groups');
    }
}
