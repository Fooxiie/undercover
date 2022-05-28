<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class DiscordController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('discord')->redirect();
    }

    public function callback()
    {
        try {
            $discordUser = Socialite::driver('discord')->user();
            dd($discordUser);
        } catch (InvalidStateException) {
            return redirect(route('discord.redirect'));
        }
        $user = User::where('discord_id', $discordUser->id)->first();

        if ($user) {
            $user->update([
                'discord_token' => $discordUser->token,
                'discord_refresh_token' => $discordUser->refreshToken,
                'discord_avatar' => $discordUser->getAvatar()
            ]);
        } else {
            $newUser = new User();
            $newUser->name = $discordUser->getName();
            $newUser->email = $discordUser->getEmail();
            $newUser->discord_id = $discordUser->getId();
            $newUser->discord_token = $discordUser->token;
            $newUser->discord_refresh_token = $discordUser->refreshToken;
            $newUser->discord_avatar = $discordUser->getAvatar();
            $newUser->save();
            $user = $newUser;
        }
        Auth::login($user);

        return redirect(route('dashboard'));
    }
}
