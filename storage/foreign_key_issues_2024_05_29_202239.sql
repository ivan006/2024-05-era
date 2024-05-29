-- Table: entityaudit
-- Column: Entity Id
-- Referenced Table: entity
-- Orphaned Records: 2006 out of 2821
-- SELECT * FROM entityaudit WHERE Entity Id NOT IN (SELECT Id FROM entity);
UPDATE entityaudit SET Entity Id = 0 WHERE Entity Id NOT IN (SELECT Id FROM entity);

-- Table: object
-- Column: Parent
-- Referenced Table: object
-- Orphaned Records: 4 out of 27
-- SELECT * FROM object WHERE Parent NOT IN (SELECT Id FROM object);
UPDATE object SET Parent = NULL WHERE Parent NOT IN (SELECT Id FROM object);

-- Table: objectvalue
-- Column: Entity
-- Referenced Table: entity
-- Orphaned Records: 30 out of 314
-- SELECT * FROM objectvalue WHERE Entity NOT IN (SELECT Id FROM entity);
UPDATE objectvalue SET Entity = NULL WHERE Entity NOT IN (SELECT Id FROM entity);

