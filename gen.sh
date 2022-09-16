docker exec -it gateway_service sh -c "cp .env.example .env"
docker exec -it client_service sh -c "cp .env.example .env"
docker exec -it search_service sh -c "cp .env.example .env"
docker exec -it client_service sh -c "php artisan migrate"