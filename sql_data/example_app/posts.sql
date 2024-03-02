create table posts
(
    id          char(36)                not null
        primary key,
    name        varchar(255) default '' not null,
    itemType    varchar(255) default '' not null,
    measureName varchar(255) default '' null,
    quantity    varchar(255) default '' null,
    price       varchar(255) default '' not null,
    costPrice   varchar(255) default '' not null,
    sumPrice    varchar(255) default '' not null,
    tax         varchar(255) default '' not null,
    taxPercent  varchar(255) default '' not null,
    discount    varchar(255) default '' not null,
    constraint posts_name_unique
        unique (name)
)
    collate = utf8mb4_unicode_ci;

