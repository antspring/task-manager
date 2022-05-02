<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Support\Facades\Storage;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'login' => ['required', 'max:255'],
            'image' => ['image'],
        ])->validateWithBag('updateProfileInformation');

        if (!array_key_exists('image',$input)) {
            $input['image'] = $user->image;

        }else {
            Storage::disk('public')->delete($user->image);

            $path =  Storage::disk('public')->put('users', $input['image']);

            $input['image'] = $path;

        }

        $user->forceFill([
            'name' => $input['name'],
            'login' => $input['login'],
            'image' => $input['image'],
        ])->save();
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
