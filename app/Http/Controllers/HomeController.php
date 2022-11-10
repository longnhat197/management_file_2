<?php

namespace App\Http\Controllers;

use App\Services\Contractor\ContractorServiceInterface;
use App\Services\Customer\CustomerServiceInterface;
use App\Services\File\FileServiceInterface;
use App\Services\ListUser\ListUserServiceInterface;
use App\Services\Package\PackageServiceInterface;
use App\Services\Project\ProjectServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $fileService;
    private $contractorService;
    private $projectService;
    private $customerService;
    private $packageService;
    private $listUserService;
    public function __construct(
        FileServiceInterface $fileService,
        ContractorServiceInterface $contractorService,
        ProjectServiceInterface $projectService,
        CustomerServiceInterface $customerService,
        PackageServiceInterface $packageService,
        ListUserServiceInterface $listUserService
    ) {
        $this->fileService = $fileService;
        $this->contractorService = $contractorService;
        $this->projectService = $projectService;
        $this->customerService = $customerService;
        $this->packageService = $packageService;
        $this->listUserService = $listUserService;
    }
    public function getLogin()
    {
        return view('login');
    }
    public function postLogin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $remember = $request->remember;
        if (Auth::attempt($credentials, $remember)) {
            return redirect('home'); // Mặc định vào trang quản lý file
        } else {
            return back()->with('notification', 'ERROR: Email or password is incorrect');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function index()
    {
        $files = $this->fileService->all();
        $contractors = $this->contractorService->all();
        $projects = $this->projectService->all();
        $customers = $this->customerService->all();
        $packages = $this->packageService->all();
        $listUsers = $this->listUserService->all();
        return view('home.index', compact('files', 'contractors', 'projects', 'customers', 'packages','listUsers'));
    }
}
