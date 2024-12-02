<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UsersAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Periksa apakah pengguna mengakses halaman registrasi
        // if ($request->uri->getPath() === 'register') {
        //     // Jika pengguna mengakses halaman registrasi, lewati filter
        //     return;
        // }

        // Periksa apakah pengguna sudah login
        if (is_null(session()->get('logged_in'))) {
            // Jika pengguna belum login, arahkan ke halaman login
            return redirect()->to(base_url('login/index'));
        }

    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}