#Ami Coding Pari na
### > Installation Process


> **Optional Installation If Don't You Have These Software**
- Download and Install **[Xampp](https://www.apachefriends.org/xampp-files/7.3.28/xampp-windows-x64-7.3.28-1-VC15-installer.exe)** Or **[Wamp](https://www.wampserver.com/en/)**
- Download and Install **[Composer](https://getcomposer.org/Composer-Setup.exe)**
- Download and Install **[NodeJs](https://nodejs.org/dist/v14.17.0/node-v14.17.0-x64.msi)**


> **Follow This Step To Run The Application**
- [x] Start Xampp or Wamp Software then run **Apache** and **Mysql** Server
- [x] Copy this project and paste it to your **htdoc** in **xampp** folder
- [x] Open terminal in the project directory and Run `composer install`
- [x] run `npm install`
- [x] Create an Empty database for this application/project
- [x] run `copy .env.example .env`(Windows 10) find the given keyword and assign/write
    - Created database name on `DB_DATABASE`
    - Username of the database `DB_USERNAME`
    - Password of the database `DB_PASSWORD`
- [x] run `php artisan migrate`
- [x] run `php artisan key:generate`
- [x] run `php artisan serve`

 ## Api Documentation
 > **Endpoint:**

 ####  Get All Input Values `api/khoj/start_datetime/end_datetime/user_id`
 - start_datetime, end_datetime format Y-M-D H:M:S Example `2021-05-01 00:59:55`
 - public endpoint
 

#### Example Output:
```
{
    "status": "success",
    "user_id": 1,
    "payload": [
        {
        "id": 6,
        "user_id": 1,
        "input_values": "4965,2225,458,235,234,65,48,45,12,5,4",
        "search_value": "2225",
        "created_at": "2021-05-25T11:40:52.000000Z",
        "updated_at": "2021-05-25T11:40:52.000000Z"
        },
        {
        "id": 7,
        "user_id": 1,
        "input_values": "4965,2225,458,235,234,65,48,45,12,5,4",
        "search_value": "12",
        "created_at": "2021-05-25T11:41:02.000000Z",
        "updated_at": "2021-05-25T11:41:02.000000Z"
        },
        {
        "id": 8,
        "user_id": 1,
        "input_values": "4965,2225,458,235,234,65,48,45,12,5,4",
        "search_value": "65656564654",
        "created_at": "2021-05-25T11:41:16.000000Z",
        "updated_at": "2021-05-25T11:41:16.000000Z"
        }
    ]
}
```
