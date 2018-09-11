-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema helpdesk
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema helpdesk
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `helpdesk` DEFAULT CHARACTER SET latin1 ;
USE `helpdesk` ;

-- -----------------------------------------------------
-- Table `helpdesk`.`area`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`area` (
  `idarea` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `correo` VARCHAR(100) NOT NULL,
  `extencion` VARCHAR(100) NOT NULL,
  `siglas` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idarea`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `helpdesk`.`ficha`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`ficha` (
  `idFicha` INT(11) NOT NULL AUTO_INCREMENT,
  `detalle` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idFicha`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `helpdesk`.`estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`estado` (
  `idestado` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`idestado`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `helpdesk`.`prioridad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`prioridad` (
  `idprioridad` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`idprioridad`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `helpdesk`.`tipopeticion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`tipopeticion` (
  `idtipopeticion` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idtipopeticion`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `helpdesk`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`users` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `apellidos` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `cedula` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `sexo` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `celular` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `email` VARCHAR(100) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `password` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `idtipousuario` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `estado` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `idarea` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `remember_token` VARCHAR(100) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 91
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `helpdesk`.`peticion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`peticion` (
  `idpeticion` INT(11) NOT NULL AUTO_INCREMENT,
  `idprioridad` INT(11) NOT NULL,
  `idestado` INT(11) NOT NULL,
  `idtipopeticion` INT(11) NOT NULL,
  `idusuario` INT(10) NOT NULL,
  `descripcion` VARCHAR(200) NULL DEFAULT NULL,
  `estado_del` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idpeticion`, `idprioridad`, `idestado`, `idtipopeticion`, `idusuario`),
  INDEX `fk_peticion_prioridad1_idx` (`idprioridad` ASC),
  INDEX `fk_peticion_estado1_idx` (`idestado` ASC),
  INDEX `fk_peticion_tipopeticion1_idx` (`idtipopeticion` ASC),
  INDEX `fk_peticion_usuario1_idx` (`idusuario` ASC),
  CONSTRAINT `fk_peticion_estado1`
    FOREIGN KEY (`idestado`)
    REFERENCES `helpdesk`.`estado` (`idestado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_peticion_prioridad1`
    FOREIGN KEY (`idprioridad`)
    REFERENCES `helpdesk`.`prioridad` (`idprioridad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_peticion_tipopeticion1`
    FOREIGN KEY (`idtipopeticion`)
    REFERENCES `helpdesk`.`tipopeticion` (`idtipopeticion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_peticion_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `helpdesk`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `helpdesk`.`asignacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`asignacion` (
  `idasignacion` INT(11) NOT NULL AUTO_INCREMENT,
  `Ficha_idFicha` INT(11) NOT NULL,
  `peticion_idpeticion` INT(11) NOT NULL,
  `FechaRegistro` DATE NULL DEFAULT NULL,
  `FechaInicio` DATE NULL DEFAULT NULL,
  `FechaLimite` DATE NULL DEFAULT NULL,
  `Observacion` VARCHAR(200) NULL DEFAULT NULL,
  PRIMARY KEY (`idasignacion`, `Ficha_idFicha`, `peticion_idpeticion`),
  INDEX `fk_asignacion_Ficha1_idx` (`Ficha_idFicha` ASC),
  INDEX `fk_asignacion_peticion1_idx` (`peticion_idpeticion` ASC),
  CONSTRAINT `fk_asignacion_Ficha1`
    FOREIGN KEY (`Ficha_idFicha`)
    REFERENCES `helpdesk`.`ficha` (`idFicha`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignacion_peticion1`
    FOREIGN KEY (`peticion_idpeticion`)
    REFERENCES `helpdesk`.`peticion` (`idpeticion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `helpdesk`.`tipodispositivos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`tipodispositivos` (
  `idtipodispositivos` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`idtipodispositivos`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `helpdesk`.`dispositivos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`dispositivos` (
  `iddispositivos` INT(11) NOT NULL AUTO_INCREMENT,
  `idtipodispositivos` INT(11) NOT NULL,
  `nombredispositivo` VARCHAR(100) NOT NULL,
  `serie` VARCHAR(100) NULL DEFAULT NULL,
  `color` VARCHAR(100) NOT NULL,
  `modelo` VARCHAR(100) NOT NULL,
  `marca` VARCHAR(100) NOT NULL,
  `cod_activo` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`iddispositivos`, `idtipodispositivos`),
  INDEX `fk_dispositivos_tipodispositivos1_idx` (`idtipodispositivos` ASC),
  CONSTRAINT `fk_dispositivos_tipodispositivos1`
    FOREIGN KEY (`idtipodispositivos`)
    REFERENCES `helpdesk`.`tipodispositivos` (`idtipodispositivos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `helpdesk`.`extra_tecnico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`extra_tecnico` (
  `idextra_tecnico` INT(11) NOT NULL AUTO_INCREMENT,
  `idusuario` INT(10) NULL DEFAULT NULL,
  `especialidad` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`idextra_tecnico`),
  INDEX `fk_extra_tecnico_11_idx` (`idusuario` ASC),
  CONSTRAINT `fk_extra_tecnico_11`
    FOREIGN KEY (`idusuario`)
    REFERENCES `helpdesk`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `helpdesk`.`migrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`migrations` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `batch` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `helpdesk`.`password_resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`password_resets` (
  `email` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `token` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `helpdesk`.`tipo_software`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`tipo_software` (
  `idtipo_software` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idtipo_software`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `helpdesk`.`software`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`software` (
  `idsoftware` INT(11) NOT NULL AUTO_INCREMENT,
  `idtiposoftware` INT(11) NOT NULL,
  `nombre` VARCHAR(200) CHARACTER SET 'latin1' NOT NULL,
  `descripcion` VARCHAR(200) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  PRIMARY KEY (`idsoftware`),
  INDEX `idtiposoftware_idx` (`idtiposoftware` ASC),
  CONSTRAINT `idtiposoftware_fk`
    FOREIGN KEY (`idtiposoftware`)
    REFERENCES `helpdesk`.`tipo_software` (`idtipo_software`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `helpdesk`.`tipo_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`tipo_usuario` (
  `idtipo_Usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_Usuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `helpdesk`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`usuario` (
  `idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL DEFAULT NULL,
  `apellido` VARCHAR(100) NULL DEFAULT NULL,
  `cedula` VARCHAR(100) NULL DEFAULT NULL,
  `sexo` VARCHAR(100) NULL DEFAULT NULL,
  `celular` VARCHAR(100) NULL DEFAULT NULL,
  `email` VARCHAR(100) NULL DEFAULT NULL,
  `clave` VARCHAR(100) NULL DEFAULT NULL,
  `estado` VARCHAR(100) NULL DEFAULT NULL,
  `tipo_usuario_idtipo_Usuario` INT(11) NOT NULL,
  `extra_tecnico_idextra_tecnico` INT(11) NOT NULL,
  `area_idarea` INT(11) NOT NULL,
  PRIMARY KEY (`idUsuario`, `tipo_usuario_idtipo_Usuario`, `extra_tecnico_idextra_tecnico`, `area_idarea`),
  INDEX `fk_usuario_tipo_usuario_idx` (`tipo_usuario_idtipo_Usuario` ASC),
  INDEX `fk_usuario_extra_tecnico1_idx` (`extra_tecnico_idextra_tecnico` ASC),
  INDEX `fk_usuario_area1_idx` (`area_idarea` ASC),
  CONSTRAINT `fk_usuario_area1`
    FOREIGN KEY (`area_idarea`)
    REFERENCES `helpdesk`.`area` (`idarea`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_extra_tecnico1`
    FOREIGN KEY (`extra_tecnico_idextra_tecnico`)
    REFERENCES `helpdesk`.`extra_tecnico` (`idextra_tecnico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_tipo_usuario`
    FOREIGN KEY (`tipo_usuario_idtipo_Usuario`)
    REFERENCES `helpdesk`.`tipo_usuario` (`idtipo_Usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `helpdesk`.`user_asignacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`user_asignacion` (
  `iduser_asignacion` INT(11) NOT NULL AUTO_INCREMENT,
  `asignacion_idasignacion` INT(11) NOT NULL,
  `usuario_idUsuario` INT(11) NOT NULL,
  PRIMARY KEY (`iduser_asignacion`, `asignacion_idasignacion`, `usuario_idUsuario`),
  INDEX `fk_user_asignacion_asignacion1_idx` (`asignacion_idasignacion` ASC),
  INDEX `fk_user_asignacion_usuario1_idx` (`usuario_idUsuario` ASC),
  CONSTRAINT `fk_user_asignacion_asignacion1`
    FOREIGN KEY (`asignacion_idasignacion`)
    REFERENCES `helpdesk`.`asignacion` (`idasignacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_asignacion_usuario1`
    FOREIGN KEY (`usuario_idUsuario`)
    REFERENCES `helpdesk`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `helpdesk`.`usuario_dispositivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`usuario_dispositivo` (
  `idusuario_dispositivo` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` VARCHAR(100) NULL DEFAULT NULL,
  `fecha_fin` VARCHAR(100) NULL DEFAULT NULL,
  `usuario_idUsuario` INT(11) NOT NULL,
  `dispositivos_iddispositivos` INT(11) NOT NULL,
  PRIMARY KEY (`idusuario_dispositivo`, `usuario_idUsuario`, `dispositivos_iddispositivos`),
  INDEX `fk_usuario_dispositivo_usuario1_idx` (`usuario_idUsuario` ASC),
  INDEX `fk_usuario_dispositivo_dispositivos1_idx` (`dispositivos_iddispositivos` ASC),
  CONSTRAINT `fk_usuario_dispositivo_dispositivos1`
    FOREIGN KEY (`dispositivos_iddispositivos`)
    REFERENCES `helpdesk`.`dispositivos` (`iddispositivos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_dispositivo_usuario1`
    FOREIGN KEY (`usuario_idUsuario`)
    REFERENCES `helpdesk`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `helpdesk`.`usuario_software`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesk`.`usuario_software` (
  `idusuario_software` INT(11) NOT NULL AUTO_INCREMENT,
  `idusuario` INT(10) NOT NULL,
  `idsoftware` INT(11) NOT NULL,
  `estado` VARCHAR(45) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  PRIMARY KEY (`idusuario_software`),
  INDEX `usuario_software_fk2_idx` (`idsoftware` ASC),
  INDEX `usuario_software_fk1_idx` (`idusuario` ASC),
  INDEX `usuario_software_fk11_idx` (`idusuario` ASC),
  INDEX `usuario_software_fk111_idx` (`idusuario` ASC),
  CONSTRAINT `usuario_software_fk111`
    FOREIGN KEY (`idusuario`)
    REFERENCES `helpdesk`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `usuario_software_fk2`
    FOREIGN KEY (`idsoftware`)
    REFERENCES `helpdesk`.`software` (`idsoftware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
