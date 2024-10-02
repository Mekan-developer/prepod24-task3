<?php

namespace App\Livewire;

use App\Http\thiss\ChangePasswordthis;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rules\Password as Pass;


class Profile extends Component
{

    use WithFileUploads;

    //Awatar
    public $userImage, $image;
    protected $rules = [
        'image' => 'required|mimes:jpg,jpeg,png,gif,webp|max:5120', // max is in kilobytes (5MB)
    ];
    // information
    public $name,$fname, $lname, $date_of_birth;
    // contact
    public $email,$phone_number;
    //password change
    public $old_password, $new_password, $new_password_confirmation;



    public function mount(){
        $email = auth()->user()->email;
        $this->name = auth()->user()->name;
        $this->lname = auth()->user()->profile->lname;
        if(auth()->user()->profile->date_of_birth){
            $this->date_of_birth = auth()->user()->profile->date_of_birth->format('Y-m-d');
        }
        
        $this->phone_number = auth()->user()->profile->phone_number;
        $this->email = auth()->user()->email;

        $this->userImage = auth()->user()->profile->image;
    }


    public function render()
    {
        sleep(1);
        return view('livewire.profile');
    }


    public function updatedImage()
    {

        $this->validate();
        $this->uploadsImage();
    }

    public function uploadsImage()
    {
        if ($this->image) {
            $extension = $this->image->getClientOriginalExtension();
            $fileName = Str::random(10) . '.' . $extension;

            // Storing the image
            $this->image->storeAs('', $fileName, 'userImage');

            // Fetch the user profile and update the image field
            $userProfile = UserProfile::where('user_id', auth()->id())->first();
            if ($userProfile) {
                if ($userProfile->image){
                        if (Storage::disk('userImage')->exists($userProfile->image)) {
                        Storage::disk('userImage')->delete($userProfile->image);
                    }
                }
                $userProfile->update([
                    'image' => $fileName
                ]);
                $this->userImage = $fileName;
            }
            
            // You can also add a success message here
            session()->flash('success', 'User image updated successfully!');
            
        } else {
            // Handle the case where no image is uploaded
            session()->flash('error', 'No image updated.');
        }
    }

    public function information(){
        $userProfile = UserProfile::where('user_id', auth()->id())->first();
        $userProfile->update([
            'lname' => $this->lname,
            'date_of_birth' => $this->date_of_birth
        ]);

        auth()->user()->update([
            'name' => $this->name
        ]);
    }

    public function contact(){
        auth()->user()->update([
            'email' => $this->email
        ]);

        $userProfile = UserProfile::where('user_id', auth()->id())->first();
        if($this->phone_number)
            $userProfile->update(['phone_number' => $this->phone_number]);
    }


    public function changePassword()
    {

        $validated = Validator::make(
            // Data to validate...
            ['old_password' => $this->old_password, 'new_password' => $this->new_password, 'new_password_confirmation' => $this->new_password_confirmation],
 
            // Validation rules to apply...
            ['old_password' => 'required|string', 'new_password' => 'required|string|confirmed|',Pass::min(5)->letters()->mixedCase()->symbols()],
 
            // Custom validation messages...
            ['required' => 'The :attribute field is required'],
         )->validate();


        // Check if the old password matches the current password in the database
        if (!Hash::check($this->old_password, Auth::user()->password)) {
            // Optionally, you can provide feedback
            session()->flash('error', 'The old password is incorrect.');
            return;
        }

        // Update the password
        Auth::user()->update([
            'password' => Hash::make($this->new_password),
        ]);

        session()->flash('success', 'Password changed successfully.');

        // Reset the input fields
        $this->reset(['old_password', 'new_password', 'new_password_confirmation']);
    }


}
