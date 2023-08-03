<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rating_member;
use Illuminate\Support\Facades\DB;

class RatingMemberController extends Controller
{
    // Hiển thị danh sách rating_members
    public function index()
    {
        $rating_members = DB::select('SELECT * FROM rating_members ORDER BY point DESC');

        return view('rating_members.index', compact('rating_members'));
    }

    // Hiển thị form tạo mới rating_member
    public function create()
    {
        return view('rating_members.create');
    }

    // Lưu rating_member mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $rating_member = new rating_member;
        $rating_member->name = $request->input('name');
        $rating_member->point = $request->input('point');
        $rating_member->note = $request->input('note');

        //
        if($request->hasfile('images'))
        {
            $file = $request->file('images');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/rating_members/', $filename);
            $rating_member->images = $filename;
        }
        $rating_member->save();

        return redirect()->route('rating_members.create')
                         ->with('success', 'Rating member created successfully.');
    }

    // Hiển thị thông tin chi tiết của một rating_member
    public function show(rating_member $rating_member)
    {
        return view('rating_members.show', compact('rating_member'));
    }

    // Hiển thị form chỉnh sửa rating_member
    public function edit(rating_member $rating_member)
    {
        return view('rating_members.edit', compact('rating_member'));
    }

    // Cập nhật thông tin rating_member vào cơ sở dữ liệu
    public function update(Request $request, rating_member $rating_member)
    {
        $data = $request->validate([
            'name' => 'required',
            'images' => 'required',
            'point' => 'required|integer',
            'note' => 'nullable',
        ]);

        $rating_member->update($data);

        return redirect()->route('rating_members.index')
                         ->with('success', 'Rating member updated successfully.');
    }

    // Xóa một rating_member khỏi cơ sở dữ liệu
    public function destroy(rating_member $rating_member)
    {
        $rating_member->delete();

        return redirect()->route('rating_members.index')
                         ->with('success', 'Rating member deleted successfully.');
    }
}