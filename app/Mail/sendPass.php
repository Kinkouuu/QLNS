<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;


class sendPass extends Mailable
{
    use Queueable, SerializesModels;
    protected $email;
    protected $pass;
    /**
     * Create a new job instance.
     */
    public function __construct($email,$pass)
    {
        $this->email = $email;
        $this->pass = $pass;
    }
    public function user(){
        return DB::table('users')
        ->where('email', $this->email)
        ->first();
    }

    /**
     * Create a new message instance.
     */

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thông báo tạo tài khoản thành công',
            
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'admin.Mail.success',
            with: (['user' => $this->user(),
                    'pass' => $this->pass
            ])
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
