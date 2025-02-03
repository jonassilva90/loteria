<?php

namespace Loteria\Controller;

use Klein\Response;
use Loteria\Lib\Controller;
use Loteria\Lib\Auth;
use Loteria\Lib\AuthException;

class LoginController extends Controller
{
    public function login(): Response
    {
        try {
            $username = $this->request->username;
            $password = $this->request->password;

            $username = is_null($username) ? '' : trim($username);
            $password = is_null($password) ? '' : $password;

            Auth::login($username, $password);
            return $this->response->redirect('/');
        } catch (AuthException $th) {
            return $this->onError(400,
                $th,
                'login',
                [
                    'error' => $th->getMessage()
                ]);
        } catch (\Throwable $th) {
            return $this->onError(500, $th, 'login', [
                'error' => "Erro desconhecido",
                'code' => $th->getMessage(),
                'message' => $th->getMessage()
            ]);
        }
    }
}