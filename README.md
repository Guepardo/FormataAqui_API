# FormataAqui Documentação das APIs para o sistema e aplicativo.  

## Documentação para a API do aplicativo
## Usuário
### POST \u\register
Parâmetro:
```js
{
    "nome": "Allyson", 
    "telefone": "910178783", 
    "senha": "master", 
    "senha_confirmation": "master"
}
```
Exemplo de saída:
```js
{status : true }
```
Em caso de erro: 

```js
{
  "telefone": [
    "The telefone has already been taken."
  ]
}
```
### POST \u\getMe
Parâmetro:
```js
{
  "api_key" : "EAACEdEose0cBAOSjzYkeXcvDmT3olzZAROeXYAYs2PRsTz4MtGjfYFqvpviPRpgw4AZCvkxZBNZBeTvzoqRywvNPHwD8cBXPclNVLQSN3WOe8L1GZCdEwecZCqeiB9fb7bUtEWTr0OcV047uzaOJ6R7KqElOOisgaU69EIqZC7DaAZDZD"
}
```
Exemplo de saída:
```js
{
  "id": 10,
  "nome": "Allysom Maciel Guimaraes",
  "telefone": "91017378",
  "api_key": null,
  "senha": null,
  "created_at": "2016-09-18 06:41:27",
  "updated_at": "2016-09-18 08:39:27",
  "facebook_id": "4882048145656",
  "email": "bsinet@hotmail.com"
}
```

### POST \u\update
Parâmetro:
```js
{
  "api_key" : "EAACEdEose0cBAOSjzYkeXcvDmT3olzZAROeXYAYs2PRsTz4MtGjfYFqvpviPRpgw4AZCvkxZBNZBeTvzoqRywvNPHwD8cBXPclNVLQSN3WOe8L1GZCdEwecZCqeiB9fb7bUtEWTr0OcV047uzaOJ6R7KqElOOisgaU69EIqZC7DaAZDZD", 
  "telefone" : "91017378"
}
```
Exemplo de saída:
```js
{"status" : true}
```

### POST \u\login
Parâmetro:
```js
{
    "telefone": "910178783", 
    "senha": "master"
}
```
Exemplo de saída:
```js
{
  "status": true,
  "msg": {
    "api_key": "EAACEdEose0cBAPJ9giastHdbB1EGgyENEtOFUeKTOIHcuILbklPQdru5rekiw7537Ds1SpLoSLECh5sdgTiCUZCyKXIsVRvIOqDluMG5CvjJzSJ7ZBlURrvZCoWpMGAWUjBG3QmYAZCJXs9guHSA7V0zyKr2ztSaCaCBCNZByQjAZDZa"
  }
}
```
Em caso de erro: 

```js
{
  "status": false
} 
```


## Serviço
### POST \s\order
Parâmetro com geoposicionamento: 
```js
{
    "api_key": "EAACEdEose0cBAPJ9giastHdbB1EGgyENEtOFUeKTOIHcuILbklPQdru5rekiw7537Ds1SpLoSLECh5sdgTiCUZCyKXIsVRvIOqDluMG5CvjJzSJ7ZBlURrvZCoWpMGAWUjBG3QmYAZCJXs9guHSA7V0zyKr2ztSaCaCBCNZByQjAZDZa", 
    "complemento": "rua 9", 
    "latitude": "10000", 
    "longitude": "100000", 
    "geoposicionada": 1, 
    "data_visita": "2016-08-08", 
    "hora_visita": "8:00"
}
```

Parâmetro sem geoposicionamento: 
```js
{
    "api_key": "EAACEdEose0cBAPJ9giastHdbB1EGgyENEtOFUeKTOIHcuILbklPQdru5rekiw7537Ds1SpLoSLECh5sdgTiCUZCyKXIsVRvIOqDluMG5CvjJzSJ7ZBlURrvZCoWpMGAWUjBG3QmYAZCJXs9guHSA7V0zyKr2ztSaCaCBCNZByQjAZDZa", 
    "complemento": "rua 9", 
    "latitude": "10000", 
    "longitude": "100000", 
    "geoposicionada": 0, 
    "cep": "7500000", 
    "numero": "12", 
    "bairro": "Exemplo Bairro", 
    "rua"   : "nadas", 
    "cidade_id": 5, 
    "data_visita": "2016-08-08", 
    "hora_visita": "8:00"
}
```

Exemplo de saída:
```js
{
  "status": true
}
```

Em caso de erro:
```js
{
  "data_visita": [
    "The data visita field is required."
  ]
}
}
```

### POST \s\getAll
Parâmetro:
```js
{
  "api_key" : "EAACEdEose0cBAPJ9giastHdbB1EGgyENEtOFUeKTOIHcuILbklPQdru5rekiw7537Ds1SpLoSLECh5sdgTiCUZCyKXIsVRvIOqDluMG5CvjJzSJ7ZBlURrvZCoWpMGAWUjBG3QmYAZCJXs9guHSA7V0zyKr2ztSaCaCBCNZByQjAZDZa"
}
```

Exemplo de saída: (retorna as últimas 15)
```js
{
  "status": true,
  "msg": [
    {
      "id": 10,
      "complemento": "rua 9",
      "latitude": 10000,
      "longitude": 100000,
      "usuario_id": 1,
      "aberto": 1,
      "created_at": "2016-08-24 18:49:53",
      "updated_at": "2016-08-24 18:49:53",
      "cep": null,
      "bairro": null,
      "rua": null,
      "cidade_id": 3,
      "geoposicionada": 1,
      "data_visita": "2016-08-08",
      "hora_visita": "8:00"
    },
    {
      "id": 9,
      "complemento": "12",
      "latitude": -1,
      "longitude": -1,
      "usuario_id": 1,
      "aberto": 0,
      "created_at": "2016-08-24 18:47:36",
      "updated_at": "2016-08-24 18:49:53",
      "cep": "7500000",
      "bairro": "Exemplo Bairro",
      "rua": "nadas",
      "cidade_id": 5,
      "geoposicionada": 0,
      "data_visita": "2016-08-08",
      "hora_visita": "8:00"
    }
  ]
}
```

### POST \s\getActiveOrder
Parâmetro:
```js
{
  "api_key" : "EAACEdEose0cBAPJ9giastHdbB1EGgyENEtOFUeKTOIHcuILbklPQdru5rekiw7537Ds1SpLoSLECh5sdgTiCUZCyKXIsVRvIOqDluMG5CvjJzSJ7ZBlURrvZCoWpMGAWUjBG3QmYAZCJXs9guHSA7V0zyKr2ztSaCaCBCNZByQjAZDZa"
}
```

Exemplo de saída:
```js
{
  "status": true,
  "msg": {
    "id": 27,
    "complemento": "rua 9",
    "latitude": 10000,
    "longitude": 100000,
    "usuario_id": 10,
    "aberto": 1,
    "created_at": "2016-09-18 06:55:52",
    "updated_at": "2016-09-18 06:55:52",
    "cep": null,
    "bairro": null,
    "rua": null,
    "cidade_id": 3,
    "geoposicionada": 1,
    "data_visita": "2016-08-08",
    "hora_visita": "8:00"
  }
}
```

### POST \s\cancelActiveOrder
Parâmetro:
```js
{
  "api_key" : "EAACEdEose0cBAPJ9giastHdbB1EGgyENEtOFUeKTOIHcuILbklPQdru5rekiw7537Ds1SpLoSLECh5sdgTiCUZCyKXIsVRvIOqDluMG5CvjJzSJ7ZBlURrvZCoWpMGAWUjBG3QmYAZCJXs9guHSA7V0zyKr2ztSaCaCBCNZByQjAZDZa"
}
```

Exemplo de saída:
```js
{"status":true}
```

##Documentação para a API do sistema

### POST \adm\login
Parâmetro:
```js
{
  "email" : "bsinet@hotmail.com", 
  "senha" : "master"
}
```

Exemplo de saída:
```js
{"status":true}
```

### POST \adm\logout
Parâmetro:
```js
Sem parâmetro
```

Exemplo de saída:
```js
{"status":true}
```

### POST \order\getAllActiveOrder
Parâmetro:
```js
Sem parâmetro
```

Exemplo de saída:
```js
{
  "status": true,
  "msg": [
    {
      "id": 13,
      "complemento": "rua 9",
      "latitude": 10000,
      "longitude": 100000,
      "usuario_id": 10,
      "aberto": 1,
      "created_at": "2016-09-18 06:41:35",
      "updated_at": "2016-09-18 06:55:20",
      "cep": null,
      "bairro": null,
      "rua": null,
      "cidade_id": 3,
      "geoposicionada": 1,
      "data_visita": "2016-08-08",
      "hora_visita": "8:00",
      "usuario": {
        "id": 10,
        "nome": "Allysom Maciel Guimaraes",
        "telefone": "91017378",
        "api_key": null,
        "senha": null,
        "created_at": "2016-09-18 06:41:27",
        "updated_at": "2016-09-18 08:39:27",
        "facebook_id": "4882048145656",
        "email": "bsinet@hotmail.com"
      }
    }
  ]
}
```

### POST \order\setInProgressOrder
Parâmetro:
```js
{ "order_id" : 1 }
```

Exemplo de saída:
```js
{"status": true }
```

### POST \order\setCancelOrder
Parâmetro:
```js
{ "order_id" : 1 }
```

Exemplo de saída:
```js
{"status": true }
```

### POST \order\getAllCanceledOrder
Parâmetro:
```js
Sem parâmetro
```

Exemplo de saída:
```js
{
  "status": true,
  "msg": [
    {
      "id": 15,
      "complemento": "rua 9",
      "latitude": 10000,
      "longitude": 100000,
      "usuario_id": 10,
      "aberto": 0,
      "created_at": "2016-09-18 06:55:22",
      "updated_at": "2016-09-18 06:55:23",
      "cep": null,
      "bairro": null,
      "rua": null,
      "cidade_id": 3,
      "geoposicionada": 1,
      "data_visita": "2016-08-08",
      "hora_visita": "8:00",
      "status": 2,
      "usuario": {
        "id": 10,
        "nome": "Allysom Maciel Guimaraes",
        "telefone": "91017378",
        "api_key": null,
        "senha": null,
        "created_at": "2016-09-18 06:41:27",
        "updated_at": "2016-09-18 08:39:27",
        "facebook_id": "4882048145656",
        "email": "bsinet@hotmail.com"
      }
    },
    {
      "id": 27,
      "complemento": "rua 9",
      "latitude": 10000,
      "longitude": 100000,
      "usuario_id": 10,
      "aberto": 0,
      "created_at": "2016-09-18 06:55:52",
      "updated_at": "2016-09-18 07:12:27",
      "cep": null,
      "bairro": null,
      "rua": null,
      "cidade_id": 3,
      "geoposicionada": 1,
      "data_visita": "2016-08-08",
      "hora_visita": "8:00",
      "status": 2,
      "usuario": {
        "id": 10,
        "nome": "Allysom Maciel Guimaraes",
        "telefone": "91017378",
        "api_key": null,
        "senha": null,
        "created_at": "2016-09-18 06:41:27",
        "updated_at": "2016-09-18 08:39:27",
        "facebook_id": "4882048145656",
        "email": "bsinet@hotmail.com"
      }
    }
  ]
}
```

### POST \order\getAllInProgressOrder
Parâmetro:
```js
Sem parâmetro
```

Exemplo de saída:
```js
{
  "status": true,
  "msg": [
    {
      "id": 14,
      "complemento": "rua 9",
      "latitude": 10000,
      "longitude": 100000,
      "usuario_id": 10,
      "aberto": 0,
      "created_at": "2016-09-18 06:55:20",
      "updated_at": "2016-09-18 06:55:22",
      "cep": null,
      "bairro": null,
      "rua": null,
      "cidade_id": 3,
      "geoposicionada": 1,
      "data_visita": "2016-08-08",
      "hora_visita": "8:00",
      "status": 1,
      "usuario": {
        "id": 10,
        "nome": "Allysom Maciel Guimaraes",
        "telefone": "91017378",
        "api_key": null,
        "senha": null,
        "created_at": "2016-09-18 06:41:27",
        "updated_at": "2016-09-18 08:39:27",
        "facebook_id": "4882048145656",
        "email": "bsinet@hotmail.com"
      }
    }
  ]
}
```


### POST \order\getAllFinishedOrder
Parâmetro:
```js
Sem parâmetro
```

Exemplo de saída:
```js
{
  "status": true,
  "msg": [
    {
      "id": 16,
      "complemento": "rua 9",
      "latitude": 10000,
      "longitude": 100000,
      "usuario_id": 10,
      "aberto": 0,
      "created_at": "2016-09-18 06:55:23",
      "updated_at": "2016-09-18 06:55:24",
      "cep": null,
      "bairro": null,
      "rua": null,
      "cidade_id": 3,
      "geoposicionada": 1,
      "data_visita": "2016-08-08",
      "hora_visita": "8:00",
      "status": -1,
      "usuario": {
        "id": 10,
        "nome": "Allysom Maciel Guimaraes",
        "telefone": "91017378",
        "api_key": null,
        "senha": null,
        "created_at": "2016-09-18 06:41:27",
        "updated_at": "2016-09-18 08:39:27",
        "facebook_id": "4882048145656",
        "email": "bsinet@hotmail.com"
      }
    }
  ]
}
```