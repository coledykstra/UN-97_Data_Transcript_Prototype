Copy .env.example to .env

Edit the last two lines of the .env file.

Replace {ip_address} and {your_key_here} with the canvas instance ip address and your api key.

CANVAS_API_BASE_URL=http://{ip_address}/api/v1/

CANVAS_ACCESS_TOKEN={your_key_here}

Open command line in the UN-97_Data_Transcript_Prototype folder

php artisan serve

Then in your browser address bar:
http://127.0.0.1:8000/students
