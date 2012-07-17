<?php
/**
* A simple Socialbutton for this script
*
* PHP Version 5+ or Upper version
*
* @package SampleGetBlockContent
* @author domifara
* @copyright 2010 Hidehito NOZAWA ,domifara
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU GPL v2
*
*/

defined('XOOPS_ROOT_PATH') or die;

class JQuerySocialbutton extends XCube_ActionFilter
{
	/**
	* event add
	*/
	public function preBlockFilter()
	{
		//admin page
		if ($this->mRoot->mController->_mStrategy){
			if (strtolower(get_class($this->mRoot->mController->_mStrategy)) == strtolower('Legacy_AdminControllerStrategy')) {
				return ;
			}
		}
		$this->mRoot->mDelegateManager->add('Site.JQuery.AddFunction',array(&$this, 'addScript'));
	}
	/**
	* event add
	*/
	function postFilter()
	{
		//admin page
		if ($this->mRoot->mController->_mStrategy){
			if (strtolower(get_class($this->mRoot->mController->_mStrategy)) == strtolower('Legacy_AdminControllerStrategy')) {
				return ;
			}
		}
		$this->mRoot->mDelegateManager->add('Legacy_RenderSystem.BeginRender', array(&$this, 'hook'));
	}

	public function addMeta(/*** string ***/ $name, /*** string ***/ $content)
  {
  }

	public function addScript(&$jQuery)
	{
		$jQuery->addLibrary('/common/socialbutton/jquery.socialbutton-1.8.0.js', true);
		$jQuery->addLibrary('/common/socialbutton/jquery.socialbutton.init.js', true);
		$jQuery->addLibrary('/common/socialbutton/jquery.twittertrackbacks-1.0.min.js', true);
		$jQuery->addLibrary('/common/socialbutton/jquery.twittertrackbacks.ini.js', true);
		$jQuery->addStylesheet('/common/socialbutton/socialbutton.css', true);
		$jQuery->addLibrary('/common/socialbutton/fb.js', true);
	}
	/**
	* assign check
	*/
	public function hook(&$xoopsTpl)
	{
		if ( $this->_isXoops_contentsPrepared($xoopsTpl) === false )
		{
			return; // xoops_contents is no ready
		}

		// get 'xoops_contents' from xoopsTpl
		$xoops_contents = $xoopsTpl->get_template_vars('xoops_contents');
		$xoops_dirname = $xoopsTpl->get_template_vars('xoops_dirname');
		$undsplay_dir_arr = array('legacy','user','profile','message');

		if ( $xoops_contents === null )
		{
			return; // $xoops_contents is nothing
		}
		if (in_array($xoops_dirname,$undsplay_dir_arr) ){
			return; // $xoops_contents is nothing
		}

		// top position of xoops_contents
		$xoops_contents_aad_socialbutton = $xoops_contents.'
					<div id="fb-root"></div>
					<div id="socialbutton_div">
					<div class="facebook_like"></div>
					<div class="twitter"></div>
					<div class="evernote"></div>
					<div class="google_plusone"></div>
					<div class="gree"></div>
					<div class="hatena"></div>
					</div>
					<div style="clear: both ; height:0px; visibility:hidden;"></div>
					<div class="mt-label"></div>
					<div class="my-trackbacks">まだ、誰もつぶやいてくれないのだぁ～　淋しいなぁ～</div>
					<div style="clear: both ; height:0px; visibility:hidden;"></div>';

		// xoopsTpl over write
		$xoopsTpl->assign('xoops_contents', $xoops_contents_aad_socialbutton);

	}

	/**
	* xoops_contentsis_ready
	* @returns bool TRUE or FALSE
	*/
	protected function _isXoops_contentsPrepared($xoopsTpl)
	{
		return ( $xoopsTpl->get_template_vars('xoops_contents') !== null );
	}

}//class END
