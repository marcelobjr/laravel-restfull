<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\UserRepository;

use \LucaDegasperi\OAuth2Server\Facades\Authorizer;

class UserController extends Controller
{

    private $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function authenticated(){
        $userId = Authorizer::getResourceOwnerId();
        return $this->userRepository->find($userId);
    }
    
}
