-- ----------------------------
-- 日期：2017-04-28 21:02:23
-- MySQL - 5.1.73 : Database - mingzhi
-- ----------------------------

CREATE DATAbase IF NOT EXISTS `mingzhi` DEFAULT CHARACTER SET utf8 ;

USE `mingzhi`;

-- ----------------------------
-- Table structure for `han_admin_user`
-- ----------------------------

DROP TABLE IF EXISTS `han_admin_user`;

CREATE TABLE `han_admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `login_count` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `reg_ip` varchar(20) DEFAULT NULL,
  `reg_date` int(20) DEFAULT NULL,
  `last_login` int(20) DEFAULT NULL,
  `last_ip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_admin_user`
-- ----------------------------

INSERT INTO `han_admin_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '7', '1', '127.0.0.1', '', '1490092640', '127');

-- ----------------------------
-- Table structure for `han_answer`
-- ----------------------------

DROP TABLE IF EXISTS `han_answer`;

CREATE TABLE `han_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer_content` text NOT NULL COMMENT '回答内容',
  `uid` int(11) NOT NULL COMMENT '回答者id',
  `question_id` int(11) NOT NULL COMMENT '问题id',
  `isname` int(11) DEFAULT '0' COMMENT '是否匿名  1匿名0不匿名',
  `upvote_count` int(11) DEFAULT '0' COMMENT '赞同数量',
  `downvote_count` int(11) DEFAULT '0' COMMENT '反对数量',
  `create_time` int(11) DEFAULT NULL COMMENT '问题回答时间',
  `edit_time` int(11) DEFAULT NULL COMMENT '问题编辑时间',
  `follow_count` int(11) DEFAULT '0' COMMENT '关注次数',
  `comment_count` int(11) DEFAULT '0' COMMENT '论评次数',
  `collect_count` int(11) DEFAULT '0' COMMENT '收藏次数',
  `report_count` int(11) DEFAULT '0' COMMENT '举报次数',
  `category_id` int(11) DEFAULT NULL COMMENT '分类id',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_answer`
-- ----------------------------

INSERT INTO `han_answer` VALUES ('1', '这里真好', '1', '1', '0', '0', '0', '1480216617', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('11', '<p>首先，什么是 Feed ?</p><blockquote>a web feed (or news feed) is a data format used for providing users with frequently updated content. Content distributors syndicate a web feed, thereby allowing users to subscribe to it.</blockquote><p>从 Feed 的定义来看，有两点值得注意：</p><p>1. Feed 是一种数据格式，用于给（订阅的）用户提供持续更新的内容；</p><p>2. 看似是 Push 内容给用户的形式，实质是用户自己主动选择多个订阅源，展示内容汇总的聚合器（典型代表是RSS）主动向服务器请求内容，再以时间顺序呈现到聚合器，是一种典型的 Pull </p>', '1', '13', '1', '0', '0', '1480231221', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('12', '<p>现实，我们身出其中，网络，我们也身处其中</p><blockquote><p>是去年那马 啊啊</p></blockquote><p>对啊啊啊啊啊<br></p><p><img src="/mytest/mingzhi/Uploads/images/20161127/583ae0e29c3dd.jpg" alt="Lighthouse" style="max-width: 100%; width: 488px; height: 251px;" class=""></p><p>我我我我我我我我我</p><p>啊啊啊<br></p><p><br></p>', '1', '14', '0', '0', '0', '1480253789', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('13', '<p>倘若以“立德、立功、立言”作为评判一个人的标准，那王阳明毫无疑问的做到了，他确实是五百年来最完美的人物之一。只是，今天许多人喜欢王阳明，仅仅是因为被当年明月“忽悠”了，但本身对于王阳明的思想和学说完全不知。如果阳明先生发现自己今天之所以广受赞誉不是因为《传习录》而是因为《明朝那些事》，他老人家一定会觉得自己被过誉了<img src="/mytest/mingzhi/Uploads/images/20161128/583b84211a6d3.png" alt="b3edb7e4ae031c49d334138f10f8d7ed_r" style="max-width: 100%; width: 560px; height: 307px;" class=""></p><p><a href="http://www.mingzhiwen.cn" target="_blank">我的个人网站-明之问答</a><span> <br></span></p><p><br></p>', '1', '12', '0', '0', '0', '1480295525', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('14', '<p>要迎来新生季了，打算整理一下大学生用的 App 给学弟学妹们。</p><p>网上有很多“开学季，大学新生必备八款APP”、“大学生必备的十大APP神器”这样的推荐，我向来都不建议我的大学生朋友们相信这些安利，我给他们的理由是：</p><blockquote><p>“你的大学不应该是只有上课（课程表app）、吃外卖（订餐app）、聊骚（校园社交）还有玩游戏（…）。选择什么样的app就是选择了什么样的大学生活方式。”
</p></blockquote><p>把下面这几款app推荐给即将进入大学或已经在大学的小朋友们，希望你能度过四年有品质的大学生活。
</p><p>大家有没有什么推荐的？~</p><p><img src="/mytest/mingzhi/Uploads/images/20161128/583c1074654db.png" alt="1544a8c7391e3ea6a3ee6c5595bbedd9_r" style="max-width: 100%; width: 542px; height: 348px;" class="clicked"></p><blockquote><p>再来个图片啦啊啊啊啊啊</p></blockquote><p><img src="/mytest/mingzhi/Uploads/images/20161128/583c10b483bd7.png" alt="5451085a84cd4e8c23d6fbec37c22ef5_r" style="max-width: 100%; width: 547px; height: 348px;" class=""></p><p>没有图片了<br></p><p><br></p>', '1', '18', '0', '1', '0', '1480331524', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('15', '<blockquote><p><b>案例：</b>数据库新添加一字段，修改值不成功。</p></blockquote><p><b>解决方案：</b>将Runtime/Data/_fields/下面的字段缓存删除，或者直接删除整个Runtime文件也是可以的</p><p><b>分析：</b>由于Thinkphp，采用字段缓存机制，一般情况下会将数据库的字段缓存到文件中，当我们对数据库里的字段增加，修改之后，缓存文件没有变化，所以，我们在Add或者Save的时候，不起作用。<img src="http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/6a/laugh.gif"></p><p><br></p>', '1', '19', '0', '1', '0', '1480421970', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('17', '<p>明代让我印象深刻的人有很多</p><p>比如：</p><ol><li>于谦</li><li>张居正<br></li></ol><p>等等好多人吧</p><br>', '1', '9', '0', '0', '0', '1480422614', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('18', '大方的说法是否<pre style="max-width:100%;overflow-x:auto;"><code class="javascript hljs" codemark="1">&lt;?php
echo <span class="hljs-string">"hello world"</span>；
</code></pre>', '1', '19', '0', '1', '0', '1480423214', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('19', '<p>看看代码写错没。。。。</p><p><img src="/mytest/mingzhi/Public/static/wangEditor/static/emotions/default/1.gif"></p>', '1', '19', '0', '1', '0', '1480471183', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('20', '<p>看看你的代码正确吗</p><p>仔细检查检查。。<img src="/mytest/mingzhi/Public/static/wangEditor/static/emotions/default/1.gif"><br></p>', '1', '19', '0', '0', '0', '1480512494', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('21', '<p>QQQQQQQQ</p>', '1', '18', '1', '1', '0', '1480770475', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('22', '<p>二维切群二群二群</p><p>而且</p><p><img src="/mytest/mingzhi/Public/static/wangEditor/static/emotions/default/13.gif"></p>', '1', '18', '0', '1', '0', '1480819679', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('23', '<p>这个需要看自己的努力程度了，如果比较努力，对语言理解够深入，精通还是有可能的</p><p>我感觉是这样。<img src="/mytest/mingzhi/Public/static/wangEditor/static/emotions/default/12.gif"><br></p><p><br></p>', '39', '20', '0', '1', '0', '1480821953', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('24', '<p>写下此时你的想法..</p><br><p>额外企鹅去二</p><br><p>ewqe</p><p><img src="/mytest/mingzhi/Uploads/images/20161205/5845058a71484.jpg" alt="france-1790999_1280" style="max-width: 100%; width: 545px; height: 376px;" class=""></p><p><img src="/mytest/mingzhi/Uploads/images/20161205/584505b638853.jpg" alt="main-qimg-94c825e3be6c2cb397fe416b4c89dc05-c" style="max-width:100%;"></p><p><br></p>', '1', '20', '0', '1', '0', '1480918471', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('25', '写下此时你的想法..', '1', '20', '0', '0', '0', '1481182287', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('26', '感觉比较简约，用着舒服，比QQ简单多了', '1', '15', '1', '0', '0', '1481867279', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('27', '<p>这个其实很好解决</p><p>第三方丰富的方式d发送到发送到分手大师</p><p>撒大声地发生大放送</p><p>水电费发顺丰大道撒大大大大大大所大v父</p><p>是的方式佛挡杀佛第三个故事<br></p>', '1', '21', '1', '1', '0', '1481897041', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('28', '<p>当用户初次登录系统时，关注了几个话题，feed流只将最新的信息推送过来，以前的话题的信息怎么推送过来？当用户初次登录系统时，关注了几个话题，feed流只将最新的信息推送过来，以前的话题的信息怎么推送过来？当用户初次登录系统时，关注了几个话题，feed流只将最新的信息推送过来，以前的话题的信息怎么推送过来？</p><p>当用户初次登录系统时，关注了几个话题，feed流只将最新的信息推送过来，以前的话题的信息怎么推送过来？</p><p><br></p>', '1', '21', '1', '1', '0', '1481897133', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('29', '<p>不知道。。</p><p><img src="/mytest/mingzhi/Uploads/images/20161226/586077032967e.jpg" alt="zzz" style="max-width: 100%; width: 423px; height: 461px;" class=""></p><p><br></p>', '1', '20', '1', '0', '0', '1482716946', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('30', '<p>这个看看代码写错没，或者有缓存。。</p><p><img src="/mytest/mingzhi/Uploads/images/20161226/58607c4ac84a4.jpg" alt="bg" style="max-width: 100%; width: 426px; height: 380px;" class=""></p><p><br></p>', '1', '19', '0', '0', '0', '1482718299', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('31', '写下此时你的想法..', '1', '21', '0', '0', '0', '1487413252', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('32', '啊啊啊啊啊啊啊啊啊', '1', '21', '0', '0', '0', '1487415995', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('33', '<p style="color:#666666;"><img src="/mytest/mingzhi/Uploads/images/20170226/58b2d243cfb42.png" alt="snipaste20170225_212447" style="max-width: 100%; width: 469px; height: 342px;" class=""></p><p>ms<br></p>', '1', '21', '0', '0', '0', '1488114292', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('34', '<p style="color:#666666;"><img src="/mytest/mingzhi/Uploads/images/20170226/58b2d243cfb42.png" alt="snipaste20170225_212447" style="max-width: 100%; width: 469px; height: 342px;" class="clicked"></p><p>ms<br></p>', '1', '21', '0', '0', '0', '1488114301', '0', '0', '2', '0', '0', '');
INSERT INTO `han_answer` VALUES ('35', '<p style="color:#666666;">于谦保卫北京城的决心让我敬佩<br></p>', '1', '9', '0', '1', '0', '1488114499', '0', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('36', '<p style="color:#666666;">张居正<br></p>', '1', '9', '0', '0', '0', '1488159591', '0', '0', '2', '0', '0', '');
INSERT INTO `han_answer` VALUES ('37', '<p style="color:#666666;">写下你的想法...</p>', '1', '18', '0', '0', '0', '1490092640', '', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('38', '<p style="color:#666666;">写下你的想法...</p>', '1', '19', '0', '1', '0', '1490270514', '', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('39', '<p style="color:#666666;">好难啊</p>', '1', '22', '1', '0', '0', '1490276638', '', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('40', '<p style="color:#666666;">spring很好很强大<img src="/mytest/mingzhi/Public/static/wangEditor/static/emotions/default/12.gif"></p><p><br></p>', '1', '22', '0', '0', '0', '1490277091', '', '0', '1', '0', '0', '');
INSERT INTO `han_answer` VALUES ('41', '<p>hahahh<br></p>', '40', '23', '0', '1', '0', '1490958793', '', '0', '2', '0', '0', '');
INSERT INTO `han_answer` VALUES ('42', '<p><img src="/mytest/mingzhi/Uploads/images/20170402/58e100939ed88.jpeg" alt="index" style="max-width:100%;" class=""></p><p>我也不知道怎么学<br></p>', '1', '24', '0', '0', '0', '1491140778', '', '0', '0', '0', '0', '');
INSERT INTO `han_answer` VALUES ('43', '<p>在Hibernate框架中，一个实体类映射为一个数据库表，在进行多表查询时,如何将不同表中的数据整合起来，并且映射为一个实体类是利用Hibernate进行多表查询的关键，根据我的理解，先将代码整理一下：</p><blockquote><p>实体类</p></blockquote><pre style="max-width:100%;overflow-x:auto;"><code class="javascript hljs" codemark="1">@Entity
@Table(name = <span class="hljs-string">"ps_trends"</span>)
public <span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">Trends</span> <span class="hljs-title">implements</span> <span class="hljs-title">Serializable</span></span>{


private <span class="hljs-keyword">static</span> final long serialVersionUID = <span class="hljs-number">-2228382525594394975</span>L;

@Id
@GeneratedValue(strategy = GenerationType.IDENTITY)
private int id;

@Column(name = <span class="hljs-string">"item_title"</span>)
private <span class="hljs-built_in">String</span> itemTitle;

@Column(name = <span class="hljs-string">"item_content"</span>)
private <span class="hljs-built_in">String</span> itemContent;

@Column(name = <span class="hljs-string">"type_id"</span>)
private int  typeId;

@Column(name = <span class="hljs-string">"add_time"</span>)
private <span class="hljs-built_in">String</span> addTime;

@Column(name = <span class="hljs-string">"view_count"</span>)
private int viewCount;

@Column(name = <span class="hljs-string">"is_image"</span>)
private int isImage;

@Column(name = <span class="hljs-string">"is_publish"</span>)
private int isPublish;

<span class="hljs-comment">//临时属性</span>
@Transient
private <span class="hljs-built_in">String</span> itemTypeFlag;

@Transient
private <span class="hljs-built_in">String</span> itemTypeName;

public Trends(){}

public Trends(int id, <span class="hljs-built_in">String</span> itemTitle, <span class="hljs-built_in">String</span> itemContent, <span class="hljs-built_in">String</span> addTime, int viewCount, 
          <span class="hljs-built_in">String</span> itemTypeName,<span class="hljs-built_in">String</span> itemTypeFlag) {
    <span class="hljs-keyword">super</span>();
    <span class="hljs-keyword">this</span>.id = id;
    <span class="hljs-keyword">this</span>.itemTitle = itemTitle;
    <span class="hljs-keyword">this</span>.itemContent = itemContent;
    <span class="hljs-keyword">this</span>.addTime = addTime;
    <span class="hljs-keyword">this</span>.viewCount = viewCount;
    <span class="hljs-keyword">this</span>.itemTypeName = itemTypeName;
    <span class="hljs-keyword">this</span>.itemTypeFlag = itemTypeFlag;
    
}
setter ，getter方法
}</code></pre><p>这里有两个属性注解为Transient，因为它们不是主表的映射字段。同时写一个有参构造方法，构造方法的参数列表即为要查询的映射字段</p><blockquote><p>DaoImpl方法</p></blockquote><pre style="max-width:100%;overflow-x:auto;"><code class="javascript hljs" codemark="1">@Override
public Trends findTrendsInfoById(int id) {
    <span class="hljs-comment">// TODO Auto-generated method stub</span>
    <span class="hljs-built_in">String</span> hql=<span class="hljs-string">"select new com.primaryschool.home.entity.Trends(t.id,t.itemTitle,t.itemContent,t.addTime,t.viewCount,tt.itemTypeName,tt.itemTypeFlag)from Trends t,TrendsType tt  where tt.id=t.typeId and t.id=? and t.isPublish=1"</span>;
    Query query=sessionFactory.getCurrentSession().createQuery(hql);
    query.setInteger(<span class="hljs-number">0</span>, id);
    <span class="hljs-keyword">return</span> (Trends) query.uniqueResult();
}</code></pre><p>在findTrendsInfoById(int id)方法中，hql语句有些特别，它是将两个表的需要字段传入到Trends实体类的构造方法中，这样就可以直接利用getter方法进行取值了。</p><p><br></p>', '1', '25', '0', '0', '0', '1493127981', '', '0', '0', '0', '0', '');

-- ----------------------------
-- Table structure for `han_answer_collect`
-- ----------------------------

DROP TABLE IF EXISTS `han_answer_collect`;

CREATE TABLE `han_answer_collect` (
  `collect_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `answer_id` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  `collection_id` int(11) unsigned zerofill DEFAULT NULL COMMENT '收藏夹id',
  PRIMARY KEY (`collect_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_answer_collect`
-- ----------------------------

INSERT INTO `han_answer_collect` VALUES ('2', '31', '1', '1488097052', '00000000001');
INSERT INTO `han_answer_collect` VALUES ('4', '29', '1', '1488099493', '00000000002');
INSERT INTO `han_answer_collect` VALUES ('6', '28', '1', '1488100377', '00000000002');
INSERT INTO `han_answer_collect` VALUES ('12', '27', '1', '1488110793', '00000000001');
INSERT INTO `han_answer_collect` VALUES ('13', '', '1', '1488110955', '');
INSERT INTO `han_answer_collect` VALUES ('14', '', '1', '1488110960', '');
INSERT INTO `han_answer_collect` VALUES ('15', '32', '1', '1488113157', '00000000001');
INSERT INTO `han_answer_collect` VALUES ('26', '18', '1', '1488981205', '00000000001');
INSERT INTO `han_answer_collect` VALUES ('27', '', '1', '1489233393', '');
INSERT INTO `han_answer_collect` VALUES ('28', '', '1', '1489233396', '');
INSERT INTO `han_answer_collect` VALUES ('31', '36', '1', '1489731690', '00000000001');
INSERT INTO `han_answer_collect` VALUES ('32', '', '1', '1489746443', '');
INSERT INTO `han_answer_collect` VALUES ('33', '', '1', '1489746446', '');
INSERT INTO `han_answer_collect` VALUES ('34', '', '1', '1489746447', '');
INSERT INTO `han_answer_collect` VALUES ('35', '42', '1', '1491758274', '00000000001');
INSERT INTO `han_answer_collect` VALUES ('36', '', '1', '1493125137', '');
INSERT INTO `han_answer_collect` VALUES ('37', '', '1', '1493125139', '');
INSERT INTO `han_answer_collect` VALUES ('38', '', '1', '1493125140', '');

-- ----------------------------
-- Table structure for `han_answer_comment`
-- ----------------------------

DROP TABLE IF EXISTS `han_answer_comment`;

CREATE TABLE `han_answer_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer_id` int(11) DEFAULT NULL,
  `suid` int(11) DEFAULT NULL COMMENT '回复方uid或者为直接评论uid',
  `ruid` int(11) DEFAULT NULL COMMENT '被回答的用户id',
  `replay_comment_id` int(11) DEFAULT NULL COMMENT '回复的评论id',
  `message` text,
  `upvote_count` int(11) DEFAULT '0',
  `report_count` int(11) DEFAULT '0',
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_answer_comment`
-- ----------------------------

INSERT INTO `han_answer_comment` VALUES ('39', '36', '1', '', '', '一个人', '0', '0', '1488458864');
INSERT INTO `han_answer_comment` VALUES ('40', '36', '1', '1', '39', '两个人', '1', '0', '1488458883');
INSERT INTO `han_answer_comment` VALUES ('44', '34', '1', '', '', '么么么么么', '0', '0', '1488460273');
INSERT INTO `han_answer_comment` VALUES ('45', '34', '1', '1', '44', '么么么哒', '0', '0', '1488460283');
INSERT INTO `han_answer_comment` VALUES ('46', '40', '1', '', '', '很牛', '0', '0', '1490330792');
INSERT INTO `han_answer_comment` VALUES ('47', '41', '1', '', '', '我来评一下', '1', '0', '1493125617');
INSERT INTO `han_answer_comment` VALUES ('48', '41', '1', '1', '47', '回复一下', '0', '0', '1493125630');

-- ----------------------------
-- Table structure for `han_answer_comment_report`
-- ----------------------------

DROP TABLE IF EXISTS `han_answer_comment_report`;

CREATE TABLE `han_answer_comment_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_answer_comment_report`
-- ----------------------------

INSERT INTO `han_answer_comment_report` VALUES ('7', '13', '1', '1487770209');
INSERT INTO `han_answer_comment_report` VALUES ('10', '14', '1', '1487810109');
INSERT INTO `han_answer_comment_report` VALUES ('11', '5', '1', '1487810114');

-- ----------------------------
-- Table structure for `han_answer_comment_upvote`
-- ----------------------------

DROP TABLE IF EXISTS `han_answer_comment_upvote`;

CREATE TABLE `han_answer_comment_upvote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_answer_comment_upvote`
-- ----------------------------

INSERT INTO `han_answer_comment_upvote` VALUES ('4', '14', '1', '1487830761');
INSERT INTO `han_answer_comment_upvote` VALUES ('6', '12', '1', '1487833741');
INSERT INTO `han_answer_comment_upvote` VALUES ('7', '15', '1', '1487845651');
INSERT INTO `han_answer_comment_upvote` VALUES ('8', '18', '1', '1488115846');
INSERT INTO `han_answer_comment_upvote` VALUES ('9', '21', '1', '1488164232');
INSERT INTO `han_answer_comment_upvote` VALUES ('11', '26', '1', '1488456562');
INSERT INTO `han_answer_comment_upvote` VALUES ('16', '40', '1', '1489728339');
INSERT INTO `han_answer_comment_upvote` VALUES ('17', '47', '1', '1493125619');

-- ----------------------------
-- Table structure for `han_answer_report`
-- ----------------------------

DROP TABLE IF EXISTS `han_answer_report`;

CREATE TABLE `han_answer_report` (
  `report_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `answer_id` int(11) DEFAULT NULL COMMENT '问题id',
  `uid` int(11) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_answer_report`
-- ----------------------------

INSERT INTO `han_answer_report` VALUES ('1', '31', '1', '1487668459');
INSERT INTO `han_answer_report` VALUES ('2', '30', '1', '1487668805');
INSERT INTO `han_answer_report` VALUES ('3', '32', '1', '1487675469');
INSERT INTO `han_answer_report` VALUES ('4', '26', '1', '1487683191');
INSERT INTO `han_answer_report` VALUES ('5', '36', '1', '1489650645');
INSERT INTO `han_answer_report` VALUES ('6', '40', '1', '1490330848');
INSERT INTO `han_answer_report` VALUES ('7', '28', '1', '1490796396');

-- ----------------------------
-- Table structure for `han_answer_vote`
-- ----------------------------

DROP TABLE IF EXISTS `han_answer_vote`;

CREATE TABLE `han_answer_vote` (
  `vote_id` int(11) NOT NULL AUTO_INCREMENT,
  `answer_id` int(11) DEFAULT NULL,
  `vote_uid` int(11) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  `vote_value` int(4) DEFAULT '0',
  PRIMARY KEY (`vote_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_answer_vote`
-- ----------------------------

INSERT INTO `han_answer_vote` VALUES ('1', '20', '1', '1488980764', '0');
INSERT INTO `han_answer_vote` VALUES ('2', '19', '1', '1489647635', '1');
INSERT INTO `han_answer_vote` VALUES ('3', '18', '1', '1481886090', '1');
INSERT INTO `han_answer_vote` VALUES ('4', '17', '1', '1482932011', '0');
INSERT INTO `han_answer_vote` VALUES ('5', '21', '1', '1480818363', '1');
INSERT INTO `han_answer_vote` VALUES ('6', '22', '1', '1481867239', '1');
INSERT INTO `han_answer_vote` VALUES ('7', '23', '1', '1480846112', '1');
INSERT INTO `han_answer_vote` VALUES ('8', '24', '1', '1482283418', '1');
INSERT INTO `han_answer_vote` VALUES ('9', '25', '1', '1490330466', '0');
INSERT INTO `han_answer_vote` VALUES ('10', '26', '1', '1481872036', '0');
INSERT INTO `han_answer_vote` VALUES ('11', '14', '1', '1481872464', '1');
INSERT INTO `han_answer_vote` VALUES ('12', '2', '1', '1481872749', '1');
INSERT INTO `han_answer_vote` VALUES ('13', '15', '1', '1489731452', '1');
INSERT INTO `han_answer_vote` VALUES ('14', '28', '1', '1481964954', '1');
INSERT INTO `han_answer_vote` VALUES ('15', '30', '1', '1489466622', '0');
INSERT INTO `han_answer_vote` VALUES ('16', '29', '1', '1484102324', '0');
INSERT INTO `han_answer_vote` VALUES ('17', '31', '1', '1487663919', '0');
INSERT INTO `han_answer_vote` VALUES ('18', '32', '1', '1491759109', '0');
INSERT INTO `han_answer_vote` VALUES ('19', '35', '1', '1490001259', '1');
INSERT INTO `han_answer_vote` VALUES ('20', '0', '1', '1488532360', '0');
INSERT INTO `han_answer_vote` VALUES ('21', '36', '1', '1491759710', '0');
INSERT INTO `han_answer_vote` VALUES ('22', '27', '1', '1489218363', '1');
INSERT INTO `han_answer_vote` VALUES ('23', '38', '1', '1491725560', '0');
INSERT INTO `han_answer_vote` VALUES ('24', '40', '1', '1490834414', '0');
INSERT INTO `han_answer_vote` VALUES ('25', '39', '1', '1490575672', '0');
INSERT INTO `han_answer_vote` VALUES ('26', '19', '40', '1490958651', '0');
INSERT INTO `han_answer_vote` VALUES ('27', '38', '40', '1490958677', '1');
INSERT INTO `han_answer_vote` VALUES ('28', '41', '40', '1490958802', '1');

-- ----------------------------
-- Table structure for `han_auth`
-- ----------------------------

DROP TABLE IF EXISTS `han_auth`;

CREATE TABLE `han_auth` (
  `auth_id` int(11) NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(255) NOT NULL COMMENT '名称',
  `auth_pid` int(11) NOT NULL COMMENT '父id',
  `auth_c` varchar(255) NOT NULL COMMENT '控制器',
  `auth_a` varchar(255) NOT NULL COMMENT '操作方法',
  `auth_path` varchar(255) NOT NULL COMMENT '全路径',
  `auth_level` tinyint(4) unsigned zerofill NOT NULL COMMENT '级别',
  PRIMARY KEY (`auth_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_auth`
-- ----------------------------

INSERT INTO `han_auth` VALUES ('1', '用户中心', '0', '', '', '1', '0000');
INSERT INTO `han_auth` VALUES ('2', '用户列表', '1', '', '', '2', '0000');
INSERT INTO `han_auth` VALUES ('3', '封禁的用户', '1', '', '', '3', '0000');
INSERT INTO `han_auth` VALUES ('4', '评论管理', '0', 'Goods', 'show', '1-4', '0001');
INSERT INTO `han_auth` VALUES ('5', '评论列表', '4', '', '', '3-5', '0001');
INSERT INTO `han_auth` VALUES ('6', '意见反馈', '4', 'Goods', 'add', '1-6', '0001');
INSERT INTO `han_auth` VALUES ('7', '话题管理', '0', '', '', '7', '0000');
INSERT INTO `han_auth` VALUES ('8', '话题列表', '7', 'Role', 'showRole', '7-8', '0001');
INSERT INTO `han_auth` VALUES ('9', '封禁话题', '7', 'Auth', 'showlist', '7-9', '0001');
INSERT INTO `han_auth` VALUES ('10', '热门话题', '7', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('11', '私信管理', '0', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('12', '系统私信', '11', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('13', '用户私信', '11', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('14', '回答管理', '0', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('15', '回答列表', '14', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('16', '封禁回答', '14', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('17', '页面管理', '0', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('18', '首页管理', '17', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('19', '友情链接', '17', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('20', '系统统计', '0', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('21', '统计列表', '20', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('22', '管理员管理', '0', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('23', '角色管理', '22', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('24', '权限管理', '22', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('25', '管理员列表', '22', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('26', '系统管理', '0', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('27', '基本设置', '26', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('28', '栏目设置', '26', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('29', '数据字典', '26', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('30', '屏蔽词', '26', '', '', '', '0000');
INSERT INTO `han_auth` VALUES ('31', '系统日志', '26', '', '', '', '0000');

-- ----------------------------
-- Table structure for `han_collection`
-- ----------------------------

DROP TABLE IF EXISTS `han_collection`;

CREATE TABLE `han_collection` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `collection_name` varchar(20) DEFAULT NULL COMMENT '收藏夹名称',
  `collection_num` int(10) unsigned DEFAULT '0' COMMENT '收藏夹收藏的数量',
  `collection_status` int(2) DEFAULT '1',
  `uid` int(10) DEFAULT NULL,
  `collection_desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_collection`
-- ----------------------------

INSERT INTO `han_collection` VALUES ('1', 'java', '6', '1', '1', '');
INSERT INTO `han_collection` VALUES ('2', 'php', '2', '1', '1', '');
INSERT INTO `han_collection` VALUES ('3', '其他', '0', '1', '1', '其他的东西');

-- ----------------------------
-- Table structure for `han_feeds`
-- ----------------------------

DROP TABLE IF EXISTS `han_feeds`;

CREATE TABLE `han_feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suid` int(11) DEFAULT NULL COMMENT '推送者id',
  `ruid` int(11) DEFAULT NULL COMMENT '接收者id',
  `item_id` int(11) DEFAULT NULL COMMENT '推送信息id',
  `type` varchar(255) DEFAULT NULL COMMENT '推送类型',
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `suid` (`suid`),
  KEY `ruid` (`ruid`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_feeds`
-- ----------------------------

INSERT INTO `han_feeds` VALUES ('1', '1', '1', '6', 'q', '1479814816');
INSERT INTO `han_feeds` VALUES ('2', '1', '1', '7', 'q', '1479815124');
INSERT INTO `han_feeds` VALUES ('6', '1', '25', '7', 'q', '1479815124');
INSERT INTO `han_feeds` VALUES ('8', '1', '1', '9', 'q', '1479816977');
INSERT INTO `han_feeds` VALUES ('10', '1', '1', '10', 'q', '1479817835');
INSERT INTO `han_feeds` VALUES ('11', '1', '1', '11', 'q', '1479818968');
INSERT INTO `han_feeds` VALUES ('12', '1', '25', '11', 'q', '1479818968');
INSERT INTO `han_feeds` VALUES ('13', '1', '1', '12', 'q', '1479867842');
INSERT INTO `han_feeds` VALUES ('14', '1', '1', '13', 'q', '1479909299');
INSERT INTO `han_feeds` VALUES ('15', '1', '25', '13', 'q', '1479909299');
INSERT INTO `han_feeds` VALUES ('16', '1', '1', '14', 'q', '1479949634');
INSERT INTO `han_feeds` VALUES ('17', '1', '1', '15', 'q', '1479964926');
INSERT INTO `han_feeds` VALUES ('18', '1', '1', '16', 'q', '1480158338');
INSERT INTO `han_feeds` VALUES ('19', '1', '1', '2', 'a', '1480216620');
INSERT INTO `han_feeds` VALUES ('20', '1', '1', '11', 'a', '1480231221');
INSERT INTO `han_feeds` VALUES ('21', '1', '25', '11', 'a', '1480231221');
INSERT INTO `han_feeds` VALUES ('22', '1', '1', '17', 'q', '1480231662');
INSERT INTO `han_feeds` VALUES ('23', '1', '1', '12', 'a', '1480253789');
INSERT INTO `han_feeds` VALUES ('24', '1', '1', '13', 'a', '1480295525');
INSERT INTO `han_feeds` VALUES ('25', '1', '1', '18', 'q', '1480331168');
INSERT INTO `han_feeds` VALUES ('26', '1', '1', '14', 'a', '1480331524');
INSERT INTO `han_feeds` VALUES ('27', '1', '1', '19', 'q', '1480421905');
INSERT INTO `han_feeds` VALUES ('28', '1', '1', '15', 'a', '1480421970');
INSERT INTO `han_feeds` VALUES ('30', '1', '1', '17', 'a', '1480422614');
INSERT INTO `han_feeds` VALUES ('31', '1', '1', '18', 'a', '1480423214');
INSERT INTO `han_feeds` VALUES ('32', '1', '1', '19', 'a', '1480471183');
INSERT INTO `han_feeds` VALUES ('33', '1', '1', '20', 'a', '1480512494');
INSERT INTO `han_feeds` VALUES ('34', '1', '1', '21', 'a', '1480770475');
INSERT INTO `han_feeds` VALUES ('35', '1', '1', '22', 'a', '1480819679');
INSERT INTO `han_feeds` VALUES ('36', '39', '1', '20', 'q', '1480821855');
INSERT INTO `han_feeds` VALUES ('37', '39', '39', '20', 'q', '1480821855');
INSERT INTO `han_feeds` VALUES ('38', '39', '39', '23', 'a', '1480821953');
INSERT INTO `han_feeds` VALUES ('39', '39', '1', '23', 'a', '1480821953');
INSERT INTO `han_feeds` VALUES ('40', '1', '39', '24', 'a', '1480918471');
INSERT INTO `han_feeds` VALUES ('41', '1', '1', '24', 'a', '1480918471');
INSERT INTO `han_feeds` VALUES ('42', '1', '39', '25', 'a', '1481182287');
INSERT INTO `han_feeds` VALUES ('43', '1', '1', '25', 'a', '1481182287');
INSERT INTO `han_feeds` VALUES ('44', '1', '1', '21', 'q', '1481594844');
INSERT INTO `han_feeds` VALUES ('45', '1', '1', '26', 'a', '1481867279');
INSERT INTO `han_feeds` VALUES ('46', '1', '1', '27', 'a', '1481897041');
INSERT INTO `han_feeds` VALUES ('47', '1', '1', '28', 'a', '1481897133');
INSERT INTO `han_feeds` VALUES ('48', '1', '39', '29', 'a', '1482716946');
INSERT INTO `han_feeds` VALUES ('49', '1', '1', '29', 'a', '1482716946');
INSERT INTO `han_feeds` VALUES ('50', '1', '1', '30', 'a', '1482718299');
INSERT INTO `han_feeds` VALUES ('51', '1', '39', '30', 'a', '1482718299');
INSERT INTO `han_feeds` VALUES ('52', '1', '1', '31', 'a', '1487413252');
INSERT INTO `han_feeds` VALUES ('53', '1', '1', '32', 'a', '1487674627');
INSERT INTO `han_feeds` VALUES ('54', '1', '1', '33', 'a', '1488114292');
INSERT INTO `han_feeds` VALUES ('55', '1', '1', '34', 'a', '1488114301');
INSERT INTO `han_feeds` VALUES ('56', '1', '1', '35', 'a', '1488114499');
INSERT INTO `han_feeds` VALUES ('57', '1', '1', '36', 'a', '1488159591');
INSERT INTO `han_feeds` VALUES ('58', '1', '1', '37', 'a', '1490092640');
INSERT INTO `han_feeds` VALUES ('59', '1', '1', '38', 'a', '1490270514');
INSERT INTO `han_feeds` VALUES ('60', '1', '39', '38', 'a', '1490270514');
INSERT INTO `han_feeds` VALUES ('61', '1', '1', '22', 'q', '1490270641');
INSERT INTO `han_feeds` VALUES ('62', '1', '1', '39', 'a', '1490276638');
INSERT INTO `han_feeds` VALUES ('63', '1', '1', '40', 'a', '1490277091');
INSERT INTO `han_feeds` VALUES ('64', '1', '39', '23', 'q', '1490834599');
INSERT INTO `han_feeds` VALUES ('65', '1', '1', '23', 'q', '1490834599');
INSERT INTO `han_feeds` VALUES ('66', '40', '1', '41', 'a', '1490958793');
INSERT INTO `han_feeds` VALUES ('67', '40', '40', '41', 'a', '1490958793');
INSERT INTO `han_feeds` VALUES ('68', '40', '39', '41', 'a', '1490958793');
INSERT INTO `han_feeds` VALUES ('69', '41', '39', '24', 'q', '1490959459');
INSERT INTO `han_feeds` VALUES ('70', '41', '1', '24', 'q', '1490959459');
INSERT INTO `han_feeds` VALUES ('71', '41', '40', '24', 'q', '1490959459');
INSERT INTO `han_feeds` VALUES ('72', '41', '41', '24', 'q', '1490959459');
INSERT INTO `han_feeds` VALUES ('73', '1', '41', '42', 'a', '1491140778');
INSERT INTO `han_feeds` VALUES ('74', '1', '39', '42', 'a', '1491140778');
INSERT INTO `han_feeds` VALUES ('75', '1', '1', '42', 'a', '1491140778');
INSERT INTO `han_feeds` VALUES ('76', '1', '40', '42', 'a', '1491140778');
INSERT INTO `han_feeds` VALUES ('77', '1', '1', '25', 'q', '1493127859');
INSERT INTO `han_feeds` VALUES ('78', '1', '1', '43', 'a', '1493127981');

-- ----------------------------
-- Table structure for `han_inbox`
-- ----------------------------

DROP TABLE IF EXISTS `han_inbox`;

CREATE TABLE `han_inbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inbox_content` text,
  `sender_uid` int(11) DEFAULT NULL,
  `recipient_uid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  `inbox_id` int(11) DEFAULT NULL COMMENT '回复私信id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_inbox`
-- ----------------------------

INSERT INTO `han_inbox` VALUES ('1', '欢迎您来到明之！这是一个充满知识和思考力的社区，您可以享受知识所带来的乐趣，同时思考这些知识的正确性，给出您的见解。有问题请联系明之管理员', '1', '1', '1', '1488159591', '');
INSERT INTO `han_inbox` VALUES ('2', '人员', '1', '1', '1', '1490002955', '');

-- ----------------------------
-- Table structure for `han_jobs`
-- ----------------------------

DROP TABLE IF EXISTS `han_jobs`;

CREATE TABLE `han_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(64) DEFAULT NULL COMMENT '职位名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_jobs`
-- ----------------------------

INSERT INTO `han_jobs` VALUES ('1', '销售');
INSERT INTO `han_jobs` VALUES ('2', '市场/市场拓展/公关');
INSERT INTO `han_jobs` VALUES ('3', '商务/采购/贸易');
INSERT INTO `han_jobs` VALUES ('4', '计算机软、硬件/互联网/IT');
INSERT INTO `han_jobs` VALUES ('5', '电子/半导体/仪表仪器');
INSERT INTO `han_jobs` VALUES ('6', '通信技术');
INSERT INTO `han_jobs` VALUES ('7', '客户服务/技术支持');
INSERT INTO `han_jobs` VALUES ('8', '行政/后勤');
INSERT INTO `han_jobs` VALUES ('9', '人力资源');
INSERT INTO `han_jobs` VALUES ('10', '高级管理');
INSERT INTO `han_jobs` VALUES ('11', '生产/加工/制造');
INSERT INTO `han_jobs` VALUES ('12', '质控/安检');
INSERT INTO `han_jobs` VALUES ('13', '工程机械');
INSERT INTO `han_jobs` VALUES ('14', '技工');
INSERT INTO `han_jobs` VALUES ('15', '财会/审计/统计');
INSERT INTO `han_jobs` VALUES ('16', '金融/银行/保险/证券/投资');
INSERT INTO `han_jobs` VALUES ('17', '建筑/房地产/装修/物业');
INSERT INTO `han_jobs` VALUES ('18', '交通/仓储/物流');
INSERT INTO `han_jobs` VALUES ('19', '普通劳动力/家政服务');
INSERT INTO `han_jobs` VALUES ('20', '零售业');
INSERT INTO `han_jobs` VALUES ('21', '教育/培训');
INSERT INTO `han_jobs` VALUES ('22', '咨询/顾问');
INSERT INTO `han_jobs` VALUES ('23', '学术/科研');
INSERT INTO `han_jobs` VALUES ('24', '法律');
INSERT INTO `han_jobs` VALUES ('25', '美术/设计/创意');
INSERT INTO `han_jobs` VALUES ('26', '编辑/文案/传媒/影视/新闻');
INSERT INTO `han_jobs` VALUES ('27', '酒店/餐饮/旅游/娱乐');
INSERT INTO `han_jobs` VALUES ('28', '化工');
INSERT INTO `han_jobs` VALUES ('29', '能源/矿产/地质勘查');
INSERT INTO `han_jobs` VALUES ('30', '医疗/护理/保健/美容');
INSERT INTO `han_jobs` VALUES ('31', '生物/制药/医疗器械');
INSERT INTO `han_jobs` VALUES ('32', '翻译（口译与笔译）');
INSERT INTO `han_jobs` VALUES ('33', '公务员');
INSERT INTO `han_jobs` VALUES ('34', '环境科学/环保');
INSERT INTO `han_jobs` VALUES ('35', '农/林/牧/渔业');
INSERT INTO `han_jobs` VALUES ('36', '兼职/临时/培训生/储备干部');
INSERT INTO `han_jobs` VALUES ('37', '在校学生');
INSERT INTO `han_jobs` VALUES ('38', '其他');

-- ----------------------------
-- Table structure for `han_notifications`
-- ----------------------------

DROP TABLE IF EXISTS `han_notifications`;

CREATE TABLE `han_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '通知id',
  `sender_uid` int(11) DEFAULT NULL COMMENT '送者发id',
  `recipient_uid` int(11) DEFAULT NULL COMMENT '收接者id',
  `action_type_id` int(11) DEFAULT NULL COMMENT '操作类型',
  `item_id` int(11) DEFAULT NULL COMMENT '具体信息id',
  `add_time` int(11) DEFAULT NULL,
  `read_flag` int(11) DEFAULT NULL COMMENT '阅读状态，0未阅，1已阅',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_notifications`
-- ----------------------------

INSERT INTO `han_notifications` VALUES ('9', '1', '1', '2', '18', '1490092640', '1');
INSERT INTO `han_notifications` VALUES ('10', '1', '1', '2', '19', '1490270514', '1');
INSERT INTO `han_notifications` VALUES ('12', '1', '1', '2', '22', '1490276638', '1');
INSERT INTO `han_notifications` VALUES ('16', '1', '1', '6', '40', '1490330792', '1');
INSERT INTO `han_notifications` VALUES ('20', '1', '1', '4', '28', '1490796396', '1');
INSERT INTO `han_notifications` VALUES ('23', '40', '1', '1', '38', '1490958677', '1');
INSERT INTO `han_notifications` VALUES ('24', '40', '1', '2', '23', '1490958793', '1');
INSERT INTO `han_notifications` VALUES ('25', '40', '40', '1', '41', '1490958803', '0');
INSERT INTO `han_notifications` VALUES ('26', '1', '41', '2', '24', '1491140779', '0');
INSERT INTO `han_notifications` VALUES ('27', '1', '40', '6', '41', '1493125617', '0');
INSERT INTO `han_notifications` VALUES ('28', '1', '1', '2', '25', '1493127981', '1');

-- ----------------------------
-- Table structure for `han_notifications_type`
-- ----------------------------

DROP TABLE IF EXISTS `han_notifications_type`;

CREATE TABLE `han_notifications_type` (
  `id` int(5) NOT NULL,
  `notification_type_name` varchar(255) DEFAULT NULL,
  `notification_type_flag` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_notifications_type`
-- ----------------------------

INSERT INTO `han_notifications_type` VALUES ('1', '赞同答案', 'za');
INSERT INTO `han_notifications_type` VALUES ('2', '回答问题', 'aq');
INSERT INTO `han_notifications_type` VALUES ('3', '举报问题', 'rq');
INSERT INTO `han_notifications_type` VALUES ('4', '举报答案', 'ra');
INSERT INTO `han_notifications_type` VALUES ('5', '关注人', 'gp');
INSERT INTO `han_notifications_type` VALUES ('6', '评论回答', 'pa');
INSERT INTO `han_notifications_type` VALUES ('7', '回复评论', 'hp');

-- ----------------------------
-- Table structure for `han_question`
-- ----------------------------

DROP TABLE IF EXISTS `han_question`;

CREATE TABLE `han_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '发起人id',
  `question_name` text,
  `question_desc` text COMMENT '话题描述',
  `create_time` int(11) DEFAULT NULL,
  `q_view_count` int(11) DEFAULT '0' COMMENT '问题浏览量',
  `answer_count` int(11) DEFAULT '0' COMMENT '问题回答数量',
  `focus_count` int(11) DEFAULT '0' COMMENT '关注数',
  `report_count` int(11) DEFAULT '0',
  `status` int(2) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `answer_count` (`answer_count`),
  FULLTEXT KEY `question_name` (`question_name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_question`
-- ----------------------------

INSERT INTO `han_question` VALUES ('1', '1', '我在景德镇等你', 'zzzzzzz.', '1477828079', '11', '0', '0', '0', '1');
INSERT INTO `han_question` VALUES ('2', '1', '如何评价小米5', '小米5如何', '1478004454', '0', '0', '0', '0', '1');
INSERT INTO `han_question` VALUES ('3', '1', 'php学习难吗？要如何深入学习php?', '这个不好说，才开始容易，越学越难吧', '1479706626', '36', '0', '1', '0', '1');
INSERT INTO `han_question` VALUES ('4', '1', '如何设计多维度交叉的feed流（数据库设计，首页展示信息）', '最近在做一个简单的问答网站 现在有以下四个元素 人，话题，问题，回答 如何设计数据库（MySQL） 人可以关注人，话题，问题 问题可以有多个话题标签 feed流（首页显示）能混合出现： 1.我关注的话题新增的问题 2.我关注的问题的新增回答 3.我关注的人提出的问题 感觉数据库不好设计，首页的数据该如混合展示不同的信息呢？', '1479738630', '19', '1', '1', '0', '1');
INSERT INTO `han_question` VALUES ('5', '1', '如何看待谷歌、三星加入 .NET 基金会，对 .NET 未来会有什么影响？ ', '。。。。如何看待谷歌、三星加入 .NET 基金会，对 .NET 未来会有什么影响？ ', '1479800788', '3', '0', '1', '0', '1');
INSERT INTO `han_question` VALUES ('6', '1', '游戏中的喷子在现实生活中是什么样的人？ ', '在玩英雄联盟中经常遇到喷子，他们是一个怎么的群体？', '1479814816', '2', '0', '0', '0', '1');
INSERT INTO `han_question` VALUES ('7', '1', '你认识的沉迷游戏的人最后怎么了？ ', '有很多人沉迷游戏，喜欢玩网络游戏，且不可自拔，他们最后都怎么样了？', '1479815124', '6', '0', '1', '0', '1');
INSERT INTO `han_question` VALUES ('9', '1', '读明史时，哪些人物或事件让你印象深刻？ ', '看《明朝那些事》时发现明代有很多让人印象深刻的人，哪些人物或事件让你印象深刻？ ', '1479816977', '93', '3', '1', '0', '1');
INSERT INTO `han_question` VALUES ('10', '1', 'mysql对海量数据支持怎么样？', '学习php，一直在用mysql，mysql对海量数据支持怎么样？', '1479817835', '6', '0', '1', '0', '1');
INSERT INTO `han_question` VALUES ('11', '1', 'MySQL 对于千万级的大表要怎么优化？', '如果feeds表数据量过大，该怎么优化呢？', '1479818968', '7', '0', '1', '0', '1');
INSERT INTO `han_question` VALUES ('12', '1', '王阳明被人们过誉了吗？ ', '传说王阳明能文能武，全能型儒生，但现在很多人都不知道他，我感觉他是个很厉害的人物', '1479867842', '23', '1', '1', '0', '1');
INSERT INTO `han_question` VALUES ('13', '1', '如何设计多维度交叉的feed流（数据库设计，首页展示信息），又问了一次，真不知道啊？？', '最近在做一个简单的问答网站
现在有以下四个元素
人，话题，问题，回答
如何设计数据库（MySQL）
人可以关注人，话题，问题
问题可以有多个话题标签
feed流（首页显示）能混合出现：

    1.我关注的话题新增的问题

    2.我关注的问题的新增回答

    3.我关注的人提出的问题

感觉数据库不好设计，首页的数据该如混合展示不同的信息呢？', '1479909299', '60', '1', '1', '0', '1');
INSERT INTO `han_question` VALUES ('14', '1', '有没有一件事，让你分清楚了现实和网络的区别？', '相信很多人都有过对待游戏太过认真的时候，楼主曾经因为玩LOL差一点和一个处了10年的兄弟闹翻了，但最好两个人边哭边哭的和好了，从此让我明白了游戏和生活的区别，不知道大家的经历是什么呢？', '1479949634', '31', '0', '1', '0', '1');
INSERT INTO `han_question` VALUES ('15', '1', ' 微信设计的神细节有哪些？ ', '例如：群聊中长按头像会变成@该用户。啦啦啦啦啦啦啦啦啦', '1479964926', '25', '1', '1', '0', '1');
INSERT INTO `han_question` VALUES ('16', '1', 'js动态添加div bind绑定事件失效', 'js动添加的元素事件失效，该怎么解决？', '1480158338', '11', '1', '1', '0', '1');
INSERT INTO `han_question` VALUES ('17', '1', '你曾经误解最大的一个历史人物是谁？ ', '历史人物很多，有没有对一个历史人物有很深的误解的事情出现？', '1480231662', '6', '0', '1', '0', '1');
INSERT INTO `han_question` VALUES ('18', '1', '有哪些适合大学生使用的 app？ ', '要迎来新生季了，打算整理一下大学生用的 App 给学弟学妹们。大家有没有什么推荐的？~', '1480331168', '153', '4', '1', '0', '1');
INSERT INTO `han_question` VALUES ('19', '1', 'ThinkPHP的save，add方法不起作用怎么办？', '今天在写项目的时候发现save和add方法不起作用，怎么回事', '1480421905', '288', '7', '1', '0', '1');
INSERT INTO `han_question` VALUES ('20', '39', 'php容易精通吗？', '感觉php入门容易，精通难，是不是这样？', '1480821855', '30', '4', '1', '0', '1');
INSERT INTO `han_question` VALUES ('21', '1', '当用户初次登录系统时，关注了几个话题，feed流只将最新的信息推送过来，以前的话题的信息怎么推送过来？', '当用户初次登录系统时，其关注了几个话题，怎么将话题以前的信息也加入到其feed流中？', '1481594844', '200', '6', '1', '0', '1');
INSERT INTO `han_question` VALUES ('22', '1', 'Spring Security怎么学才好', '感觉不会用啊', '1490270641', '22', '2', '1', '', '');
INSERT INTO `han_question` VALUES ('23', '1', 'dddddd', 'dfffff', '1490834599', '9', '1', '1', '', '');
INSERT INTO `han_question` VALUES ('24', '41', 'php我该怎么学', 'php怎么学才好', '1490959459', '37', '1', '1', '0', '1');
INSERT INTO `han_question` VALUES ('25', '1', '利用hibernate进行多表查询问题', '怎么利用hibernate进行多表查询', '1493127859', '9', '1', '1', '0', '1');

-- ----------------------------
-- Table structure for `han_question_collect`
-- ----------------------------

DROP TABLE IF EXISTS `han_question_collect`;

CREATE TABLE `han_question_collect` (
  `collect_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '收藏问题自增id',
  `question_id` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`collect_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_question_collect`
-- ----------------------------

-- ----------------------------
-- Table structure for `han_question_focus`
-- ----------------------------

DROP TABLE IF EXISTS `han_question_focus`;

CREATE TABLE `han_question_focus` (
  `focus_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `question_id` int(11) DEFAULT NULL COMMENT '问题id',
  `uid` int(11) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`focus_id`),
  KEY `question_id` (`question_id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_question_focus`
-- ----------------------------

INSERT INTO `han_question_focus` VALUES ('2', '4', '1', '1479738630');
INSERT INTO `han_question_focus` VALUES ('3', '5', '1', '1479800788');
INSERT INTO `han_question_focus` VALUES ('4', '7', '1', '1479815124');
INSERT INTO `han_question_focus` VALUES ('6', '10', '1', '1479817835');
INSERT INTO `han_question_focus` VALUES ('7', '11', '1', '1479818968');
INSERT INTO `han_question_focus` VALUES ('8', '12', '1', '1479867842');
INSERT INTO `han_question_focus` VALUES ('10', '14', '1', '1479949634');
INSERT INTO `han_question_focus` VALUES ('12', '16', '1', '1480158338');
INSERT INTO `han_question_focus` VALUES ('13', '17', '1', '1480231662');
INSERT INTO `han_question_focus` VALUES ('14', '18', '1', '1480331168');
INSERT INTO `han_question_focus` VALUES ('16', '20', '39', '1480821855');
INSERT INTO `han_question_focus` VALUES ('62', '15', '1', '1487683189');
INSERT INTO `han_question_focus` VALUES ('77', '21', '1', '1489731561');
INSERT INTO `han_question_focus` VALUES ('90', '20', '1', '1489930874');
INSERT INTO `han_question_focus` VALUES ('91', '19', '1', '1490092632');
INSERT INTO `han_question_focus` VALUES ('97', '22', '1', '1490272830');
INSERT INTO `han_question_focus` VALUES ('103', '23', '1', '1490869752');
INSERT INTO `han_question_focus` VALUES ('104', '23', '40', '1490958746');
INSERT INTO `han_question_focus` VALUES ('105', '24', '41', '1490959459');
INSERT INTO `han_question_focus` VALUES ('112', '25', '1', '1493220343');

-- ----------------------------
-- Table structure for `han_question_report`
-- ----------------------------

DROP TABLE IF EXISTS `han_question_report`;

CREATE TABLE `han_question_report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `question_id` int(11) DEFAULT NULL COMMENT '问题id',
  `uid` int(11) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_question_report`
-- ----------------------------

INSERT INTO `han_question_report` VALUES ('1', '21', '1', '1487596836');
INSERT INTO `han_question_report` VALUES ('2', '20', '1', '1487596893');

-- ----------------------------
-- Table structure for `han_replay`
-- ----------------------------

DROP TABLE IF EXISTS `han_replay`;

CREATE TABLE `han_replay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `replay_info` text COMMENT '回复内容',
  `replay_time` int(11) DEFAULT NULL COMMENT '回复时间',
  `uid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL COMMENT '回答id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_replay`
-- ----------------------------

-- ----------------------------
-- Table structure for `han_role`
-- ----------------------------

DROP TABLE IF EXISTS `han_role`;

CREATE TABLE `han_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL COMMENT '角色名称',
  `role_auth_ids` varchar(255) NOT NULL,
  `role_auth_ac` text NOT NULL COMMENT '模块-操作',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_role`
-- ----------------------------

INSERT INTO `han_role` VALUES ('1', '普通管理员', '1,4,3,5,6', 'Goods-show,Goods-add,Goods-update');
INSERT INTO `han_role` VALUES ('2', '评论管理员', '1,4,6', 'Goods-show,Goods-add');

-- ----------------------------
-- Table structure for `han_topic`
-- ----------------------------

DROP TABLE IF EXISTS `han_topic`;

CREATE TABLE `han_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(255) NOT NULL,
  `topic_desc` text NOT NULL COMMENT '话题描述',
  `topic_createtime` int(11) DEFAULT NULL COMMENT '题话创建时间',
  `topic_focus_count` int(11) DEFAULT '0' COMMENT '话题关注人数',
  `topic_pic` varchar(255) DEFAULT NULL COMMENT '话题图片地址',
  `discuss_count` int(11) DEFAULT '0' COMMENT '话题讨论数量',
  `user_related` int(11) DEFAULT '0' COMMENT '是否被用户关联',
  `topic_lock` int(11) DEFAULT '0' COMMENT '话题锁定，0未，1锁',
  `parent_id` int(11) DEFAULT '0' COMMENT '父话题id',
  `is_parent` int(11) DEFAULT '0' COMMENT '是否为父话题',
  `view_count` int(11) DEFAULT '0' COMMENT '话题被浏览量',
  `question_count` int(11) DEFAULT '0' COMMENT '问题数量',
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `topic_name` (`topic_name`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_topic`
-- ----------------------------

INSERT INTO `han_topic` VALUES ('1', '英雄联盟', '《英雄联盟》（简称lol）是由美国Riot Games开发，腾讯游戏运营的英雄对战网游。《英雄联盟》除了即时战略、团队作战外，还拥有特色的英雄、自动匹配的战网平台，包括天赋树、召唤师系统、符文等元素。', '1477129340', '3', '/mytest/mingzhi/Uploads/avatar/20161120/58315f7762f80.jpg', '0', '0', '0', '0', '0', '39', '1', '');
INSERT INTO `han_topic` VALUES ('2', '手机', '移动电话，或称为无线电话，通常称为手机，原本只是一种通讯工具，早期又有大哥大的俗称[1]  ，是可以在较广范围内使用的便携式电话终端，最早是由美国贝尔实验室在1940年制造的战地移动电话机发展而来。', '1478004454', '1', '/mytest/mingzhi/Uploads/avatar/20161120/58315f7762f80.jpg', '0', '0', '0', '0', '0', '4', '1', '');
INSERT INTO `han_topic` VALUES ('3', 'php', 'PHP（外文名:PHP: Hypertext Preprocessor，中文名：“超文本预处理器”）是一种通用开源脚本语言。语法吸收了C语言、Java和Perl的特点，利于学习，使用广泛，主要适用于Web开发领域。PHP 独特的语法混合了C、Java、Perl以及PHP自创的语法。它可以比CGI或者Perl更快速地执行动态网页。', '1479706627', '6', '/mytest/mingzhi/Uploads/avatar/20161120/58315f7762f80.jpg', '0', '0', '0', '0', '0', '212', '6', '');
INSERT INTO `han_topic` VALUES ('4', '编程', '', '1479706627', '2', '/mytest/mingzhi/Uploads/avatar/20161120/58315f7762f80.jpg', '0', '0', '0', '0', '0', '1', '1', '');
INSERT INTO `han_topic` VALUES ('5', 'mysql', '', '1479738630', '5', '/mytest/mingzhi/Uploads/avatar/20161120/58315f7762f80.jpg', '0', '0', '0', '0', '0', '131', '2', '');
INSERT INTO `han_topic` VALUES ('6', '三星', '', '1479800788', '1', '/mytest/mingzhi/Uploads/avatar/20161120/58315f7762f80.jpg', '0', '0', '0', '0', '0', '0', '1', '');
INSERT INTO `han_topic` VALUES ('7', '游戏', '', '1479814816', '2', '/mytest/mingzhi/Uploads/avatar/20161120/58315f7762f80.jpg', '0', '0', '0', '0', '0', '0', '1', '');
INSERT INTO `han_topic` VALUES ('8', '明朝', '', '1479816977', '1', '/mytest/mingzhi/Uploads/avatar/20161120/58315f7762f80.jpg', '0', '0', '0', '0', '0', '20', '1', '');
INSERT INTO `han_topic` VALUES ('9', '明朝那些事', '', '1479816977', '1', '/mytest/mingzhi/Uploads/avatar/20161120/58315f7762f80.jpg', '0', '0', '0', '0', '0', '4', '1', '');
INSERT INTO `han_topic` VALUES ('10', '历史', '', '1479816977', '2', '/mytest/mingzhi/Uploads/avatar/20161120/58315f7762f80.jpg', '0', '0', '0', '0', '0', '118', '2', '');
INSERT INTO `han_topic` VALUES ('11', 'feed', '', '1479818968', '3', '/mytest/mingzhi/Uploads/avatar/20161120/58315f7762f80.jpg', '0', '0', '0', '0', '0', '49', '2', '');
INSERT INTO `han_topic` VALUES ('12', 'zz', '', '1479867842', '1', '/mytest/mingzhi/Uploads/avatar/20161120/58315f7762f80.jpg', '0', '0', '0', '0', '0', '2', '1', '');
INSERT INTO `han_topic` VALUES ('13', 'feed流', '', '1479909299', '1', '', '0', '0', '0', '0', '0', '15', '1', '');
INSERT INTO `han_topic` VALUES ('14', 'LOL', '', '1479949634', '1', '', '0', '0', '0', '0', '0', '4', '1', '');
INSERT INTO `han_topic` VALUES ('15', '网络', '', '1479949634', '1', '', '0', '0', '0', '0', '0', '3', '1', '');
INSERT INTO `han_topic` VALUES ('16', '现实', '', '1479949634', '1', '', '0', '0', '0', '0', '0', '3', '1', '');
INSERT INTO `han_topic` VALUES ('17', '微信', '', '1479964926', '1', '', '0', '0', '0', '0', '0', '7', '1', '');
INSERT INTO `han_topic` VALUES ('18', 'javascript', '', '1480158338', '1', '', '0', '0', '0', '0', '0', '15', '1', '');
INSERT INTO `han_topic` VALUES ('19', 'app', '', '1480331168', '1', '', '0', '0', '0', '0', '0', '14', '1', '');
INSERT INTO `han_topic` VALUES ('20', '大学生', '', '1480331168', '1', '', '0', '0', '0', '0', '0', '11', '1', '');
INSERT INTO `han_topic` VALUES ('21', 'ThinkPHP', '', '1480421905', '1', '', '0', '0', '0', '0', '0', '63', '1', '');
INSERT INTO `han_topic` VALUES ('22', 'Spring', '', '1490270641', '1', '', '0', '0', '0', '0', '0', '8', '1', '');
INSERT INTO `han_topic` VALUES ('23', 'Security', '', '1490270641', '1', '', '0', '0', '0', '0', '0', '2', '1', '');
INSERT INTO `han_topic` VALUES ('24', 'Hibernate', '', '1493127859', '1', '', '0', '0', '0', '0', '0', '3', '1', '');

-- ----------------------------
-- Table structure for `han_topic_focus`
-- ----------------------------

DROP TABLE IF EXISTS `han_topic_focus`;

CREATE TABLE `han_topic_focus` (
  `focus_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `topic_id` int(11) DEFAULT NULL COMMENT '话题id',
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`focus_id`),
  KEY `topic_id` (`topic_id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_topic_focus`
-- ----------------------------

INSERT INTO `han_topic_focus` VALUES ('2', '2', '1', '1479800782');
INSERT INTO `han_topic_focus` VALUES ('4', '4', '1', '1479800787');
INSERT INTO `han_topic_focus` VALUES ('6', '5', '25', '1479800789');
INSERT INTO `han_topic_focus` VALUES ('7', '7', '1', '1479814816');
INSERT INTO `han_topic_focus` VALUES ('9', '8', '1', '1479816977');
INSERT INTO `han_topic_focus` VALUES ('10', '9', '1', '1479816977');
INSERT INTO `han_topic_focus` VALUES ('13', '12', '1', '1479867842');
INSERT INTO `han_topic_focus` VALUES ('14', '13', '1', '1479909299');
INSERT INTO `han_topic_focus` VALUES ('15', '14', '1', '1479949634');
INSERT INTO `han_topic_focus` VALUES ('16', '15', '1', '1479949634');
INSERT INTO `han_topic_focus` VALUES ('17', '16', '1', '1479949634');
INSERT INTO `han_topic_focus` VALUES ('18', '17', '1', '1479964926');
INSERT INTO `han_topic_focus` VALUES ('21', '20', '1', '1480331168');
INSERT INTO `han_topic_focus` VALUES ('23', '3', '39', '1480821855');
INSERT INTO `han_topic_focus` VALUES ('78', '0', '1', '1488544945');
INSERT INTO `han_topic_focus` VALUES ('152', '10', '1', '1489734009');
INSERT INTO `han_topic_focus` VALUES ('176', '21', '1', '1489734377');
INSERT INTO `han_topic_focus` VALUES ('179', '5', '1', '1489746519');
INSERT INTO `han_topic_focus` VALUES ('184', '22', '1', '1490270641');
INSERT INTO `han_topic_focus` VALUES ('185', '23', '1', '1490270641');
INSERT INTO `han_topic_focus` VALUES ('186', '11', '1', '1490438548');
INSERT INTO `han_topic_focus` VALUES ('189', '18', '1', '1490839351');
INSERT INTO `han_topic_focus` VALUES ('193', '3', '40', '1490955509');
INSERT INTO `han_topic_focus` VALUES ('194', '3', '41', '1490959459');
INSERT INTO `han_topic_focus` VALUES ('195', '3', '1', '1491712474');
INSERT INTO `han_topic_focus` VALUES ('235', '1', '0', '1493106849');
INSERT INTO `han_topic_focus` VALUES ('236', '1', '1', '1493125561');
INSERT INTO `han_topic_focus` VALUES ('238', '0', '0', '1493125699');
INSERT INTO `han_topic_focus` VALUES ('239', '24', '1', '1493127859');

-- ----------------------------
-- Table structure for `han_topic_relation`
-- ----------------------------

DROP TABLE IF EXISTS `han_topic_relation`;

CREATE TABLE `han_topic_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) DEFAULT NULL COMMENT '话题id',
  `item_id` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`),
  KEY `item_id` (`item_id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_topic_relation`
-- ----------------------------

INSERT INTO `han_topic_relation` VALUES ('1', '3', '3', '1', '1479706627');
INSERT INTO `han_topic_relation` VALUES ('2', '4', '3', '1', '1479706627');
INSERT INTO `han_topic_relation` VALUES ('3', '3', '4', '1', '1479738630');
INSERT INTO `han_topic_relation` VALUES ('4', '5', '4', '1', '1479738630');
INSERT INTO `han_topic_relation` VALUES ('5', '6', '5', '1', '1479800788');
INSERT INTO `han_topic_relation` VALUES ('6', '7', '6', '1', '1479814816');
INSERT INTO `han_topic_relation` VALUES ('7', '1', '6', '1', '1479814816');
INSERT INTO `han_topic_relation` VALUES ('8', '7', '7', '1', '1479815124');
INSERT INTO `han_topic_relation` VALUES ('9', '1', '7', '1', '1479815124');
INSERT INTO `han_topic_relation` VALUES ('10', '5', '7', '1', '1479815124');
INSERT INTO `han_topic_relation` VALUES ('11', '8', '9', '1', '1479816977');
INSERT INTO `han_topic_relation` VALUES ('12', '9', '9', '1', '1479816977');
INSERT INTO `han_topic_relation` VALUES ('13', '10', '9', '1', '1479816977');
INSERT INTO `han_topic_relation` VALUES ('14', '5', '10', '1', '1479817835');
INSERT INTO `han_topic_relation` VALUES ('15', '4', '10', '1', '1479817835');
INSERT INTO `han_topic_relation` VALUES ('16', '5', '11', '1', '1479818968');
INSERT INTO `han_topic_relation` VALUES ('17', '11', '11', '1', '1479818968');
INSERT INTO `han_topic_relation` VALUES ('18', '11', '12', '1', '1479867842');
INSERT INTO `han_topic_relation` VALUES ('19', '12', '12', '1', '1479867842');
INSERT INTO `han_topic_relation` VALUES ('20', '3', '13', '1', '1479909299');
INSERT INTO `han_topic_relation` VALUES ('21', '5', '13', '1', '1479909299');
INSERT INTO `han_topic_relation` VALUES ('22', '13', '13', '1', '1479909299');
INSERT INTO `han_topic_relation` VALUES ('23', '14', '14', '1', '1479949634');
INSERT INTO `han_topic_relation` VALUES ('24', '15', '14', '1', '1479949634');
INSERT INTO `han_topic_relation` VALUES ('25', '16', '14', '1', '1479949634');
INSERT INTO `han_topic_relation` VALUES ('26', '17', '15', '1', '1479964926');
INSERT INTO `han_topic_relation` VALUES ('27', '18', '16', '1', '1480158338');
INSERT INTO `han_topic_relation` VALUES ('28', '10', '17', '1', '1480231662');
INSERT INTO `han_topic_relation` VALUES ('29', '19', '18', '1', '1480331168');
INSERT INTO `han_topic_relation` VALUES ('30', '20', '18', '1', '1480331168');
INSERT INTO `han_topic_relation` VALUES ('31', '3', '19', '1', '1480421905');
INSERT INTO `han_topic_relation` VALUES ('32', '21', '19', '1', '1480421905');
INSERT INTO `han_topic_relation` VALUES ('33', '3', '20', '39', '1480821855');
INSERT INTO `han_topic_relation` VALUES ('34', '11', '21', '1', '1481594844');
INSERT INTO `han_topic_relation` VALUES ('35', '22', '22', '1', '1490270641');
INSERT INTO `han_topic_relation` VALUES ('36', '23', '22', '1', '1490270641');
INSERT INTO `han_topic_relation` VALUES ('37', '3', '23', '1', '1490834599');
INSERT INTO `han_topic_relation` VALUES ('38', '3', '24', '41', '1490959459');
INSERT INTO `han_topic_relation` VALUES ('39', '24', '25', '1', '1493127859');

-- ----------------------------
-- Table structure for `han_user`
-- ----------------------------

DROP TABLE IF EXISTS `han_user`;

CREATE TABLE `han_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `email` varchar(255) NOT NULL,
  `status` int(11) DEFAULT '1' COMMENT '用户状态',
  `desc` text COMMENT '描述下自己',
  `tag` varchar(255) DEFAULT NULL COMMENT '用户标签',
  `myweb` varchar(255) DEFAULT NULL COMMENT '个人网站',
  `role_id` int(11) unsigned DEFAULT '0',
  `reg_time` int(11) DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL COMMENT '户用手机',
  `avatar_file` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL COMMENT '性别',
  `birthday` int(11) DEFAULT NULL COMMENT '生日',
  `job_id` int(11) DEFAULT NULL COMMENT '职业id',
  `reg_ip` varchar(255) DEFAULT NULL COMMENT '注册ip',
  `last_login` int(11) DEFAULT NULL,
  `last_ip` varchar(255) DEFAULT NULL,
  `last_active` int(11) DEFAULT NULL COMMENT '最后活跃时间',
  `notification_unread` int(11) DEFAULT '0' COMMENT '未读系统通知数量',
  `inbox_unread` int(11) DEFAULT '0' COMMENT '未读私信数量',
  `inbox_recv` int(11) DEFAULT '0',
  `fans_count` int(11) DEFAULT '0' COMMENT '粉丝数量',
  `question_count` int(11) DEFAULT '0' COMMENT '题问数量',
  `answer_count` int(11) DEFAULT '0' COMMENT '回答数量',
  `forbidden` int(10) unsigned DEFAULT '0' COMMENT '否是禁用用户',
  `u_view_count` int(11) DEFAULT '0' COMMENT '人个主页访问量',
  `valid_email` int(11) DEFAULT '0' COMMENT '是否开启邮箱',
  `is_first_login` int(11) DEFAULT '1' COMMENT '首次登陆，默认',
  `agree_count` int(11) DEFAULT '0' COMMENT '赞同数量',
  `disagree_count` int(11) DEFAULT '0' COMMENT '反对数量',
  `follow_count` int(11) DEFAULT '0' COMMENT '关注者数量',
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `email` (`email`),
  KEY `role_id` (`role_id`),
  KEY `forbidden` (`forbidden`),
  KEY `last_active` (`last_active`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_user`
-- ----------------------------

INSERT INTO `han_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '499445428@qq.com', '1', '以后下雨谁来送伞，想听歌谁来唱，以后下午谁来送饭，自行车还没学会呢谁来教，下了晚自习我要去等谁，说好的那个地方我忘了谁来带我去，我的鞋已经坏了谁来和我一起买新的，你走的时候可不可以等等我我都找不到你，', '我是一只小小鸟', 'www.mingzhiwen.cn', '0', '1477123916', '', '/mytest/mingzhi/Uploads/avatar/20170321/58d12123d213b.jpg', '郑州', '男', '', '4', '', '', '', '', '0', '0', '0', '1', '18', '0', '0', '1855', '0', '1', '0', '0', '');
INSERT INTO `han_user` VALUES ('25', 'zz', '26182175853896fc7c47c261527a604f', '45444555@qq.com', '1', '', '撒大大', '', '0', '', '', '', '上海', '男', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '1', '14', '0', '1', '0', '0', '');
INSERT INTO `han_user` VALUES ('26', 'sdaada', '056bef908d28985f85ace3e293b339d7', '212112@qq.com', '1', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '3', '0', '1', '0', '0', '');
INSERT INTO `han_user` VALUES ('27', 'sdaada22', '056bef908d28985f85ace3e293b339d7', 'adadasdf@qq.com', '1', '', '', '', '0', '1477123345', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '');
INSERT INTO `han_user` VALUES ('29', 'sss', '26182175853896fc7c47c261527a604f', '2122@qq.com', '1', '', '', '', '0', '1477124059', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '');
INSERT INTO `han_user` VALUES ('30', 'dddd', '26182175853896fc7c47c261527a604f', '499488@qq.com', '1', '', '', '', '0', '1477126393', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '');
INSERT INTO `han_user` VALUES ('31', '我是大英雄', '26182175853896fc7c47c261527a604f', '49948dsad8@qq.com', '1', '', '', '', '0', '1477126450', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '');
INSERT INTO `han_user` VALUES ('32', '我是大英雄ll', '26182175853896fc7c47c261527a604f', '49948sda8@qq.com', '1', '', '', '', '0', '1477126493', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '');
INSERT INTO `han_user` VALUES ('33', 'ssdssd', '52fe691e00f65d7ef8f79066cc7feaea', '4saddd@qq.com', '1', '', '', '', '0', '1477129340', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '');
INSERT INTO `han_user` VALUES ('34', '哇哇哇哇', '26182175853896fc7c47c261527a604f', '77777777@qq.com', '1', '', '', '', '0', '1479622893', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '');
INSERT INTO `han_user` VALUES ('35', 'wwwww', '26182175853896fc7c47c261527a604f', '778888888@qq.com', '1', '', '', '', '0', '1479623364', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '');
INSERT INTO `han_user` VALUES ('36', 'eeeee', '26182175853896fc7c47c261527a604f', 'wqweeqew@qq.com', '1', '', '', '', '0', '1479623455', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '5', '0', '1', '0', '0', '');
INSERT INTO `han_user` VALUES ('37', 'rrbbb', '26182175853896fc7c47c261527a604f', '45666666@qq.com', '1', '', '', '', '0', '1479623572', '', '/mytest/mingzhi/Uploads/avatar/20161120/58315f7762f80.jpg', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '');
INSERT INTO `han_user` VALUES ('38', 'ttttt', '26182175853896fc7c47c261527a604f', '779778987@qq.com', '1', '', '', '', '0', '1479623729', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '');
INSERT INTO `han_user` VALUES ('39', '没什么不同', '26182175853896fc7c47c261527a604f', '123456789@qq.com', '1', '', '', '', '0', '1480821369', '', '/mytest/mingzhi/Uploads/avatar/20161204/58438be081e91.png', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '1', '0', '0', '13', '0', '1', '0', '0', '');
INSERT INTO `han_user` VALUES ('40', 'sssssss', '26182175853896fc7c47c261527a604f', '33333@qq.com', '1', '', '', '', '0', '1490955285', '', '/mytest/mingzhi/Uploads/avatar/20170331/58de2cb624895.jpg', '', '男', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '13', '0', '1', '0', '0', '0');
INSERT INTO `han_user` VALUES ('41', 'mmmmmmm', '26182175853896fc7c47c261527a604f', '4444444@qq.com', '1', '', '啦LALA', '', '0', '1490959054', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '1', '0', '0', '61', '0', '1', '0', '0', '0');

-- ----------------------------
-- Table structure for `han_user_follow`
-- ----------------------------

DROP TABLE IF EXISTS `han_user_follow`;

CREATE TABLE `han_user_follow` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `fans_uid` int(11) DEFAULT NULL COMMENT '关注人id',
  `friend_uid` int(11) DEFAULT NULL COMMENT '被关注人id',
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`follow_id`),
  KEY `fans_uid` (`fans_uid`),
  KEY `friend_uid` (`friend_uid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_user_follow`
-- ----------------------------

INSERT INTO `han_user_follow` VALUES ('1', '1', '25', '');
INSERT INTO `han_user_follow` VALUES ('2', '1', '26', '');
INSERT INTO `han_user_follow` VALUES ('3', '1', '41', '');

-- ----------------------------
-- Table structure for `han_user_linktopic`
-- ----------------------------

DROP TABLE IF EXISTS `han_user_linktopic`;

CREATE TABLE `han_user_linktopic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `tid` int(11) NOT NULL COMMENT '话题id',
  ` status` int(11) NOT NULL DEFAULT '0' COMMENT '状态',
  `concern_time` int(11) DEFAULT NULL COMMENT '关注时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_user_linktopic`
-- ----------------------------

INSERT INTO `han_user_linktopic` VALUES ('1', '1', '1', '1', '1477129340');
INSERT INTO `han_user_linktopic` VALUES ('2', '1', '2', '1', '1477129349');

-- ----------------------------
-- Table structure for `han_user_record`
-- ----------------------------

DROP TABLE IF EXISTS `han_user_record`;

CREATE TABLE `han_user_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `item_id` (`item_id`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `han_user_record`
-- ----------------------------

INSERT INTO `han_user_record` VALUES ('19', '1', '21', 'za', '1480818363');
INSERT INTO `han_user_record` VALUES ('22', '1', '23', 'za', '1480846113');
INSERT INTO `han_user_record` VALUES ('23', '1', '24', 'aq', '1480918472');
INSERT INTO `han_user_record` VALUES ('30', '1', '25', 'aq', '1481182292');
INSERT INTO `han_user_record` VALUES ('33', '1', '21', 'fq', '1481594845');
INSERT INTO `han_user_record` VALUES ('41', '1', '22', 'za', '1481867239');
INSERT INTO `han_user_record` VALUES ('42', '1', '26', 'aq', '1481867280');
INSERT INTO `han_user_record` VALUES ('48', '1', '14', 'za', '1481872464');
INSERT INTO `han_user_record` VALUES ('49', '1', '2', 'za', '1481872749');
INSERT INTO `han_user_record` VALUES ('50', '1', '18', 'za', '1481886090');
INSERT INTO `han_user_record` VALUES ('52', '1', '27', 'aq', '1481897041');
INSERT INTO `han_user_record` VALUES ('53', '1', '28', 'aq', '1481897134');
INSERT INTO `han_user_record` VALUES ('54', '1', '28', 'za', '1481964954');
INSERT INTO `han_user_record` VALUES ('55', '1', '24', 'za', '1482283418');
INSERT INTO `han_user_record` VALUES ('56', '1', '29', 'aq', '1482716948');
INSERT INTO `han_user_record` VALUES ('57', '1', '30', 'aq', '1482718300');
INSERT INTO `han_user_record` VALUES ('64', '1', '31', 'aq', '1487413252');
INSERT INTO `han_user_record` VALUES ('72', '1', '36', 'aq', '1488159591');
INSERT INTO `han_user_record` VALUES ('103', '1', '27', 'za', '1489218363');
INSERT INTO `han_user_record` VALUES ('106', '1', '19', 'za', '1489647635');
INSERT INTO `han_user_record` VALUES ('108', '1', '15', 'za', '1489731452');
INSERT INTO `han_user_record` VALUES ('110', '1', '35', 'za', '1490001259');
INSERT INTO `han_user_record` VALUES ('111', '1', '37', 'aq', '1490092640');
INSERT INTO `han_user_record` VALUES ('112', '1', '38', 'aq', '1490270514');
INSERT INTO `han_user_record` VALUES ('114', '1', '22', 'fq', '1490270641');
INSERT INTO `han_user_record` VALUES ('115', '1', '39', 'aq', '1490276638');
INSERT INTO `han_user_record` VALUES ('116', '1', '40', 'aq', '1490277091');
INSERT INTO `han_user_record` VALUES ('122', '1', '23', 'fq', '1490834599');
INSERT INTO `han_user_record` VALUES ('125', '40', '38', 'za', '1490958677');
INSERT INTO `han_user_record` VALUES ('126', '40', '41', 'aq', '1490958793');
INSERT INTO `han_user_record` VALUES ('127', '40', '41', 'za', '1490958802');
INSERT INTO `han_user_record` VALUES ('128', '41', '24', 'fq', '1490959460');
INSERT INTO `han_user_record` VALUES ('129', '1', '42', 'aq', '1491140780');
INSERT INTO `han_user_record` VALUES ('130', '1', '25', 'fq', '1493127859');
INSERT INTO `han_user_record` VALUES ('131', '1', '43', 'aq', '1493127981');

