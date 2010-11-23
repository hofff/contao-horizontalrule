<hr<?php echo $this->cssID ?> class="<?php echo $this->class ?>"/>
<?php if (strlen($this->anchor)): ?><div class="<?php echo $this->class ?>"><a title="<?php echo $GLOBALS['TL_LANG']['MSC']['backToTop'] ?>" href="{{env::request}}#<?php echo $this->anchor ?>"><?php echo $GLOBALS['TL_LANG']['MSC']['backToTop'] ?></a></div><?php endif; ?>
