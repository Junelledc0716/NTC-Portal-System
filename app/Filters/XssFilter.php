<?php
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class XssFilter implements FilterInterface {
    public function before(RequestInterface $request, $arguments = null) {
        if ($request->is('post')) {
            $post = $request->getPost();
            array_walk_recursive($post, function(&$value) {
                $value = esc($value, 'html');
            });
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
        return $response;
    }
}