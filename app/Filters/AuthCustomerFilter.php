<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthCustomerFilter implements FilterInterface
{
public function before(RequestInterface $request, $arguments = null)
{
$session = session();
if ($session->get('role') !== 'customer') {
return redirect()->to('/login'); // Arahkan kembali ke login jika bukan customer
}
}

public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
{
// Tidak ada logika tambahan setelah response
}
}