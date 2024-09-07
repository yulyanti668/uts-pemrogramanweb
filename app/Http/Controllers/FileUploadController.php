<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function FormAvatar(Request $request, User $user)
    {
        $user = $request->session()->get('user');

        $user = User::where('id', $user->id)->first(); 

        return view('profile.upload-avatar', compact('user'));
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'file' => 'nullable|file|mimes:png,jpg,jpeg,pdf|max:2048'
        ]);
    
        $filePath = $user->avatar;
    
        if ($request->hasFile('file')) {
            
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
    
            $file = $request->file('file');
            $fileName = time() . '.' . $file->extension();
            $filePath = $file->storeAs('avatars', $fileName, 'public');

            $user->update([
                'avatar' => $filePath,
            ]);
            
            return redirect('/profile')->with("success", "Mengubah foto profil berhasil!");
        } else {
            return back()->withErrors(['file' => 'File upload failed!']);
        }
    }
}
