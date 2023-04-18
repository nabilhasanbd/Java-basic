select split_part('11-812-00ডি-315', '-', 3);

insert into holding_number (SELECT split_part(taxcd, '-', 3) FROM build_holdings;

INSERT INTO build_holdings (holding_number)
SELECT split_part(taxcd, '-', 3) FROM build_holdings;

INSERT INTO build_holdings (holding_number)
VALUES (split_part('11-812-00ডি-315', '-', 2));

select taxcd, ward, taxzoneid, holding_number, holdingext from build_holdings
where taxcd = '11-812-00ডি-315';

UPDATE build_holdings
SET holding_number = split_part(taxcd, '-', 3);