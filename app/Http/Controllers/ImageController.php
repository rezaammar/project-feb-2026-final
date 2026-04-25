<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    // USER - tampilkan gambar
    public function index()
    {
        $user = auth()->user();

        $images = Image::latest()->get();

        // ambil semua notif (images)
        $images1 = Image::where('custom', true)->latest()->get();

        // tandai semua sebagai sudah dibaca
        $imageIds = $images1->pluck('id')->toArray();

        auth()->user()->readImages()->syncWithoutDetaching($imageIds);
    
        // $images = Image::latest()->get();
        //reset notifikasi saat dibuka
        // Image::where('custom', true)->update(['custom' => false]);
        return view('fitur/berita/index', compact('images'));
    }
    // ADMIN - Form upload
    public function create()
    {
        return view('admin.upload');
    }

    // ADMIN - Simpan gambar
    public function store(Request $request)
    {
            try {
            $request->validate([
                'title' => 'nullable|string|max:255',
                'image' => 'required|image|mimes:jpg,jpeg,png|max:20000' //20 mb maksimal
            ]);

            // upload file
            $path = $request->file('image')->store('images', 'public');

            // simpan ke database
            Image::create([
                'title' => $request->title,
                'image_path' => $path,
                'custom' => true    //buat notifikasi
            ]);

            return redirect()->back()->with('success', 'Gambar berhasil diupload');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // kalau validasi gagal
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();

        } catch (\Exception $e) {
            // kalau error umum
            Log::error('Upload error: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat upload gambar')
                ->withInput();
        }

    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        // hapus file dari storage
        if (Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        // hapus dari database
        $image->delete();

        return redirect()->back()->with('success', 'Gambar berhasil dihapus');
    }

}