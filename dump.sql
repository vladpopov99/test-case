DROP TABLE IF EXISTS "carts";
DROP SEQUENCE IF EXISTS carts_id_seq;
CREATE SEQUENCE carts_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."carts" (
    "id" integer DEFAULT nextval('carts_id_seq') NOT NULL,
    "user_id" integer NOT NULL,
    "delivery_service_id" integer NOT NULL,
    "payment_service_id" integer NOT NULL,
    "delivery_price" integer,
    "delivery_min_days" integer,
    "delivery_max_days" integer,
    "created_at" timestamp DEFAULT now() NOT NULL,
    "is_pay" smallint DEFAULT '0' NOT NULL,
    "total_payment_sum" integer NOT NULL,
    CONSTRAINT "carts_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


DROP TABLE IF EXISTS "delivery_services";
DROP SEQUENCE IF EXISTS delivery_services_id_seq;
CREATE SEQUENCE delivery_services_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."delivery_services" (
    "id" integer DEFAULT nextval('delivery_services_id_seq') NOT NULL,
    "code" character(10) NOT NULL,
    "name" character(255) NOT NULL,
    CONSTRAINT "delivery_services_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "delivery_services" ("id", "code", "name") VALUES
(1,	'cdek      ',	'Транспортная компания CDEK                                                                                                                                                                                                                                     '),
(2,	'fivepost  ',	'Транспортная компания FivePost                                                                                                                                                                                                                                 ');

DROP TABLE IF EXISTS "payment_services";
DROP SEQUENCE IF EXISTS payment_services_id_seq;
CREATE SEQUENCE payment_services_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."payment_services" (
    "id" integer DEFAULT nextval('payment_services_id_seq') NOT NULL,
    "name" character(255) NOT NULL,
    CONSTRAINT "payment_services_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "payment_services" ("id", "name") VALUES
(1,	'Сбербанк                                                                                                                                                                                                                                                       '),
(2,	'Альфабанк                                                                                                                                                                                                                                                      '),
(3,	'Ю.Money                                                                                                                                                                                                                                                        ');

DROP TABLE IF EXISTS "products";
DROP SEQUENCE IF EXISTS products_id_seq;
CREATE SEQUENCE products_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."products" (
    "id" integer DEFAULT nextval('products_id_seq') NOT NULL,
    "name" character(255) NOT NULL,
    "image" text NOT NULL,
    "price" integer NOT NULL,
    "weight" double precision NOT NULL,
    CONSTRAINT "products_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "products" ("id", "name", "image", "price", "weight") VALUES
(1,	'Кружка для кофе (красная)                                                                                                                                                                                                                                      ',	'',	100,	0.3),
(2,	'Термос (зеленый)                                                                                                                                                                                                                                               ',	'',	35,	0.7),
(3,	'Футбольный мяч                                                                                                                                                                                                                                                 ',	'',	75,	0.4),
(4,	'Велосипед (черный)                                                                                                                                                                                                                                             ',	'',	450,	7.3),
(5,	'Велосипед (белый)                                                                                                                                                                                                                                              ',	'',	500,	7.9);

