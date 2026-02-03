-- Table ingredients liés à un menu (ingrédients ou allergies spécifiques à chaque menu)
CREATE TABLE IF NOT EXISTS menu_ingredients (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    menu_id INTEGER NOT NULL,
    name VARCHAR(100) NOT NULL,
    type VARCHAR(50) DEFAULT 'ingredient', -- 'ingredient', 'allergene', etc.
    FOREIGN KEY (menu_id) REFERENCES menu_items(id) ON DELETE CASCADE
);
