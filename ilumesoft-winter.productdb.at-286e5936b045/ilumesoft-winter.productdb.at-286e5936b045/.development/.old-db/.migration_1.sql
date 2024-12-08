/* Migrate the old sanofi product areas, if they are linked to product */
INSERT INTO sanofi_pdb_areas (id, name, is_active)
SELECT sanarea.uid, sanarea.title, 1 FROM tx_products_domain_model_area sanarea
INNER JOIN tx_products_domain_model_product sanprod ON sanprod.area = sanarea.uid
WHERE sanarea.deleted = 0 AND sanarea.hidden = 0 AND sanprod.hidden = 0 AND sanprod.deleted = 0
GROUP BY sanarea.uid;


/* Migrate the old sanofi product ingredients, if they are linked to products */
INSERT INTO sanofi_pdb_ingredients (id, name)
SELECT saning.uid, saning.title FROM tx_products_domain_model_ingredient saning
INNER JOIN tx_products_product_ingredient_mm sanprod_x_ing ON sanprod_x_ing.uid_foreign = saning.uid
INNER JOIN tx_products_domain_model_product sanprod ON sanprod.uid = sanprod_x_ing.uid_local
WHERE saning.hidden = 0 AND saning.deleted = 0 AND sanprod.hidden = 0 AND sanprod.deleted = 0
GROUP BY saning.uid;

/* Migrate the old sanofi products, if they are visible and not deleted */
INSERT INTO sanofi_pdb_products (id, name, is_visible, description, area_id, ingredient_type)
SELECT uid, title, hidden^1 as is_visible, "", area, IF (sanprod.inhaltsstoffe = 0, 2, IF (sanprod.inhaltsstoffe = 1, 1, 0)) as inhaltstoffe
FROM tx_products_domain_model_product sanprod
WHERE sanprod.deleted = 0 AND sanprod.hidden = 0;

/* Migrate the old sanofi product x ingredient references */
INSERT INTO sanofi_pdb_product_x_ingredients (product_id, ingredient_id)
SELECT uid_local, uid_foreign
FROM tx_products_product_ingredient_mm sanprod_x_ing
INNER JOIN tx_products_domain_model_product sanprod ON sanprod.uid = sanprod_x_ing.uid_local
INNER JOIN tx_products_domain_model_ingredient saning ON saning.uid = sanprod_x_ing.uid_foreign
WHERE sanprod.hidden = 0 AND sanprod.deleted = 0 AND saning.hidden = 0 AND saning.deleted = 0;

/* Migrate the old sanofi product variants, if they are visible and not deleted and linked to a product */
INSERT INTO sanofi_pdb_product_variants (id, product_id, name, description, is_visible, is_prescription_required, is_pharmacy_required, is_nutritional_supplement, is_cosmetic, is_medicine)
SELECT sanprodvar.uid, sanprodvar.product, sanprodvar.title, "", sanprodvar.hidden^1, sanprodvar.prescription, sanprodvar.apothekenpflichtig, sanprodvar.nahrungsergaenzungsmittel, sanprodvar.kosmetikum, sanprodvar.medizinprodukt
FROM tx_products_domain_model_variant sanprodvar
    INNER JOIN tx_products_domain_model_product sanprod ON sanprod.uid = sanprodvar.product
WHERE sanprodvar.deleted = 0 AND sanprodvar.hidden = 0 AND sanprod.deleted = 0 AND sanprod.hidden = 0

/* Migrate the old sanofi product variant types, if they are visible and not deleted and linked to a product variant, which is linked to product */
INSERT INTO sanofi_pdb_product_variant_type (id, variant_id, pzn, amount)
SELECT santype.uid, santype.variant, santype.pzn, santype.amount
FROM tx_products_domain_model_type santype
INNER JOIN tx_products_domain_model_variant sanprodvar ON sanprodvar.uid = santype.variant
INNER JOIN tx_products_domain_model_product sanprod ON sanprod.uid = sanprodvar.product
WHERE santype.deleted = 0 AND santype.hidden = 0 AND sanprodvar.deleted = 0 AND sanprodvar.hidden = 0 AND sanprod.deleted = 0 AND sanprod.hidden = 0

/* Create and fill temp colors table */
CREATE TABLE `temp_product_colors` (
`id` int(10) unsigned NOT NULL,
`name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
`color_main` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`color_sub` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `temp_product_colors` (`id`, `name`, `color_main`, `color_sub`)
VALUES
    (15, 'Allegra®', '#853A92', '#C83D99'),
    (30, 'Novalgin®', '#008381', '#2C779B'),
    (36, 'Maalox®', '#0076C6', '#6DC0EC'),
    (44, 'Batrafen® antimykotischer Nagellack', '#A70E76', '#D47A00'),
    (56, 'Bisolvon®', '#1D447A', '#FF7704'),
    (58, 'Mucoangin®', '#133972', '#009AE0'),
    (60, 'Mucosan®', '#1B1805', '#676559'),
    (61, 'Mucosolvan®', '#003188', '#F1001A'),
    (62, 'Mucospas®', '#201D07', '#00B7F1'),
    (63, 'Rhinospray®', '#00BCB3', '#03418A'),
    (64, 'Silomat®', '#58B8D0', '#38347A'),
    (65, 'Silomat® Eibisch/Honig-Sirup', '#58B8D0', '#38347A'),
    (93, 'Finalgon® - Salbe', '#0033A0', '#FD3A2C'),
    (95, 'Thomapyrin®', '#003156', '#009FDA'),
    (105, 'Buscapina®', '#16874F', '#FFAB40'),
    (107, 'Buscopan®', '#16874F', '#FFAB40'),
    (108, 'Dulcolax®', '#076333', '#A6C503'),
    (109, 'Guttalax® Tropfen', '#076333', '#A6C503'),
    (112, 'Antistax®', '#880038', '#F80000'),
    (114, 'Pharmaton® Vital', '#FD7900', '#F63000'),
    (118, 'SELSUN® medizinisches Shampoo', '#00AD82', '#91726B'),
    (119, 'ThomaDuo®', '#0B1E61', '#EB038C'),
    (125, 'DulcoSoft®', '#005F1A', '#0090AC'),
    (127, 'Muconatural Complete®', '#001379', '#00A730'),
    (130, 'Novanight®', '#001869', '#00CCED'),
    (131, 'Buscomint®', '#008A2F', '#7CB9A0'),
    (135, 'AlleNasal® Protect', '#7F0D87', '#B40084'),
    (137, 'DulcoSoft Duo®', '#005F1A', '#0090AC'),
    (138, 'Buscopan® Plus', '#16874F', '#FFAB40'),
    (139, 'Essentiale®', '#992000', '#F56C00');

/* Update page colorings */
UPDATE sanofi_pdb_products sanpro
INNER JOIN temp_color_table sanpro2 ON sanpro2.id = sanpro.id
SET sanpro.color_main = sanpro2.color_main, sanpro.color_sub = sanpro2.color_sub
