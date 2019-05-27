CREATE DATABASE PSI;
go

USE PSI;
go

CREATE TABLE [JeVlasnik]
( 
	[IDKorisnik]         integer  NOT NULL ,
	[IDUO]               integer  NOT NULL 
)
go

ALTER TABLE [JeVlasnik]
	ADD CONSTRAINT [XPKJeVlasnik] PRIMARY KEY  CLUSTERED ([IDKorisnik] ASC,[IDUO] ASC)
go

CREATE TABLE [KomiOcena]
( 
	[IDKomiOcena]        integer  NOT NULL ,
	[IDKorisnik]         integer  NULL ,
	[IDUO]               integer  NULL ,
	[Komentar]           text  NULL ,
	[Ocena]              integer  NULL 
	CONSTRAINT [Ocena]
		CHECK  ( [Ocena]=1 OR [Ocena]=2 OR [Ocena]=3 OR [Ocena]=4 OR [Ocena]=5 )
)
go

ALTER TABLE [KomiOcena]
	ADD CONSTRAINT [XPKKomiOcena] PRIMARY KEY  CLUSTERED ([IDKomiOcena] ASC)
go

CREATE TABLE [Korisnik]
( 
	[IDKorisnik]         integer  NOT NULL ,
	[Username]           varchar(20)  NULL ,
	[Password]           varchar(32)  NULL ,
	[Tip]                char(18)  NULL 
	CONSTRAINT [TipKorisnika]
		CHECK  ( [Tip]=0 OR [Tip]=1 OR [Tip]=3 ),
	[AvatarPath]         varchar(32)  NULL 
)
go

ALTER TABLE [Korisnik]
	ADD CONSTRAINT [XPKKorisnik] PRIMARY KEY  CLUSTERED ([IDKorisnik] ASC)
go

CREATE TABLE [PHAE]
( 
	[IDUO]               integer  NOT NULL ,
	[Pice]               tinyint  NULL ,
	[Hrana]              tinyint  NULL ,
	[Ambijent]           tinyint  NULL ,
	[Ekstra]             tinyint  NULL 
)
go

ALTER TABLE [PHAE]
	ADD CONSTRAINT [XPKPHAE] PRIMARY KEY  CLUSTERED ([IDUO] ASC)
go

CREATE TABLE [UO]
( 
	[IDUO]               integer  NOT NULL ,
	[Opis]               text  NULL ,
	[PonPet]             varchar(32)  NULL ,
	[Sub]                varchar(32)  NULL ,
	[Ned]                varchar(32)  NULL ,
	[AvgOcena]           decimal(32)  NULL ,
	[Adresa]             varchar(32)  NULL ,
	[Gmaps]              varchar(32)  NULL ,
	[Odobren]            bit  NULL ,
	[Vidljivost]         bit  NULL ,
	[Info1]              text  NULL ,
	[Info2]              text  NULL ,
	[Info3]              text  NULL ,
	[Naziv]              varchar(32)  NULL ,
	[JeRestoran]         bit  NULL ,
	[JeKafic]            bit  NULL ,
	[JeBrzaHrana]        bit  NULL 
)
go

ALTER TABLE [UO]
	ADD CONSTRAINT [XPKUO] PRIMARY KEY  CLUSTERED ([IDUO] ASC)
go

CREATE TABLE [UOSlike]
( 
	[IDUO]               integer  NOT NULL ,
	[Path]               varchar(32)  NULL 
)
go

ALTER TABLE [UOSlike]
	ADD CONSTRAINT [XPKUOSlike] PRIMARY KEY  CLUSTERED ([IDUO] ASC)
go


ALTER TABLE [JeVlasnik]
	ADD CONSTRAINT [R_6] FOREIGN KEY ([IDKorisnik]) REFERENCES [Korisnik]([IDKorisnik])
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
go

ALTER TABLE [JeVlasnik]
	ADD CONSTRAINT [R_8] FOREIGN KEY ([IDUO]) REFERENCES [UO]([IDUO])
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
go


ALTER TABLE [KomiOcena]
	ADD CONSTRAINT [R_4] FOREIGN KEY ([IDKorisnik]) REFERENCES [Korisnik]([IDKorisnik])
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
go

ALTER TABLE [KomiOcena]
	ADD CONSTRAINT [R_5] FOREIGN KEY ([IDUO]) REFERENCES [UO]([IDUO])
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
go


ALTER TABLE [PHAE]
	ADD CONSTRAINT [R_2] FOREIGN KEY ([IDUO]) REFERENCES [UO]([IDUO])
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
go


ALTER TABLE [UOSlike]
	ADD CONSTRAINT [R_3] FOREIGN KEY ([IDUO]) REFERENCES [UO]([IDUO])
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
go
