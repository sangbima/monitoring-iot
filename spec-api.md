# SPEC API FOR Monitoring

## Register Device

> Register a new device to the monitoring system. This is typically done by an IoT agent, such as a smartphone app or a gateway device

### Information

| Path   | :   | /api/register |
| ------ | --- | ------------- |
| Method | :   | POST          |
| Format | :   | JSON          |

### HTTP Headers

**Content-Type: application/json**

### Request Body

```json
{
  "sn": "SNxxx12345"
}
```

| Field | Data Type | Mandatory |
| ----- | :-------: | --------: |
| sn    |  String   |       Yes |

### Response Success

```json
{
  "status": "ok",
  "token": "xxxx",
  "expired": 3600
}
```

| Field   |  Type   | Description              |
| ------- | :-----: | ------------------------ |
| status  | String  | Status request           |
| token   | String  | Token for authentication |
| expired | Numeric | Token expired            |

### Response Failed

```json
{
  "status": "failed"
}
```

## Send Data

> Send data monitoring to backend
>
> _Format of data field will be discussed later_

### Information

| Path   | :   | /api/send-data-monitoring |
| ------ | --- | ------------------------- |
| Method | :   | POST                      |
| Format | :   | JSON                      |

### HTTP Headers

|               |                  | Mandatory |
| ------------- | ---------------- | :-------: |
| Content-Type  | application/json |    Yes    |
| Authorization | Bearer Token     |    Yes    |

### Request Body

```json
{
  "sn": "SNxxx12345",
  "data": {
    "temp": [50, 100],
    "humidity": 90,
    "speed": 100,
    "electrical": on
  }
}
```

| Field | Data Type | Mandatory |
| ----- | :-------: | --------- |
| sn    |  String   | Yes       |
| token |  String   | Yes       |
| data  |  Object   | Yes       |

### Response Success

```json
{
  "status": "ok"
}
```

| Field  |  Type  | Description    |
| ------ | :----: | -------------- |
| status | String | Status request |

### Response Failed

```json
{
  "status": "failed"
}
```
