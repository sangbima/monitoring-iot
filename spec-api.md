Request:

POST /api/register

```json
{
  "sn": "SNxxx12345"
}
```

Response ("success"):

```json
{
  "status": "OK",
  "token": "xxxx",
  "expired": 3600
}
```

Response ("failed"):

```json
{
  "status": "failed"
}
```

Request:

POST /api/collect

```json
{
    "sn": "SNxxx12345",
    "token": "xxxxx",
    "data": {
        "suhu": [50, 100],
        "humidity": 90,
        "speed": 100
        "electrical": on
    }
}
```

Response ("success"):

```json
{
  "status": "OK"
}
```

Response ("failed"):

```json
{
  "status": "failed"
}
```
