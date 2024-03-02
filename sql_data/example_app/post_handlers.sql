create table post_handlers
(
    id         char(36)     not null
        primary key,
    post       varchar(255) not null,
    check_code varchar(255) not null,
    comment    varchar(255) null,
    status     varchar(255) not null
)
    collate = utf8mb4_unicode_ci;

