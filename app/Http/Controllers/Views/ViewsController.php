<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function viewIndex() {
        $pterodactyl = new ApiController();
        $userServers = $pterodactyl->getUserServers(Auth::id());
        return view('pages.index', compact('userServers'));
    }

    public function viewLogin() {
        return view('pages.auth.login');
    }

    public function viewRegister() {
        return view('pages.auth.register');
    }

    public function viewServer(Request $request, $server) {
        $pterodactyl = new ApiController();
        $serverInfo = $pterodactyl->getServerById($server);
        $serverIp = $pterodactyl->getNest($serverInfo->attributes->node, $serverInfo->attributes->allocation);
        $data = [
            'server' => $serverInfo,
            'node' => $serverIp,
            'sftp_link' => "sftp://".Auth::user()->pterodactyl_username.".".$serverInfo->attributes->identifier."@".$serverInfo->attributes->sftp_details->ip.":".$serverInfo->attributes->sftp_details->port,
        ];
        return view('pages.server', compact('data'));
    }
}
