ALTER TABLE `finv_invoice` 
  ADD COLUMN `finv_ref` ENUM ('BPRD') NULL AFTER `finv_paid`,
  ADD COLUMN `finv_ref_id` INT (0) UNSIGNED NULL AFTER `finv_ref` ;

