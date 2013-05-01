<?php

class OAuth2_GrantType_ClientCredentials implements OAuth2_GrantTypeInterface
{
    public function getQuerystringIdentifier()
    {
        return 'client_credentials';
    }

    public function getTokenDataFromRequest(OAuth2_RequestInterface $request, array $clientData)
    {
        // the only piece to pull is the "scope" parameter
        $scope = $request->request('scope');
        return array(
            "scope" => $scope
        );
    }

    public function createAccessToken(OAuth2_ResponseType_AccessTokenInterface $accessToken, array $clientData, array $tokenData)
    {
        /*
         * Client Credentials Grant does NOT include a refresh token
         * @see http://tools.ietf.org/html/rfc6749#section-4.4.3
         */
        $includeRefreshToken = false;
        return $accessToken->createAccessToken($clientData['client_id'], $tokenData['user_id'], $tokenData['scope'], $includeRefreshToken);
    }
}
