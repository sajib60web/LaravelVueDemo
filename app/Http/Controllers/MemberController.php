<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::where('status', 1)
            ->where('accounts_status', 1)
            ->get();
        return view('pages.members', compact('members'));
    }
}
