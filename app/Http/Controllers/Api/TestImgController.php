<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TestImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestImgController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = TestImg::query()->latest('id')->paginate(1);
        return response()->json(
            [
                "message" => "lấy dữ liệu thành công",
                "data" => $data
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $path = Storage::put('public/img', $request->img);
        $url = url(Storage::url($path));
        //    dd($url);

        // dd($request->all());

        TestImg::query()->create(
            [
                "img" => $url
            ]
        );
        return response()->json([
            "message" => "thêm mới thành công"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Lấy thông tin ảnh từ database
        $img = TestImg::findOrFail($id);

        // Lấy phần đường dẫn sau '/storage/' để chuyển thành 'public/'
        $relativePath = str_replace('/storage/', 'public/', parse_url($img->img, PHP_URL_PATH));

        // Kiểm tra đường dẫn đã được xử lý đúng chưa
        //dd($relativePath); // Kết quả phải là 'public/img/yourfile.jpg'

        // Xóa ảnh từ thư mục storage
        Storage::delete($relativePath);

        // Xóa bản ghi trong database
        $img->delete();

        // Trả về phản hồi
        return response()->json([
            'message' => 'Xóa ảnh thành công'
        ]);
    }
}
