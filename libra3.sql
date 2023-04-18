
CREATE DATABASE IF NOT EXISTS `libra` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `libra`;

drop table if exists muon;
drop table if exists docgia;
drop table if exists sach;
drop table if exists tacpham;

CREATE TABLE TACPHAM(
	NT 		int  NOT NULL AUTO_INCREMENT,
	tua 		varchar(150),
	tacgia 		varchar(100),
	PRIMARY KEY (NT)
);



CREATE TABLE DOCGIA (
	ND		int  NOT NULL AUTO_INCREMENT,
	ho		VARCHAR(30),
	ten		VARCHAR(30),
	dchi	VARCHAR(100),
	tel		CHAR(10),
	pass 		CHAR(10),
	PRIMARY KEY (`ND`)
);


CREATE TABLE SACH (
	NS		int  NOT NULL AUTO_INCREMENT,
	nxb		varchar(50),
	NT		int not null, 
	SL		INT DEFAULT 0,
 	foreign key(NT) references TACPHAM(NT),
	PRIMARY KEY (NS)
);


CREATE TABLE MUON (
	NS		int NOT NULL, 
	foreign key(NS) references SACH(NS),
	ngaymuon	date not NULL,
	hantra	date not null,
	ngaytra 	date,
	ND		int not null, 	
	foreign key(ND) references DOCGIA(ND)
);



INSERT INTO TACPHAM VALUES (1,'Les miserables','Victor Hugo');
INSERT INTO TACPHAM VALUES (2,'Germinal ','Emile Zola');
INSERT INTO TACPHAM VALUES (3,'Madame Bovary','Gustave Flaubert');
INSERT INTO TACPHAM VALUES (4,'Les Fleurs du mal','Charles Baudelaire');
INSERT INTO TACPHAM VALUES (5,'La Bete Humaine','Emile Zola');
INSERT INTO TACPHAM VALUES (6,'Le Pere Goriot ','Honore de Balzac');
INSERT INTO TACPHAM VALUES (7,'Le Rouge et le Noir','Stendhal');
INSERT INTO TACPHAM VALUES (8,'Une vie','Guy de Maupassant');
INSERT INTO TACPHAM VALUES (9,'Ubu Roi','Alfred Jarry');
INSERT INTO TACPHAM VALUES (10,'Poésie','Arthur Rimbaud');
INSERT INTO TACPHAM VALUES (11,'La Mare au Diable','George Sand');
INSERT INTO TACPHAM VALUES (12,'Carmen','Prosper Merimee');
INSERT INTO TACPHAM VALUES (13,'Lettres de mon moulin','Alphonse Daudet');
INSERT INTO TACPHAM VALUES (14,'Les contes du chat perché','Marcel Ayme');
INSERT INTO TACPHAM VALUES (15,'La Peste','Albert Camus');
INSERT INTO TACPHAM VALUES (16,'Le petit prince','Antoine de St Exupery');


INSERT INTO DOCGIA VALUES (1,'Lecoeur','Jeanette','16 rue de la République, 75010 Paris','0123456789', '123');
INSERT INTO DOCGIA VALUES (2,'Lecoeur','Philippe','16 rue de la République, 75010 Paris','0145279274', '123');
INSERT INTO DOCGIA VALUES (3,'Dupont','Yvan','73 rue Lamarck, 75018 Paris','0163538294', '123');
INSERT INTO DOCGIA VALUES (4,'Mercier','Claude','155 avenue Parmentier, 75011 Paris','0136482736', '123');
INSERT INTO DOCGIA VALUES (5,'Léger','Marc','90 avenue du Maine, 75014 Paris','0164832947', '123');
INSERT INTO DOCGIA VALUES (6,'Martin','Laure','51 boulevard Diderot, 75012 Paris','0174693277', '123');
INSERT INTO DOCGIA VALUES (7,'Crozier','Martine','88 rue des Portes Blanches, 75018 Paris','0146829384', '123');
INSERT INTO DOCGIA VALUES (8,'Lebon','Clément','196 boulevard de Sebastopol, 75001 Paris','0132884739', '123');
INSERT INTO DOCGIA VALUES (9,'Dufour','Jacques','32 rue des Alouettes, 75003 Paris','0155382940', '123');
INSERT INTO DOCGIA VALUES (10,'Dufour','Antoine','32 rue des Alouettes, 75003 Paris','0155382940', '123');
INSERT INTO DOCGIA VALUES (11,'Dufour','Stéphanie','32 rue des Alouettes, 75003 Paris','0155382940', '123');
INSERT INTO DOCGIA VALUES (12,'Raymond','Carole','35 rue Oberkampf, 75011 Paris','0153829402', '123');
INSERT INTO DOCGIA VALUES (13,'Durand','Albert','4 rue Mandar, 75002 Paris','0642374021', '123');
INSERT INTO DOCGIA VALUES (14,'Wilson','Paul','12 rue Paul Vaillant Couturier, 92400 Montrouge','0642327407', '123');
INSERT INTO DOCGIA VALUES (15,'Grecault','Philippe','15 rue de la Roquette, 75012 Paris','0132762983', '123');
INSERT INTO DOCGIA VALUES (16,'Carre','Stéphane','51 boulevard Diderot, 75012 Paris','0174693277', '123');
INSERT INTO DOCGIA VALUES (17,'Johnson','Astrid','3 rue Léon Blum, 75002 Paris','0143762947', '123');
INSERT INTO DOCGIA VALUES (18,'Mirou','Caroline','2 square Mirabeau, 75011 Paris','0163827399', '123');
INSERT INTO DOCGIA VALUES (19,'Espelette','Jean-Jacques','141 avenue de France, 75019 Paris','0134887264', '123');
INSERT INTO DOCGIA VALUES (20,'Despentes','Anthony','56 boulevard de la Villette, 75019 Paris','0133889463', '123');
INSERT INTO DOCGIA VALUES (21,'Terlu','Véronique','45 rue des Batignolles, 75020 Paris','0165998372', '123');
INSERT INTO DOCGIA VALUES (22,'Rihour','Cécile','7 rue Montorgueil, 75002 Paris','0166894754', '123');
INSERT INTO DOCGIA VALUES (23,'Franchet','Pierre','160 rue Montmartre, 75009 Paris','0633628549', '123');
INSERT INTO DOCGIA VALUES (24,'Trochet','Ernest','34 rue de l''Esperance, 75008 Paris','0638295563', '123');
INSERT INTO DOCGIA VALUES (25,'Gainard','Simon','55 rue Desnouettes, 75015 Paris','0174928934', '123');
INSERT INTO DOCGIA VALUES (26,'Touche','Johanna','14 rue du Bac, 75006 Paris','0619384065', '123');
INSERT INTO DOCGIA VALUES (27,'Cornu','Sylvain','22 rue Mouffetard, 75005 Paris','0184927489', '123');
INSERT INTO DOCGIA VALUES (28,'Frederic','Cyril','15 rue du Simplon, 75018 Paris','0173625492', '123');
INSERT INTO DOCGIA VALUES (29,'Crestard','Cedric','5 rue Doudeauville, 75018 Paris','0629485700', '123');
INSERT INTO DOCGIA VALUES (30,'Le Bihan','Karine','170 bis rue Ordener, 75018 Paris','0638995221', '123');


INSERT INTO SACH VALUES (1,'GF',1,10);
INSERT INTO SACH VALUES (2,'FOLIO',2,10);
INSERT INTO SACH VALUES (3,'HACHETTE',3,10);
INSERT INTO SACH VALUES (4,'GF',4,10);
INSERT INTO SACH VALUES (5,'FOLIO',5,10);
INSERT INTO SACH VALUES (6,'FOLIO',6,10);
INSERT INTO SACH VALUES (7,'GF',7,10);
INSERT INTO SACH VALUES (8,'FOLIO',8,10);
INSERT INTO SACH VALUES (9,'HACHETTE',9,10);
INSERT INTO SACH VALUES (10,'GF',10,10);
INSERT INTO SACH VALUES (11,'HACHETTE',11,10);
INSERT INTO SACH VALUES (12,'FOLIO',12,10);
INSERT INTO SACH VALUES (13,'GF',13,10);
INSERT INTO SACH VALUES (14,'FOLIO',14,10);
INSERT INTO SACH VALUES (15,'HACHETTE',15,10);
INSERT INTO SACH VALUES (16,'HACHETTE',16,10);

--- alter session set nls_date_format='yyyy-mm-dd';

INSERT INTO MUON VALUES (1,'2007-09-02','2007-09-16','2007-09-07',1);
INSERT INTO MUON VALUES (1,'2006-10-1','2006-10-15','2006-10-11',26);
INSERT INTO MUON VALUES (1,'2007-6-14','2007-6-28','2007-6-19',2);
INSERT INTO MUON VALUES (1,'2007-4-27','2007-5-11','2007-5-8',3);
INSERT INTO MUON VALUES (2,'2007-8-23','2007-9-6','2007-9-2',4);
INSERT INTO MUON VALUES (2,'2007-10-6','2007-10-20', NULL,28);
INSERT INTO MUON VALUES (9,'2007-10-6','2007-10-20', NULL,28);
INSERT INTO MUON VALUES (3,'2007-9-9','2007-9-23','2007-9-13',3);
INSERT INTO MUON VALUES (4,'2007-2-8','2007-2-22','2007-2-12',12);
INSERT INTO MUON VALUES (4,'2006-2-7','2006-2-21','2006-2-20',4);
INSERT INTO MUON VALUES (4,'2007-6-17','2007-7-1','2007-6-27',5);
INSERT INTO MUON VALUES (5,'2007-10-4','2007-10-19', NULL,16);
INSERT INTO MUON VALUES (6,'2007-3-11','2007-3-25','2007-3-16',3);
INSERT INTO MUON VALUES (8,'2007-7-14','2007-7-28','2007-7-20',18);
INSERT INTO MUON VALUES (8,'2007-3-9','2007-3-23','2007-3-27',13);
INSERT INTO MUON VALUES (10,'2007-4-11','2007-4-25','2007-4-23',8);
INSERT INTO MUON VALUES (10,'2006-1-27','2006-2-10','2006-1-31',7);
INSERT INTO MUON VALUES (11,'2007-10-1','2007-10-15', NULL,22);
INSERT INTO MUON VALUES (12,'2003-3-3','2003-3-17','2003-3-13',7);
INSERT INTO MUON VALUES (14,'2007-10-2','2007-10-16', NULL,1);
INSERT INTO MUON VALUES (15,'2007-5-4','2007-5-18','2007-5-12',10);
INSERT INTO MUON VALUES (16,'2007-10-5','2007-10-19', NULL,2);

-- Thủ tục thêm tác phẩm 
delimiter //
drop procedure if exists addTacPham //
create procedure addTacPham(in tua varchar(150), in tacgia varchar(100), in nxb	varchar(50), in SL INT)
begin
	declare NT int;
	INSERT INTO tacpham (tua, tacgia) VALUES (tua, tacgia);
    -- set NT = (select t.NT from tacpham t where t.tua = tua and t.tacgia = tacgia);
    set NT = (select last_insert_id());
    INSERT INTO sach(nxb, nt,sl) VALUES (nxb, NT, sl);
end//

-- Example using addTacPham
call addTacPham("tua1", "tacgia1", "nxb1", 23);

-- Hàm tính tổng số sách
delimiter //
drop function if exists tongSach //
create function tongSach() returns int
deterministic
begin
	return (select sum(SL) from sach);
end //

-- Example using function
-- select tongSach();

-- Hàm tính tổng số sách chưa trả
delimiter //
drop function if exists tongSachChuaTra //
create function tongSachChuaTra() returns int
deterministic
begin
	return (select count(*) from muon where ngaytra is NULL);
end //

-- Example using function
-- select tongSachChuaTra();


-- Trigger kiểm tra ngày trả sách khi insert phải lớn hơn ngày mượn
delimiter //
drop trigger if exists check_insert_return_date //
create trigger check_insert_return_date
before insert on muon
for each row 
begin
  if new.ngaytra < new.ngaymuon then
	signal sqlstate '45000'
      set message_text = 'Return date must be greater than loan date';
  end if;
end //

-- Example using trigger check_insert_return_date
-- INSERT INTO MUON VALUES (16,'2007-10-5','2007-10-19', '2007-10-4',2);

-- Trigger kiểm tra ngày trả sách khi update phải lớn hơn ngày mượn, mặc định giữ nguyên
delimiter //
drop trigger if exists check_update_return_date //
create trigger check_update_return_date
before update on muon
for each row
begin
	if new.ngaytra < new.ngaymuon then
		set new.ngaytra = old.ngaytra;
	end if;
end//

-- Example using trigger check_update_return_date
-- update muon set ngaytra = '2006-09-01' where ND=26 and NS = 1; 
-- update muon set ngaytra = '2006-10-13' where ND=26 and NS = 1; 

-- Transaction mượn sách
delimiter //
drop procedure if exists muonSach //
create procedure muonSach(NS int, ngaymuon date, hantra	date, ND int)
begin
	set SQL_SAFE_UPDATES = 0;
	start transaction;
    insert into muon (NS, ngaymuon, hantra, ND) value(NS, ngaymuon, hantra, ND);
    update sach s set s.sl = s.sl - 1 where s.NS = NS;
    commit;
end//

-- Example using transaction mượn sách
-- call muonSach(1, "2023-04-17", "2023-04-28", 1);
-- select * from sach;