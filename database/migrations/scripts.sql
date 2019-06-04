ALTER TABLE users ADD COLUMN user_type CHAR(1) NOT NULL;
ALTER TABLE users ADD COLUMN deleted_at TIMESTAMP;
ALTER TABLE identificacao_usuario ADD COLUMN pasta CHAR(10);
ALTER TABLE identificacao_usuario ADD COLUMN arquivo CHAR(10);