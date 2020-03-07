CREATE TABLE conversion_log (id SERIAL NOT NULL, from_currency_id INT DEFAULT NULL, to_currency_id INT DEFAULT NULL, timestamp TIMESTAMP(0) WITH TIME ZONE NOT NULL, result NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id));
CREATE INDEX IDX_36AA9A5AA66BB013 ON conversion_log (from_currency_id);
CREATE INDEX IDX_36AA9A5A16B7BF15 ON conversion_log (to_currency_id);

CREATE TABLE currency (id SERIAL NOT NULL, code VARCHAR(255) NOT NULL, symbol VARCHAR(255) NOT NULL, rate NUMERIC(12, 6) NOT NULL, PRIMARY KEY(id));
ALTER TABLE conversion_log ADD CONSTRAINT FK_36AA9A5AA66BB013 FOREIGN KEY (from_currency_id) REFERENCES currency (id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE conversion_log ADD CONSTRAINT FK_36AA9A5A16B7BF15 FOREIGN KEY (to_currency_id) REFERENCES currency (id) NOT DEFERRABLE INITIALLY IMMEDIATE;

INSERT INTO currency (code, symbol, rate) VALUES ('USD', '$', '1'::numeric);
INSERT INTO currency (code, symbol, rate) VALUES ('BRL', 'R$', '4.62762'::numeric);
INSERT INTO currency (code, symbol, rate) VALUES ('EUR', 'R$', '0.885813'::numeric);
INSERT INTO currency (code, symbol, rate) VALUES ('GBP', '₤', '0.766313'::numeric);