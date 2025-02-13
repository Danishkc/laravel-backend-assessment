# Laravel Backend Assessment

## Setup Instructions

1. **Clone the Repository**:
   git clone https://github.com/Danishkc/laravel-backend-assessment.git
   cd laravel-backend-assessment
2. **Install Dependencies**:
   composer install
3. **Setup Environment**:
    cp .env.example .env
5. **Run Migrations and Seeders**:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=timesheet
    DB_USERNAME=root
    DB_PASSWORD=
6. **Run Migrations and Seeders**:
    php artisan migrate
    php artisan db:seed
7. **Install Laravel Passport**:
    php artisan passport:install
9. **Generate Application Key**:
    php artisan key:generate
10. **Run the Application**:
    php artisan serve
11. **Import SQL db**:


---

### **2. API Documentation**
```markdown
## API Documentation

### Authentication
- **Register**: `POST /api/register`
- **Login**: `POST /api/login`
- **Logout**: `POST /api/logout` (Requires authentication)

### Projects
- **List Projects**: `GET /api/projects`
- **Create Project**: `POST /api/projects`
- **Get Project**: `GET /api/projects/{id}`
- **Update Project**: `PUT /api/projects/{id}`
- **Delete Project**: `DELETE /api/projects/{id}`

### Timesheets
- **List Timesheets**: `GET /api/timesheets`
- **Create Timesheet**: `POST /api/timesheets`
- **Get Timesheet**: `GET /api/timesheets/{id}`
- **Update Timesheet**: `PUT /api/timesheets/{id}`
- **Delete Timesheet**: `DELETE /api/timesheets/{id}`

### Attributes
- **List Attributes**: `GET /api/attributes`
- **Create Attribute**: `POST /api/attributes`
- **Get Attribute**: `GET /api/attributes/{id}`
- **Update Attribute**: `PUT /api/attributes/{id}`
- **Delete Attribute**: `DELETE /api/attributes/{id}`

### Attribute Values
- **List Attribute Values**: `GET /api/attribute-values`
- **Create Attribute Value**: `POST /api/attribute-values`
- **Get Attribute Value**: `GET /api/attribute-values/{id}`
- **Update Attribute Value**: `PUT /api/attribute-values/{id}`
- **Delete Attribute Value**: `DELETE /api/attribute-values/{id}`

### Filtering
- **Filter Projects**:
  - Regular Fields: `GET /api/projects?filters[name]=Project A`
  - EAV Attributes: `GET /api/projects?eav_filters[department][operator]==&eav_filters[department][value]=Department`

## Example Requests and Responses

### Register a User
**Request**:

POST /api/register
{
    "first_name": "John",
    "last_name": "Doe",
    "email": "john@example.com",
    "password": "password123"
}

**Response**:
{
    "message": "User registered successfully"
}

**Login**
**Request**:
POST /api/login
{
    "email": "john@example.com",
    "password": "password123"
}
**Response**:
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."
}

**Create a Project**

POST /api/projects
{
    "name": "New Project",
    "status": "active",
    "attributes": [
        {
            "attribute_id": 1,
            "value": "IT"
        }
    ]
}

{
    "id": 1,
    "name": "New Project",
    "status": "active",
    "attributeValues": [
        {
            "id": 1,
            "attribute_id": 1,
            "entity_id": 1,
            "value": "IT",
            "attribute": {
                "id": 1,
                "name": "department",
                "type": "text"
            }
        }
    ]
}

**Filter Projects**

GET /api/projects?filters[name]=New%20Project&eav_filters[department][operator]==&eav_filters[department][value]=IT

[
    {
        "id": 1,
        "name": "New Project",
        "status": "active",
        "attributeValues": [
            {
                "id": 1,
                "attribute_id": 1,
                "entity_id": 1,
                "value": "IT",
                "attribute": {
                    "id": 1,
                    "name": "department",
                    "type": "text"
                }
            }
        ]
    }
]


---

### **4. Test Credentials**
```markdown
## Test Credentials

- **Email**: `john@example.com`
- **Password**: `password123`


## Postman Collection

- A Postman collection is provided in the repository for easy testing.
- Download the `postman_collection.json` file and import it into Postman.
- Set the base URL to `http://localhost:8000/api`.
- Use the test credentials to authenticate and test the endpoints.
