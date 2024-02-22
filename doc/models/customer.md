
# Customer

## Structure

`Customer`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?int` | Optional | - | getId(): ?int | setId(?int id): void |
| `username` | `?string` | Optional | - | getUsername(): ?string | setUsername(?string username): void |
| `address` | [`?(Address[])`](../../doc/models/address.md) | Optional | - | getAddress(): ?array | setAddress(?array address): void |

## Example (as JSON)

```json
{
  "id": 12,
  "username": "username2",
  "address": [
    {
      "street": "street6",
      "city": "city6",
      "state": "state2",
      "zip": "zip0"
    },
    {
      "street": "street6",
      "city": "city6",
      "state": "state2",
      "zip": "zip0"
    },
    {
      "street": "street6",
      "city": "city6",
      "state": "state2",
      "zip": "zip0"
    }
  ]
}
```

