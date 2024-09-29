<?php

namespace App\Livewire;

use App\Models\UserProfile;
// use Illuminate\Support\Str;
// use Livewire\Attributes\Rule;
use Livewire\Component;


class Profile extends Component
{

    // #[Rule('required|mimes:png,jpg,jped,webp|max:5120')]
    public $image;


    public $maskedEmail,$name;



    public function mount(){
        $email = auth()->user()->email;
        $this->name = auth()->user()->name;

        // Split the email into two parts: local part (before @) and domain part (after @)
        list($localPart, $domainPart) = explode('@', $email);

        // Take the first 4 characters of the local part and append '****'
        substr($localPart, 0, 4) . '****@' . $domainPart;

        $this->maskedEmail = substr($localPart, 0, 4) . '****@' . $domainPart;
    }


    public function render()
    {
        return view('livewire.profile');
    }

    public function uploadsImage(){
        $validated = $this->validated('image');

        $extension = $this->image->getClientOriginalExtension();
        // $fileName = Str::random(5).'.'.$extension;
        // dd($fileName);
        // $this->image->storeAs('userImage', $fileName, 's3-userImage');

        UserProfile::update($validated);
    }

    public function testGet(){
        dd('terr');
    }



}
