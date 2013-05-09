<?php

/**
 *  This controller is called when a token is being requested.
 *  it is called to handle all grant types the application supports.
 *  It also validates the client's credentials
 *
 *  ex:
 *  > $response = $tokenController->handleTokenRequest(OAuth2_Request::createFromGlobals());
 *  > $response->send();
 *
 */
interface OAuth2_Controller_TokenControllerInterface
{
    /**
     * handleTokenRequest
     *
     * @param $request
     * OAuth2_RequestInterface - The current http request
     *
     **/
    public function handleTokenRequest(OAuth2_RequestInterface $request, OAuth2_ResponseInterface $response);

    public function grantAccessToken(OAuth2_RequestInterface $request, OAuth2_ResponseInterface $response);
}
