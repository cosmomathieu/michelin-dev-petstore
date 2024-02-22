# Store

Access to Petstore orders

Find out more about our store: [http://swagger.io](http://swagger.io)

```php
$storeController = $client->getStoreController();
```

## Class Name

`StoreController`

## Methods

* [Get Inventory](../../doc/controllers/store.md#get-inventory)
* [Place Order](../../doc/controllers/store.md#place-order)
* [Get Order by Id](../../doc/controllers/store.md#get-order-by-id)
* [Delete Order](../../doc/controllers/store.md#delete-order)


# Get Inventory

Returns a map of status codes to quantities

```php
function getInventory(): array
```

## Response Type

`array<string,int>`

## Example Usage

```php
$result = $storeController->getInventory();
```


# Place Order

Place a new order in the store

:information_source: **Note** This endpoint does not require authentication.

```php
function placeOrder(
    ?int $id = null,
    ?int $petId = null,
    ?int $quantity = null,
    ?\DateTime $shipDate = null,
    ?string $status = null,
    ?bool $complete = null
): Order
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `id` | `?int` | Form, Optional | - |
| `petId` | `?int` | Form, Optional | - |
| `quantity` | `?int` | Form, Optional | - |
| `shipDate` | `?DateTime` | Form, Optional | - |
| `status` | [`?string(StatusEnum)`](../../doc/models/status-enum.md) | Form, Optional | Order Status |
| `complete` | `?bool` | Form, Optional | - |

## Response Type

[`Order`](../../doc/models/order.md)

## Example Usage

```php
$id = 10;

$petId = 198772;

$quantity = 7;

$result = $storeController->placeOrder(
    $id,
    $petId,
    $quantity
);
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 405 | Invalid input | `ApiException` |


# Get Order by Id

For valid response try integer IDs with value <= 5 or > 10. Other values will generate exceptions.

:information_source: **Note** This endpoint does not require authentication.

```php
function getOrderById(int $orderId): Order
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `orderId` | `int` | Template, Required | ID of order that needs to be fetched |

## Response Type

[`Order`](../../doc/models/order.md)

## Example Usage

```php
$orderId = 62;

$result = $storeController->getOrderById($orderId);
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 400 | Invalid ID supplied | `ApiException` |
| 404 | Order not found | `ApiException` |


# Delete Order

For valid response try integer IDs with value < 1000. Anything above 1000 or nonintegers will generate API errors

:information_source: **Note** This endpoint does not require authentication.

```php
function deleteOrder(int $orderId): void
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `orderId` | `int` | Template, Required | ID of the order that needs to be deleted |

## Response Type

`void`

## Example Usage

```php
$orderId = 62;

$storeController->deleteOrder($orderId);
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 400 | Invalid ID supplied | `ApiException` |
| 404 | Order not found | `ApiException` |

