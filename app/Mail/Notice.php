<?php

namespace Horsefly\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Horsefly\NoticeBoardModel;

class Notice extends Mailable
{
    use Queueable, SerializesModels;
    public $notice;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(NoticeBoardModel $notice)
    {
        $this->notice=$notice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Admin.Notice.notice_page');
    }
}
