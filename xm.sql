/*
 Navicat Premium Data Transfer

 Source Server         : 仙之梦
 Source Server Type    : MySQL
 Source Server Version : 80020
 Source Host           : 159.75.52.227:3306
 Source Schema         : xm

 Target Server Type    : MySQL
 Target Server Version : 80020
 File Encoding         : 65001

 Date: 14/02/2021 12:53:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `Id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sex` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `major` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Exp` int NULL DEFAULT NULL,
  `Lv` int NULL DEFAULT NULL,
  `Hp` int NULL DEFAULT NULL,
  `Mp` int NULL DEFAULT NULL,
  `Def` int NULL DEFAULT NULL,
  `Sr` int NULL DEFAULT NULL,
  `Spd` int NULL DEFAULT NULL,
  `Hp_ing` int NULL DEFAULT NULL,
  `Mp_ing` int NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `Id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10023 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
