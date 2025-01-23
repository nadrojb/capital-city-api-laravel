# Backend for capital city quiz

This application is designed to work with this FE: https://github.com/nadrojb/capital-city-fe-react

## Local Set-up

1. Clone this repo
2. Run `composer install` from the project root
5. Run `php artisan serve`
6. Add this to end of your local url to view Json response: /api/v1/countries



## URL

```JSON
GET /api/v1/countries
```

## Description 
This endpoint retrieves a list of countries along with their capitals from an external API.


## Parameters
None

## Success Responses 
- Code: 200 OK
  - Content:
```json
{
  "error": false,
  "msg": "Successfully fetched data",
  "data": [
    {
      "name": "Afghanistan",
      "capital": "Kabul",
        "iso2": "AF", 
        "iso3": "AFG"
    },
    {
      "name": "Albania",
      "capital": "Tirana",
        "iso2": "AX",
        "iso3": "ALA"
    }
    // Other countries
  ]
}
```
## Error Responses 
- Code: 500 Internal Server Error
  - Content(when external API data is not fetched):
```json
{
  "error": true,
  "msg": "Unable to fetch data",
  "status": 500
}
```
- Content(When there is a request error):
```json
{
  "error": true,
  "msg": "Request error: [Error message]",
  "status": 500
}
```
- Content(When there is a connection error):
```json
{
  "error": true,
  "msg": "Connection error: [Error message]",
  "status": 500
}
```
