-- Migration : Ajout colonne code_unique à reservations
ALTER TABLE reservations ADD COLUMN code_unique VARCHAR(16) NOT NULL UNIQUE AFTER id;