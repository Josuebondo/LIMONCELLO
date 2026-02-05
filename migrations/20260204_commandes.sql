-- Table commandes pour gestion des commandes (livraison, à emporter, sur place)
CREATE TABLE commandes
(
    id INT
    AUTO_INCREMENT PRIMARY KEY,
    nom_client VARCHAR
    (100) NOT NULL,
    telephone VARCHAR
    (30) NOT NULL,
    email VARCHAR
    (100),
    mode_reception ENUM
    ('livraison', 'emporter', 'surplace') NOT NULL,
    commune VARCHAR
    (100),
    quartier VARCHAR
    (100),
    adresse VARCHAR
    (255),
    point_repere VARCHAR
    (255),
    note TEXT,
    montant_total DECIMAL
    (10,2) NOT NULL,
    frais_livraison DECIMAL
    (10,2) DEFAULT 0,
    date_commande DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    statut VARCHAR
    (30) NOT NULL DEFAULT 'en_attente'
);

    -- Table commande_items pour les produits de chaque commande
    CREATE TABLE commande_items
    (
        id INT
        AUTO_INCREMENT PRIMARY KEY,
    commande_id INT NOT NULL,
    produit_id INT NOT NULL,
    nom_produit VARCHAR
        (150) NOT NULL,
    quantite INT NOT NULL,
    prix_unitaire DECIMAL
        (10,2) NOT NULL,
    FOREIGN KEY
        (commande_id) REFERENCES commandes
        (id)
);
