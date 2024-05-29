-- Table: attachment
-- Column: RelativeID
-- Referenced Table: entity
-- Orphaned Records: 1213 out of 2958
-- SELECT * FROM attachment WHERE RelativeID NOT IN (SELECT Id FROM entity);
UPDATE attachment SET RelativeID = NULL WHERE RelativeID NOT IN (SELECT Id FROM entity);

-- Table: entityaudit
-- Column: Entity Id
-- Referenced Table: entity
-- Orphaned Records: 2006 out of 2821
-- SELECT * FROM entityaudit WHERE Entity Id NOT IN (SELECT Id FROM entity);
UPDATE entityaudit SET Entity Id = 0 WHERE Entity Id NOT IN (SELECT Id FROM entity);

-- Table: entitygood
-- Column: WasteClass
-- Referenced Table: requirement
-- Orphaned Records: 8200 out of 14879
-- SELECT * FROM entitygood WHERE WasteClass NOT IN (SELECT Id FROM requirement);
UPDATE entitygood SET WasteClass = NULL WHERE WasteClass NOT IN (SELECT Id FROM requirement);

-- Table: entitygoodapproval
-- Column: Period
-- Referenced Table: entitygood
-- Orphaned Records: 255 out of 255
-- SELECT * FROM entitygoodapproval WHERE Period NOT IN (SELECT Id FROM entitygood);
UPDATE entitygoodapproval SET Period = 1 WHERE Period NOT IN (SELECT Id FROM entitygood);

-- Table: object
-- Column: Parent
-- Referenced Table: object
-- Orphaned Records: 4 out of 27
-- SELECT * FROM object WHERE Parent NOT IN (SELECT Id FROM object);
UPDATE object SET Parent = NULL WHERE Parent NOT IN (SELECT Id FROM object);

-- Table: objectvalue
-- Column: Instance
-- Referenced Table: entityevent
-- Orphaned Records: 310 out of 314
-- SELECT * FROM objectvalue WHERE Instance NOT IN (SELECT Id FROM entityevent);
UPDATE objectvalue SET Instance = NULL WHERE Instance NOT IN (SELECT Id FROM entityevent);

-- Table: objectvalue
-- Column: Entity
-- Referenced Table: entity
-- Orphaned Records: 30 out of 314
-- SELECT * FROM objectvalue WHERE Entity NOT IN (SELECT Id FROM entity);
UPDATE objectvalue SET Entity = NULL WHERE Entity NOT IN (SELECT Id FROM entity);

