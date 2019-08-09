<?php

namespace West\ColorUsername\XF\Template;

class Templater extends XFCP_Templater
{
	public function fnUsernameLink($templater, &$escape, $user, $rich = false, $attributes = [])
	{
		$html = parent::fnUsernameLink($templater, $escape, $user, $rich, $attributes);

		if ($user instanceof \West\ColorUsername\XF\Entity\User)
		{
			if ($user->canChangeUsernameColor())
			{
			    $styles = $user->getColorUsernameStyles();
                $html = str_replace('dir', "style=\"$styles\" dir", $html);
			}
		}
		return $html;
	}
}