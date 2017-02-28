<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary;

use Zibios\WrikePhpLibrary\Traits\AssertIsValidBearerToken;
use Zibios\WrikePhpLibrary\Transformer\ApiExceptionTransformerInterface;
use Zibios\WrikePhpLibrary\Transformer\ResponseTransformerInterface;

/**
 * General Wrike Api.
 *
 * Entry point for all Wrike API operations.
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class Api extends AbstractApi implements MutableApiInterface
{
    use AssertIsValidBearerToken;

    /**
     * @param string $bearerToken
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function setBearerToken($bearerToken)
    {
        $this->assertIsValidBearerToken($bearerToken);
        $this->bearerToken = $bearerToken;

        return $this;
    }

    /**
     * @param ApiExceptionTransformerInterface $apiExceptionTransformer
     *
     * @return $this
     */
    public function setApiExceptionTransformer(ApiExceptionTransformerInterface $apiExceptionTransformer)
    {
        $this->apiExceptionTransformer = $apiExceptionTransformer;

        return $this;
    }

    /**
     * @param ResponseTransformerInterface $responseTransformer
     *
     * @return $this
     */
    public function setResponseTransformer(ResponseTransformerInterface $responseTransformer)
    {
        $this->responseTransformer = $responseTransformer;

        return $this;
    }
}
