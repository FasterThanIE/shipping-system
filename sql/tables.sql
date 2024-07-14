create table users
(
    id       int auto_increment
        primary key,
    email    varchar(128) not null,
    password varchar(256) not null,
    constraint users_email_uk
        unique (email)
);

create table shipments
(
    id            int auto_increment
        primary key,
    user_id       int                                  not null,
    status        tinyint  default 1                   null,
    size          tinyint                              not null,
    location_from int                                  not null,
    location_to   int                                  not null,
    price         int                                  null,
    method        tinyint                              not null,
    note          text                                 null,
    delivery_info text                                 not null,
    created_at    datetime default current_timestamp() not null,
    updated_at    datetime default current_timestamp() not null,
    constraint shipments_users_id_fk
        foreign key (user_id) references users (id)
);

