# Pet

Everything about your Pets

Find out more: [http://swagger.io](http://swagger.io)

```php
$petController = $client->getPetController();
```

## Class Name

`PetController`

## Methods

* [Update Pet](../../doc/controllers/pet.md#update-pet)
* [Add Pet](../../doc/controllers/pet.md#add-pet)
* [Find Pets by Status](../../doc/controllers/pet.md#find-pets-by-status)
* [Find Pets by Tags](../../doc/controllers/pet.md#find-pets-by-tags)
* [Get Pet by Id](../../doc/controllers/pet.md#get-pet-by-id)
* [Update Pet With Form](../../doc/controllers/pet.md#update-pet-with-form)
* [Delete Pet](../../doc/controllers/pet.md#delete-pet)
* [Upload File](../../doc/controllers/pet.md#upload-file)


# Update Pet

Update an existing pet by Id

```php
function updatePet(
    string $name,
    array $photoUrls,
    ?int $id = null,
    ?Category $category = null,
    ?array $tags = null,
    ?string $status = null
): Pet
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `name` | `string` | Form, Required | - |
| `photoUrls` | `string[]` | Form, Required | - |
| `id` | `?int` | Form, Optional | - |
| `category` | [`?Category`](../../doc/models/category.md) | Form, Optional | - |
| `tags` | [`?(Tag[])`](../../doc/models/tag.md) | Form, Optional | - |
| `status` | [`?string(Status1Enum)`](../../doc/models/status-1-enum.md) | Form, Optional | pet status in the store |

## Requires scope

### petstore_auth

`read:pets`, `write:pets`

## Response Type

[`Pet`](../../doc/models/pet.md)

## Example Usage

```php
$name = 'doggie';

$photoUrls = [
    'photoUrls5',
    'photoUrls6',
    'photoUrls7'
];

$id = 10;

$tags = [
    TagBuilder::init()->build()
];

$result = $petController->updatePet(
    $name,
    $photoUrls,
    $id,
    null,
    $tags
);
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 400 | Invalid ID supplied | `ApiException` |
| 404 | Pet not found | `ApiException` |
| 405 | Validation exception | `ApiException` |


# Add Pet

Add a new pet to the store

```php
function addPet(
    string $name,
    array $photoUrls,
    ?int $id = null,
    ?Category $category = null,
    ?array $tags = null,
    ?string $status = null
): Pet
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `name` | `string` | Form, Required | - |
| `photoUrls` | `string[]` | Form, Required | - |
| `id` | `?int` | Form, Optional | - |
| `category` | [`?Category`](../../doc/models/category.md) | Form, Optional | - |
| `tags` | [`?(Tag[])`](../../doc/models/tag.md) | Form, Optional | - |
| `status` | [`?string(Status1Enum)`](../../doc/models/status-1-enum.md) | Form, Optional | pet status in the store |

## Requires scope

### petstore_auth

`read:pets`, `write:pets`

## Response Type

[`Pet`](../../doc/models/pet.md)

## Example Usage

```php
$name = 'doggie';

$photoUrls = [
    'photoUrls5',
    'photoUrls6',
    'photoUrls7'
];

$id = 10;

$tags = [
    TagBuilder::init()->build()
];

$result = $petController->addPet(
    $name,
    $photoUrls,
    $id,
    null,
    $tags
);
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 405 | Invalid input | `ApiException` |


# Find Pets by Status

Multiple status values can be provided with comma separated strings

```php
function findPetsByStatus(?string $status = Status2Enum::AVAILABLE): array
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `status` | [`?string(Status2Enum)`](../../doc/models/status-2-enum.md) | Query, Optional | Status values that need to be considered for filter |

## Requires scope

### petstore_auth

`read:pets`, `write:pets`

## Response Type

[`Pet[]`](../../doc/models/pet.md)

## Example Usage

```php
$status = Status2Enum::AVAILABLE;

$result = $petController->findPetsByStatus($status);
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 400 | Invalid status value | `ApiException` |


# Find Pets by Tags

Multiple tags can be provided with comma separated strings. Use tag1, tag2, tag3 for testing.

```php
function findPetsByTags(?array $tags = null): array
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `tags` | `?(string[])` | Query, Optional | Tags to filter by |

## Requires scope

### petstore_auth

`read:pets`, `write:pets`

## Response Type

[`Pet[]`](../../doc/models/pet.md)

## Example Usage

```php
$result = $petController->findPetsByTags();
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 400 | Invalid tag value | `ApiException` |


# Get Pet by Id

Returns a single pet

```php
function getPetById(int $petId): Pet
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `petId` | `int` | Template, Required | ID of pet to return |

## Requires scope

### petstore_auth

`read:pets`, `write:pets`

## Response Type

[`Pet`](../../doc/models/pet.md)

## Example Usage

```php
$petId = 152;

$result = $petController->getPetById($petId);
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 400 | Invalid ID supplied | `ApiException` |
| 404 | Pet not found | `ApiException` |


# Update Pet With Form

```php
function updatePetWithForm(int $petId, ?string $name = null, ?string $status = null): void
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `petId` | `int` | Template, Required | ID of pet that needs to be updated |
| `name` | `?string` | Query, Optional | Name of pet that needs to be updated |
| `status` | `?string` | Query, Optional | Status of pet that needs to be updated |

## Requires scope

### petstore_auth

`read:pets`, `write:pets`

## Response Type

`void`

## Example Usage

```php
$petId = 152;

$petController->updatePetWithForm($petId);
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 405 | Invalid input | `ApiException` |


# Delete Pet

```php
function deletePet(int $petId, ?string $apiKey = null): void
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `petId` | `int` | Template, Required | Pet id to delete |
| `apiKey` | `?string` | Header, Optional | - |

## Requires scope

### petstore_auth

`read:pets`, `write:pets`

## Response Type

`void`

## Example Usage

```php
$petId = 152;

$petController->deletePet($petId);
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 400 | Invalid pet value | `ApiException` |


# Upload File

```php
function uploadFile(int $petId, ?string $additionalMetadata = null, ?FileWrapper $body = null): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `petId` | `int` | Template, Required | ID of pet to update |
| `additionalMetadata` | `?string` | Query, Optional | Additional Metadata |
| `body` | `?FileWrapper` | Form, Optional | - |

## Requires scope

### petstore_auth

`read:pets`, `write:pets`

## Response Type

[`ApiResponse`](../../doc/models/api-response.md)

## Example Usage

```php
$petId = 152;

$result = $petController->uploadFile($petId);
```

