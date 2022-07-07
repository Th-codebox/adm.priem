TaggableBehaviour
=================
��������� ������ �������� � ������.

��������� � ���������
---------------------
������� ������� ��� �������� ����� � �����-������� ��� ����� ����� � �������.
��� ������������ ���� ����� ��������������� SQL �� ����� `schema.sql`.

���������� � ������ ActiveRecord ����� `behaviors()`:
~~~
[php]
function behaviors() {
    return array(
        'tags' => array(
            'class' => 'ext.CTaggableBehaviour.CTaggableBehaviour',
            // ��� ������� ��� �������� ����� 
            'tagTable' => 'Tag',
            // ��� �����-�������, ����������� ��� � �������.
            // �� ��������� ������������ ��� ���_�������_������Tag
            'tagBindingTable' => 'PostTag',
            // ��� �������� ����� ������ � ���cc-�������.
            // �� ��������� ����� ���_�������_������Id 
            'modelTableFk' => 'postId',
            // ID ���� � �������-������
            'tagBindingTableTagId' => 'tagId',
            // ID ����������, ������������ �����������.
            // �� ��������� ID ����� false. 
            'cacheID' => 'cache',

            // ��������� �������������� ���� �������������.
            // ��� �������� false ���������� ���������� ���������� ���� ����������� ��� �� ����������.
            'createTagsAutomatically' => true,
        )
    );
}
~~~

������
------
### setTags($tags)
����� ����� ���� ��� ������ ������� ������.

~~~
[php]
$post = new Post();
$post->setTags('tag1, tag2, tag3')->save();
~~~


### addTags($tags) ��� addTag($tags)
��������� ���� ��� ��������� ����� � ��� ������������.

~~~
[php]
$post->addTags('new1, new2')->save();
~~~


### removeTags($tags) ��� removeTag($tags)
������� ��������� ���� (���� ����).

~~~
[php]
$post->removeTags('new1')->save();
~~~

### removeAllTags()
������� ��� ���� ������ ������.

~~~
[php]
$post->removeAllTags()->save();
~~~

### getTags()
����� ������ �����.

~~~
[php]
$tags = $post->getTags();
foreach($tags as $tag){
  echo $tag;
}
~~~

### hasTag($tags) ��� hasTags($tags)
���������� �� ������ ��������� ����.

~~~
[php]
$post = Post::model()->findByPk(1);
if($post->hasTags("yii, php")){
    //:
}
~~~

### getAllTags()
����� ��� ��������� ��� ����� ������ ������� ����.

~~~
[php]
$tags = Post::model()->getAllTags();
foreach($tags as $tag){
  echo $tag;
}
~~~

### getAllTagsWithModelsCount()
����� ��� ��������� ��� ����� ������ ������ ���� � ����������� ������� ��� �������.
~~~
[php]
$tags = Post::model()->getAllTagsWithModelsCount();
foreach($tags as $tag){
  echo $tag['name']." (".$tag['count'].")";
}
~~~

### taggedWith($tags) ��� withTags($tags)
��������� ���������� ������ AR �������� � ���������� ������.

~~~
[php]
$posts = Post::model()->taggedWith('php, yii')->findAll();
$postCount = Post::model()->taggedWith('php, yii')->count();
~~~

### resetAllTagsCache() � resetAllTagsWithModelsCountCache()
������������ ��� ������ ���� getAllTags() � getAllTagsWithModelsCount().



�������� ������
---------------
����, ���������� ������� ����� ����������� ��������� �������:
~~~
[php]
$post->addTags('new1, new2')->save();
echo $post->tags;
~~~

������������� ���������� ����� �����
------------------------------------
������ ����� ��������� ���� �� ���������� �����. ��������, ��� ������ Software �����
������ ���� ����� OS � Category.

��� ����� ���������� ������� �� ��� ������� �� ������ ������ �����:

~~~
[sql]
/* Tag table */
CREATE TABLE `Os` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `Os_name` (`name`)
);

/* Tag binding table */
CREATE TABLE `PostOs` (
  `postId` INT(10) UNSIGNED NOT NULL,
  `osId` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY  (`postId`,`osId`)
);

/* Tag table */
CREATE TABLE `Category` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `Category_name` (`name`)
);

/* Tag binding table */
CREATE TABLE `PostCategory` (
  `postId` INT(10) UNSIGNED NOT NULL,
  `categoryId` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY  (`postId`,`categoryId`)
);
~~~

����� ��������� ��� ������ ���������:

~~~
[php]
return array(
    'categories' => array(
        'class' => 'ext.CTaggableBehaviour.CTaggableBehaviour',
        'tagTable' => 'Category',
        'tagBindingTable' => 'PostCategory',
        'tagBindingTableTagId' => 'categoryId',
    ),
    'os' => array(
        'class' => 'ext.CTaggableBehaviour.CTaggableBehaviour',
        'tagTable' => 'Os',
        'tagBindingTable' => 'PostOs',
        'tagBindingTableTagId' => 'osId',
    ),
);
~~~

����� ����� ������ ����� ���:

~~~
[php]
$soft = Software::model()->findByPk(1);
// �� ��������� ���� ������ ������������� ���� ���������,
// ������� ����� �� ������ $soft->categories->addTag("Antivirus"),
// � ������������ ������� �����:
$soft->addTag("Antivirus");
$soft->os->addTag("Windows");
$soft->save();
~~~

�������������� ��� �����������
------------------------------

~~~
[php]
public function actions(){
    return array(
        'autocomplete_tags' => array(
            'class' => 'application.extensions.CTaggableBehaviour.CTaggableAutocompleteAction',
            'x' => 'y',
        )
    );
}
~~~

