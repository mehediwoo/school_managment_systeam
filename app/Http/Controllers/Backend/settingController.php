<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;
use App\Models\EducationYear;
use App\Models\BackendSettings;
use App\Models\logoSet;
use App\Models\MetaSet;
use App\Models\custompayment;
use App\Models\nagad_api;
class settingController extends Controller
{


     public function index()
    {
        return view('Backend.admin.settings.index');
    }

    Public function division_add(){
        $get_division=Division::all();
        return view('Backend.admin.settings.Add_division',compact('get_division'));
    }

    public function division_insert(Request $request){
        // $request->validate([
        //     'name'=> 'required|unique',
        //   ]);
        $division= new Division();
        $division->name=$request->name;
        $division->save();
        toastr()->success('Add Division Successfully');
        return redirect()->back();
    }
    Public function division_edit($id){
        $get_division=Division::find($id);
        return view('Backend.admin.settings.division_edit',compact('get_division'));
    }

    public function update_division(Request $request, $id){
        $get_division=Division::find($id);

        $get_division->name=$request->name;
        $get_division->save();
        toastr()->success('Update Division Successfully');
        return redirect('add_division');
    }

    public function Delete_division($id){
        $delete=Division::find($id);
        $delete->delete();
        toastr()->success('Delete Division Successfully');
        return redirect('add_division');
    }

    public function add_district(){
       $get_division=Division::get();
       $get_all=District::with('division')->get();

        return view('Backend.admin.settings.Add_District',compact('get_division','get_all'));
    }

    public function district_insert(Request $request){
        $district = new District();

        $district->district_name=$request->district_name;

        $district->division_id=$request->division_id;
        $district->save();
        toastr()->success('Add  District Successfully');
        return redirect()->back();
    }

    public function district_edit($id){

        $get_district=District::find($id);
        $get_division=Division::get();


         return view('Backend.admin.settings.edit_district',compact('get_division','get_district'));
     }

     public function update_district($id ,Request $request){
        $get_district=District::find($id);

        $get_district->district_name=$request->district_name;

        $get_district->division_id=$request->division_id;
        $get_district->save();
        toastr()->success('Update District Successfully');
        return redirect('add_district');
     }

     public function delete_district($id){
        $delete=District::find($id);
        $delete->delete();
        toastr()->success('Delete District Successfully');
        return redirect('add_district');
     }

     public function getDistrictByDivision(Request $request){
        $district_name='';
         $district= District::where('division_id',$request->division_id)->get();
         foreach( $district as $district){
            $district_name.="<option value='".$district->id."'>".$district->district_name."</option> ";
         }
         echo  $district_name;

     }


    public function addEducationYear(){
    $eduYear=EducationYear::all();
    return view('Backend.admin.settings.EducationAdd',compact('eduYear'));

   }

  public function insertEducationYear(Request $request){
    $eduYear=new EducationYear();
    $eduYear->education_year=$request->education_year;
    $eduYear->current= '0';
    $request->education_year;
    $eduYear->status='Active';
    $eduYear->save();
    toastr()->success('Add Education Year Successfully');
    return redirect()->back();
  }

  public function editEducationYear($id){
    $data['editEduYear']=EducationYear::find($id);
    return view('Backend.admin.settings.EducationYearEdit',$data);
  }

  public function updateEducationYear(Request $request, $id){
    $eduYear=EducationYear::find($id);
    if($eduYear->status=='Active'){
        $eduYear->status='Deactive';
        $eduYear->save();
        toastr()->success('Deactive Education Year Successfully');
        return redirect()->back();
    }
    elseif($eduYear->status=='Deactive'||$eduYear->status=='Pending'){
        $eduYear->status='Active';
        $eduYear->save();
        toastr()->success('Active Education Year Successfully');
        return redirect()->back();
    }

  }

  public function updateEducationYearCurrent($id)
  {
    $eduYear = EducationYear::findOrFail($id);
    foreach (EducationYear::all() as $edu) {
        $edu->current='0';
        $edu->update();
    }
    $eduYear->current='1';
    $eduYear->update();
    toastr()->success('Enable Current Education Year Successfully');
    return redirect()->back();
  }

  public function deleteEducationYear($id){
    $eduYear=EducationYear::find($id);
    $eduYear->delete();
    toastr()->success('Delete Education Year Successfully');
    return redirect()->back();
  }

  public function BackendEdit(){

    $data['getBackend']=BackendSettings::where('id',1)->first();
    // dd($data['getBackend']->id);
    return view('Backend.admin.settings.edit_backend',$data);
  }

  public function BackendUpdate(Request $request,$id){
    $backend=BackendSettings::where('id',$id)->first();
    //  dd( $backend->footer);
    $backend->institute_name=$request->name;
    $backend->starting_year=$request->starting_year;

    $backend->site_title=$request->site_title;
    $backend->sub_title=$request->sub_title;
    $backend->address=$request->address;
    $backend->phone=$request->phone;
    $backend->email=$request->email;
    // $backend->meta_title=$request->meta_title;
    // $backend->meta_description=$request->meta_description;
    // $backend->meta_keywords=$request->meta_keywords;

    $backend->facebook=$request->facebook;
    $backend->twitter=$request->twitter;
    $backend->linkedin=$request->linkedin;
    // dd($request->instragram);
    $backend->instragram=$request->instragram;

    $backend->footer=$request->footer;

    $backend->save();
    toastr()->success('Update Backend Successfully');
    return redirect()->back();
  }



  public function logoset(){
    $logo=logoSet::where('id',1)->first();

   return view('Backend.admin.settings.logosetting',compact('logo'));
  }


  public function logoupdate(Request $request,$id){
    $logo=logoSet::where('id',$id)->first();
    if(isset($request->logo)){

        if($logo->logo && file_exists($logo->logo)){
            unlink($logo->logo);
        }

        $file = $request->file('logo');
        $extension = $file->getClientOriginalExtension();
        $filename = time() .'logo'.'.' . $extension;
        $path = 'Backend/image/LogoSetting/';
        $file->move($path, $filename);
        $logo->logo = $path . $filename;
        }


    if(isset($request->favicon)){

        if($logo->favicon && file_exists($logo->favicon)){
            unlink($logo->favicon);
        }

        $file = $request->file('favicon');
        $extension = $file->getClientOriginalExtension();
        $filename = time() .'favicon'.'.' . $extension;
        $path = 'Backend/image/LogoSetting/';
        $file->move($path, $filename);
        $logo->favicon = $path . $filename;
        }

        $logo->save();
        toastr()->success('Update logo and favicon Successfully');
        return redirect()->back();
  }

  public function seoSettings(){
    $seo = MetaSet::where('id',1)->first();
    return view('Backend.admin.settings.seo_setting',compact('seo'));
  }

  public function seoUpdate(Request $request,$id){
    $seo=MetaSet::where('id',$id)->first();
    $seo->meta_title=$request->meta_title;
    $seo->meta_description=$request->meta_description;
    $seo->meta_keywords=$request->meta_keywords;
    $seo->save();
    toastr()->success('Update SEO Settings Successfully');
    return redirect()->back();
  }


  public function paymentGatewaySettings(){

    return view('Backend.admin.settings.custom_payment');
  }

    public function bkash_custom(){
        $getbkashPayment = custompayment::where('id',1)->first();

        return view('Backend.admin.settings.bkash_custom',compact('getbkashPayment'));
    }

    public function BkashGatewayUpdate(Request $request,$id){

        $bkashPayment=custompayment::where('id',1)->first();
        $bkashPayment->name=$request->name;
        $bkashPayment->transactionFee=$request->transactionFee;
        $bkashPayment->accountType=$request->accountType;

        $bkashPayment->sandbox=$request->sandbox;
        $bkashPayment->username=$request->username;
        $bkashPayment->appKey=$request->appKey;

        $bkashPayment->password=$request->password;
        $bkashPayment->appSecret=$request->appSecret;
        $bkashPayment->status=$request->status;

        if(isset($request->logo)){

            if($bkashPayment->logo && file_exists($bkashPayment->logo)){
                unlink($bkashPayment->logo);
            }

            $file = $request->file('logo');
            $extension = 'logo'.$file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'Backend/image/LogoSetting/';
            $file->move($path, $filename);
            $bkashPayment->logo = $path . $filename;
            }
        $bkashPayment->save();
        toastr()->success('Update Bkash Payment Settings Successfully');
        return redirect()->back();
    }

    public function nagad_custom()
    {
        $nagad_api = nagad_api::where('id',1)->first();

        return view('Backend.admin.settings.nagad_custom',compact('nagad_api'));
    }

    public function nagadGatewayUpdate(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|string',
            'transactionFee'=>'required',
            'transactionFee'=>'required',
            'marchent_id'=>'required',
            'marchent_number'=>'required',
            'public_key'=>'required',
            'private_key'=>'required',
            'logo'=>'image',
        ]);

        $nagad_api = nagad_api::first();
        $nagad_api->name = $request->input('name');
        $nagad_api->trans_fee = $request->input('transactionFee');
        $nagad_api->sandbox = $request->input('sand_box');
        $nagad_api->live = $request->input('live_url');
        $nagad_api->merchant_id = $request->input('marchent_id');
        $nagad_api->merchant_number = $request->input('marchent_number');
        $nagad_api->public_key = $request->input('public_key');
        $nagad_api->private_key = $request->input('private_key');
        $nagad_api->status	 = $request->input('status');

        $folder = 'Backend/image/logo';
        if ($request->hasFile('logo'))
        {
            if (file_exists(base_path('storage/'.$nagad_api->logo)) && $nagad_api->logo != null) {
                unlink(base_path('storage/'.$nagad_api->logo));
            }
            $file = $request->file('logo');
            $name = time().'.'.$file->extension();
            $file->move($folder,$name);
            $nagad_api->logo = $folder.'/'.$name;
        }

        $result = $nagad_api->save();
        if ($result) {
            toastr()->success('Update nagad Payment Settings Successfully');
            return redirect()->back();
        }else{
            toastr()->danger('Something wrong, please try again!');
            return redirect()->back();
        }









    }
}
