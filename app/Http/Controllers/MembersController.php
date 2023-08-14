<?php

namespace App\Http\Controllers;

use App\members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembersController extends Controller
{
    // Hiển thị danh sách members
    public function index()
    {
        $members = DB::select("SELECT m.id AS member_id, m.images, m.name AS member_name,
                                    COUNT(r.id) AS match_count, SUM(r.point) AS total_points,
                                    SUM(CASE WHEN result = 1 THEN 1 ELSE 0 END) AS wins,
                                    SUM(CASE WHEN result = 0 THEN 1 ELSE 0 END) AS losses
                                FROM members m
                                LEFT JOIN results r ON m.id = r.id_member
                                GROUP BY m.id, m.name
                                ORDER BY total_points DESC"
                             );

        // Số trận đấu

        return view('members.index', compact('members'));
    }

    // Hiển thị danh sách members
    public function list()
    {
        $members = DB::select('SELECT * FROM members WHERE delete_flg = 0 ORDER BY name');
        return view('members.list', compact('members'));
    }

    // Hiển thị form tạo mới members
    public function create()
    {
        return view('members.create');
    }

    // Lưu members mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $members = new members();
        $members->name = $request->input('name');
        $members->note = $request->input('note');

        // thêm ảnh
        if($request->hasfile('images'))
        {
            $file = $request->file('images');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/members/', $filename);
            $members->images = $filename;
        }
        $members->save();

        return redirect()->route('members.create')->with('success', 'Add successfully.');
    }

    // Hiển thị form chỉnh sửa members
    public function edit($id)
    {
        $edit_members = members::find($id);
        return view('members.edit', compact('edit_members'));
    }

    // Cập nhật thông tin members vào cơ sở dữ liệu
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'images' => 'required',
            'note' => 'nullable',
        ]);

        $member = members::find($id);
        $member->name = $request->input('name');
        $member->images = $request->input('images');
        // thêm ảnh
        if($request->hasfile('images'))
        {
            $file = $request->file('images');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/members/', $filename);
            $member->images = $filename;
        }
        $member->note = $request->input('note');
        $member->save();
        return redirect()->route('members.list')->with('success', 'Updated successfully.');
    }

    // Xóa một members khỏi cơ sở dữ liệu
    public function destroy($id)
    {
        DB::table('members')->where('id', $id)->update(["delete_flg" => 1]);
        return redirect()->route('members.list')->with('success', 'Deleted successfully.');
    }
}