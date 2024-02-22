
# Custom Header Signature



Documentation for accessing and setting credentials for api_key.

## Auth Credentials

| Name | Type | Description | Setter | Getter |
|  --- | --- | --- | --- | --- |
| api_key | `string` | - | `apiKey` | `getApiKey()` |



**Note:** Auth credentials can be set using `ApiKeyCredentialsBuilder::init()` in `apiKeyCredentials` method in the client builder and accessed through `getApiKeyCredentials` method in the client instance.

## Usage Example

### Client Initialization

You must provide credentials in the client as shown in the following code snippet.

```php
$client = MichelinDevPetstoreClientBuilder::init()
    ->apiKeyCredentials(
        ApiKeyCredentialsBuilder::init(
            'api_key'
        )
    )
    ->build();
```


