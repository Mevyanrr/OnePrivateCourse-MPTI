<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class StudentSidebar extends Component
{
    public $student;

    public function __construct()
    {
        $user = Auth::user();
        $this->student = $user ? $user->student : null;
    }

    public function render()
    {
        return view('components.student-sidebar');
    }
}
