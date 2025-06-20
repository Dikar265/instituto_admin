<?php

namespace App\Services;

use GuzzleHttp\Client;
use IntlDateFormatter;

class InstagramService
{
    protected $client;
    protected $accessToken;

    public function __construct()
    {
        $this->client = new Client();
        $this->accessToken = env('INSTAGRAM_ACCESS_TOKEN');
    }

    public function getUserMedia()
    {
        $response = $this->client->request('GET', 'https://graph.instagram.com/me/media', [
            'query' => [
                'fields' => 'id,caption,media_type,media_url,permalink,timestamp,children{media_url,media_type}',
                'access_token' => $this->accessToken,
                'limit' => 12, // Limitar la cantidad de publicaciones a 12
            ],
        ]);

        $data = json_decode($response->getBody()->getContents());

        if (isset($data->data) && is_array($data->data)) {
            foreach ($data->data as $item) {
                // Convertir timestamp a una fecha en español
                $item->timestamp = $this->formatTimestamp($item->timestamp);

                // Procesar los elementos del carrusel, si los hay
                if (isset($item->children->data)) {
                    foreach ($item->children->data as $child) {
                        // Asegurarnos de que la URL de media y el tipo estén definidos
                        $child->media_url = $child->media_url ?? '';
                        $child->media_type = $child->media_type ?? '';
                    }
                }
            }

            return $data;
        }

        return (object) ['data' => []];
    }

    private function formatTimestamp($timestamp)
    {
        // Crear una instancia de DateTime
        $date = new \DateTime($timestamp);
        
        // Configurar el formateador para español
        $formatter = new IntlDateFormatter(
            'es_AR', // Locale en español
            IntlDateFormatter::LONG, // Tipo de formato de fecha
            IntlDateFormatter::NONE, // Tipo de formato de hora
            'America/Argentina/Buenos_Aires' // Zona horaria
        );
        
        // Formatear la fecha
        return $formatter->format($date);
    }
}
