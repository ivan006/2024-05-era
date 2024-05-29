-- Table: attachment
-- Column: RelativeID
-- Referenced Table: entity
-- Orphaned Records: 1213 out of 2958
-- SELECT * FROM attachment WHERE RelativeID NOT IN (SELECT Id FROM entity);
UPDATE attachment SET RelativeID = NULL WHERE RelativeID NOT IN (SELECT Id FROM entity);

-- Table: audit
-- Column: Entity
-- Referenced Table: entity
-- Orphaned Records: 31 out of 3333
-- SELECT * FROM audit WHERE Entity NOT IN (SELECT Id FROM entity);
UPDATE audit SET Entity = NULL WHERE Entity NOT IN (SELECT Id FROM entity);

-- Table: bank
-- Column: Entity
-- Referenced Table: entity
-- Orphaned Records: 3 out of 3
-- SELECT * FROM bank WHERE Entity NOT IN (SELECT Id FROM entity);
UPDATE bank SET Entity = 0 WHERE Entity NOT IN (SELECT Id FROM entity);

-- Table: communication
-- Column: RelativeID
-- Referenced Table: entity
-- Orphaned Records: 121 out of 1149
-- SELECT * FROM communication WHERE RelativeID NOT IN (SELECT Id FROM entity);
UPDATE communication SET RelativeID = NULL WHERE RelativeID NOT IN (SELECT Id FROM entity);

-- Table: contactnumber
-- Column: Person
-- Referenced Table: entity
-- Orphaned Records: 5 out of 181
-- SELECT * FROM contactnumber WHERE Person NOT IN (SELECT Id FROM entity);
UPDATE contactnumber SET Person = NULL WHERE Person NOT IN (SELECT Id FROM entity);

-- Table: email
-- Column: Person
-- Referenced Table: entity
-- Orphaned Records: 8 out of 175
-- SELECT * FROM email WHERE Person NOT IN (SELECT Id FROM entity);
UPDATE email SET Person = NULL WHERE Person NOT IN (SELECT Id FROM entity);

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

-- Table: entityrelationship
-- Column: EntityA
-- Referenced Table: entity
-- Orphaned Records: 19 out of 196
-- SELECT * FROM entityrelationship WHERE EntityA NOT IN (SELECT Id FROM entity);
UPDATE entityrelationship SET EntityA = NULL WHERE EntityA NOT IN (SELECT Id FROM entity);

-- Table: entityrelationship
-- Column: EntityB
-- Referenced Table: entity
-- Orphaned Records: 7 out of 196
-- SELECT * FROM entityrelationship WHERE EntityB NOT IN (SELECT Id FROM entity);
UPDATE entityrelationship SET EntityB = NULL WHERE EntityB NOT IN (SELECT Id FROM entity);

-- Table: object
-- Column: Parent
-- Referenced Table: object
-- Orphaned Records: 4 out of 27
-- SELECT * FROM object WHERE Parent NOT IN (SELECT Id FROM object);
UPDATE object SET Parent = NULL WHERE Parent NOT IN (SELECT Id FROM object);

-- Table: objectvalue
-- Column: Trait
-- Referenced Table: objecttrait
-- Orphaned Records: 18 out of 314
-- SELECT * FROM objectvalue WHERE Trait NOT IN (SELECT Id FROM objecttrait);
UPDATE objectvalue SET Trait = NULL WHERE Trait NOT IN (SELECT Id FROM objecttrait);

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

-- Table: passwordhash
-- Column: SystemUser
-- Referenced Table: systemuser
-- Orphaned Records: 3 out of 101
-- SELECT * FROM passwordhash WHERE SystemUser NOT IN (SELECT Id FROM systemuser);
UPDATE passwordhash SET SystemUser = 10266 WHERE SystemUser NOT IN (SELECT Id FROM systemuser);

-- Table: queryheader
-- Column: RelativeID
-- Referenced Table: entity
-- Orphaned Records: 2 out of 231
-- SELECT * FROM queryheader WHERE RelativeID NOT IN (SELECT Id FROM entity);
UPDATE queryheader SET RelativeID = NULL WHERE RelativeID NOT IN (SELECT Id FROM entity);

-- Table: requirementdetail
-- Column: RelativeID
-- Referenced Table: entity
-- Orphaned Records: 127 out of 2011
-- SELECT * FROM requirementdetail WHERE RelativeID NOT IN (SELECT Id FROM entity);
UPDATE requirementdetail SET RelativeID = NULL WHERE RelativeID NOT IN (SELECT Id FROM entity);

-- Table: requirementdetail
-- Column: ChangedBy
-- Referenced Table: entity
-- Orphaned Records: 1 out of 2011
-- SELECT * FROM requirementdetail WHERE ChangedBy NOT IN (SELECT Id FROM entity);
UPDATE requirementdetail SET ChangedBy = NULL WHERE ChangedBy NOT IN (SELECT Id FROM entity);

