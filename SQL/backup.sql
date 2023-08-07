-- Adminer 4.8.1 PostgreSQL 12.15 (Debian 12.15-1.pgdg120+1) dump

DROP TABLE IF EXISTS "canditate";
DROP SEQUENCE IF EXISTS canditate_id_seq;
CREATE SEQUENCE canditate_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."canditate" (
    "id" integer DEFAULT nextval('canditate_id_seq') NOT NULL,
    "name_canditate" text NOT NULL,
    CONSTRAINT "canditate_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "canditate" ("id", "name_canditate") VALUES
(1,	'John Snow'),
(2,	'Wonder Woman'),
(3,	'Vegeta');

DROP TABLE IF EXISTS "comuna";
DROP SEQUENCE IF EXISTS comuna_id_seq;
CREATE SEQUENCE comuna_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."comuna" (
    "id" integer DEFAULT nextval('comuna_id_seq') NOT NULL,
    "name" text NOT NULL,
    "id_region" integer NOT NULL,
    CONSTRAINT "comuna_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

CREATE INDEX "comuna_id_region" ON "public"."comuna" USING btree ("id_region");

INSERT INTO "comuna" ("id", "name", "id_region") VALUES
(1,	'San miguel',	1),
(3,	'Estación central',	1),
(4,	'Providencia',	1),
(5,	'Viña del mar',	2),
(6,	'Valparaiso',	2);

DROP TABLE IF EXISTS "media";
DROP SEQUENCE IF EXISTS media_id_seq;
CREATE SEQUENCE media_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."media" (
    "id" integer DEFAULT nextval('media_id_seq') NOT NULL,
    "name" text NOT NULL,
    CONSTRAINT "media_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "media" ("id", "name") VALUES
(1,	'Web'),
(2,	'Amigos'),
(3,	'Redes sociales'),
(5,	'TV');

DROP TABLE IF EXISTS "region";
DROP SEQUENCE IF EXISTS region_id_seq;
CREATE SEQUENCE region_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."region" (
    "id" integer DEFAULT nextval('region_id_seq') NOT NULL,
    "name" text NOT NULL,
    CONSTRAINT "region_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "region" ("id", "name") VALUES
(1,	'Metropolitana'),
(2,	'Valparaiso');

DROP TABLE IF EXISTS "vote";
DROP SEQUENCE IF EXISTS vote_id_seq;
CREATE SEQUENCE vote_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."vote" (
    "id" integer DEFAULT nextval('vote_id_seq') NOT NULL,
    "name" text NOT NULL,
    "last_name" text NOT NULL,
    "alias" text NOT NULL,
    "rut" text NOT NULL,
    "candidate" integer NOT NULL,
    "comuna" integer NOT NULL,
    CONSTRAINT "vote_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

CREATE INDEX "vote_comuna" ON "public"."vote" USING btree ("comuna");


DROP TABLE IF EXISTS "vote_media";
DROP SEQUENCE IF EXISTS vote_media_id_seq;
CREATE SEQUENCE vote_media_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."vote_media" (
    "id" integer DEFAULT nextval('vote_media_id_seq') NOT NULL,
    "id_vote" integer NOT NULL,
    "id_media" integer NOT NULL,
    CONSTRAINT "vote_media_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

CREATE INDEX "vote_media_id_media" ON "public"."vote_media" USING btree ("id_media");

CREATE INDEX "vote_media_id_vote" ON "public"."vote_media" USING btree ("id_vote");


ALTER TABLE ONLY "public"."comuna" ADD CONSTRAINT "comuna_id_region_fkey" FOREIGN KEY (id_region) REFERENCES region(id) NOT DEFERRABLE;

ALTER TABLE ONLY "public"."vote" ADD CONSTRAINT "vote_comuna_fkey" FOREIGN KEY (comuna) REFERENCES comuna(id) NOT DEFERRABLE;

ALTER TABLE ONLY "public"."vote_media" ADD CONSTRAINT "vote_media_id_media_fkey" FOREIGN KEY (id_media) REFERENCES media(id) NOT DEFERRABLE;
ALTER TABLE ONLY "public"."vote_media" ADD CONSTRAINT "vote_media_id_vote_fkey" FOREIGN KEY (id_vote) REFERENCES vote(id) NOT DEFERRABLE;

-- 2023-08-07 23:03:08.490625+00