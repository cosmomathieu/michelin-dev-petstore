
# Pet

## Structure

`Pet`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?int` | Optional | - | getId(): ?int | setId(?int id): void |
| `name` | `string` | Required | - | getName(): string | setName(string name): void |
| `category` | [`?Category`](../../doc/models/category.md) | Optional | - | getCategory(): ?Category | setCategory(?Category category): void |
| `photoUrls` | `string[]` | Required | - | getPhotoUrls(): array | setPhotoUrls(array photoUrls): void |
| `tags` | [`?(Tag[])`](../../doc/models/tag.md) | Optional | - | getTags(): ?array | setTags(?array tags): void |
| `status` | [`?string(Status1Enum)`](../../doc/models/status-1-enum.md) | Optional | pet status in the store | getStatus(): ?string | setStatus(?string status): void |

## Example (as XML)

```xml
<pet>
  <id>120</id>
  <name>name0</name>
  <category>
    <id>232</id>
    <name>name2</name>
  </category>
  <photoUrls>
    <photoUrl>photoUrls5</photoUrl>
    <photoUrl>photoUrls6</photoUrl>
  </photoUrls>
  <tags>
    <tags>
      <id>26</id>
      <name>name0</name>
    </tags>
  </tags>
  <status>available</status>
</pet>
```

