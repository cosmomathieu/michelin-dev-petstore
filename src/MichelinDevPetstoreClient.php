<?php

declare(strict_types=1);

/*
 * MichelinDevPetstore
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace MichelinDevPetstoreLib;

use Core\ClientBuilder;
use Core\Utils\CoreHelper;
use MichelinDevPetstoreLib\Authentication\ApiKeyCredentials;
use MichelinDevPetstoreLib\Authentication\ApiKeyCredentialsBuilder;
use MichelinDevPetstoreLib\Authentication\ApiKeyManager;
use MichelinDevPetstoreLib\Authentication\PetstoreAuthCredentials;
use MichelinDevPetstoreLib\Authentication\PetstoreAuthCredentialsBuilder;
use MichelinDevPetstoreLib\Authentication\PetstoreAuthManager;
use MichelinDevPetstoreLib\Controllers\PetController;
use MichelinDevPetstoreLib\Controllers\StoreController;
use MichelinDevPetstoreLib\Controllers\UserController;
use MichelinDevPetstoreLib\Utils\CompatibilityConverter;
use Unirest\Configuration;
use Unirest\HttpClient;

class MichelinDevPetstoreClient implements ConfigurationInterface
{
    private $pet;

    private $store;

    private $user;

    private $petstoreAuthManager;

    private $apiKeyManager;

    private $config;

    private $client;

    /**
     * @see MichelinDevPetstoreClientBuilder::init()
     * @see MichelinDevPetstoreClientBuilder::build()
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = array_merge(ConfigurationDefaults::_ALL, CoreHelper::clone($config));
        $this->petstoreAuthManager = new PetstoreAuthManager(
            $this->config['oAuthClientId'] ?? ConfigurationDefaults::O_AUTH_CLIENT_ID,
            $this->config['oAuthRedirectUri'] ?? ConfigurationDefaults::O_AUTH_REDIRECT_URI,
            $this->config['oAuthToken'],
            $this->config['oAuthScopes']
        );
        $this->apiKeyManager = new ApiKeyManager($this->config['apiKey'] ?? ConfigurationDefaults::API_KEY);
        $this->validateConfig();
        $this->client = ClientBuilder::init(new HttpClient(Configuration::init($this)))
            ->converter(new CompatibilityConverter())
            ->jsonHelper(ApiHelper::getJsonHelper())
            ->apiCallback($this->config['httpCallback'] ?? null)
            ->userAgent('APIMATIC 3.0')
            ->serverUrls(self::ENVIRONMENT_MAP[$this->getEnvironment()], Server::DEFAULT_)
            ->authManagers(['petstore_auth' => $this->petstoreAuthManager, 'api_key' => $this->apiKeyManager])
            ->build();
        $this->petstoreAuthManager->setClient($this->client);
    }

    /**
     * Create a builder with the current client's configurations.
     *
     * @return MichelinDevPetstoreClientBuilder MichelinDevPetstoreClientBuilder instance
     */
    public function toBuilder(): MichelinDevPetstoreClientBuilder
    {
        $builder = MichelinDevPetstoreClientBuilder::init()
            ->timeout($this->getTimeout())
            ->enableRetries($this->shouldEnableRetries())
            ->numberOfRetries($this->getNumberOfRetries())
            ->retryInterval($this->getRetryInterval())
            ->backOffFactor($this->getBackOffFactor())
            ->maximumRetryWaitTime($this->getMaximumRetryWaitTime())
            ->retryOnTimeout($this->shouldRetryOnTimeout())
            ->httpStatusCodesToRetry($this->getHttpStatusCodesToRetry())
            ->httpMethodsToRetry($this->getHttpMethodsToRetry())
            ->environment($this->getEnvironment())
            ->httpCallback($this->config['httpCallback'] ?? null);

        $petstoreAuth = $this->getPetstoreAuthCredentialsBuilder();
        if ($petstoreAuth != null) {
            $builder->petstoreAuthCredentials($petstoreAuth);
        }

        $apiKey = $this->getApiKeyCredentialsBuilder();
        if ($apiKey != null) {
            $builder->apiKeyCredentials($apiKey);
        }
        return $builder;
    }

    public function getTimeout(): int
    {
        return $this->config['timeout'] ?? ConfigurationDefaults::TIMEOUT;
    }

    public function shouldEnableRetries(): bool
    {
        return $this->config['enableRetries'] ?? ConfigurationDefaults::ENABLE_RETRIES;
    }

    public function getNumberOfRetries(): int
    {
        return $this->config['numberOfRetries'] ?? ConfigurationDefaults::NUMBER_OF_RETRIES;
    }

    public function getRetryInterval(): float
    {
        return $this->config['retryInterval'] ?? ConfigurationDefaults::RETRY_INTERVAL;
    }

    public function getBackOffFactor(): float
    {
        return $this->config['backOffFactor'] ?? ConfigurationDefaults::BACK_OFF_FACTOR;
    }

    public function getMaximumRetryWaitTime(): int
    {
        return $this->config['maximumRetryWaitTime'] ?? ConfigurationDefaults::MAXIMUM_RETRY_WAIT_TIME;
    }

    public function shouldRetryOnTimeout(): bool
    {
        return $this->config['retryOnTimeout'] ?? ConfigurationDefaults::RETRY_ON_TIMEOUT;
    }

    public function getHttpStatusCodesToRetry(): array
    {
        return $this->config['httpStatusCodesToRetry'] ?? ConfigurationDefaults::HTTP_STATUS_CODES_TO_RETRY;
    }

    public function getHttpMethodsToRetry(): array
    {
        return $this->config['httpMethodsToRetry'] ?? ConfigurationDefaults::HTTP_METHODS_TO_RETRY;
    }

    public function getEnvironment(): string
    {
        return $this->config['environment'] ?? ConfigurationDefaults::ENVIRONMENT;
    }

    public function getPetstoreAuthCredentials(): PetstoreAuthCredentials
    {
        return $this->petstoreAuthManager;
    }

    public function getPetstoreAuthCredentialsBuilder(): ?PetstoreAuthCredentialsBuilder
    {
        if (
            empty($this->petstoreAuthManager->getOAuthClientId()) &&
            empty($this->petstoreAuthManager->getOAuthRedirectUri())
        ) {
            return null;
        }
        return PetstoreAuthCredentialsBuilder::init(
            $this->petstoreAuthManager->getOAuthClientId(),
            $this->petstoreAuthManager->getOAuthRedirectUri()
        )
            ->oAuthToken($this->petstoreAuthManager->getOAuthToken())
            ->oAuthScopes($this->petstoreAuthManager->getOAuthScopes());
    }

    public function getApiKeyCredentials(): ApiKeyCredentials
    {
        return $this->apiKeyManager;
    }

    public function getApiKeyCredentialsBuilder(): ?ApiKeyCredentialsBuilder
    {
        if (empty($this->apiKeyManager->getApiKey())) {
            return null;
        }
        return ApiKeyCredentialsBuilder::init($this->apiKeyManager->getApiKey());
    }

    /**
     * Get the client configuration as an associative array
     *
     * @see MichelinDevPetstoreClientBuilder::getConfiguration()
     */
    public function getConfiguration(): array
    {
        return $this->toBuilder()->getConfiguration();
    }

    /**
     * Clone this client and override given configuration options
     *
     * @see MichelinDevPetstoreClientBuilder::build()
     */
    public function withConfiguration(array $config): self
    {
        return new self(array_merge($this->config, $config));
    }

    /**
     * Validate required configuration variables
     */
    private function validateConfig(): void
    {
        $builder = MichelinDevPetstoreClientBuilder::init();

        $petstoreAuth = $this->getPetstoreAuthCredentialsBuilder();
        if ($petstoreAuth != null) {
            $builder->petstoreAuthCredentials($petstoreAuth);
        }
    }

    /**
     * Get the base uri for a given server in the current environment.
     *
     * @param string $server Server name
     *
     * @return string Base URI
     */
    public function getBaseUri(string $server = Server::DEFAULT_): string
    {
        return $this->client->getGlobalRequest($server)->getQueryUrl();
    }

    /**
     * Returns Pet Controller
     */
    public function getPetController(): PetController
    {
        if ($this->pet == null) {
            $this->pet = new PetController($this->client);
        }
        return $this->pet;
    }

    /**
     * Returns Store Controller
     */
    public function getStoreController(): StoreController
    {
        if ($this->store == null) {
            $this->store = new StoreController($this->client);
        }
        return $this->store;
    }

    /**
     * Returns User Controller
     */
    public function getUserController(): UserController
    {
        if ($this->user == null) {
            $this->user = new UserController($this->client);
        }
        return $this->user;
    }

    /**
     * A map of all base urls used in different environments and servers
     *
     * @var array
     */
    private const ENVIRONMENT_MAP = [
        Environment::PRODUCTION => [
            Server::DEFAULT_ => 'http://petstore.swagger.io/api/v3',
            Server::AUTH_SERVER => 'https://petstore3.swagger.io/oauth'
        ]
    ];
}