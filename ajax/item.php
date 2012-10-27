
<?php
/**
 * @version		$Id: item.php 1492 2012-02-22 17:40:09Z joomlaworks@gmail.com $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<?php if(JRequest::getInt('print')==1): ?>
<!-- Print button at the top of the print page only -->
<a class="itemPrintThisPage" rel="nofollow" href="#" onclick="window.print();return false;">
	<span><?php echo JText::_('K2_PRINT_THIS_PAGE'); ?></span>
</a>
<?php endif; ?>

<!-- Start K2 Item Layout -->
<span id="startOfPageId<?php echo JRequest::getInt('id'); ?>"></span>

<div id="k2Container" class="itemView<?php echo ($this->item->featured) ? ' itemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">

	<!-- Plugins: BeforeDisplay -->
	<?php echo $this->item->event->BeforeDisplay; ?>

	<!-- K2 Plugins: K2BeforeDisplay -->
	<?php echo $this->item->event->K2BeforeDisplay; ?>

	<div class="itemHeader">
	  <h2 class="itemTitle">
			<?php if(isset($this->item->editLink)): ?>
			<!-- Item edit link -->
			<span class="itemEditLink">
				<a class="modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $this->item->editLink; ?>">
					<?php echo JText::_('K2_EDIT_ITEM'); ?>
				</a>
			</span>
			<?php endif; ?>

	  	<?php echo $this->item->title; ?>

	  	<?php if($this->item->params->get('itemFeaturedNotice') && $this->item->featured): ?>
	  	<!-- Featured flag -->
	  	<span>
		  	<sup>
		  		<?php echo JText::_('K2_FEATURED'); ?>
		  	</sup>
	  	</span>
	  	<?php endif; ?>
	  </h2>
  </div>

  <!-- Plugins: AfterDisplayTitle -->
  <?php echo $this->item->event->AfterDisplayTitle; ?>

  <!-- K2 Plugins: K2AfterDisplayTitle -->
  <?php echo $this->item->event->K2AfterDisplayTitle; ?>

	<?php if(
		$this->item->params->get('itemFontResizer') ||
		$this->item->params->get('itemPrintButton') ||
		$this->item->params->get('itemEmailButton') ||
		$this->item->params->get('itemSocialButton') ||
		$this->item->params->get('itemVideoAnchor') ||
		$this->item->params->get('itemImageGalleryAnchor') ||
		$this->item->params->get('itemCommentsAnchor')
	): ?>

	<?php endif; ?>



  <div class="itemBody">

	  <!-- Plugins: BeforeDisplayContent -->
	  <?php echo $this->item->event->BeforeDisplayContent; ?>

	  <!-- K2 Plugins: K2BeforeDisplayContent -->
	  <?php echo $this->item->event->K2BeforeDisplayContent; ?>



	  <?php if(!empty($this->item->fulltext)): ?>
	  <?php if($this->item->params->get('itemIntroText')): ?>
	  <!-- Item introtext -->
	  <div class="itemIntroText">
	  	<?php echo $this->item->introtext; ?>
	  </div>
	  <?php endif; ?>
	  <?php if($this->item->params->get('itemFullText')): ?>
	  <!-- Item fulltext -->
	  <div class="itemFullText">
	  	<?php echo $this->item->fulltext; ?>
	  </div>
	  <?php endif; ?>
	  <?php else: ?>
	  <!-- Item text -->
	  <div class="itemFullText">
              <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/eternit/css/mystyle.css" type="text/css" />
              <table width="100%">
                  <tr>
                      <td class="wl">
	<?php if($this->item->params->get('itemImageGallery') && !empty($this->item->gallery)): ?>
  <!-- Item image gallery -->
  <a name="itemImageGalleryAnchor" id="itemImageGalleryAnchor"></a>
  <div class="itemImageGallery">
	  <?php echo $this->item->gallery; ?>
  </div>
  <?php endif; ?>
	<?php echo $this->item->introtext; ?></td>
                      <td class="wr">
                          <?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
                          <?php
                              if ( $extraField->id=='2')
                                   {
                                    echo $extraField->name;
                                    echo $extraField->value;
                                   }
                          ?>
                          <?  endforeach;?>
                          <br><br>
                           <div id="boxes">

                            <div id="dialog<?php echo $this->item->id; ?>" class="window">

                                    Форма заказа <br>
                                    <table>
                                            <tr>
                                                    <td>Ф.И.О</td>
                                                    <td><input class="clear1" id="forname<?php echo $this->item->id;?>" name="nick" type="text" size="40">

                                                    </td>
                                            </tr>
                                            <tr>
                                                    <td>Email:</td>
                                                    <td><input class="clear1" id="emadres<?php echo $this->item->id;?>" name="email" type="text" size="40"></td>
                                            </tr>
                                            <tr>
                                                    <td>Текст</td>
                                                    <td><textarea class="clear1" id="comentariy<?php echo $this->item->id;?>" name="comment" cols="30" rows="3"></textarea></td>

                                            </tr>
                                    </table>
                                    <center><div id="selectme<?php echo $this->item->id;?>" class="mycl">заказать</div></center>
                                    <input id="tovar<?php echo $this->item->id;?>" name="email" type="text" size="40" value="<?php echo $this->item->title; ?>" style="display: none;">

                                    <span><div class="close"/>x</div></span>
                                    <script type="text/javascript">
                                    $(document).ready(function(){
                                            $('#selectme<?php echo $this->item->id;?>').click(function(){ // ����������� ��� ����� �� ������
                                                    var value = $('#forname<?php echo $this->item->id;?>').attr('value');// �������� �������� ��������� rel
                                                    var value2 = $('#tovar<?php echo $this->item->id;?>').attr('value');
                                                    var value3 = $('#emadres<?php echo $this->item->id;?>').attr('value');// �������� �������� ��������� rel
                                                    var value4 = $('#comentariy<?php echo $this->item->id;?>').attr('value');




                                                    var dataString = value;
                                                    var dataString2 = value2;
                                                    var dataString3 = value3;
                                                    var dataString4 = value4;

                                                    //alert(dataString);
                                                    $.post(
                                                            "<?php
                                                            /*echo JRoute::_('modules/mod_foremail/ajax.php?data=1');*/
                                                            $urlParts = explode('/', $_SERVER['SCRIPT_NAME']);
                                                            //print_r($urlParts);
                                                            $s1=$urlParts['1'];
                                                            $s2=$_SERVER['HTTP_HOST'];
                                                            $myurl=$s2+'/'+$s1;




                                                            echo'http://'; echo$s2;if ($s1!=''){echo'/'.$s1;}echo'/modules/mod_foremail/ajax.php?data=1'
                                                            ?>",
                                                                {
                                                                     param1: "parametru",
                                                                     param2: dataString,
                                                                     param3: dataString2,
                                                                     param4: dataString3,
                                                                     param5: dataString4
                                                                },
                                                            onAjaxSuccess
                                                            );

                                                     function onAjaxSuccess(data)
                                                        {
                                                            // ����� �� �������� �    �����, ������������ �������� � ������� �� �� �����.
                                                            //alert(data);
                                                            $("#uck").html(data); // � ���� ������ ������ ���� <div id="uck"></div>

                                                            }
                                              event.preventDefault(); // ���������� FALSE
                                            })
                                    })
                            </script>
                            </div>
                            <div id="mask"></div>

                    </div>
                     <a href="#dialog<?php echo $this->item->id; ?>" name="modal">
                            <img width="80" height="30" alt="buybutton.png" src="<?php echo $this->baseurl; ?>/images/buybutton.png">
                    </a>


                      </td>
                  </tr>

              </table>


                <script>
                        $(document).ready(function(){
                        $(".mbut2").click(function () {
                        $(".mm1").css("display", "none");
                        $(".mm2").css("display", "block");
                        $(".mm3").css("display", "none");}
                                );

                        $(".mbut3").click(function () {
                        $(".mm1").css("display", "none");
                        $(".mm3").css("display", "block");
                        $(".mm2").css("display", "none");}
                                );

                        $(".mbut1").click(function () {
                        $(".mm2").css("display", "none");
                        $(".mm1").css("display", "block");
                        $(".mm3").css("display", "none");}
                                );
                        });
                </script>


	  </div>
	  <?php endif; ?>

		<div class="clr"></div>

	  <?php if($this->item->params->get('itemExtraFields') && count($this->item->extra_fields)): ?>
	  <!-- Item extra fields -->
	  <div class="itemExtraFields">
	  	<h3><?php //echo JText::_('K2_ADDITIONAL_INFO'); ?></h3>
	  	<ul>
			<?php /*foreach ($this->item->extra_fields as $key=>$extraField): ?>
			<?php if($extraField->value): ?>
			<li class="<?php echo ($key%2) ? "odd" : "even"; ?> type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
				<span class="itemExtraFieldsLabel"><?php echo $extraField->name; ?>:</span>
				<span class="itemExtraFieldsValue"><?php echo $extraField->value; ?></span>
			</li>
			<?php endif; ?>
			<?php endforeach; */?>
			</ul>
	    <div class="clr"></div>
	  </div>
          <div>

              <script type="text/javascript">
                $(document).ready(function(){
                        $(".selectTabs").each(function () {
                                var tmp = $(this);
                                console.log($(tmp).find(" .lineTabs li"));
                                $(tmp).find(".lineTabs li").each(function (i) {
                                        $(tmp).find(".lineTabs li:eq("+i+") a").click(function(){
                                                var tab_id=i+1;
                                                $(tmp).find(".lineTabs li a").removeClass("active");
                                                $(this).addClass("active");
                                                $(tmp).find(".content div").stop(false,false).hide();
                                                $(tmp).find(".tab"+tab_id).stop(false,false).show();
                                                return false;
                                        })
                                })
                        })
                })
                </script>
                     <div id="wrap">
                        <div class="selectTabs">
                                <ul class="lineTabs">
                                        <li><a href="#">Сертификаты</a></li>
                                        <li><a href="#">Документация</a></li>
                                        <li><a href="#">Характеристики</a></li>
                                        <li><a href="#" class="active">Описание</a></li>
                                </ul>
                                <div class="content">
                                    <?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
                                        <div class="tab1">
                                                <p>
                                               <?php
                                                    if ( $extraField->id=='6')
                                                    {
                                                    echo $extraField->value;
                                                    }
                                                ?>
                                                </p>
                                        </div>
                                        <div class="tab2">
                                                <p>
                                                <?php
                                                    if ( $extraField->id=='5')
                                                    {
                                                    echo $extraField->value;
                                                    }
                                                ?>
                                                </p>
                                        </div>
                                        <div class="tab3">
                                                <p>
                                                <?php
                                                    if ( $extraField->id=='4')
                                                    {
                                                    echo $extraField->value;
                                                    }
                                                ?>
                                                </p>
                                        </div>
                                        <div class="tab4" style="display:block;">

                                                <p>
                                                    <?php
                                                    if ( $extraField->id=='3')
                                                    {
                                                    echo $extraField->value;
                                                    }
                                                ?>
                                                </p>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                        </div>
                  </div>
	</div>
          </div>


	  <?php endif; ?>

		<?php if($this->item->params->get('itemHits') || ($this->item->params->get('itemDateModified') && intval($this->item->modified)!=0)): ?>
		<div class="itemContentFooter">





			<div class="clr"></div>
		</div>
		<?php endif; ?>

	  <!-- Plugins: AfterDisplayContent -->
	  <?php echo $this->item->event->AfterDisplayContent; ?>

	  <!-- K2 Plugins: K2AfterDisplayContent -->
	  <?php echo $this->item->event->K2AfterDisplayContent; ?>

	  <div class="clr"></div>
  </div>

	<?php if($this->item->params->get('itemTwitterButton',1) || $this->item->params->get('itemFacebookButton',1) || $this->item->params->get('itemGooglePlusOneButton',1)): ?>
	<!-- Social sharing -->

	<?php endif; ?>






	<?php
	/*
	Note regarding 'Related Items'!
	If you add:
	- the CSS rule 'overflow-x:scroll;' in the element div.itemRelated {…} in the k2.css
	- the class 'k2Scroller' to the ul element below
	- the classes 'k2ScrollerElement' and 'k2EqualHeights' to the li element inside the foreach loop below
	- the style attribute 'style="width:<?php echo $item->imageWidth; ?>px;"' to the li element inside the foreach loop below
	...then your Related Items will be transformed into a vertical-scrolling block, inside which, all items have the same height (equal column heights). This can be very useful if you want to show your related articles or products with title/author/category/image etc., which would take a significant amount of space in the classic list-style display.
	*/
	?>

  <?php if($this->item->params->get('itemRelated') && isset($this->relatedItems)): ?>
  <!-- Related items by tag -->
	<div class="itemRelated">
		<h3><?php echo JText::_("K2_RELATED_ITEMS_BY_TAG"); ?></h3>
		<ul>
			<?php foreach($this->relatedItems as $key=>$item): ?>
			<li class="<?php echo ($key%2) ? "odd" : "even"; ?>">

				<?php if($this->item->params->get('itemRelatedTitle', 1)): ?>
				<a class="itemRelTitle" href="<?php echo $item->link ?>"><?php echo $item->title; ?></a>
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedCategory')): ?>
				<div class="itemRelCat"><?php echo JText::_("K2_IN"); ?> <a href="<?php echo $item->category->link ?>"><?php echo $item->category->name; ?></a></div>
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedAuthor')): ?>
				<div class="itemRelAuthor"><?php echo JText::_("K2_BY"); ?> <a rel="author" href="<?php echo $item->author->link; ?>"><?php echo $item->author->name; ?></a></div>
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedImageSize')): ?>
				<img style="width:<?php echo $item->imageWidth; ?>px;height:auto;" class="itemRelImg" src="<?php echo $item->image; ?>" alt="<?php K2HelperUtilities::cleanHtml($item->title); ?>" />
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedIntrotext')): ?>
				<div class="itemRelIntrotext"><?php echo $item->introtext; ?></div>
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedFulltext')): ?>
				<div class="itemRelFulltext"><?php echo $item->fulltext; ?></div>
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedMedia')): ?>
				<?php if($item->videoType=='embedded'): ?>
				<div class="itemRelMediaEmbedded"><?php echo $item->video; ?></div>
				<?php else: ?>
				<div class="itemRelMedia"><?php echo $item->video; ?></div>
				<?php endif; ?>
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedImageGallery')): ?>
				<div class="itemRelImageGallery"><?php echo $item->gallery; ?></div>
				<?php endif; ?>
			</li>
			<?php endforeach; ?>
			<li class="clr"></li>
		</ul>
		<div class="clr"></div>
	</div>
	<?php endif; ?>

	<div class="clr"></div>

  <?php if($this->item->params->get('itemVideo') && !empty($this->item->video)): ?>
  <!-- Item video -->
  <a name="itemVideoAnchor" id="itemVideoAnchor"></a>

  <div class="itemVideoBlock">
  	<h3><?php echo JText::_('K2_MEDIA'); ?></h3>

		<?php if($this->item->videoType=='embedded'): ?>
		<div class="itemVideoEmbedded">
			<?php echo $this->item->video; ?>
		</div>
		<?php else: ?>
		<span class="itemVideo"><?php echo $this->item->video; ?></span>
		<?php endif; ?>

	  <?php if($this->item->params->get('itemVideoCaption') && !empty($this->item->video_caption)): ?>
	  <span class="itemVideoCaption"><?php echo $this->item->video_caption; ?></span>
	  <?php endif; ?>

	  <?php if($this->item->params->get('itemVideoCredits') && !empty($this->item->video_credits)): ?>
	  <span class="itemVideoCredits"><?php echo $this->item->video_credits; ?></span>
	  <?php endif; ?>

	  <div class="clr"></div>
  </div>
  <?php endif; ?>

  <!-- Plugins: AfterDisplay -->
  <?php echo $this->item->event->AfterDisplay; ?>

  <!-- K2 Plugins: K2AfterDisplay -->
  <?php echo $this->item->event->K2AfterDisplay; ?>

  <?php if($this->item->params->get('itemComments') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1'))): ?>
  <!-- K2 Plugins: K2CommentsBlock -->
  <?php echo $this->item->event->K2CommentsBlock; ?>
  <?php endif; ?>



	<?php if(!JRequest::getCmd('print')): ?>
	<div class="itemBackToTop">
		<a class="k2Anchor" href="<?php echo $this->item->link; ?>#startOfPageId<?php echo JRequest::getInt('id'); ?>">
			<?php echo JText::_('K2_BACK_TO_TOP'); ?>
		</a>
	</div>
	<?php endif; ?>

	<div class="clr"></div>
</div>
<!-- End K2 Item Layout -->
