<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class StudentMonthlyPaymentImported extends Notification
{
    public function via($notifiable)
    {
        return ['database']; // or ['mail', 'database'] if you also want to email
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Student monthly payments have been successfully imported.',
            'url' => route('student.monthy.payment.import'), // or wherever user should go
        ];
    }
}
