# sum-api-react-test
Test with react and symfony, that sends to numbers to an api and show the result into the front

This project contains:
	•	Backend: A Symfony controller endpoint that receives JSON { "a": number, "b": number } and returns { "sum": number }.
	•	Frontend: A single React component that posts values a and b to the API and displays the result or an error message.

Create a new Symfony project with this command:

symfony new new_project_backend

Add this controller to the Symfony project inside:
src/Controller/

run

composer require nelmio/cors-bundle
composer require symfony/validator

inside 
config/packages/nelmio_cors.yaml

permit all the cors with:

nelmio_cors:
    defaults:
        origin_regex: true
        allow_origin: ['*']
        allow_methods: ['GET', 'OPTIONS', 'POST', 'PUT', 'PATCH', 'DELETE']
        allow_headers: ['Content-Type', 'Authorization']
        expose_headers: ['Link']
        max_age: 3600
    paths:
        '^/': null

Run the Symfony server:

symfony server:start –port=8001

API endpoint:

POST /api/sum

Example request:

{
  "a": 3,
  "b": 7
}

Reesponse:

{
  "sum": 10
}

Frontend

File:

App.jsx

Create a new react project with this command:

npm create vite@latest new_project_frontend -- --template react

replace the actuall App.jsx on src/App.jsx with the fronted/App.jsx

and run the project if still not running when you create with:

npm install
npm run dev



