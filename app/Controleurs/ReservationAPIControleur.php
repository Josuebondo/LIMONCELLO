<?php

namespace App\Controleurs;

use App\Modeles\Reservation;
use Core\Reponse;
use Core\Requete;
use Core\BaseBD;

class ReservationAPIControleur
{
    /**
     * GET /api/reservations
     * Récupère toutes les réservations
     */
    public function index(Requete $request, Reponse $response)
    {
        try {
            $bd = BaseBD::obtenir();
            $query = "SELECT * FROM reservations ORDER BY reservation_date DESC, reservation_time DESC";
            $items = $bd->tous($query);

            $response->json([
                'success' => true,
                'data' => $items,
                'count' => count($items)
            ]);
        } catch (\Exception $e) {
            $response->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * POST /api/reservations
     * Crée une nouvelle réservation
     */
    public function store(Requete $request, Reponse $response)
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            // Vérification CSRF
            $csrfToken = $data['_csrf_token'] ?? null;
            // $response->json([
            //     'success' => false,
            //     'error' => 'Token CSRF invalide ou manquant.',
            //     'token' => $csrfToken
            // ], 403);
            // return;

            if (!$csrfToken) {
                $response->json([
                    'success' => false,
                    'error' => 'Token CSRF invalide ou manquant.'
                ], 403);
                return;
            }
            if (!\Core\CSRF::valider($csrfToken)) {
                $response->json([
                    'success' => false,
                    'error' => 'Token CSRF invalide.'
                ], 403);
                return;
            }

            // Utiliser Validateur
            $v = new \Core\Validateur();
            $v->ajouter('customer_name', ['requis']);
            $v->ajouter('phone', ['requis']);
            $v->ajouter('reservation_date', ['requis']);
            $v->ajouter('reservation_time', ['requis']);
            $v->ajouter('persons', ['requis', 'entier']);
            // Ajout d'autres règles si besoin

            if (!$v->valider($data)) {
                $response->json([
                    'success' => false,
                    'error' => $v->erreurs()
                ], 400);
                return;
            }

            // Récupérer les données validées et générer un code unique
            $donnees = [
                'customer_name' => $data['customer_name'],
                'phone' => $data['phone'],
                'reservation_date' => $data['reservation_date'],
                'reservation_time' => $data['reservation_time'],
                'persons' => $data['persons'],
                'message' => $data['message'] ?? null,
                'status' => 'en_attente',
                'type' => $data['type'] ?? 'sur_place',
                'code_unique' => Reservation::genererCodeUnique(8),
            ];

            $bd = BaseBD::obtenir();
            $result = Reservation::creer($donnees);

            if (!$result) {
                $response->json([
                    'success' => false,
                    'error' => 'Erreur lors de la création'
                ], 500);
                return;
            }

            $id = $bd->dernierInsertId();

            // Récupérer le code_unique inséré
            $reservationCree = Reservation::trouver($id);
            $codeUnique = $reservationCree->code_unique ?? null;

            $response->json([
                'success' => true,
                'message' => 'Réservation créée avec succès',
                'id' => $id,
                'new' => $reservationCree,
                'code_unique' => $codeUnique
            ], 201);
        } catch (\Exception $e) {
            $response->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * GET /api/reservations/{id}
     * Récupère une réservation spécifique
     */
    public function show($id, Requete $request, Reponse $response)
    {
        try {
            $bd = BaseBD::obtenir();
            $query = "SELECT * FROM reservations WHERE id = ?";
            $item = $bd->une($query, [$id]);

            if (!$item) {
                $response->json([
                    'success' => false,
                    'error' => 'Réservation non trouvée'
                ], 404);
                return;
            }

            $response->json([
                'success' => true,
                'data' => $item
            ]);
        } catch (\Exception $e) {
            $response->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * PUT /api/reservations/{id}
     * Met à jour une réservation
     */
    public function update($id, Requete $request, Reponse $response)
    {
        try {
            $data = $request->tous();
            if (empty($data)) {

                $data = json_decode(file_get_contents('php://input'), true);
            }
            $bd = BaseBD::obtenir();

            // return;
            // Vérifier que la réservation existe
            // $checkQuery = "SELECT id FROM reservations WHERE id = ?";
            $item = Reservation::trouver($id);

            if (!$item) {
                $response->json([
                    'success' => false,
                    'error' => 'Réservation non trouvée'
                ], 404);
                return;
            }

            // Construire la requête de mise à jour
            $updateFields = [];
            $values = [];

            $allowedFields = ['customer_name', 'phone', 'reservation_date', 'reservation_time', 'persons', 'message', 'status'];

            foreach ($allowedFields as $field) {
                if (isset($data[$field])) {
                    $updateFields[] = "$field = ?";
                    $values[] = $data[$field];
                }
            }


            if (empty($updateFields)) {
                $response->json([
                    'success' => false,
                    'error' => 'Aucun champ à mettre à jour'
                ], 400);
                return;
            }

            $values[] = $id;
            $query = "UPDATE reservations SET " . implode(', ', $updateFields) . " WHERE id = ?";

            $result = $bd->executer($query, $values);

            if (!$result) {
                $response->json([
                    'success' => false,
                    'error' => 'Erreur lors de la mise à jour'
                ], 500);
                return;
            }

            $response->json([
                'success' => true,
                'message' => 'Réservation mise à jour avec succès'
            ]);
        } catch (\Exception $e) {
            $response->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * DELETE /api/reservations/{id}
     * Supprime une réservation
     */
    public function destroy($id, Requete $request, Reponse $response)
    {
        try {
            $bd = BaseBD::obtenir();

            // Vérifier que la réservation existe
            $checkQuery = "SELECT id FROM reservations WHERE id = ?";
            $item = $bd->une($checkQuery, [$id]);

            if (!$item) {
                $response->json([
                    'success' => false,
                    'error' => 'Réservation non trouvée'
                ], 404);
                return;
            }

            $query = "DELETE FROM reservations WHERE id = ?";
            $result = $bd->executer($query, [$id]);

            if (!$result) {
                $response->json([
                    'success' => false,
                    'error' => 'Erreur lors de la suppression'
                ], 500);
                return;
            }

            $response->json([
                'success' => true,
                'message' => 'Réservation supprimée avec succès'
            ]);
        } catch (\Exception $e) {
            $response->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * PATCH /api/reservations/{id}/annuler
     * Annule une réservation (statut = 'annulée')
     */
    public function annuler($id, Requete $request, Reponse $response)
    {
        try {
            $bd = BaseBD::obtenir();
            // Vérifier que la réservation existe
            $checkQuery = "SELECT id FROM reservations WHERE id = ?";
            $item = $bd->une($checkQuery, [$id]);
            if (!$item) {
                $response->json([
                    'success' => false,
                    'error' => 'Réservation non trouvée'
                ], 404);
                return;
            }
            $query = "UPDATE reservations SET status = 'annulé' WHERE id = ?";
            $result = $bd->executer($query, [$id]);
            if (!$result) {
                $response->json([
                    'success' => false,
                    'error' => 'Erreur lors de l\'annulation'
                ], 500);
                return;
            }
            $response->json([
                'success' => true,
                'message' => 'Réservation annulée avec succès'
            ]);
        } catch (\Exception $e) {
            $response->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * GET /api/reservations/code/{code}
     * Recherche une réservation par code_unique
     */
    public function findByCode($code, Requete $request, Reponse $response)
    {
        try {
            $bd = BaseBD::obtenir();
            $query = "SELECT * FROM reservations WHERE code_unique = ? LIMIT 1";
            $item = $bd->une($query, [$code]);

            if (!$item) {
                $response->json([
                    'success' => false,
                    'error' => 'Aucune réservation trouvée pour ce code.'
                ], 404);
                return;
            }

            $response->json([
                'success' => true,
                'reservation' => $item
            ]);
        } catch (\Exception $e) {
            $response->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
