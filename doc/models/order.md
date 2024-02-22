
# Order

## Structure

`Order`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?int` | Optional | - | getId(): ?int | setId(?int id): void |
| `petId` | `?int` | Optional | - | getPetId(): ?int | setPetId(?int petId): void |
| `quantity` | `?int` | Optional | - | getQuantity(): ?int | setQuantity(?int quantity): void |
| `shipDate` | `?DateTime` | Optional | - | getShipDate(): ?\DateTime | setShipDate(?\DateTime shipDate): void |
| `status` | [`?string(StatusEnum)`](../../doc/models/status-enum.md) | Optional | Order Status | getStatus(): ?string | setStatus(?string status): void |
| `complete` | `?bool` | Optional | - | getComplete(): ?bool | setComplete(?bool complete): void |

## Example (as XML)

```xml
<order>
  <id>180</id>
  <petId>220</petId>
  <quantity>136</quantity>
  <shipDate>2016-03-13T12:52:32.123Z</shipDate>
  <status>placed</status>
</order>
```

