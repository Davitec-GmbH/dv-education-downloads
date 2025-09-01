CREATE TABLE tx_dveducationdownloads_domain_model_documenttype (
    title varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL
);

CREATE TABLE tx_dveducationdownloads_domain_model_download (
    title varchar(255) DEFAULT '' NOT NULL,
    description text,
    document_type int(11) unsigned DEFAULT '0' NOT NULL,
    language varchar(10) DEFAULT 'de' NOT NULL,
    version varchar(50) DEFAULT '' NOT NULL,
    valid_from int(11) DEFAULT '0' NOT NULL,
    valid_until int(11) DEFAULT '0' NOT NULL,
    file int(11) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL
);
