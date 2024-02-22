<?php

declare(strict_types=1);

/*
 * MichelinDevPetstore
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace MichelinDevPetstoreLib\Models;

use Core\Utils\CoreHelper;
use Exception;
use stdClass;

/**
 * OAuth 2 Authorization error codes
 */
class OAuthProviderErrorEnum
{
    /**
     * The request is missing a required parameter, includes an unsupported parameter value (other than
     * grant type), repeats a parameter, includes multiple credentials, utilizes more than one mechanism
     * for authenticating the client, or is otherwise malformed.
     */
    public const INVALID_REQUEST = 'invalid_request';

    /**
     * Client authentication failed (e.g., unknown client, no client authentication included, or
     * unsupported authentication method).
     */
    public const INVALID_CLIENT = 'invalid_client';

    /**
     * The provided authorization grant (e.g., authorization code, resource owner credentials) or refresh
     * token is invalid, expired, revoked, does not match the redirection URI used in the authorization
     * request, or was issued to another client.
     */
    public const INVALID_GRANT = 'invalid_grant';

    /**
     * The authenticated client is not authorized to use this authorization grant type.
     */
    public const UNAUTHORIZED_CLIENT = 'unauthorized_client';

    /**
     * The authorization grant type is not supported by the authorization server.
     */
    public const UNSUPPORTED_GRANT_TYPE = 'unsupported_grant_type';

    /**
     * The requested scope is invalid, unknown, malformed, or exceeds the scope granted by the resource
     * owner.
     */
    public const INVALID_SCOPE = 'invalid_scope';

    private const _ALL_VALUES = [
        self::INVALID_REQUEST,
        self::INVALID_CLIENT,
        self::INVALID_GRANT,
        self::UNAUTHORIZED_CLIENT,
        self::UNSUPPORTED_GRANT_TYPE,
        self::INVALID_SCOPE
    ];

    /**
     * Ensures that all the given values are present in this Enum.
     *
     * @param array|stdClass|null|string $value Value or a list/map of values to be checked
     *
     * @return array|null|string Input value(s), if all are a part of this Enum
     *
     * @throws Exception Throws exception if any given value is not in this Enum
     */
    public static function checkValue($value)
    {
        $value = json_decode(json_encode($value), true); // converts stdClass into array
        if (CoreHelper::checkValueOrValuesInList($value, self::_ALL_VALUES)) {
            return $value;
        }
        throw new Exception("$value is invalid for OAuthProviderErrorEnum.");
    }
}