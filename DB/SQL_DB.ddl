
CREATE TYPE [ID]
	FROM INTEGER NULL
go

CREATE TABLE [JeVlasnik]
( 
	[IDKorisnik]         [ID]  NOT NULL ,
	[IDUO]               [ID]  NOT NULL 
)
go

ALTER TABLE [JeVlasnik]
	ADD CONSTRAINT [XPKJeVlasnik] PRIMARY KEY  CLUSTERED ([IDKorisnik] ASC,[IDUO] ASC)
go

CREATE TABLE [KomiOcena]
( 
	[IDKomiOcena]        [ID]  NOT NULL ,
	[IDKorisnik]         [ID] ,
	[IDUO]               [ID] ,
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
	[IDKorisnik]         [ID]  NOT NULL ,
	[Username]           varchar(20)  NULL ,
	[Password]           varchar(32)  NULL ,
	[Tip]                char(18)  NULL 
	CONSTRAINT [TipKorisnika]
		CHECK  ( [Tip]=0 OR [Tip]=1 OR [Tip]=3 ),
	[AvatarPath]         varchar()  NULL 
)
go

ALTER TABLE [Korisnik]
	ADD CONSTRAINT [XPKKorisnik] PRIMARY KEY  CLUSTERED ([IDKorisnik] ASC)
go

CREATE TABLE [PHAE]
( 
	[IDUO]               [ID]  NOT NULL ,
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
	[IDUO]               [ID]  NOT NULL ,
	[Opis]               text  NULL ,
	[PonPet]             varchar()  NULL ,
	[Sub]                varchar()  NULL ,
	[Ned]                varchar()  NULL ,
	[AvgOcena]           decimal()  NULL ,
	[Adresa]             varchar()  NULL ,
	[Gmaps]              varchar()  NULL ,
	[Odobren]            bit  NULL ,
	[Vidljivost]         bit  NULL ,
	[Info1]              text  NULL ,
	[Info2]              text  NULL ,
	[Info3]              text  NULL ,
	[Naziv]              varchar()  NULL ,
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
	[IDUO]               [ID]  NOT NULL ,
	[Path]               varchar()  NULL 
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


CREATE TRIGGER tD_JeVlasnik ON JeVlasnik FOR DELETE AS
/* erwin Builtin Trigger */
/* DELETE trigger on JeVlasnik */
BEGIN
  DECLARE  @errno   int,
           @severity int,
           @state    int,
           @errmsg  varchar(255)
    /* erwin Builtin Trigger */
    /* UO  JeVlasnik on child delete no action */
    /* ERWIN_RELATION:CHECKSUM="00024c9c", PARENT_OWNER="", PARENT_TABLE="UO"
    CHILD_OWNER="", CHILD_TABLE="JeVlasnik"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_8", FK_COLUMNS="IDUO" */
    IF EXISTS (SELECT * FROM deleted,UO
      WHERE
        /* %JoinFKPK(deleted,UO," = "," AND") */
        deleted.IDUO = UO.IDUO AND
        NOT EXISTS (
          SELECT * FROM JeVlasnik
          WHERE
            /* %JoinFKPK(JeVlasnik,UO," = "," AND") */
            JeVlasnik.IDUO = UO.IDUO
        )
    )
    BEGIN
      SELECT @errno  = 30010,
             @errmsg = 'Cannot delete last JeVlasnik because UO exists.'
      GOTO error
    END

    /* erwin Builtin Trigger */
    /* Korisnik  JeVlasnik on child delete no action */
    /* ERWIN_RELATION:CHECKSUM="00000000", PARENT_OWNER="", PARENT_TABLE="Korisnik"
    CHILD_OWNER="", CHILD_TABLE="JeVlasnik"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_6", FK_COLUMNS="IDKorisnik" */
    IF EXISTS (SELECT * FROM deleted,Korisnik
      WHERE
        /* %JoinFKPK(deleted,Korisnik," = "," AND") */
        deleted.IDKorisnik = Korisnik.IDKorisnik AND
        NOT EXISTS (
          SELECT * FROM JeVlasnik
          WHERE
            /* %JoinFKPK(JeVlasnik,Korisnik," = "," AND") */
            JeVlasnik.IDKorisnik = Korisnik.IDKorisnik
        )
    )
    BEGIN
      SELECT @errno  = 30010,
             @errmsg = 'Cannot delete last JeVlasnik because Korisnik exists.'
      GOTO error
    END


    /* erwin Builtin Trigger */
    RETURN
error:
   RAISERROR (@errmsg, -- Message text.
              @severity, -- Severity (0~25).
              @state) -- State (0~255).
    rollback transaction
END

go


CREATE TRIGGER tU_JeVlasnik ON JeVlasnik FOR UPDATE AS
/* erwin Builtin Trigger */
/* UPDATE trigger on JeVlasnik */
BEGIN
  DECLARE  @numrows int,
           @nullcnt int,
           @validcnt int,
           @insIDKorisnik ID, 
           @insIDUO ID,
           @errno   int,
           @severity int,
           @state    int,
           @errmsg  varchar(255)

  SELECT @numrows = @@rowcount
  /* erwin Builtin Trigger */
  /* UO  JeVlasnik on child update no action */
  /* ERWIN_RELATION:CHECKSUM="0002a29d", PARENT_OWNER="", PARENT_TABLE="UO"
    CHILD_OWNER="", CHILD_TABLE="JeVlasnik"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_8", FK_COLUMNS="IDUO" */
  IF
    /* %ChildFK(" OR",UPDATE) */
    UPDATE(IDUO)
  BEGIN
    SELECT @nullcnt = 0
    SELECT @validcnt = count(*)
      FROM inserted,UO
        WHERE
          /* %JoinFKPK(inserted,UO) */
          inserted.IDUO = UO.IDUO
    /* %NotnullFK(inserted," IS NULL","select @nullcnt = count(*) from inserted where"," AND") */
    
    IF @validcnt + @nullcnt != @numrows
    BEGIN
      SELECT @errno  = 30007,
             @errmsg = 'Cannot update JeVlasnik because UO does not exist.'
      GOTO error
    END
  END

  /* erwin Builtin Trigger */
  /* Korisnik  JeVlasnik on child update no action */
  /* ERWIN_RELATION:CHECKSUM="00000000", PARENT_OWNER="", PARENT_TABLE="Korisnik"
    CHILD_OWNER="", CHILD_TABLE="JeVlasnik"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_6", FK_COLUMNS="IDKorisnik" */
  IF
    /* %ChildFK(" OR",UPDATE) */
    UPDATE(IDKorisnik)
  BEGIN
    SELECT @nullcnt = 0
    SELECT @validcnt = count(*)
      FROM inserted,Korisnik
        WHERE
          /* %JoinFKPK(inserted,Korisnik) */
          inserted.IDKorisnik = Korisnik.IDKorisnik
    /* %NotnullFK(inserted," IS NULL","select @nullcnt = count(*) from inserted where"," AND") */
    
    IF @validcnt + @nullcnt != @numrows
    BEGIN
      SELECT @errno  = 30007,
             @errmsg = 'Cannot update JeVlasnik because Korisnik does not exist.'
      GOTO error
    END
  END


  /* erwin Builtin Trigger */
  RETURN
error:
   RAISERROR (@errmsg, -- Message text.
              @severity, -- Severity (0~25).
              @state) -- State (0~255).
    rollback transaction
END

go




CREATE TRIGGER tD_KomiOcena ON KomiOcena FOR DELETE AS
/* erwin Builtin Trigger */
/* DELETE trigger on KomiOcena */
BEGIN
  DECLARE  @errno   int,
           @severity int,
           @state    int,
           @errmsg  varchar(255)
    /* erwin Builtin Trigger */
    /* UO  KomiOcena on child delete no action */
    /* ERWIN_RELATION:CHECKSUM="0002581f", PARENT_OWNER="", PARENT_TABLE="UO"
    CHILD_OWNER="", CHILD_TABLE="KomiOcena"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_5", FK_COLUMNS="IDUO" */
    IF EXISTS (SELECT * FROM deleted,UO
      WHERE
        /* %JoinFKPK(deleted,UO," = "," AND") */
        deleted.IDUO = UO.IDUO AND
        NOT EXISTS (
          SELECT * FROM KomiOcena
          WHERE
            /* %JoinFKPK(KomiOcena,UO," = "," AND") */
            KomiOcena.IDUO = UO.IDUO
        )
    )
    BEGIN
      SELECT @errno  = 30010,
             @errmsg = 'Cannot delete last KomiOcena because UO exists.'
      GOTO error
    END

    /* erwin Builtin Trigger */
    /* Korisnik  KomiOcena on child delete no action */
    /* ERWIN_RELATION:CHECKSUM="00000000", PARENT_OWNER="", PARENT_TABLE="Korisnik"
    CHILD_OWNER="", CHILD_TABLE="KomiOcena"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_4", FK_COLUMNS="IDKorisnik" */
    IF EXISTS (SELECT * FROM deleted,Korisnik
      WHERE
        /* %JoinFKPK(deleted,Korisnik," = "," AND") */
        deleted.IDKorisnik = Korisnik.IDKorisnik AND
        NOT EXISTS (
          SELECT * FROM KomiOcena
          WHERE
            /* %JoinFKPK(KomiOcena,Korisnik," = "," AND") */
            KomiOcena.IDKorisnik = Korisnik.IDKorisnik
        )
    )
    BEGIN
      SELECT @errno  = 30010,
             @errmsg = 'Cannot delete last KomiOcena because Korisnik exists.'
      GOTO error
    END


    /* erwin Builtin Trigger */
    RETURN
error:
   RAISERROR (@errmsg, -- Message text.
              @severity, -- Severity (0~25).
              @state) -- State (0~255).
    rollback transaction
END

go


CREATE TRIGGER tU_KomiOcena ON KomiOcena FOR UPDATE AS
/* erwin Builtin Trigger */
/* UPDATE trigger on KomiOcena */
BEGIN
  DECLARE  @numrows int,
           @nullcnt int,
           @validcnt int,
           @insIDKomiOcena ID,
           @errno   int,
           @severity int,
           @state    int,
           @errmsg  varchar(255)

  SELECT @numrows = @@rowcount
  /* erwin Builtin Trigger */
  /* UO  KomiOcena on child update no action */
  /* ERWIN_RELATION:CHECKSUM="0002d0be", PARENT_OWNER="", PARENT_TABLE="UO"
    CHILD_OWNER="", CHILD_TABLE="KomiOcena"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_5", FK_COLUMNS="IDUO" */
  IF
    /* %ChildFK(" OR",UPDATE) */
    UPDATE(IDUO)
  BEGIN
    SELECT @nullcnt = 0
    SELECT @validcnt = count(*)
      FROM inserted,UO
        WHERE
          /* %JoinFKPK(inserted,UO) */
          inserted.IDUO = UO.IDUO
    /* %NotnullFK(inserted," IS NULL","select @nullcnt = count(*) from inserted where"," AND") */
    select @nullcnt = count(*) from inserted where
      inserted.IDUO IS NULL
    IF @validcnt + @nullcnt != @numrows
    BEGIN
      SELECT @errno  = 30007,
             @errmsg = 'Cannot update KomiOcena because UO does not exist.'
      GOTO error
    END
  END

  /* erwin Builtin Trigger */
  /* Korisnik  KomiOcena on child update no action */
  /* ERWIN_RELATION:CHECKSUM="00000000", PARENT_OWNER="", PARENT_TABLE="Korisnik"
    CHILD_OWNER="", CHILD_TABLE="KomiOcena"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_4", FK_COLUMNS="IDKorisnik" */
  IF
    /* %ChildFK(" OR",UPDATE) */
    UPDATE(IDKorisnik)
  BEGIN
    SELECT @nullcnt = 0
    SELECT @validcnt = count(*)
      FROM inserted,Korisnik
        WHERE
          /* %JoinFKPK(inserted,Korisnik) */
          inserted.IDKorisnik = Korisnik.IDKorisnik
    /* %NotnullFK(inserted," IS NULL","select @nullcnt = count(*) from inserted where"," AND") */
    select @nullcnt = count(*) from inserted where
      inserted.IDKorisnik IS NULL
    IF @validcnt + @nullcnt != @numrows
    BEGIN
      SELECT @errno  = 30007,
             @errmsg = 'Cannot update KomiOcena because Korisnik does not exist.'
      GOTO error
    END
  END


  /* erwin Builtin Trigger */
  RETURN
error:
   RAISERROR (@errmsg, -- Message text.
              @severity, -- Severity (0~25).
              @state) -- State (0~255).
    rollback transaction
END

go




CREATE TRIGGER tD_Korisnik ON Korisnik FOR DELETE AS
/* erwin Builtin Trigger */
/* DELETE trigger on Korisnik */
BEGIN
  DECLARE  @errno   int,
           @severity int,
           @state    int,
           @errmsg  varchar(255)
    /* erwin Builtin Trigger */
    /* Korisnik  JeVlasnik on parent delete no action */
    /* ERWIN_RELATION:CHECKSUM="0001f9ea", PARENT_OWNER="", PARENT_TABLE="Korisnik"
    CHILD_OWNER="", CHILD_TABLE="JeVlasnik"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_6", FK_COLUMNS="IDKorisnik" */
    IF EXISTS (
      SELECT * FROM deleted,JeVlasnik
      WHERE
        /*  %JoinFKPK(JeVlasnik,deleted," = "," AND") */
        JeVlasnik.IDKorisnik = deleted.IDKorisnik
    )
    BEGIN
      SELECT @errno  = 30001,
             @errmsg = 'Cannot delete Korisnik because JeVlasnik exists.'
      GOTO error
    END

    /* erwin Builtin Trigger */
    /* Korisnik  KomiOcena on parent delete no action */
    /* ERWIN_RELATION:CHECKSUM="00000000", PARENT_OWNER="", PARENT_TABLE="Korisnik"
    CHILD_OWNER="", CHILD_TABLE="KomiOcena"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_4", FK_COLUMNS="IDKorisnik" */
    IF EXISTS (
      SELECT * FROM deleted,KomiOcena
      WHERE
        /*  %JoinFKPK(KomiOcena,deleted," = "," AND") */
        KomiOcena.IDKorisnik = deleted.IDKorisnik
    )
    BEGIN
      SELECT @errno  = 30001,
             @errmsg = 'Cannot delete Korisnik because KomiOcena exists.'
      GOTO error
    END


    /* erwin Builtin Trigger */
    RETURN
error:
   RAISERROR (@errmsg, -- Message text.
              @severity, -- Severity (0~25).
              @state) -- State (0~255).
    rollback transaction
END

go


CREATE TRIGGER tU_Korisnik ON Korisnik FOR UPDATE AS
/* erwin Builtin Trigger */
/* UPDATE trigger on Korisnik */
BEGIN
  DECLARE  @numrows int,
           @nullcnt int,
           @validcnt int,
           @insIDKorisnik ID,
           @errno   int,
           @severity int,
           @state    int,
           @errmsg  varchar(255)

  SELECT @numrows = @@rowcount
  /* erwin Builtin Trigger */
  /* Korisnik  JeVlasnik on parent update no action */
  /* ERWIN_RELATION:CHECKSUM="00023c65", PARENT_OWNER="", PARENT_TABLE="Korisnik"
    CHILD_OWNER="", CHILD_TABLE="JeVlasnik"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_6", FK_COLUMNS="IDKorisnik" */
  IF
    /* %ParentPK(" OR",UPDATE) */
    UPDATE(IDKorisnik)
  BEGIN
    IF EXISTS (
      SELECT * FROM deleted,JeVlasnik
      WHERE
        /*  %JoinFKPK(JeVlasnik,deleted," = "," AND") */
        JeVlasnik.IDKorisnik = deleted.IDKorisnik
    )
    BEGIN
      SELECT @errno  = 30005,
             @errmsg = 'Cannot update Korisnik because JeVlasnik exists.'
      GOTO error
    END
  END

  /* erwin Builtin Trigger */
  /* Korisnik  KomiOcena on parent update no action */
  /* ERWIN_RELATION:CHECKSUM="00000000", PARENT_OWNER="", PARENT_TABLE="Korisnik"
    CHILD_OWNER="", CHILD_TABLE="KomiOcena"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_4", FK_COLUMNS="IDKorisnik" */
  IF
    /* %ParentPK(" OR",UPDATE) */
    UPDATE(IDKorisnik)
  BEGIN
    IF EXISTS (
      SELECT * FROM deleted,KomiOcena
      WHERE
        /*  %JoinFKPK(KomiOcena,deleted," = "," AND") */
        KomiOcena.IDKorisnik = deleted.IDKorisnik
    )
    BEGIN
      SELECT @errno  = 30005,
             @errmsg = 'Cannot update Korisnik because KomiOcena exists.'
      GOTO error
    END
  END


  /* erwin Builtin Trigger */
  RETURN
error:
   RAISERROR (@errmsg, -- Message text.
              @severity, -- Severity (0~25).
              @state) -- State (0~255).
    rollback transaction
END

go




CREATE TRIGGER tD_PHAE ON PHAE FOR DELETE AS
/* erwin Builtin Trigger */
/* DELETE trigger on PHAE */
BEGIN
  DECLARE  @errno   int,
           @severity int,
           @state    int,
           @errmsg  varchar(255)
    /* erwin Builtin Trigger */
    /* UO  PHAE on child delete no action */
    /* ERWIN_RELATION:CHECKSUM="00011b40", PARENT_OWNER="", PARENT_TABLE="UO"
    CHILD_OWNER="", CHILD_TABLE="PHAE"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_2", FK_COLUMNS="IDUO" */
    IF EXISTS (SELECT * FROM deleted,UO
      WHERE
        /* %JoinFKPK(deleted,UO," = "," AND") */
        deleted.IDUO = UO.IDUO AND
        NOT EXISTS (
          SELECT * FROM PHAE
          WHERE
            /* %JoinFKPK(PHAE,UO," = "," AND") */
            PHAE.IDUO = UO.IDUO
        )
    )
    BEGIN
      SELECT @errno  = 30010,
             @errmsg = 'Cannot delete last PHAE because UO exists.'
      GOTO error
    END


    /* erwin Builtin Trigger */
    RETURN
error:
   RAISERROR (@errmsg, -- Message text.
              @severity, -- Severity (0~25).
              @state) -- State (0~255).
    rollback transaction
END

go


CREATE TRIGGER tU_PHAE ON PHAE FOR UPDATE AS
/* erwin Builtin Trigger */
/* UPDATE trigger on PHAE */
BEGIN
  DECLARE  @numrows int,
           @nullcnt int,
           @validcnt int,
           @insIDUO ID,
           @errno   int,
           @severity int,
           @state    int,
           @errmsg  varchar(255)

  SELECT @numrows = @@rowcount
  /* erwin Builtin Trigger */
  /* UO  PHAE on child update no action */
  /* ERWIN_RELATION:CHECKSUM="000149ae", PARENT_OWNER="", PARENT_TABLE="UO"
    CHILD_OWNER="", CHILD_TABLE="PHAE"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_2", FK_COLUMNS="IDUO" */
  IF
    /* %ChildFK(" OR",UPDATE) */
    UPDATE(IDUO)
  BEGIN
    SELECT @nullcnt = 0
    SELECT @validcnt = count(*)
      FROM inserted,UO
        WHERE
          /* %JoinFKPK(inserted,UO) */
          inserted.IDUO = UO.IDUO
    /* %NotnullFK(inserted," IS NULL","select @nullcnt = count(*) from inserted where"," AND") */
    
    IF @validcnt + @nullcnt != @numrows
    BEGIN
      SELECT @errno  = 30007,
             @errmsg = 'Cannot update PHAE because UO does not exist.'
      GOTO error
    END
  END


  /* erwin Builtin Trigger */
  RETURN
error:
   RAISERROR (@errmsg, -- Message text.
              @severity, -- Severity (0~25).
              @state) -- State (0~255).
    rollback transaction
END

go




CREATE TRIGGER tD_UO ON UO FOR DELETE AS
/* erwin Builtin Trigger */
/* DELETE trigger on UO */
BEGIN
  DECLARE  @errno   int,
           @severity int,
           @state    int,
           @errmsg  varchar(255)
    /* erwin Builtin Trigger */
    /* UO  JeVlasnik on parent delete no action */
    /* ERWIN_RELATION:CHECKSUM="0003853a", PARENT_OWNER="", PARENT_TABLE="UO"
    CHILD_OWNER="", CHILD_TABLE="JeVlasnik"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_8", FK_COLUMNS="IDUO" */
    IF EXISTS (
      SELECT * FROM deleted,JeVlasnik
      WHERE
        /*  %JoinFKPK(JeVlasnik,deleted," = "," AND") */
        JeVlasnik.IDUO = deleted.IDUO
    )
    BEGIN
      SELECT @errno  = 30001,
             @errmsg = 'Cannot delete UO because JeVlasnik exists.'
      GOTO error
    END

    /* erwin Builtin Trigger */
    /* UO  KomiOcena on parent delete no action */
    /* ERWIN_RELATION:CHECKSUM="00000000", PARENT_OWNER="", PARENT_TABLE="UO"
    CHILD_OWNER="", CHILD_TABLE="KomiOcena"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_5", FK_COLUMNS="IDUO" */
    IF EXISTS (
      SELECT * FROM deleted,KomiOcena
      WHERE
        /*  %JoinFKPK(KomiOcena,deleted," = "," AND") */
        KomiOcena.IDUO = deleted.IDUO
    )
    BEGIN
      SELECT @errno  = 30001,
             @errmsg = 'Cannot delete UO because KomiOcena exists.'
      GOTO error
    END

    /* erwin Builtin Trigger */
    /* UO  UOSlike on parent delete no action */
    /* ERWIN_RELATION:CHECKSUM="00000000", PARENT_OWNER="", PARENT_TABLE="UO"
    CHILD_OWNER="", CHILD_TABLE="UOSlike"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_3", FK_COLUMNS="IDUO" */
    IF EXISTS (
      SELECT * FROM deleted,UOSlike
      WHERE
        /*  %JoinFKPK(UOSlike,deleted," = "," AND") */
        UOSlike.IDUO = deleted.IDUO
    )
    BEGIN
      SELECT @errno  = 30001,
             @errmsg = 'Cannot delete UO because UOSlike exists.'
      GOTO error
    END

    /* erwin Builtin Trigger */
    /* UO  PHAE on parent delete no action */
    /* ERWIN_RELATION:CHECKSUM="00000000", PARENT_OWNER="", PARENT_TABLE="UO"
    CHILD_OWNER="", CHILD_TABLE="PHAE"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_2", FK_COLUMNS="IDUO" */
    IF EXISTS (
      SELECT * FROM deleted,PHAE
      WHERE
        /*  %JoinFKPK(PHAE,deleted," = "," AND") */
        PHAE.IDUO = deleted.IDUO
    )
    BEGIN
      SELECT @errno  = 30001,
             @errmsg = 'Cannot delete UO because PHAE exists.'
      GOTO error
    END


    /* erwin Builtin Trigger */
    RETURN
error:
   RAISERROR (@errmsg, -- Message text.
              @severity, -- Severity (0~25).
              @state) -- State (0~255).
    rollback transaction
END

go


CREATE TRIGGER tU_UO ON UO FOR UPDATE AS
/* erwin Builtin Trigger */
/* UPDATE trigger on UO */
BEGIN
  DECLARE  @numrows int,
           @nullcnt int,
           @validcnt int,
           @insIDUO ID,
           @errno   int,
           @severity int,
           @state    int,
           @errmsg  varchar(255)

  SELECT @numrows = @@rowcount
  /* erwin Builtin Trigger */
  /* UO  JeVlasnik on parent update no action */
  /* ERWIN_RELATION:CHECKSUM="0003e144", PARENT_OWNER="", PARENT_TABLE="UO"
    CHILD_OWNER="", CHILD_TABLE="JeVlasnik"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_8", FK_COLUMNS="IDUO" */
  IF
    /* %ParentPK(" OR",UPDATE) */
    UPDATE(IDUO)
  BEGIN
    IF EXISTS (
      SELECT * FROM deleted,JeVlasnik
      WHERE
        /*  %JoinFKPK(JeVlasnik,deleted," = "," AND") */
        JeVlasnik.IDUO = deleted.IDUO
    )
    BEGIN
      SELECT @errno  = 30005,
             @errmsg = 'Cannot update UO because JeVlasnik exists.'
      GOTO error
    END
  END

  /* erwin Builtin Trigger */
  /* UO  KomiOcena on parent update no action */
  /* ERWIN_RELATION:CHECKSUM="00000000", PARENT_OWNER="", PARENT_TABLE="UO"
    CHILD_OWNER="", CHILD_TABLE="KomiOcena"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_5", FK_COLUMNS="IDUO" */
  IF
    /* %ParentPK(" OR",UPDATE) */
    UPDATE(IDUO)
  BEGIN
    IF EXISTS (
      SELECT * FROM deleted,KomiOcena
      WHERE
        /*  %JoinFKPK(KomiOcena,deleted," = "," AND") */
        KomiOcena.IDUO = deleted.IDUO
    )
    BEGIN
      SELECT @errno  = 30005,
             @errmsg = 'Cannot update UO because KomiOcena exists.'
      GOTO error
    END
  END

  /* erwin Builtin Trigger */
  /* UO  UOSlike on parent update no action */
  /* ERWIN_RELATION:CHECKSUM="00000000", PARENT_OWNER="", PARENT_TABLE="UO"
    CHILD_OWNER="", CHILD_TABLE="UOSlike"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_3", FK_COLUMNS="IDUO" */
  IF
    /* %ParentPK(" OR",UPDATE) */
    UPDATE(IDUO)
  BEGIN
    IF EXISTS (
      SELECT * FROM deleted,UOSlike
      WHERE
        /*  %JoinFKPK(UOSlike,deleted," = "," AND") */
        UOSlike.IDUO = deleted.IDUO
    )
    BEGIN
      SELECT @errno  = 30005,
             @errmsg = 'Cannot update UO because UOSlike exists.'
      GOTO error
    END
  END

  /* erwin Builtin Trigger */
  /* UO  PHAE on parent update no action */
  /* ERWIN_RELATION:CHECKSUM="00000000", PARENT_OWNER="", PARENT_TABLE="UO"
    CHILD_OWNER="", CHILD_TABLE="PHAE"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_2", FK_COLUMNS="IDUO" */
  IF
    /* %ParentPK(" OR",UPDATE) */
    UPDATE(IDUO)
  BEGIN
    IF EXISTS (
      SELECT * FROM deleted,PHAE
      WHERE
        /*  %JoinFKPK(PHAE,deleted," = "," AND") */
        PHAE.IDUO = deleted.IDUO
    )
    BEGIN
      SELECT @errno  = 30005,
             @errmsg = 'Cannot update UO because PHAE exists.'
      GOTO error
    END
  END


  /* erwin Builtin Trigger */
  RETURN
error:
   RAISERROR (@errmsg, -- Message text.
              @severity, -- Severity (0~25).
              @state) -- State (0~255).
    rollback transaction
END

go




CREATE TRIGGER tD_UOSlike ON UOSlike FOR DELETE AS
/* erwin Builtin Trigger */
/* DELETE trigger on UOSlike */
BEGIN
  DECLARE  @errno   int,
           @severity int,
           @state    int,
           @errmsg  varchar(255)
    /* erwin Builtin Trigger */
    /* UO  UOSlike on child delete no action */
    /* ERWIN_RELATION:CHECKSUM="000122e1", PARENT_OWNER="", PARENT_TABLE="UO"
    CHILD_OWNER="", CHILD_TABLE="UOSlike"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_3", FK_COLUMNS="IDUO" */
    IF EXISTS (SELECT * FROM deleted,UO
      WHERE
        /* %JoinFKPK(deleted,UO," = "," AND") */
        deleted.IDUO = UO.IDUO AND
        NOT EXISTS (
          SELECT * FROM UOSlike
          WHERE
            /* %JoinFKPK(UOSlike,UO," = "," AND") */
            UOSlike.IDUO = UO.IDUO
        )
    )
    BEGIN
      SELECT @errno  = 30010,
             @errmsg = 'Cannot delete last UOSlike because UO exists.'
      GOTO error
    END


    /* erwin Builtin Trigger */
    RETURN
error:
   RAISERROR (@errmsg, -- Message text.
              @severity, -- Severity (0~25).
              @state) -- State (0~255).
    rollback transaction
END

go


CREATE TRIGGER tU_UOSlike ON UOSlike FOR UPDATE AS
/* erwin Builtin Trigger */
/* UPDATE trigger on UOSlike */
BEGIN
  DECLARE  @numrows int,
           @nullcnt int,
           @validcnt int,
           @insIDUO ID,
           @errno   int,
           @severity int,
           @state    int,
           @errmsg  varchar(255)

  SELECT @numrows = @@rowcount
  /* erwin Builtin Trigger */
  /* UO  UOSlike on child update no action */
  /* ERWIN_RELATION:CHECKSUM="000150ee", PARENT_OWNER="", PARENT_TABLE="UO"
    CHILD_OWNER="", CHILD_TABLE="UOSlike"
    P2C_VERB_PHRASE="", C2P_VERB_PHRASE="", 
    FK_CONSTRAINT="R_3", FK_COLUMNS="IDUO" */
  IF
    /* %ChildFK(" OR",UPDATE) */
    UPDATE(IDUO)
  BEGIN
    SELECT @nullcnt = 0
    SELECT @validcnt = count(*)
      FROM inserted,UO
        WHERE
          /* %JoinFKPK(inserted,UO) */
          inserted.IDUO = UO.IDUO
    /* %NotnullFK(inserted," IS NULL","select @nullcnt = count(*) from inserted where"," AND") */
    
    IF @validcnt + @nullcnt != @numrows
    BEGIN
      SELECT @errno  = 30007,
             @errmsg = 'Cannot update UOSlike because UO does not exist.'
      GOTO error
    END
  END


  /* erwin Builtin Trigger */
  RETURN
error:
   RAISERROR (@errmsg, -- Message text.
              @severity, -- Severity (0~25).
              @state) -- State (0~255).
    rollback transaction
END

go


