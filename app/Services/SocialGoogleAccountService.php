<?php

namespace App\Services;

use App\User;
use App\AnswerScore;
use App\SocialFacebookAccount;
use Spatie\Permission\Models\Role; 
use App\Notifications\TwoFactorCode;
use App\Notifications\AdminNotifyRegisterTeacher;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialGoogleAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialFacebookAccount::whereProvider('google')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            $user = User::findOrFail($account->user->id);

            $user->generateTwoFactorCode();
            $user->notify(new TwoFactorCode());
            
            return $account->user;
        } else {

            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'google'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $role = Role::where('name', 'academia')->first();

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'username' => rand(1,10000),
                    'password' => md5(rand(1,10000)),
                ]);

                AnswerScore::create([
                    'user_id' => $user->id
                ]);
                
                $user->assignRole($role);

                $users = User::role('admin')->get();

                foreach ($users as $admin) {
                    $admin->notify(new AdminNotifyRegisterTeacher());
                }
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}