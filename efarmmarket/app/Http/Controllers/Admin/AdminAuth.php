<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/15/2018
 * Time: 10:19 AM
 */

namespace EfarmMarket\Http\Controllers\Admin;


use EfarmMarket\Http\Controllers\Controller;
use EfarmMarket\Http\Controllers\GeneralController;
use EfarmMarket\Models\ActivityLog;
use EfarmMarket\Models\Admin;
use EfarmMarket\Models\AdminLog;
use EfarmMarket\Models\BuyersTransaction;
use EfarmMarket\Models\Charge;
use EfarmMarket\Models\Contact;
use EfarmMarket\Models\ContactUs;
use EfarmMarket\Models\gallery;
use EfarmMarket\Models\ManageFooterNav;
use EfarmMarket\Models\User;
use Illuminate\Http\Request;

class AdminAuth extends Controller
{
    private $onFive;
   // public function __construct()
  // {
    //    $this->middleware('auth:admin');
   // }
    public function getSidebar(){
        return view('admin.partials.sidebar')->with('title', 'landing | page');
    }
    public function getAdminRegister()
    {
        if (\auth()->guard('admin')->user()->previlage == 1) {
            return view('admin.addAdmin')->with('title', 'Admin | register');
        }
        else{
            return redirect()->route('homepage')->with('success',GeneralController::error_success('Opps!','Invalid url'));
        }
    }
    public function wTran(Request $request){
        $this->validate($request,[
            'wUsername'=>'required|present|exists:users,username',
        ]);
        $user=User::where('username',$request->wUsername)->first();
        $walletTrans = $user->walletTransaction();
        return redirect()
            ->back()
            ->with('transactions',$walletTrans->get())
            ->with('tab',2);

    }
    public function postAdminRegister(Request $request){
        $this->validate($request,[
            'firstName'=>'required|present|max:20|min:2',
            'lastName'=>'required|present|max:20|min:2',
            'email'=>'required|present|max:25|email|unique:users,email',
            'username'=>'required|present|max:20|min:3|unique:users,username',
            'phone'=>['required','present','numeric','unique:users,phone',
                function($attribute, $value, $fail)
                {
                    if (strlen($value) < 11) {
                        $fail("The number can not be less than 11 digits");
                    } elseif (strlen($value) > 11) {
                        $fail("The number can not be greater than 11 digits");
                    }
                }
            ],
            'password'=>'required|present|max:50|min:6|confirmed',
            'password_confirmation'=>'required|present|same:password',
            'address'=>'required|present|max:255|min:6',
            'previlage'=>'required|present|boolean',
            'profilePicture'=>'nullable|mimes:jpeg,png,jpeg,gif|max:8048',
        ]);
        if($request->file('profilePicture')==null){
            $profilePic = null;
        }else{
            $profilePic = GeneralController::UploadFile($request->file('profilePicture'),['jpg','jpeg','png','gif'],'adminProfile');
        }
        if($request->input('previlage')==0){
            $verified = 1;
        }else{
            $verified = null;
        }
        if(Admin::create([
            'username'=>$request->input('username'),
            'firstName'=>$request->input('firstName'),
            'lastName'=>$request->input('lastName'),
            'phone'=>$request->input('phone'),
            'email'=>$request->input('email'),
            'previlage'=>$request->input('previlage'),
            'password'=>bcrypt($request->input('password')),
            'profilePicture'=>$profilePic,
        ]))
        return redirect()->route('admin.register')->with('success',GeneralController::error_success('Successful',"User Created Succesfully, You Can Now login"));
         else{
        return redirect()->route('admin.register')->with('failure',GeneralController::error_success('Whoops',"Something Went Wrong"));
            }
    }
    public function getStatistics(gallery $gallery,BuyersTransaction $buyersTransaction){

        return view('admin.statistics')->with('title', 'Sells | Statistics')
            ->with('advertD',$gallery->getDailyReport())
            ->with('boughtD',$buyersTransaction->getDailyReport())
            ->with('boughtW',$buyersTransaction->getWeeklyReport())
           ->with('boughtM',$buyersTransaction->getMonthlyReport())
            ->with('boughtY',$buyersTransaction->getYearlyReport());
    }
    public function getUsersPage(User $user){
        return view('admin.usersPage')
            ->with('title', 'All | Users')
            ->with('users',$user->getAllUnVerifiedSellers());
    }
    public function getUsers(User $user){
        return view('admin.users')
            ->with('title', 'All | Users')
            ->with('users',$user->users());
    }
    public function getFailedTransactions(){
        return view('admin.failedTransactions')
            ->with('title', 'Failed| Transactions');
    }

    public function getContactInfo(){
        return view('admin.contactInfo')
        ->with('title', 'Contact | Information');
    }
    public function getAdminProfileUpdate(){
        return view('admin.profileUpdate')->with('title', 'update|profile');
    }
    public function postAdminProfileUpdate(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|present|max:20|min:2',
            'previousPassword' => ['required','present',function($attribute,$value,$fail){
                if(!password_verify($value,auth()->guard('admin')->user()->password)){
                    $fail("The $attribute Does Not Match");
                }
            }],
            'phone'=>['nullable','present','numeric','unique:add_admin,phone','unique:users,phone',
                function($attribute, $value, $fail)
                {
                    if (strlen($value) < 11) {
                        $fail("The number can not be less than 11 digits");
                    } elseif (strlen($value) > 11) {
                        $fail("The number can not be greater than 11 digits");
                    }
                }
            ],
            'password' => 'nullable|present|max:50|min:6|confirmed',
            'password_confirmation'=> 'nullable|present|same:password',
            'email' => 'required|present|max:70|email',
            'profilePicture' => 'nullable|mimes:jpeg,png,jpg,gif|max:8048'
        ]);
        if($request->input('phone')==null){
            $phoneNumber = auth()->guard('admin')->user()->phone;
        }else {
            $phoneNumber = $request->input('phone');
        }
        if($request->file('profilePicture')==null){
            $profilePic = auth()->guard('admin')->user()->profilePicture;
        }else{
            $profilePic = GeneralController::UploadFile($request->file('profilePicture'),['jpg','jpeg','png','gif'],'adminprofile');
        }
        if(is_null($request->input('password'))){
            $password = auth()->guard('admin')->user()->password;
        }else{
            $password=bcrypt($request->input('password'));
        }
        auth()->guard('admin')->user()->update([
            'profilePicture'=>$profilePic,
            'phone'=>$phoneNumber,
            'password'=>$password,
        ]);
        AdminLog::create([
            'user_id'=>\auth('admin')->user()->id,
            'action'=>"updated his profile"]);
        return redirect()->back()->with('success',GeneralController::error_success('Successful',"User Profile Succesfully Updated"));
    }
    public function getAllAdmins(Admin $admin)
    {
        if (\auth()->guard('admin')->user()->previlage == 1) {
            return view('admin.allAdmins')
                ->with('title', 'all|admins')
                ->with('admins', $admin->getAllAdmins());
        }
        else{
            return redirect()->route('homepage')->with('success',GeneralController::error_success('Opps!','Invalid url'));
        }
    }
    public function deleteAdmin(Admin $delete)
    {
        if (\auth()->guard('admin')->user()->previlage == 1) {
            $remove = \auth('admin')->user()->id;
            $delete->delete(['remove' => $delete]);
            AdminLog::create([
                'user_id' => \auth('admin')->user()->id,
                'action' => "Deleted an Admin",]);
            return redirect()->back()->with('success', GeneralController::error_success('Done', 'Admin Successfull Delete'));
        }else{
            return redirect()->route('homepage')->with('success',GeneralController::error_success('Opps!','Invalid url'));
        }
    }
    public function updateAdmin(Admin $update){
        if($update->previlage==1) {
            $this->middleware('auth:admin');
            $update->update(['previlage' => 0]);
        }elseif($update->previlage==0){
            $this->middleware('auth:admin');
            $update->update(['previlage' => 1]);
        }
        AdminLog::create([
            'user_id' => \auth('admin')->user()->id,
            'action' => "Updated Admin's Privilege",]);
        return redirect()->back()->with('success',GeneralController::error_success('Done','Status Updated'));
    }
    public function getFeedbackPage(ContactUs $contactUs){
        return view('admin.feedbacks')
            ->with('title', 'Customers|Feedback')
            ->with('feedback', $contactUs->getUnreadMessages());
    }
    public function getActivityLog(ActivityLog $activityLog){
        return view('admin.activityLog')
            ->with('title', 'All | Activity |   Log')
            ->with('activityLog',$activityLog->getAllActivitiesLog());
    }
    public function getAdminLog(AdminLog $adminLog)
    {
        if (\auth()->guard('admin')->user()->previlage == 1) {
            return view('admin.adminLog')
                ->with('title', 'All | Admin | Log')
                ->with('activityLog', $adminLog->getAllAdminLog());
        }else{
            return redirect()->route('homepage')->with('success',GeneralController::error_success('Opps!','Something Went Wrong'));
        }
    }
    public function getCharges(){
        if (\auth()->guard('admin')->user()->previlage == 1) {
        return view('admin.charges')->with('title','update charges');
    }else{
            return redirect()->route('homepage')->with('success', GeneralController::error_success('oops','somthing went wrong'));
        }
    }
    public function postCharges(Request $request)
    {
        if (\auth()->guard('admin')->user()->previlage == 1) {
            $this->validate($request, [
                'amount' => 'required|present|numeric|',
                'chargeType' => 'required|present|exists:charges,id|integer',
            ]);
            $charges = Charge::find($request->input('chargeType'));
            $charges->update([
                'amount' => $request->input('amount'),
                'chargeType' => $request->input('chargeType'),
            ]);
            AdminLog::create([
                'user_id' => \auth('admin')->user()->id,
                'action' => "change charges amount",]);
            return redirect()->back()->with('success', GeneralController::error_success('done', 'update successfully'));
        }else{
            return redirect()->route('homepage')->with('success', GeneralController::error_success('opps!', 'UnAuthorised Access'));
        }
    }
    public function postContact(Request $request){
        $this->validate($request,[
            'type'=>'required|present|integer',
            'body'=>'required|present',
        ]);
        $contact=Contact::find($request->input('type'));
        $contact->update([
            'body'=>$request->input('body'),
            'type'=>$request->input('type'),
        ]);
        return redirect()->back()->with('success', GeneralController::error_success('Done','Changed Successfully'));
    }
    public function getContact(){
        return view('admin.contactInfo')
            ->with('title','update |contact |information');
    }
    public function getFooterItems(){
        return view('admin.manageFooter')
            ->with('title','manage |footer |navs');
    }
    public function postFooterItems(Request $request){
        $this->validate($request,[
            'body'=>'required|present|min:6',
            'category'=>'required|present',
        ]);
        $footer =ManageFooterNav::find($request->input('category'));
        $footer->update([
        //if(ManageFooterNav::create([
            'body' => $request->input('body'),
            'category' => $request->input('category'),
        ]);//);
        AdminLog::create([
            'user_id' => \auth('admin')->user()->id,
            'action' => "Update Footer Nav",]);
        return redirect()->back()->with('success', GeneralController::error_success('Updated', 'update successfully'));
    }

}