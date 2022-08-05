<?php

namespace App\Notifications;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Config;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomVerificationEmail extends Notification
{
    /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }
        
        if(count($notifiable->socialites)) {
            $socialite = $notifiable->socialites->first();
            $provider = $socialite->provider;

            return (new MailMessage)
                    ->subject(Lang::get('Verify email Address'))
                    ->line('You registered/logged in through: '.ucfirst($provider))
                    ->line(Lang::get('Please click the button below to verify your email address.'))
                    ->action(Lang::get('Verify email Address'), $verificationUrl)
                    ->line(Lang::get('If you did not create an account, no further action is required.'));                  
        } else {
            return (new MailMessage)
                ->subject(Lang::get('Verify email Address'))
                ->line('Your SCOPE username is: '.$notifiable->username)
                ->line(Lang::get('Please click the button below to verify your email address.'))
                ->action(Lang::get('Verify email Address'), $verificationUrl)
                ->line(Lang::get('If you did not create an account, no further action is required.'));
        }
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            [
                'id' => \Auth::user()->getKey(),
                'hash' => sha1(\Auth::user()->getEmailForVerification()),
            ]
        );
    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
