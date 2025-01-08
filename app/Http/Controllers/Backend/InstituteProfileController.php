<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use App\Models\Student;
use App\Models\User;
use App\Models\Branch;
use App\Models\BranchDetails;

class InstituteProfileController extends Controller
{
    public function index()
    {
        $data['user'] = User::where('id',Auth::user()->id)->first();

        $data['branch'] = Branch::where('id',Auth::user()->branch_id)->first();
        $data['branch_details'] = BranchDetails::where('branch_id',Auth::user()->branch_id)->first();



        return view('institute.profile.index',$data);
    }

    public function profile_update(Request $request)
    {
        $request->validate([
            'new_password'=>'min:8',
            'confirm_password'=>'same:new_password|min:8',
            'thumbnail'=>'mimes:jpeg,png,jpg,gif',
        ]);

        $new_pass = $request->input('new_password');

        $branch = Branch::where('id',Auth::user()->branch_id)->first();
        $branch_details = BranchDetails::where('branch_id',Auth::user()->branch_id)->first();
        $user   = User::where('id',Auth::user()->id)->first();

        $branch->password = $new_pass;
        $branch->update();

        $folder = 'Backend/image/Branch';
        if ($request->hasFile('thumbnail')) {

            if (file_exists(public_path($folder.'/'.$branch_details->ceo_profile))) {
               return  unlink(public_path($folder.'/'.$branch_details->ceo_profile));
            }

            $file = $request->file('thumbnail');
            $name = time().'ceo.'.$file->extension();
            $file->move($folder,$name);
            $branch_details->ceo_profile = $folder.'/'.$name;
        }

        $branch_details->update();

        $user->password = Hash::make($new_pass);
        $user->save();
        toastr()->success('Password Updated successfully !');
        return redirect()->back();

    }
}
