<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public $token;
    public static $createUrlCallback;
    public static $toMailCallback;

    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     if (static::$toMailCallback) {
    //         return call_user_func(static::$toMailCallback, $notifiable, $this->token);
    //     }

    //     $resetUrl = $this->resetUrl($notifiable);

    //     return (new MailMessage)
    //                 ->subject('Permintaan Reset Password')
    //                 ->greeting('Halo ' . $notifiable->name . ',')
    //                 ->line('Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda.')
    //                 ->action('Reset Password', $resetUrl)
    //                 ->line('Tautan reset password ini akan berlaku selama 60 menit.')
    //                 ->line('Jika Anda tidak melakukan permintaan ini, tidak perlu melakukan tindakan lebih lanjut.');
    // }

    public function toMail($notifiable)
    {
        $resetUrl = $this->resetUrl($notifiable);

        return (new MailMessage)
                    ->subject('Permintaan Reset Password')
                    ->view('emails.reset-password', [
                        'name' => $notifiable->name,
                        'resetUrl' => $resetUrl,
                        'count' => config('auth.passwords.users.expire'),
                    ]);
    }

    protected function resetUrl($notifiable)
    {
        if (static::$createUrlCallback) {
            return call_user_func(static::$createUrlCallback, $notifiable, $this->token);
        }

        return url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));
    }

    public static function createUrlUsing($callback)
    {
        static::$createUrlCallback = $callback;
    }

    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
