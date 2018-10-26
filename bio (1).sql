-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 �?10 �?23 �?07:42
-- 服务器版本: 5.5.53
-- PHP 版本: 7.0.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `bio`
--

-- --------------------------------------------------------

--
-- 表的结构 `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `admin_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `admin_name` char(20) NOT NULL COMMENT '管理员名',
  `admin_qq` char(50) NOT NULL COMMENT '邮箱',
  `admin_pwd` varchar(20) NOT NULL COMMENT '密码',
  `admin_reg_time` char(20) NOT NULL COMMENT '注册时间',
  `admin_type` char(20) NOT NULL COMMENT '管理员属性',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `administrator`
--

INSERT INTO `administrator` (`admin_id`, `admin_name`, `admin_qq`, `admin_pwd`, `admin_reg_time`, `admin_type`) VALUES
(12, '好啦就这样吧', 'root', '11111', '1539139707', '管理员'),
(15, 'root', '237720488@qq.com', 'rooot', '1539672458', '超级管理员');

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cate_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `cate_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '分类名称',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(1, '脸部护理'),
(2, '身体护理'),
(3, '隔离防晒'),
(7, '特殊护理');

-- --------------------------------------------------------

--
-- 表的结构 `collect`
--

CREATE TABLE IF NOT EXISTS `collect` (
  `collect_id` int(20) NOT NULL AUTO_INCREMENT,
  `collect_people` varchar(20) NOT NULL COMMENT '收货人姓名',
  `collect_phone` varchar(20) NOT NULL COMMENT '收货人手机号',
  `address` varchar(20) NOT NULL COMMENT '收货地址',
  PRIMARY KEY (`collect_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户收货表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `com_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '评价id',
  `com_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '评价用户',
  `com_content` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '评价内容',
  `com_goods` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '评价商品',
  `com_time` date NOT NULL COMMENT '评价时间',
  `id` int(20) NOT NULL COMMENT '用户id',
  `goods_id` int(20) NOT NULL COMMENT '商品id',
  `com_like` int(20) NOT NULL COMMENT '点赞数',
  `com_star` int(11) NOT NULL COMMENT '评星等级',
  `com_label` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '标签',
  `com_buyway` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '购买方式',
  PRIMARY KEY (`com_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=44 ;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`com_id`, `com_user`, `com_content`, `com_goods`, `com_time`, `id`, `goods_id`, `com_like`, `com_star`, `com_label`, `com_buyway`) VALUES
(34, '12221212222', '这个用着很棒！', '雅诗兰黛', '2018-10-15', 2, 3, 1, 3, '物流快捷', '线下店铺购物'),
(42, '13538655802', '用很久了，同事都夸我皮肤好', '绿活泉', '2018-10-17', 2, 3, 1, 5, '效果好', '线下店铺购买'),
(36, '15625755263', '好贵啊', 'YSL唇釉', '2018-10-15', 2, 4, 2, 3, '物流快捷', '线下店铺购物'),
(41, '13538655802', '碧欧泉活颜清透洁面啫喱是我用过最好的产品！！', '碧欧泉活颜清透洁面啫喱', '2018-10-16', 2, 21, 1, 3, '物流快捷,包装完好', '线下店铺购物'),
(40, '13537151142', '我用过最好的洁面产品！', '碧欧泉活泉润透洁面乳', '2018-10-16', 1, 2, 0, 5, '效果好,物流快捷', '线上官网购买'),
(39, '13537151142', '希望碧欧泉能做的更好', '碧欧泉活泉润透洁面乳', '2018-10-16', 1, 2, 1, 5, '效果好,物流快捷', '线上官网购买'),
(43, '13538655802', '这个礼盒还是挺优惠的，一如既往的好', '男士蓝钻进阶三步曲礼盒', '2018-10-22', 2, 101, 0, 4, '物流快捷,包装完好', '线下店铺购买');

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `goods_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `goods_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名称',
  `goods_detail` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品详情',
  `goods_price` int(20) NOT NULL COMMENT '商品价格',
  `goods_remain` int(20) NOT NULL COMMENT '商品库存',
  `goods_size` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品规格',
  `goods_english` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `goods_img` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `second_id` int(20) NOT NULL,
  `goods_sex` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `goods_content` text COLLATE utf8_unicode_ci NOT NULL,
  `serie_id` int(20) NOT NULL COMMENT '商品系列id',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=102 ;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`goods_id`, `goods_name`, `goods_detail`, `goods_price`, `goods_remain`, `goods_size`, `goods_english`, `goods_img`, `second_id`, `goods_sex`, `goods_content`, `serie_id`) VALUES
(2, '碧欧泉活泉润透洁面乳', 'LIFE PLANKTON™活源精粹 轻柔洁肤成分 保湿分子 牛油树脂', 195, 1, '150', 'Biotherm Biosource Cleanser PEAU NORMALE', 'BIO00043.png', 2, '女士', '<img src="/project/bio/public/kindeditor/php/../attached/image/20181020/20181020075436_19242.png" alt="" /><img src="/project/bio/public/kindeditor/php/../attached/image/20181020/20181020075437_86168.png" alt="" /><img src="/project/bio/public/kindeditor/php/../attached/image/20181020/20181020075437_35224.png" alt="" />', 1),
(3, '绿活泉', '蕴含LIFE PLANKTON™活源精粹，48小时*长效保湿补水 仪器测量24位女性* 皇牌保湿绿活泉，蕴含LIFE PLANKTON™活源精粹、维生素、矿物质、氨基酸等营养成分，同时该系列蕴含—MANNOSE保湿甘露*，带来深入持久的保湿，使肌肤持续水润、柔滑、焕发新生亮采。绿活泉的清新啫喱质地，即刻沁融于肤。令肌肤即时水润、柔软、呈现新生般健康光泽。 *指甘露糖 ', 385, 1, '50', 'BIOTHERM AQUASOURCE GEL', 'BIO00044_1.png', 10, '女士', '<img src="/public/kindeditor/attached/image/20181012/20181012092425_14317.jpg" alt="" />', 9),
(4, '碧欧泉活泉润透爽肤水', '爽肤水 —— 适合中性及混合性肌肤 爽肤水是基础护肤中非常重要的步骤之一。 活泉润透爽肤水犹如打通肌肤吸收通道，进行二次清洁，同时，能够软化角质，清除杂质，使肌肤恢复润泽和健康光泽。', 195, 1, '200', 'BIOTHERM AQUASOURCE HYDRATING TONIFYIN', 'BIO00046.png', 7, '女士', '<img src="/public/kindeditor/attached/image/20181015/20181015014644_44988.jpg" alt="" />', 9),
(5, ' 「奇迹水」肌底精华露', '激活肌肤源动力-适合各种肤质 几个世纪以来，法国比利牛斯的青春之泉以神秘新生能量——LIFE PLANKTON™活源精粹闻名于世。将其倾注瓶中，感受LIFE PLANKTON™活源精粹以高浓度成就的肌肤新生蜕变。 全新升级碧欧泉「奇迹水」肌底精华露，用于爽肤之后，精华之前，以独家“肌活”护肤理念，瞬间激活肌肤吸收源动力，吸收力多维提升，后续护肤效果卓越升华。肌肤由此新生蜕变：水润、柔嫩、亮泽、弹滑', 490, 1, '125', 'BIOTHERM LIFE PLANKTON ESSENCE', 'BIO00034.png', 34, '女士', '<img src="/public/kindeditor/attached/image/20181012/20181012120051_69587.jpg" alt="" />', 1),
(7, ' 奇迹面膜刷*', '人体工学设计，让面膜贴合肌肤，优质硅胶材质，给予肌肤轻柔抚触体验。 TIPS：为了更好地让肌肤吸收精华，使用奇迹面膜*建议搭配此专用的硅胶刷效果更佳。  *注册名：碧欧泉活源精粹面膜刷 ', 100, 1, '支', 'BIOTHERM LIFE PLANKTON MASK APPLICATEUR', 'BIO00036.png', 36, '女士', '<img src="/public/kindeditor/attached/image/20181012/20181012121208_66247.jpg" alt="" />', 1),
(8, '蓝源精华露*', '碧欧泉推出全新蓝源修护青春精华露：独特的精华配方，能快速渗透，从而软化皮肤。 青春海藻精华能帮忙修护肌肤的三大问题：皱纹，暗沉和松弛。 蓝源修护青春精华露使用越频繁，修护效果越明显。 使用后，能感觉到肌肤柔软细腻的青春质感。 89%的女性*使用后感觉皮肤更加光泽透亮。 *61名消费者使用本产品4周后的自我评估结果。 * 注册名：新蓝源精华乳', 690, 1, '50', 'NEW BLUE THERAPY ACCELERATED SERUM', 'BIO00033_1.png', 9, '女士', '', 8),
(9, '蓝源面霜', '还您更年轻的面容：保护肌肤免受紫外线伤害的同时使皱纹更平滑，让轮廓感觉被提拉般更紧致，有效调整肤色暗沉不匀', 580, 1, '50', 'BLUE THERAPY CREAM SIGNS OF AGING REPAIR', 'BIO00028.png', 2, '女士', '', 8),
(10, '蓝源精华美容水', '开启修护第一步的精华水，丰沛的保湿修护能量，即刻带来充满光泽、柔软的肌肤。 ', 450, 1, '125', 'BLUE THERAPY COSMETIC WATER', 'BIO00032_1.png', 7, '女士', '<img src="/public/kindeditor/attached/image/20181012/20181012085330_78513.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012085330_39599.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012085330_53566.jpg" alt="" />', 8),
(11, ' 男士水动力爽肤水', '二次清洁,清爽舒缓 隐形水膜”科技，一抹即刻化水，二次清洁的同时，开启皮肤保湿通道。', 260, 1, '200', 'AQUAPOWER LOTION', 'BIO10008_1.png', 7, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013013402_24051.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013013402_24040.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013013402_43782.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013013402_54414.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013013402_11005.jpg" alt="" />', 6),
(12, ' 清泉纯净香氛', '瀑布般清泻的纯净，富含鼠尾草和酸橙精油让你的肌肤得到清泉水般的滋润', 410, 2, '200', 'EAU PURE', 'BIO00012.png', 24, '女士', '<img src="/public/kindeditor/attached/image/20181012/20181012124122_41747.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012124122_47537.jpg" alt="" />', 0),
(18, '碧欧泉活泉润透卸妆乳', '适合中性/混合性肌肤的卸妆乳液，淡绿色的清爽乳液，香味清淡，让肌肤干净又清新。温和无刺激的清除彩妆的同时令肌肤感受清新，充满活力。含有矿泉活细胞因子甘油，天然海藻精华，让肌肤倍增活力。', 230, 100, '200', 'Biosource Clarifying Cleansing Milk', 'BIO00072.png', 1, '女士', '<img src="/public/kindeditor/attached/image/20181012/20181012080631_42582.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012080631_35837.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012080631_92301.jpg" alt="" /><br />', 9),
(19, '「绿活泉」洁面乳', 'LIFE PLANKTON™活源精粹\r\n轻柔洁肤成分\r\n保湿分子\r\n*产品注册名：碧欧泉活泉润透洁面乳。', 195, 99, '150', 'Biotherm Biosource Cleanser PEAU NORMALE', 'BIO00043.png', 2, '女士', '<img src="/public/kindeditor/attached/image/20181015/20181015014754_70342.jpg" alt="" /><br />', 9),
(20, '碧欧泉活泉润漾洁面乳', '温和轻柔，泡沫型洁面乳\r\n温和清除脸部残余彩妆和污垢，肌肤细腻柔滑，舒适无比', 195, 99, '150', 'BIOSOURCE FOAMING CREAM DRY SKIN', 'BIO00048.png', 2, '女士', '<img src="/public/kindeditor/attached/image/20181015/20181015015051_88513.jpg" alt="" /><br />', 11),
(21, '碧欧泉活颜清透洁面啫喱', '深层洁净肌肤，从源头净化PM2.5微粒，令肌肤净透无暇。', 240, 99, '150', 'Skin Oxygen Cleanser', 'BIO00083.png', 2, '女士', '<img src="/public/kindeditor/attached/image/20181013/20181013070221_70979.jpg" alt="" /><br />', 7),
(22, '碧欧泉活泉润漾爽肤水', '柔肤水，适用于干性肌肤\r\n柔肤水是基础护肤中非常重要的步骤之一。\r\n活泉柔肤水犹如打通肌肤吸收通道，进行二次清洁，同时，能够软化角质，清除杂质，使肌肤恢复润泽和健康光泽。', 195, 99, '200', 'BIO AQS HYDRATING &amp;amp;amp;amp; SOFTENING TONER', 'BIO00050.png', 7, '女士', '<img src="/public/kindeditor/attached/image/20181015/20181015015146_38424.jpg" alt="" /><br />', 11),
(23, '碧欧泉活颜清透亮肤水', '呼吸水：温和二次清洁肌肤。富含多种植物精油成分，帮助收敛毛孔，平衡油脂分泌，令肌肤畅快呼吸，由内而外绽放光彩。', 240, 99, '200', 'Skin Oxygen Lotion', 'BIO00081.png', 7, '女士', '<img src="/public/kindeditor/attached/image/20181015/20181015015534_60174.jpg" alt="" /><br />', 7),
(24, '｢活泉水乳｣*', '创新乳化水科技，维持肌肤水分和营养平衡。\r\n富含活源精粹水能和光芒叶精萃。超越保湿，肌肤更水润、更柔嫩、更透亮。\r\n全新｢活泉水乳｣，富含活源精粹水能和光芒叶精萃。灵魂成分 Life Plankton™活源精粹，具有卓越再生功效，深入肌底，促进肌肤新生。并添加全新光芒叶精萃，激活肌肤保湿通道，抵抗肌肤氧化，提亮肤色。具有创新的乳化水科技，触肤化水，比水更保湿，比乳液更营养。\r\n注册名：碧欧泉润透精', 385, 99, '200', 'Biotherm Aquasource Milky Lotion', 'BIO00090.png', 7, '女士', '', 9),
(25, '「绿活泉」精华', '三重精粹，重焕肌底水润光泽\r\n即刻焕亮、水润\r\n独特的LIFE PLANKTON™活源精粹，富含营养物质，重新启动保湿机能，如新生般水润。\r\n长效保湿，调理肌肤细胞。一抹肌肤即刻焕发自然水润光泽。\r\n肌肤即刻焕亮，宛若新生。\r\n*注册名：碧欧泉润透精华露', 520, 99, '50', 'AQUASOURCE DEEP SERUM', 'BIO00045.png', 9, '女士', '<img src="/public/kindeditor/attached/image/20181013/20181013071801_59567.jpg" alt="" />', 9),
(26, '蓝源精华乳液', '细腻且柔润的质地，紧紧锁住前续的精华成分，并深彻滋润修复肌肤，整日呈现舒润紧致光泽。', 500, 99, '75', 'BIOTHERM BLUE THERAPY MILKY LOTION', 'BIO00033_1.png', 9, '女士', '<img src="/public/kindeditor/attached/image/20181015/20181015015820_69199.jpg" alt="" /><br />', 8),
(27, '碧欧泉活颜清透精华露', '呼吸精华：从源头上，全面修护肌底损伤，激活肌底防御能力，强韧肌肤屏障，主动防护外界都市压力和污染，让肌肤可以健康呼吸。', 450, 99, '50', 'Skin Oxygen Serum', 'BIO00082.png', 9, '女士', '<img src="/public/kindeditor/attached/image/20181015/20181015015338_71600.jpg" alt="" /><br />', 7),
(28, '「奇迹乳」', '碧欧泉护肤精华乳，适用于多种肌肤类型，特别适合敏感脆弱的肌肤，含5%高浓度活源精粹，天然保湿复合成分在肌肤表面形成“无空洞防护膜”，防止水分流失，阻止外界伤害，肌肤更平滑、强韧、健康。\r\n*实际效果因人而异\r\n*注册名：碧欧泉护肤精华乳 ', 420, 99, '75', 'BIOTHERM LIFE PLANKTON SENSITIVE EMULSION', 'BIO00079.png', 9, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013072252_18267.jpg" alt="" /><br />', 1),
(29, '碧欧泉暖活泉', '滋养，仿若面霜；薄透，犹如啫喱，48小时深层活泉滋润\r\n你时常感到皮肤干燥吗？\r\n全新活泉润沁水分露，新一代精油啫喱质地，双重质地完美融合，即刻沁融于肤，令肌肤即时水润、柔软、呈现新生般健康光泽，尽享48小时的深层活泉滋润。肌肤犹如包裹于丝绒之中。\r\n*仪器测量24 位女性', 385, 99, '50', 'BIOTHERM AQUASOURCE COCOON', 'BIO00052_1.png', 10, '女士', '<img src="/public/kindeditor/attached/image/20181013/20181013072431_48416.jpg" alt="" /><br />', 9),
(30, '碧欧泉粉活泉', '蕴含LIFE PLANKTON™活源精粹，适合干性皮肤，长达48小时* 长效保湿补水， 镇牌之宝粉活泉，蕴含LIFE PLANKTON™活源精粹、维生素、矿物质、氨基酸等营养成分，同时还富含活泉系列特有的成分—MANNOSE保湿甘露 * ，带来深入持久的保湿，使肌肤持续水润、柔滑、焕发新生亮采。粉活泉的清新啫喱质地，即刻沁融于肤。令肌肤即时水润、柔软、呈现新生般健康光泽。*指甘露糖 。\r\n* 24', 385, 99, '50', 'AQUASOURCE RICH CREAM DRY SKIN', 'BIO00049.png', 10, '女士', '<img src="/public/kindeditor/attached/image/20181013/20181013073042_22153.jpg" alt="" /><br />', 9),
(31, '「绿活泉」', '蕴含LIFE PLANKTON™活源精粹，48小时^长效保湿补水\r\n仪器测量24位女性*\r\n皇牌保湿绿活泉，蕴含LIFE PLANKTON™活源精粹、维生素、矿物质、氨基酸等营养成分，同时该系列蕴含—MANNOSE保湿甘露*，带来深入持久的保湿，使肌肤持续水润、柔滑、焕发新生亮采。绿活泉的清新啫喱质地，即刻沁融于肤。令肌肤即时水润、柔软、呈现新生般健康光泽。 \r\n*指甘露糖\r\n^公司内部评估结果，', 670, 99, '125', 'AQUASOURCE GEL 125ml Xmas', 'BIO00075_1.png', 10, '女士', '<img src="/public/kindeditor/attached/image/20181013/20181013073425_44134.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013073425_61234.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013073426_36037.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013073426_62638.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013073426_86863.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013073426_55906.jpg" alt="" /><br />', 9),
(32, '「蓝水弹」保湿凝乳', '肌肤水润柔滑，干纹不见！\r\n更亲肤：脂溶性外衣更容易被肌肤吸收，当肌肤第一时间接触到的是『蓝水弹』保湿凝乳的油向微胶囊外壳时，会快速溶解外壳，百万浓缩水分子瞬间释放，更快速深入肌肤底层！\r\n质地炫：1瓶面霜呈现神奇变换质地；凝乳质地在接触肌肤的那一刻，将活性成分推送入肌肤底层。\r\n一挑，凝乳浓缩水能量\r\n一摸，肌肤柔软平滑\r\n\r\n更亲肤，更安全！提炼于法属波利尼西亚海域的海洋糖类微生物（一种藻类）', 385, 99, '50', 'BIOTHERM AQUASOURCE EVERPLUMP', 'BIO00060_1.png', 10, '女士', '<img src="/public/kindeditor/attached/image/20181013/20181013073633_75783.png" alt="" /><br />', 8),
(33, ' 蓝源面霜', '还您更年轻的面容。\r\n使皱纹更平滑，让轮廓感觉被提拉般更紧致，有效调整肤色暗沉不匀', 580, 99, '50', 'BLUE THERAPY CREAM SIGNS OF AGING REPAIR', 'BIO00028.png', 10, '女士', '<img src="/public/kindeditor/attached/image/20181013/20181013073851_75187.png" alt="" /><br />', 8),
(34, '碧欧泉活颜清透水凝霜', '提供长达12小时全天候保湿和防护，缓解城市污染带来的肌肤干渴和损伤，修护强化肌底，主动防护都市侵袭，带来一整天的匀净', 420, 99, '50', 'Skin Oxygen Cream', 'BIO00084.png', 10, '女士', '<img src="/public/kindeditor/attached/image/20181013/20181013074112_47683.jpg" alt="" /><br />', 7),
(35, '奇迹面膜*', '购买奇迹面膜*赠：面膜刷（限量100份）	\r\n啫喱凝露质地 \r\n深层修护，恢复肌肤饱满弹性 \r\n舒缓肌肤，改善肤色暗沉 给肌肤自有的抵抗力 \r\n高浓度活源精粹\r\n肌肤弹润 透亮 犹如新生\r\n实际效果因人而异\r\n*产品注册名：碧欧泉活源精粹修复面膜。', 390, 99, '75', 'BIOTHERM LIFE PLANKTON MASK TREATMENT', 'BIO00035_2.png', 11, '女士', '<img src="/public/kindeditor/attached/image/20181013/20181013074239_34661.jpg" alt="" /><br />', 1),
(36, '奇迹面膜6片装', '纯棉面膜纸\r\n温和不刺激，吸收力强，储存更多精华；\r\n高浓度活源精粹\r\n多维度修护肌肤，焕活肌肤活力；\r\n啫喱轻乳质地\r\n亲肤不腻，快速渗透吸收', 350, 99, '6片装', 'BIOTHERM LIFE PLANKTON MASK TREATMENT', 'BIO00092.png', 11, '女士', '', 1),
(37, '黑膜法面膜', '碧欧泉全新黑膜法面膜，夜间密集保湿充盈肌肤。\r\n蕴含品牌灵魂成分：活源精粹，拥有传奇愈颜力；独特暗养发酵海藻精华，在黑夜中能完全释放强大修复力量；富含丰富矿物质的深海水，提升肌肤保湿力 独有短时间回弹啫喱质地，自动生成肌肤保护膜，锁住有效成分。\r\n*注册名：碧欧泉至润赋活睡眠面膜', 425, 99, '75', 'EVERPLUMP NIGHT MASK', 'BIO00078.png', 11, '女士', '<img src="/public/kindeditor/attached/image/20181015/20181015015740_69960.jpg" alt="" /><br />', 0),
(38, '超水CC.', '• 碧欧泉品牌灵魂保湿成分—活源精粹 Life PlanktonTM：全天候长效水润保湿，肌肤水润度提升\r\n• 由内而外提升肌肤色泽，平滑肌理\r\n活泉润透隔离乳SPF30+/PA+++', 340, 99, '40', 'BIO AQUASOURCE WATER CC SPF50/PA+++', 'BIO00023.png', 12, '女士', '<img src="/public/kindeditor/attached/image/20181012/20181012115032_16388.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012115032_99601.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012115032_38012.jpg" alt="" /><strong>HTML内容</strong>', 0),
(39, '碧欧泉修颜润透CC霜', '紫色「匀肤色」 无暇水光妆\r\n适合肌肤有瑕疵，肤色不均的人群\r\n• 均匀肤色\r\n• 平滑毛孔\r\n• 带来水润透亮的无暇妆感\r\n\r\n白色「素颜霜」 素颜心机妆\r\n适合肌肤暗沉，想提亮肤色的人群\r\n• 自动修正肤色\r\n• 轻松打造直男最爱的伪素颜妆\r\n• 亦可当做高光\r\n\r\n蓝色「除暗黄」 焕亮少女妆\r\n适合肌肤偏暗黄的人群\r\n• 更暗黄说拜拜！\r\n• 打造少女般柔嫩焕亮的\r\n• 无龄妆感\r\n\r\n绿色', 350, 99, '30紫色', 'CC ULTRA SPF 50+/ PA+++.', '1.png', 12, '女士', '<img src="/public/kindeditor/attached/image/20181015/20181015015629_34716.jpg" alt="" /><br />', 3),
(40, '清透版「奇迹水」', '', 490, 99, '125', 'BIOTHERM LIFE PLANKTON ESSENCE', 'BIO00034.png', 34, '女士', '<img src="/public/kindeditor/attached/image/20181013/20181013080004_77348.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013080004_74448.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013080005_74824.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013080005_34980.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013080005_56694.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013080005_71927.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013080005_19360.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013080005_79851.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013080005_48468.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013080005_71987.jpg" alt="" /><br />', 1),
(41, '蓝源眼霜', '眼部是脸上备受关注的年龄感知部位。这就是为什么你的眼睛需要特定的护肤品。这是碧欧泉首次将眼部的定义延伸至皱纹、暗沉和皮肤松弛、鱼尾纹、眼袋。针对6大眼周痕迹，全面出击恢复青春明眸！', 480, 99, '15', 'BIOTHERM BLUE THERAPY EYE', 'BIO00030.png', 35, '女士', '<img src="/public/kindeditor/attached/image/20181013/20181013080130_19382.jpg" alt="" /><br />', 0),
(42, '绿薄荷眼霜', '清凉一触，眼周即刻降温2°C*，眼袋神奇隐退，亲眼见证黑眼圈淡褪。\r\n绿薄荷眼霜蕴含活泉润透的所有保湿成分，轻质柔和，可使即刻降低眼周温度，消除浮肿，让眼眸光采重现。\r\n消退眼袋，减淡黑眼圈，告别干纹，使眼周保持水润。\r\n适用于眼周，早晚各一次。\r\n*公司内部测试，26名女性使用2分钟后的温度测量结果。\r\n*注册名：碧欧泉活泉新生精华眼霜', 390, 99, '15', 'AQUASOURCE TOTAL EYE REVITALIZER', 'BIO00057.png', 35, '女士', '<img src="/public/kindeditor/attached/image/20181012/20181012121049_45535.jpg" alt="" /><strong>HTML内容</strong>', 0),
(43, '奶油霜*', '凝乳丝滑润泽霜是碧欧泉专门干性至极干性肌肤设计。绵密丝滑的凝乳质地融合乳木果油让肌肤更加滋润柔滑。发现柔和肌肤和长效保湿的新秘密！\r\n\r\n\r\n*注册名：凝乳丝滑润泽霜', 390, 99, '200', 'BEURRE CORPOREL', 'BIO00007.png', 3, '女士', '<img src="/public/kindeditor/attached/image/20181012/20181012121816_18511.png" alt="" /><br />', 0),
(44, '牛奶乳*', '质地清晰、舒适、不油腻，即使大范围涂抹，皮肤表面不留粘腻感。 精华保湿成分能够有效地补充并保持肌肤水分，令皮肤滋润、柔软、光滑。 清新的橙橘香氛味道让肌肤更加愉悦， 这一刻变得如此完美愉悦！\r\n注册名：*碧欧泉新凝乳丝滑润体乳', 280, 99, '200', 'LAIT CORPOREL ANTI-DESSECHANT', 'BIO00009.png', 3, '女士', '<img src="/public/kindeditor/attached/image/20181012/20181012122034_94990.png" alt="" /><strong>HTML内容</strong>', 0),
(45, '冰淇淋霜*', '鲜活诱惑，给身体停不下来的清润；\r\n冰淇淋般 清润触感\r\n极速渗透 深度滋养\r\n停不下来 鲜活快感\r\n*注册名：碧欧泉清润保湿身体露', 380, 99, '200', 'AQUA-GELÉE ULTRA FRESH BODY GEL', 'BIO00014_01.png', 3, '女士', '<img src="/public/kindeditor/attached/image/20181012/20181012122314_42220.png" alt="" /><strong>HTML内容</strong>', 0),
(46, '凝乳丝滑沐浴乳', '碧欧泉首款真正牛奶质感的洁肤沐浴乳。富含保湿精油的无皂基配方能够有效地防止肌肤干燥，让肌肤回复弹性丝滑。', 250, 99, '200', 'LAIT DE DOUCHE', 'BIO00010.png', 4, '女士', '<img src="/public/kindeditor/attached/image/20181013/20181013080944_48438.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012122524_64341.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012122524_73204.jpg" alt="" />', 0),
(47, '身体紧肤弹力精华油', '无油腻感的身体护理油秘方，协同新滋养水配方。富含虾青素，能够使肌肤更柔嫩、呈现莹润亮泽。', 450, 99, '125', 'BODY REFIRM ANTI-CELLULITE OIL', 'BIO00002.png', 22, '女士', '<img src="/public/kindeditor/attached/image/20181012/20181012122825_10252.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012122825_76802.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012122825_35655.jpg" alt="" /><strong>HTML内容</strong>', 0),
(48, '美胸紧致乳', '独特配方蕴含天然爱尔兰红藻萃取精华，即刻紧致胸部，4周*见证均匀健康胸部肤色。同时添加丰富多晶硅及透明质酸，促进胶原蛋白生成，更能高效保湿，饱满充盈。配合正确按摩手法，美胸紧致乳的独特配方都能为你带来焕然一新的提升效果。\r\n*公司内部实验', 390, 99, '50', 'SUPER BUST TENSE-IN SERUM', 'BIO00086.png', 22, '女士', '<br />', 0),
(49, '新活力身体乳', '这款保湿身体乳富含维他命E和维他命B5，有助于保持肌肤柔顺滋润。融合柚子、茉莉、小苍兰和白麝等香味给感官带来与众不同的体验。 维他命E和柑橘精油让肌肤柔顺，塑形保持水润。轻盈不油腻的质地让肌肤瞬间绽放，充满活力', 310, 99, '200', 'EAU VITAMINEE MILK', 'BIO00003.png', 22, '女士', '<img src="/public/kindeditor/attached/image/20181012/20181012123129_20513.jpg" alt="" /><strong><img src="/public/kindeditor/attached/image/20181012/20181012123144_55917.jpg" alt="" />HTML内容</strong>', 0),
(50, '凝乳丝滑护唇蜜', '冬天寒风阵阵的气候会使得你的肌肤不知不觉中破损干涩。室内暖气所营造的非自然环境更会进一步恶化肌肤的状况。因为人体的唇部没有皮脂腺，在干燥的环境中无法分泌油脂保护肌肤，它会更易受到干燥侵袭，出现以下状况。\r\n1干裂脱皮\r\n2唇纹增多或加深\r\n3唇色黯哑\r\n奶油唇霜-同样的奶油质地 同样的滋润享受\r\n奶油霜的拍档\r\n碧欧泉完美的润唇配方\r\n结合了天然植物油的非凡滋润力，奶油唇霜不止非常滋润，也非常的清', 95, 99, '13', 'BEURRE LIP BALM', 'BIO00071.png', 23, '女士', '<img src="/public/kindeditor/attached/image/20181012/20181012123420_42132.png" alt="" /><strong>HTML内容</strong>', 0),
(51, '美肤局部调理乳', '清爽不粘腻的质地能增加肌肤弹性以及伸展性从而预防延展纹的产生', 410, 99, '150', 'BIOVERGETURES', 'BIO00011.png', 23, '女士', '<img src="/public/kindeditor/attached/image/20181012/20181012123614_24875.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012123614_54969.jpg" alt="" /><strong>HTML内容</strong>', 0),
(52, '新活泉嫩手霜', '活源精粹Life Plankton™和维他命F：生成手部防护膜，预防肌肤干燥问题。\r\n抗氧化配方：抗击手部肌肤松弛老化，预防并淡化手部色斑\r\n配方中含有泛醇：帮助强韧指甲强韧指甲，改善指甲脆弱易折现象', 220, 99, '100', 'BIOTHERM BIOMAINS', 'BIO00006_100.png', 23, '女士', '<img src="/public/kindeditor/attached/image/20181012/20181012123804_25265.png" alt="" /><strong>HTML内容</strong>', 0),
(53, '至润护唇蜜', '全新碧欧泉至润护唇蜜，富含乳木果油和深海活性透明质酸，拥有海绵般的超强吸水力，令双唇水润充盈、柔软平滑，带来看得见的丰润保湿；更融合源自海藻的自然粉嫩色彩，调以迷人的水蜜桃香味，打造令人忍不住想要吻一口的粉嫩嘟嘟唇。', 120, 99, '13', 'BIOTHERM AQUASOURCE PLUMP LIP', 'BIO00080.png', 23, '女士', '<img src="/public/kindeditor/attached/image/20181013/20181013081843_10771.jpg" alt="" /><br />', 0),
(54, '全新骄阳活力身体防晒乳', '碧欧泉骄阳活力身体防晒乳全新升级配方，面部与身体均可使用，物理、化学、生物三重防晒科技成分溶于一体，让你尽情在阳光海滩展现魅力风姿，从此无惧骄阳。', 380, 99, '200', 'LAIT SOLAIRE HYDRANT SPF 50/PA+++', 'BIO00089.png', 6, '女士', '<img src="/public/kindeditor/attached/image/20181013/20181013082036_79724.jpg" alt="" /><br />', 0),
(55, '骄阳活力身体防晒乳 ', '牛奶清爽质感，兼具高倍UVA和UVB防晒功效，同时富含活源精粹和维他命E。让你尽情在阳光海滩展现魅力风姿，从此无惧骄阳。', 380, 99, '200', 'SPF50+ PA+++ LAIT SOLAIRE SPF 50', 'BIO00015.png', 6, '女士', '<img src="/public/kindeditor/attached/image/20181012/20181012124745_81971.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012124745_43398.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012124745_20266.jpg" alt="" /><strong>HTML内容</strong>', 0),
(56, '防晒「小黄瓶」水润防晒乳', '奶昔质地，清爽易涂抹，全方位高效防晒，UVA/B 防水科技。令你的肌肤保湿柔亮，清爽不泛白。\r\n适用于脸部及身体\r\n生态环保包装设计，可回收产品瓶身', 395, 99, '200', 'WATERLOVER SUN MILK SPF 50', 'BIO00088.png', 6, '女士', '<img src="/public/kindeditor/attached/image/20181015/20181015015709_55774.jpg" alt="" /><br />', 0),
(57, '碧欧泉水动力洁面膏', '膏状质地 深层清洁肌肤\r\n双效合一，蕴含矿物温泉精粹及卓效清洁成分，在深层清洁肌肤的同时，使皮肤清爽舒适。\r\n探索水动力系列其他产品，给予你的肌肤全面呵护。', 240, 99, '125', 'AQUAPOWER CLEANSER', '10007.png', 17, '男士', '<img src="/public/kindeditor/attached/image/20181012/20181012131714_19571.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012131947_35485.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012131947_56463.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012131947_22175.jpg" alt="" />', 6),
(58, '男士清爽控油洁面膏', '泥状质地 净化毛孔。潮湿、炎热…令男士肌肤面临油光挑战。面对油光，绝不妥协！\r\n清爽控油洁面膏能够有效清洁肌肤：富含海藻精粹和微量元素锌，平衡油脂。\r\n经男性测试与验证*：\r\n87%男士测试者感觉皮肤更洁净、更清洁、更健康 \r\n86%男士测试者感觉皮肤受到了温和的清洁\r\n83%男士测试者感觉到毛孔杂质得以清除\r\n77%男性测试者感到毛孔细致 \r\n*自我评价-满意度- 86 名受试者- 4周使用\r\n', 260, 99, '125', 'T-PUR ANTI OIL &amp;amp;amp;amp; SHINE CLEANSER', '155051.png', 17, '男士', '<img src="/public/kindeditor/attached/image/20181012/20181012132322_39325.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012132322_55398.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012132322_26938.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012132322_26979.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012132323_46043.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012132323_56757.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181012/20181012132323_29511.jpg" alt="" /><strong>HTML内容</strong>', 4),
(59, '男士亮肤清透洁面膏', '碧欧泉男士专为亚洲男士设计的洁面膏，焕肤科技和矿物温泉保湿精粹，深层清洁肌肤，均匀肤色！奶油般温和、超厚密的泡沫，深层有效清洁肌肤。加速细胞新生，肌肤更平滑、均匀、干净、清爽。丰富绵密的泡沫，带来深层清洁，即刻一扫晦暗，肌肤洁净通透！', 330, 99, '125', 'EXCELL BRIGHT CLEANSER', 'BIO10019.png', 17, '男士', '<img src="/public/kindeditor/attached/image/20181012/20181012132527_55719.png" alt="" /><br />', 3),
(60, '男士焕能润泽洁面啫喱', '焕能润泽洁面啫喱富含薄荷叶水，专为熬夜疲劳过后的皮肤定制。肌肤补充能量般焕发神采。', 300, 99, '125', 'TOTAL RECHARGE CLEANSER', 'BIO10022.png', 17, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013012512_69653.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013012521_63289.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013012521_77782.jpg" alt="" /><br />', 10),
(61, '男士蓝钻洁面乳', '蕴含雪松芽提取物 ，乳霜质地可有效深层清洁肌肤且不刺激，使用后，能使皮肤光滑洁净并帮助后续护理产品更好吸收 轻薄乳霜质地', 360, 99, '125', 'FORCE SUPREME CLEANSER', 'BIO10014.png', 17, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013082957_81040.jpg" alt="" /><br />', 5),
(62, '男士橄榄青春洁面啫喱', '保持年轻，对抗氧化挑战。\r\n城市侵袭会导致皮肤过早老化。\r\n橄榄青春洁面啫喱，开启你的抗氧化之旅。\r\n富含螺旋藻萃取，能够净化、控油并收紧毛孔。使皮肤干净清爽，为后续护理做好准备。', 320, 99, '125', 'AGE FITNESS ADVANCED CLEANSER', 'BIO10027.png', 17, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013013001_11845.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013013001_79227.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013013001_10447.jpg" alt="" /><br />', 2),
(63, '男士清爽控油爽肤水', '潮湿、炎热…令男士肌肤面临油光挑战。面对油光，绝不妥协！\r\n清爽控油爽肤水给你带来洁净的皮肤。\r\n富含海藻精粹和微量元素锌，平衡油脂；含矿物珍珠岩，吸附汗水。\r\n经男性测试与验证*：\r\n90%男士测试者感觉皮肤油光减少\r\n92%男士测试者汗水减少\r\n86%男士测试者感到洁净\r\n84%的男性感到清爽\r\n*自我评价-满意度- 75名受试者- 4周使用\r\n遵循3步净肤程序 效果更佳：\r\n1.洁面膏 清洁', 280, 99, '200', 'T-PUR ANTI-OIL &amp;amp;amp; SHINE LOTION', 'BIO10004_1.png', 7, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013013728_76590.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013013728_56312.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013013729_45035.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013013729_48191.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013013729_16800.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013013729_23579.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013013729_49874.jpg" alt="" /><br />', 4),
(64, '男士水动力水漾精华露', '舒缓润泽，唤醒肌肤\r\n水动力水漾精华露拥有轻薄质地，配方不添加酒精，易于皮肤快速吸收。为男士肌肤带来舒缓滋润的护肤体验，同时强韧肌肤，应对日常生活中的外界侵袭。\r\n卓越感受：\r\n新一代水漾精华露\r\n不粘稠，不油腻，不添加酒精的全新配方，专为全天候清爽肌肤体验设计。新一代水漾精华露让你的肌肤倍感滋润清爽，不粘腻、无油光。适合各种肌肤类型肌肤类型，敏感肌肤同样适用。\r\n三重卓效呵护\r\n3重功效及其轻盈', 295, 99, '200', 'AQUAPOWER ACTIVE LOTION', 'BIO10011.png', 7, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013013922_72751.jpg" alt="" /><br />', 6),
(65, '男士亮肤清透爽肤水', '碧欧泉男士专为亚洲男士而设计，蕴含双重能量的清爽质地爽肤水。亮白焕肤科技和维他命C 衍生物有效提亮肤色，均匀肤质，即刻唤醒肌肤！帮助达到二次清洁的功效, 同时能有效的去除老废角质', 390, 99, '200', 'EXCELL BRIGHT LOTION', 'BIO10020_1.png', 7, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013083458_97986.jpg" alt="" /><br />', 3),
(66, '男士蓝钻紧肤露', '含雪松芽提取物和玻色因™，使肌肤更加丰满，舒适而有光泽。适用于对抗皱纹与其他肌肤衰老痕迹。可单独涂抹或用于帮助后续护理产品吸收。在乳液之后涂抹可更快更好的吸收。质感轻盈，易于快速吸收且不油腻。不添加酒精和苯钾酸酯\r\n清爽质地方便使用。\r\n香调：\r\n木制檀香香调，基于柑橘与薄荷所组成的前调。 \r\n肌肤使用后更饱满，舒适，容光焕发。', 450, 99, '200', 'FORCE SUPREME LOTION', 'BIO10013_1.png', 7, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013083620_80296.png" alt="" /><br />', 5),
(67, '男士橄榄青春爽肤水', '保持年轻，对抗肌肤老化痕迹挑战。\r\n富含螺旋藻萃取，能够净化、减少油光，细致毛孔，使皮肤干净清爽，为后续护理做好准备。', 380, 99, '200', 'AGE FITNESS ADVANCED LOTION', 'BIO10028_1.png', 7, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013014603_27350.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013014603_80328.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013014603_62190.jpg" alt="" /><br />', 2),
(68, '男士水动力清爽保湿凝露', '清爽凝露质地，轻薄爽肤易吸收。\r\n蕴含海洋保湿精粹以及活源精粹，一抹即刻释放活泉能量，带给肌肤持久保湿体验。\r\n防微粒附着科技，抵御尘霾，清洁舒缓毛孔。', 360, 99, '200', 'AQP LOTION GEL F/P200ML ASIA', 'BIO10045.png', 7, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013014854_25015.jpg" alt="" /><br />', 6),
(69, '男士水动力保湿乳', '男士水动力保湿乳(中性) \r\n蕴含矿物温泉精粹，卓效保湿，适合中性及混合性皮肤。\r\n一抹即刻释放活泉动力，肌肤倍感舒适清爽，摆脱干燥困扰，散发健康光泽。\r\n\r\n男士水动力保湿乳(干性) \r\n蕴含矿物温泉精粹，卓效保湿，适合干性皮肤。\r\n清爽啫喱质地，紧锁肌肤水分，为肌肤提供全天候滋润舒适', 480, 99, '75', 'AQUAPOWER NORMAL SKIN', 'BIO10009_1.png', 37, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013023913_57735.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013023913_24603.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013023913_75459.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013023913_14685.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013023913_38116.jpg" alt="" /><br />', 6),
(70, '男士蓝钻生机爽肤水', '100', 560, 99, '50', 'FORCE SUPREME LIFE ESSENCE', 'BIO10043.png', 37, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013084050_14570.jpg" alt="" /><br />', 5),
(71, '男士蓝钻精华', '&amp;amp;amp;gt;重建真皮层结构，保持面部轮廓。*\r\n&amp;amp;amp;gt;紧实活化肌肤。修复肌肤，平滑细纹，焕发健康光泽。\r\n&amp;amp;amp;gt;舒适清爽精华质地。适用于敏感肌肤。白天和晚上单独使用或在涂抹面霜前使用。\r\n功效验证 结果：\r\n皱纹减少38％*\r\n皮肤弹性增加15％*\r\n皮肤延展性提升13％*\r\n皮肤紧致度改善9.8％**\r\n*内部仪器测试结果 ', 990, 99, '50', 'FORCE SUPREME YOUTH ARCHITECT SERUM', 'BIO10018_1.png', 37, '男士', '<img src="/public/kindeditor/attached/image/20181015/20181015015927_24271.jpg" alt="" /><img src="https://www.biotherm.com.cn/product/BIO10018.html?dwvar_BIO10018_size=50ml#start=3&cgid=OILYSKIN" alt="" /><img src="https://www.biotherm.com.cn/product/BIO10018.html?dwvar_BIO10018_size=50ml#start=3&cgid=OILYSKIN" alt="" /><br />', 5),
(72, '男士亮肤焕颜精华霜', '碧欧泉男士第一款专为亚洲男士而设计的双重能量亮肤精华，独有亮白焕肤科技，去除带有黑色素的老废角质，帮助加速表皮细胞更新新生，减少黑色素沉积。让回复肌肤健康亮泽，同时改善肌肤质地！活性维他命C衍生物，提亮肤色，预防色斑浮现，并明显淡化色斑。矿物温泉保湿精粹帮助平滑肌肤，激活细胞抵御力，抵御外界伤害', 650, 99, '50', 'EXCELL BRIGHT MOISTURIZER', 'BIO10021.png', 37, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013084311_54423.jpg" alt="" /><br />', 3),
(73, '男士清爽控油保湿乳', '整日控油 破格清爽\r\n潮湿、炎热…令男士肌肤面临油光挑战。面对油光，绝不妥协！\r\n清爽控油保湿乳能够带来一整天清爽体验。\r\n富含海藻精粹和微量元素锌控制油脂过度分泌。\r\n经男性测试与验证*：\r\n90%的男性感到皮肤油光减少\r\n92%的男性感到汗水减少\r\n86%的男性感到皮肤更洁净\r\n84%的男性感到清爽\r\n*自我评价-满意度- 75名受试者- 4周使用\r\n遵循3步净肤程序 效果更佳：\r\n1.洁面膏', 390, 99, '50', 'T-PUR ANTI-OIL &amp;amp;amp; SHINE MOISTURIZER', 'BIO10002_1.png', 37, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013025143_44172.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013025143_37897.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013025143_50424.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013025143_67214.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013025143_62349.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013025144_79590.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013025144_97390.jpg" alt="" /><br />', 4),
(74, '男士水动力水凝润泽霜', '源自冰川灵感的非凡湿面霜\r\n碧欧泉男士从冰川获取灵感，研发出品牌内首款源于冰川的护肤产品，为肌肤提供长时卓效保湿，保持肌肤润泽长达72小时**公司内部仪器测试结果。水动力水凝润泽霜不但为肌肤表层增加水分、锁住水分，还能预防肌肤缺水、抵御种种外界侵袭困扰，包括高温，潮湿等带来的不适感受。同时也具备超轻水润质感给你带来持久滋润的清新感受。 碧欧泉男士创新 超轻薄水漾质地，接触皮肤瞬间化水，带来超清爽感', 580, 99, '50', 'AQUAPOWER 72H', 'BIO10012.png', 37, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013025406_45603.jpg" alt="" /><br />', 6),
(75, '男士净肤清痘舒缓乳', '修复+舒缓，对抗痘印\r\n针对性解决当今男士主要的皮肤问题：痘痘 和黑头。净肤+修护，有助于缓解肌肤敏感和痘痘等可见的问题，同时兼具了保湿和舒缓成分，舒缓肌肤。\r\n融合L.DIGITATA净化海藻、微量元素锌、去角质水杨酸和抑痘吡罗克酮合成的乳霜质地是理想的日常护肤选择。\r\n清爽乳霜质地，瞬间渗入皮肤，不留粘腻。显著加速淡化瑕疵与痘痕。镇定舒缓各种不适感。\r\n明显加速了瑕疵与痘痕的消褪 。 \r\n证明', 390, 99, '50', 'T-PUR ANTI-IMPERFECTIONS', 'BIO10003.png', 37, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013025646_17465.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013025647_19418.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013025647_49265.jpg" alt="" /><br />', 0),
(76, '男士蓝钻润肤乳', '对抗老化 赋活肌肤\r\n改善皮肤结构，即刻淡化皱纹，焕发年轻光泽，24小时持久润泽**。使用 4周后，皮肤重现活力，倍感紧实。 **皮肤上层仪器测试为30例。', 790, 99, '50', 'FORCE SUPREME YOUTH ARCHITECT CREAM', 'BIO10016_1.png', 37, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013025857_82663.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013025858_48498.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013025858_43384.jpg" alt="" /><br />', 5),
(77, '男士蓝钻青春面霜', '具有多重功效的抗老修护面霜，用于对抗肌肤老化，帮助强韧肌肤结构展现年轻神采。\r\n含有青春海藻™、活源精粹™和玻色因™三重活性成分，乳霜质地。每日使用，肌肤感觉更紧实平滑。\r\n清爽质地，迅速渗入皮肤，不留粘腻感\r\n使用效果：皮肤强韧、紧实、有光泽。\r\n强化表层皮肤，紧实肌底。\r\n测试结果：\r\n提升33%*光泽度，提升12%*紧实度，提升16%*肌肤弹性\r\n90%^的测试者反馈皮肤感觉滋润\r\n1.光泽', 790, 99, '50', 'FORCE SUPREME YOUTH ARCHITECT CREAM', 'BIO10015.png', 37, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013030142_50341.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013030143_60517.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013030143_90505.jpg" alt="" /><br />', 5),
(78, '男士焕能润泽保湿露', '碧欧泉男士则肩负为这些男士提供保湿+充能的双重使命，帮助他们对抗肌肤疲劳迹象。\r\n焕能润泽可以显著唤醒肌肤，犹如给予皮肤额外睡眠的效果，使你的皮肤整天看起来精力充沛。', 580, 99, '50', 'TOTAL RECHARGE CARE', 'BIO10025.png', 37, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013030321_99154.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013030321_61929.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013030321_28786.jpg" alt="" /><br />', 10),
(79, '男士净痘精华', '一款清爽控油的精华，独特的果冻质地，收敛毛孔，哑光控油。\r\n适用人群：针对痘痘问题肌肤专用\r\n修护：保湿修护，舒缓易敏肌肤\r\n焕活：促进肌肤自我更新，让肌肤更年轻\r\n强韧：紧致强韧肌肤，为肌肤提供保护\r\n注册名：碧欧泉男士净肤细致精华露', 450, 88, '50', 'T-PUR REFINING MICRO-PEEL SERUM', 'BIO10047.png', 37, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013030625_63583.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013030625_75338.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013030626_59858.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013030626_67293.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013030626_55950.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013030626_60223.jpg" alt="" /><br />', 0),
(80, '男士橄榄青春夜间凝露', '保持年轻，对抗肌肤老化痕迹挑战。\r\n富含螺旋藻萃取，能够净化、减少油光，细致毛孔，使皮肤干净清爽，为后续护理做好准备。', 560, 99, '50', 'AGE FITNESS ADVANCED NIGHT', 'BIO10030.png', 37, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013030822_79919.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013030823_72855.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013030823_16547.jpg" alt="" /><br />', 0),
(81, '男士橄榄青春日间乳液', '&amp;amp;quot;保持年轻，对抗氧化挑战。\r\n城氧化侵袭会导致皮肤过早老化。\r\n橄榄青春日间乳液为肌肤提供全天防护。新一代活性精华配方富含微藻复合物，并能提供12小时*的抗氧化保护，保护皮肤免受伤害。同时针对肌肤初老迹象，淡化细纹，使皮肤看起来更强韧、更光滑、更滋润。\r\n*公司内部测试结果&amp;amp;quot;', 560, 99, '50', 'AGE FITNESS ADVANCED DAY', 'BIO10029.png', 37, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013030958_38081.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013030958_70375.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013030959_43640.jpg" alt="" /><br />', 2),
(82, '碧欧泉男士水动力清爽眼部凝露', '保湿：镇牌之宝口碑保湿，蕴含矿物life plankton™活源精粹，眼周肌肤充沛畅饮。\r\n功效一：轻褪浮肿，舒缓男士眼周肌肤。\r\n功效二：长效保湿，肌肤持久水润不干燥，感觉舒适清爽。', 230, 99, '15', 'BIOTHERM HOMME AQUAPOWER FRESH EYE', 'BIO10042.png', 35, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013085333_10856.jpg" alt="" /><br />', 6),
(87, '男士清爽润透护手霜', '卓效保护 卓效滋润\r\n运动、风霜、寒冷…即使并未身处极端环境，双手依然在冬日面对粗糙及干裂威胁。\r\n清爽润透护手霜，舒缓–修复–保护，即时抵御。修护损伤。\r\n不黏腻、即刻吸收 ', 150, 99, '50', 'ULTIMATE HAND BALM', 'BIO10034.png', 38, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013064342_10205.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013064342_28580.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013064342_25496.jpg" alt="" /><br />', 0),
(88, ' 水动力清爽沐浴露', '清爽沐浴露-适用于清洁身体与头发\r\n拥有水动力产品独有气味的清爽沐浴露，能够温和地清洁身体与头发。\r\n清新配方富含life plankton™活源精粹，使用后令肌肤无比滋润清爽\r\n水动力沐浴露为你的肌肤带来滋润清爽的护肤体验\r\n水动力香调：\r\n前调：柑橘香味\r\n佛手柑、柠檬、柑橘、薰衣草、薄荷\r\n中调：清新花香\r\n茉莉花、玫瑰\r\n基调：木质麝香\r\n檀香木，雪松，广藿香，香根草，白麝香，香草 ', 260, 99, '150', 'AQUAPOWER SHOWER GEL', 'BIO10037.png', 38, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013064631_99527.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013064631_18283.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013064631_45046.jpg" alt="" /><br />', 0),
(89, '温和舒缓剃须泡沫', '温和剃须泡沫能保护肌肤免受刀锋伤害，精华护肤成分与保湿甘油让皮肤滋润光滑\n温和剃须泡沫的（满意度调查）：\n•令人愉悦的剃须产品 96%\n•提供顺滑的剃须体验 94%\n•适合敏感皮肤：90%\n•易于冲洗：90%\n•皮肤滋润：90%\n•使肌肤光滑：88%\n•避免剃须带来的灼热感 81%\n*碧欧泉实验室数据，基于49名测试者自我评估结果 ', 270, 99, '200', 'FOAM SHAVER', 'BIO10036.png', 38, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013064827_50652.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013064827_76156.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013064827_97646.jpg" alt="" /><br />', 0),
(90, '男士亮肤修颜隔离霜', '多效、All in One全面护肤，即刻展现活力神采的必备单品。每日清晨在清洁、润肤后使用，简单涂抹间，实现多重护肤效果：\r\n→ 保湿 → 防晒伤\r\n→ 放光老 → 控油光\r\n→ 光采 → 遮瑕\r\n→ 抗氧化 → 匀肤\r\n→ 醒肤 → 隐毛孔', 395, 99, '30', 'SPF30+ PA+++ FLASH BB FLUID FL', 'BIO10040.png', 5, '男士', '<img src="/public/kindeditor/attached/image/20181013/20181013065109_99294.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013065109_30599.jpg" alt="" /><img src="/public/kindeditor/attached/image/20181013/20181013065109_69128.jpg" alt="" /><br />', 0),
(100, '男士水动力明星保湿三步曲礼盒', '礼盒包含：\n• 男士水动力洁面膏 125ml\n• 男士水动力爽肤水 200ml\n• 男士水动力保湿乳 75ml\n\n礼盒价值980元，立省130元！\n*产品包装以实物为准', 850, 300, '300', '', '20181018101444.png', 39, '男士', '', 6);
INSERT INTO `goods` (`goods_id`, `goods_name`, `goods_detail`, `goods_price`, `goods_remain`, `goods_size`, `goods_english`, `goods_img`, `second_id`, `goods_sex`, `goods_content`, `serie_id`) VALUES
(101, '男士蓝钻进阶三步曲礼盒', '礼盒包含：\r\n• 男士蓝钻洁面膏 125ml\r\n• 男士蓝钻紧肤露 200ml\r\n• 男士蓝钻滋养紧致精华露 50ml\r\n\r\n成熟睿智、事业游刃有余却无力对抗细纹、松弛、粗糙等老化迹象？\r\n男士蓝钻洁面膏\r\n深层清洁，含蓝色微粒可温和去角质，使肌肤无粗糙感 ，并更新细胞活性。 紧致去纹，蘊含天然净肤微粒，即時平滑肌肤，使皮肤更易吸收护肤精华。\r\n男士蓝钻紧肤露\r\n二次清洁，即刻保湿舒缓，令肌肤健康', 1550, 300, '375', '', '20181018103103.png', 38, '男士', '<img src="/public/kindeditor/attached/image/20181018/20181018023424_29846.png" alt="" /><img src="/public/kindeditor/attached/image/20181018/20181018023429_77791.png" alt="" /><img src="/public/kindeditor/attached/image/20181018/20181018023434_26133.png" alt="" /><br />', 5);

-- --------------------------------------------------------

--
-- 表的结构 `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '收货Id',
  `user_phone` char(20) DEFAULT NULL COMMENT '收货人号码',
  `user_name` char(20) DEFAULT NULL COMMENT '收货人名',
  `user_post` char(20) DEFAULT NULL COMMENT '邮政编码',
  `user_tel` char(20) DEFAULT NULL COMMENT '固定电话',
  `detailed_add` char(20) DEFAULT NULL COMMENT '收货地址',
  `province3` char(20) NOT NULL,
  `city3` char(20) NOT NULL,
  `area3` char(20) NOT NULL,
  `in_time` char(20) NOT NULL,
  `id` int(20) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `information`
--

INSERT INTO `information` (`user_id`, `user_phone`, `user_name`, `user_post`, `user_tel`, `detailed_add`, `province3`, `city3`, `area3`, `in_time`, `id`) VALUES
(9, '13538885555', '淡淡', '523500', '0769-86661756', '红光', '内蒙古自治区', '呼伦贝尔市', '陈巴尔虎旗', '1539569633', 1),
(2, '13538655802', '沈丹', '523000', '237720488', '东莞理工', '广东', '东莞', '南城', '1538739103', 1),
(3, '13538655802', 'BLING玲', '523500', '13537151142', '宝石路', '广东省', '东莞市', '企石镇', '1538739103', 2),
(8, '13537151142', '王小源', '523448', '0679-86661765', '天涯海角', '台湾省', '台北市', '中正区', '1539350220', 19),
(10, '13537151142', '哦多钱', '532022', '0679-86661765', '好又多百货', '西藏自治区', '拉萨市', '市辖区', '1539588374', 1),
(11, '13537151142', 'B玲仔', '523566', '0769-86661756', '大鹏展翅', '黑龙江省', '哈尔滨市', '动力区', '1539651280', 19),
(12, '15625655263', '唐往', '536222', '0679-86661765', '大江南北', '广西壮族自治区', '南宁市', '市辖区', '1539693204', 30),
(13, '13537151142', '大honey', '522444', '0769-86661756', '蒙奇奇', '吉林省', '长春市', '绿园区', '1539744237', 30),
(19, '13537151142', '小玲玲', '541360', '087-16541313', '东京大道', '上海市', '市辖县', '崇明县', '1539935824', 1),
(29, '13537151142', 'B玲仔', '653144', '', '发蛋糕', '山东省', '德州市', '齐河县', '1539951834', 25),
(23, '13531452235', '张玲', '415631', '0723-65152152', '的哈是废话', '内蒙古自治区', '呼和浩特市', '赛罕区', '1539936323', 25),
(30, '13537151142', '张bling', '523622', '', '阿呆回答', '河南省', '周口市', '西华县', '1539951865', 25);

-- --------------------------------------------------------

--
-- 表的结构 `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `message` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `invoice` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `sum_price` int(20) NOT NULL COMMENT '总金额',
  `order_state` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '订单状态',
  `pay_state` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '支付状态',
  `pay_way` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '支付方式',
  `send_way` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '配送方式',
  `send_state` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '发货状态',
  `order_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '下单时间',
  `order_num` char(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '订单号',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=42 ;

--
-- 转存表中的数据 `order`
--

INSERT INTO `order` (`order_id`, `id`, `user_id`, `message`, `invoice`, `sum_price`, `order_state`, `pay_state`, `pay_way`, `send_way`, `send_state`, `order_time`, `order_num`) VALUES
(34, 30, 12, '', '', 195, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1540191554', '201810221230065914'),
(33, 2, 3, '', '', 585, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1540179386', '2018102232033626'),
(10, 19, 8, '早点发货哟', '', 300, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1539679311', '20181016084151819'),
(11, 19, 11, '', '', 10, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1539679335', '201810160842151119'),
(12, 19, 8, '好的', '', 100, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1539679477', '20181016084437819'),
(13, 19, 8, '', '', 2140, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1539679531', '20181016084531819'),
(14, 19, 11, '早点发货，嘻嘻', '个人', 2140, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1539681121', '201810160912011119'),
(15, 19, 11, '多次回购', '', 2140, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1539681362', '201810160916021119'),
(16, 19, 11, '', '', 2720, '待确认', '已支付', '银联在线支付', '顺风物流', '待发货', '1539681699', '201810160921391119'),
(17, 19, 8, '', '', 2720, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1539681738', '20181016092218819'),
(18, 1, 2, '', '', 1655, '已取消', '待支付', '银联在线支付', '顺风物流', '待发货', '1539681893', '2018101609245321'),
(19, 19, 11, '', '', 2720, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1539691258', '201810161200581119'),
(20, 19, 8, '送礼品哦！', '', 880, '待确认', '已支付', '银联在线支付', '顺风物流', '待发货', '1539692027', '20181016121347819'),
(26, 30, 13, '哟呼', '东莞理工学院2377856', 550, '待确认', '已支付', '银联在线支付', '顺风物流', '待发货', '1539744262', '201810171330024422'),
(22, 1, 10, '', '', 1655, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1539739014', '20181017011654101'),
(23, 19, 8, '', '', 880, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1539739365', '20181017012245819'),
(24, 30, 12, '', '', 1420, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1539739928', '201810170132081230'),
(25, 30, 12, '', '', 875, '已取消', '待支付', '银联在线支付', '顺风物流', '待发货', '1539740074', '201810170134341230'),
(27, 1, 9, '', '', 1550, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1540006116', '2018102091032836'),
(28, 1, 9, '', '', 195, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1540006364', '2018102091033244'),
(29, 1, 9, '', '', 580, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1540006542', '2018102091033542'),
(30, 1, 9, '', '', 685, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1540006718', '2018102091033838'),
(31, 1, 9, '', '', 195, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1540006967', '2018102091034247'),
(32, 2, 3, '', '', 780, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1540017135', '2018102032063215'),
(35, 30, 12, '', '', 1070, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1540192039', '201810221230070719'),
(36, 2, 3, '', '', 1035, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1540193927', '2018102232073847'),
(37, 2, 3, '', '', 390, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1540194205', '2018102232074325'),
(38, 2, 3, '', '', 195, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1540194536', '2018102232074856'),
(39, 2, 3, '', '', 1940, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1540199631', '2018102232091351'),
(40, 2, 3, '', '', 195, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1540200472', '2018102232092752'),
(41, 2, 3, '', '', 195, '待确认', '待支付', '银联在线支付', '顺风物流', '待发货', '1540200903', '2018102232093503');

-- --------------------------------------------------------

--
-- 表的结构 `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `detail_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '订单详情id',
  `order_num` char(30) NOT NULL COMMENT '订单编号',
  `goods_id` int(20) NOT NULL COMMENT '商品id',
  `goods_sum` int(20) NOT NULL COMMENT '商品数量',
  PRIMARY KEY (`detail_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- 转存表中的数据 `order_detail`
--

INSERT INTO `order_detail` (`detail_id`, `order_num`, `goods_id`, `goods_sum`) VALUES
(1, '20181017011654101', 5, 1),
(2, '20181017011654101', 4, 2),
(3, '20181017011654101', 2, 2),
(4, '20181017011654101', 3, 1),
(5, '20181017012245819', 2, 1),
(6, '20181017012245819', 4, 1),
(7, '20181017012245819', 5, 1),
(8, '201810170132081230', 3, 1),
(9, '201810170132081230', 11, 1),
(10, '201810170132081230', 4, 1),
(11, '201810170132081230', 9, 1),
(12, '201810170134341230', 5, 1),
(13, '201810170134341230', 3, 1),
(14, '201810171330024422', 10, 1),
(15, '201810171330024422', 7, 1),
(16, '2018102091032836', 3, 2),
(17, '2018102091032836', 2, 3),
(18, '2018102091032836', 4, 1),
(19, '2018102091033244', 4, 1),
(20, '2018102091033542', 3, 1),
(21, '2018102091033542', 4, 1),
(22, '2018102091033838', 5, 1),
(23, '2018102091033838', 4, 1),
(24, '2018102091034247', 4, 1),
(25, '2018102032063215', 4, 3),
(26, '2018102032063215', 2, 1),
(27, '2018102232033626', 22, 2),
(28, '2018102232033626', 2, 1),
(29, '201810221230065914', 4, 1),
(30, '201810221230070719', 3, 1),
(31, '201810221230070719', 5, 1),
(32, '201810221230070719', 2, 1),
(33, '2018102232073847', 4, 1),
(34, '2018102232073847', 5, 1),
(35, '2018102232073847', 39, 1),
(36, '2018102232074325', 22, 1),
(37, '2018102232074325', 2, 1),
(38, '2018102232074856', 4, 1),
(39, '2018102232091351', 101, 1),
(40, '2018102232091351', 22, 2),
(41, '2018102232092752', 22, 1),
(42, '2018102232093503', 22, 1);

-- --------------------------------------------------------

--
-- 表的结构 `second`
--

CREATE TABLE IF NOT EXISTS `second` (
  `second_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '二级分类id',
  `second_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '二级分类名称',
  `cate_id` int(20) NOT NULL,
  PRIMARY KEY (`second_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=41 ;

--
-- 转存表中的数据 `second`
--

INSERT INTO `second` (`second_id`, `second_name`, `cate_id`) VALUES
(1, '卸妆', 1),
(2, '洁面', 1),
(3, '牛奶润肤', 2),
(4, '清爽沐浴', 2),
(5, '隔离', 3),
(6, '防晒', 3),
(7, '爽肤', 1),
(8, 'spi', 3),
(9, '精华', 1),
(10, '润肤', 1),
(11, '面膜', 1),
(12, '隔离', 1),
(13, '保湿', 1),
(14, '修复', 1),
(15, '抗衰老', 1),
(17, '清洁', 1),
(22, '塑身美体', 2),
(23, '特殊护理', 2),
(24, '活力香氛', 2),
(25, '润肤', 2),
(26, '塑身美体', 2),
(27, '护唇', 2),
(28, '香氛', 2),
(34, '肌底液', 1),
(37, '护肤', 1),
(38, '身体护理', 7),
(39, '面部护理', 7);

-- --------------------------------------------------------

--
-- 表的结构 `serie`
--

CREATE TABLE IF NOT EXISTS `serie` (
  `serie_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '系列id',
  `serie_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '系列名',
  PRIMARY KEY (`serie_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `serie`
--

INSERT INTO `serie` (`serie_id`, `serie_name`) VALUES
(1, '奇迹系列'),
(9, '活泉系列'),
(8, '蓝源系列'),
(7, '活颜清透系列'),
(6, '水动力系列'),
(5, '蓝钻系列'),
(4, '清爽控油系列'),
(3, '亮肤清透系列'),
(2, '橄榄青春系列'),
(10, '焕能润泽系列'),
(11, '活泉润漾系列');

-- --------------------------------------------------------

--
-- 表的结构 `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `shop_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '购物id',
  `goods_id` int(20) NOT NULL,
  `id` int(20) NOT NULL,
  `shop_num` int(20) NOT NULL COMMENT '购物数量',
  PRIMARY KEY (`shop_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=52 ;

--
-- 转存表中的数据 `shop`
--

INSERT INTO `shop` (`shop_id`, `goods_id`, `id`, `shop_num`) VALUES
(29, 100, 1, 1),
(28, 2, 1, 2),
(26, 25, 1, 1),
(8, 2, 19, 1),
(10, 3, 19, 2),
(9, 4, 19, 1),
(25, 22, 1, 2),
(27, 78, 1, 1),
(30, 70, 1, 2),
(49, 2, 40, 1);

-- --------------------------------------------------------

--
-- 表的结构 `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `store_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '门店id',
  `store_province` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '省',
  `store_city` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '市',
  `store_area` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '区',
  `store_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '地址',
  `store_tel` int(20) NOT NULL COMMENT '电话',
  PRIMARY KEY (`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `pwd` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `user_phone` char(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户手机',
  `sex` varchar(2) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户性别',
  `reg_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '注册时间',
  `qqcom` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` char(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=41 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `pwd`, `user_phone`, `sex`, `reg_time`, `qqcom`, `name`) VALUES
(1, '12345678', '13537151142', '男士', '1538052217', '75684133@qq.com', '丹的宇'),
(2, 'sb222222', '13538655802', '男士', '1538048349', '', '邹威'),
(19, '11111111', '15161816353', '男士', '1538797512', '8653336@qq.com', ' 孔垂智'),
(39, '12345678', '15625655262', '男士', '1540174824', '523500681@qq.com', '吴提平'),
(36, '12345678', '13531452231', '男士', '1540174518', '', ''),
(25, '12345678', '15626755263', '女士', '1539074094', '237728456@qq.com', '沈丹'),
(38, '12345678', '13538364468', '女士', '1540174753', '', ''),
(37, '12345678', '13353865580', '女士', '1540174659', '', '张婉玲'),
(31, '12345678', '13531452235', '男士', '1540173735', '', ''),
(30, '12345678', '15625655263', '男士', '1539693045', '756546844@qq.com', '唐往'),
(40, '12345678', '15625755263', '女士', '1540264417', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
