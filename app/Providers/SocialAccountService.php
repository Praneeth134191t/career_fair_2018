<?php
/**
 * Created by PhpStorm.
 * User: Kokila
 * Date: 3/3/17
 * Time: 1:44 PM
 */

namespace App\Providers;

use Laravel\Socialite\Contracts\Provider;
use App\SocialAccount;
use App\User;


class SocialAccountService
{
    public function createOrGetUser(Provider $provider, \Laravel\Socialite\One\User $authuser,$isAdmin)
    {

        $providerUser = $authuser;
        $providerName = class_basename($provider);

        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);

            $user = User::whereEmail($providerUser->getId())->first(); //until twitter accept our app to get user email address will use user id

            if (!$user) {

                if($isAdmin){
                    $user = new User();
                    $user->email = $providerUser->getId();
                    $user->password = bcrypt(str_random());
                    $user->name = $providerUser->getName();
                    $user->status = 'first_time';
                    $user->role = 'admin';
                    $user->save();
                }else{
                    $user = new User();
                    $user->email = $providerUser->getId();
                    $user->password = bcrypt(str_random());
                    $user->name = $providerUser->getName();
                    $user->status = 'first_time';
                    $user->role = 'student';
                    $user->save();
                }

            }

            $account->user()->associate($user);
            $account->save();
            return $user;

        }

    }
}