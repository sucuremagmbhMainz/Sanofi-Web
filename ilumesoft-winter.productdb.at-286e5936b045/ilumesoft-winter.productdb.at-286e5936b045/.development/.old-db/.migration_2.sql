/* Migrate date1 for variants */
UPDATE sanofi_pdb_product_variants spro
    INNER JOIN (
    SELECT sanprodvar.uid, sanprodvar.title, santype.date1
    FROM system_files sysf
    INNER JOIN tx_products_domain_model_variant sanprodvar ON sanprodvar.uid = sysf.attachment_id
    INNER JOIN tx_products_domain_model_type santype ON santype.variant = sanprodvar.uid
    WHERE sysf.field = 'pdf_file_one' AND santype.date1 != ''
    ) sub ON sub.uid = spro.id
    SET spro.pdf_one_date = sub.date1;

/* Migrate date2 for variants */
UPDATE sanofi_pdb_product_variants spro
    INNER JOIN (
    SELECT sanprodvar.uid, sanprodvar.title, santype.date2
    FROM system_files sysf
    INNER JOIN tx_products_domain_model_variant sanprodvar ON sanprodvar.uid = sysf.attachment_id
    INNER JOIN tx_products_domain_model_type santype ON santype.variant = sanprodvar.uid
    WHERE sysf.field = 'pdf_file_two' AND santype.date2 != ''
    ) sub ON sub.uid = spro.id
    SET spro.pdf_two_date = sub.date2;

/* Update PDF1 File data based on imports */
UPDATE system_files sysf
    INNER JOIN (
    SELECT sysr.title, sysr.description, sanvar.uid, sanprod.title prodtitle
    FROM sys_file_reference sysr
    INNER JOIN tx_products_domain_model_type santype ON santype.uid = sysr.uid_foreign
    INNER JOIN tx_products_domain_model_variant sanvar ON sanvar.uid = santype.variant
    INNER JOIN tx_products_domain_model_product sanprod ON sanprod.uid = sanvar.product
    WHERE sysr.fieldname = 'pdf1' AND sysr.hidden = 0 AND sysr.deleted = 0 AND santype.hidden = 0 AND santype.deleted = 0 AND sanprod.hidden = 0 AND sanprod.deleted = 0
    ) sub ON sub.uid = sysf.attachment_id
    SET sysf.file_name = CONCAT(sub.title, '.pdf'), sysf.title = sub.title, sysf.description = sub.description
WHERE sysf.field = 'pdf_file_one';

/* Update PDF2 File data based on imports */
UPDATE system_files sysf
    INNER JOIN (
    SELECT sysr.title, sysr.description, sanvar.uid, sanprod.title prodtitle
    FROM sys_file_reference sysr
    INNER JOIN tx_products_domain_model_type santype ON santype.uid = sysr.uid_foreign
    INNER JOIN tx_products_domain_model_variant sanvar ON sanvar.uid = santype.variant
    INNER JOIN tx_products_domain_model_product sanprod ON sanprod.uid = sanvar.product
    WHERE sysr.fieldname = 'pdf2' AND sysr.hidden = 0 AND sysr.deleted = 0 AND santype.hidden = 0 AND santype.deleted = 0 AND sanprod.hidden = 0 AND sanprod.deleted = 0
    ) sub ON sub.uid = sysf.attachment_id
    SET sysf.file_name = CONCAT(sub.title, '.pdf'), sysf.title = sub.title, sysf.description = sub.description
WHERE sysf.field = 'pdf_file_two';
